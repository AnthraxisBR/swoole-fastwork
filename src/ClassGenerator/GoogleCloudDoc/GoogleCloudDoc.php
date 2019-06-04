<?php

include "../../../vendor/autoload.php";

class GoogleCloudDoc
{

    public $file;

    public $data;

    public $filename;

    public function __construct($file)
    {
        $this->filename = $file;

        $this->file = file_get_contents($file);

        $this->data = json_decode($this->file);

    }

    public function generateClasses()
    {
        echo PHP_EOL;
        echo PHP_EOL;

        $object = $this->getAllObjects();

        $path = /*getenv('root_folder') .*/ '/home/gabriel/PhpstormProjects/swoole-fw//src/CloudServices/GCP/Sdk/';

        $namespace = 'AnthraxisBR\SwooleFW\CloudServices\GCP\Sdk';

        $folder = $object['classname'];

        $full_path = $path . $folder;

        mkdir($full_path);

        $classname = $object['classname'];

        $namespace = $namespace . '\\' . $folder;

        $namespace = new \Nette\PhpGenerator\PhpNamespace($namespace);
        $class = $namespace->addClass($classname);

        $class->addComment('Auto generated class from google-docs-sdk-generator from AnthraxisBR');

        $class->addExtend(\AnthraxisBR\SwooleFW\CloudServices\GCP\FwGoogleClient::class);

        $index = 0;
        $methods = [];
        foreach ($object['classmethods'] as $method_name){
            //$m =  $class->addMethod($method_name);
            $methods[$index] = $class->addMethod($method_name);
            $index += 1;
        }

        $index = 0;
        foreach ($object['methods'] as $methods_arr){
            //


            $body = '';


            if($methods_arr->pageMethod == 'GET'){

                $body .= $this->buildBody($methods_arr, $body, $methods, $index);
                $body .= 'return $this->get($url);';
            }

            if($methods_arr->pageMethod == 'POST'){

                $param = 'data';

                $methods[$index]->addParameter($param);

                $body .= $this->buildBody($methods_arr, $body, $methods, $index);

                $body .= 'return $this->post($url, $' . $param . '->getJson());';
            }

            if($methods_arr->pageMethod == 'PATCH'){

                $param = 'data';

                $methods[$index]->addParameter($param);

                $body .= $this->buildBody($methods_arr, $body, $methods, $index);

                $body .= 'return $this->patch($url, $' . $param . '->getJson());';
            }

            if($methods_arr->pageMethod == 'DELETE'){

                $body .= $this->buildBody($methods_arr, $body, $methods, $index);

                $body .= 'return $this->delete($url);';
            }

            $methods[$index]->addBody($body);



            $index += 1;
        }

        $text = (string) $namespace;

        $file = fopen($full_path . '/' . $classname . '.php','w');

        $base = '<?php ' . PHP_EOL . PHP_EOL . PHP_EOL ;
        $base .= (string) $text;

        fwrite($file, (string) $base);

    }

    public function buildBody($methods_arr, $body, $methods, $index)
    {

        $url = $methods_arr->urlRequest;

        $body .= '$args = [];' . PHP_EOL;

        $url_exp = explode('/', $url);
        foreach ($url_exp as $exp){
            preg_match_all('/(?<={)[^"]+(?=})/', $exp, $matches);
            foreach ($matches as $match){
                if(isset($match[0])){
                    $body .= '$args[] = "{' . $match[0] . '}";'  . PHP_EOL;
                }
            }
        }

        $body .= '$url = $this->replaceUri(\'' . $url . '\', $args);' . PHP_EOL;

        $body .= '$queryArgs = [];' . PHP_EOL;

        if(isset($methods_arr->item->queryParameters)){

            foreach ($methods_arr->item->queryParameters as $parameter => $queryParameters){
                //$m->addBody();
                $type = $queryParameters->type;

                if(strpos($type, 'number') !== false){
                    $type = 'int';
                }
                $type = str_replace('(int64 format)','', $type);
                $methods[$index]->addParameter($parameter)->setTypeHint($type);;
                $methods[$index]->addComment($queryParameters->text);
                $body .= '$queryArgs[] = $' . $parameter .';' . PHP_EOL;
            }
        }




        $body .= '$url = $this->parseArgs($url, $queryArgs);' . PHP_EOL;

        $body .= '$url = $this->prepareUrl($url);' . PHP_EOL;

        return $body;
    }

    public function getAllObjects()
    {
        $object = [];

        $className = $this->readFilename($this->filename);

        $object['classname'] = $className[0];

        $files_str = '/home/gabriel/PhpstormProjects/swoole-fw/repositories/'. $className[0] . '*.json';

        $files = glob($files_str, GLOB_BRACE);

        $object['methods'] = [];
        $object['classMethods'] = [];
        foreach($files as $file) {
            $info = pathinfo($file);
            $name = $this->readFilename($info['basename']);
            unset($name[0]);
            $name = array_values($name);
            $name = implode('', $name);
            $object['classmethods'][] = $name;

            $object['methods'][] = json_decode(file_get_contents($info['dirname'] . '/' .$info['basename']));
        }
        return $object;

    }

    public function readFilename($filename){

        $filename_exp = explode('/',$filename);
        $filename = $filename_exp[count($filename_exp) - 1];
        $filename = explode('.', $filename);
        $filename = $filename[0];

        $arr = preg_split('/(?=[A-Z])/',$filename);
        if($arr[0] == ''){
            unset($arr[0]);
            $arr = array_values($arr);
        }
        return $arr;
    }
}

function readFilename($filename){

    $filename_exp = explode('/',$filename);
    $filename = $filename_exp[count($filename_exp) - 1];
    $filename = explode('.', $filename);
    $filename = $filename[0];

    $arr = preg_split('/(?=[A-Z])/',$filename);
    if($arr[0] == ''){
        unset($arr[0]);
        $arr = array_values($arr);
    }
    return $arr;
}

$chacklist = [];
foreach (glob("/home/gabriel/PhpstormProjects/swoole-fw/repositories/*.json") as $filename) {
    $arr = readFilename($filename);
    if(!in_array($arr[0], $chacklist)){

        $chacklist[] = $arr[0];

        $name = implode('',$arr);

        $g = new GoogleCloudDoc('/home/gabriel/PhpstormProjects/swoole-fw/repositories/' . $name . '.json');

        $g->generateClasses();
    }

}
