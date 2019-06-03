<?php


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
        $object = $this->getAllObjects();

        $namespace = '';
        var_dump($object);
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
            $object['methods'][] = json_decode(readfile($file));
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


$g = new \GoogleCloudDoc();

$g->generateClasses();