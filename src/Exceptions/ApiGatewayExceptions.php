<?php


namespace AnthraxisBR\SwooleFW\Exceptions;


class ApiGatewayExceptions extends BaseException
{
    public function __construct($message = "")
    {
        //$message = $this->parseMessage($message);$message = str_replace('\\\\','\\', json_encode($message));
        parent::__construct($message);
    }


    public function parseMessage(string $message)
    {
        $arr = [];
        $arr['response'] = explode("\n", $message);
        $r = [];
        foreach ( $arr['response']as $item) {
          var_dump($item);
          exit();
        }

        return $arr;

        $message = explode( ';' , $message);
        $message = explode( '` response:' , $message[1]);
        $message = explode( '{"message":' , $message[1]);

        $read = [];
        foreach ($message as $item) {
            $original = $item;
            $item = '{"message":' . $item;

            if(json_decode($item)){
                $read[] = json_decode($item);
                continue;
            }
            $item = $item . '"}';

            if(json_decode($item)){
                $read[] = json_decode($item);
                continue;
            }

            $item = '{"message":' . $original . '"}';
            $item = str_replace('":\"','":"', $item);
            //$item = str_replace('\\','\\\\', $item);
            var_dump($item);

            $item = str_replace(array("\r", "\n"), '', $item);

            if(json_decode($item)){
                $read[] = json_decode($item);
                continue;
            }

        }

        return json_encode($item);
    }
}
/*
{
    "message":"1 validation error detected: Value 'teste' at 'role' failed to satisfy constraint: Member must satisfy regul (truncated...)
 ValidationException (client): 1 validation error detected: Value 'teste' at 'role' failed to satisfy constraint: Member must satisfy regular expression pattern: arn:(aws[a-zA-Z-]*)?:iam::\d{12}:role/?[a-zA-Z_0-9+=,.@\-_/]+ - "
}

{"message":"1 validation error detected: Value 'teste' at 'role' failed to satisfy constraint: Member must satisfy regular expression pattern: arn:(aws[a-zA-Z-]*)?:iam::\\d{12}:role/?[a-zA-Z_0-9+=,.@\\-_/]+"}

}*/