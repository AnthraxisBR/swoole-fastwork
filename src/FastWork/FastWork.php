<?php

namespace AnthraxisBR\FastWork\FastWork;

use AnthraxisBR\FastWork\ClassGenerator\FastWork\ActionGenerator;
use AnthraxisBR\FastWork\ClassGenerator\FastWork\GraphQLGenerator;
use AnthraxisBR\FastWork\ClassGenerator\FastWork\ModelGenerator;
use AnthraxisBR\FastWork\ClassGenerator\FastWork\TaskActionGenerator;

class FastWork
{

    public function run($args)
    {
        if($args[1] == 'create-module'){
            $this->createModule();
        }

    }

    public function createModule()
    {
        $handle = fopen ("php://stdin","r");

        echo 'Inform resources to create: (comma separated)'. PHP_EOL;
        echo '[0] = Action' . PHP_EOL;
        echo '[1] = Model' . PHP_EOL;
        echo '[2] = GraphQL' . PHP_EOL;
        echo '[3] = Task' . PHP_EOL;
        echo ':';
        $resources = fgets($handle);

        $exp = explode(',', trim($resources));

        $arr = [];
        if(count($exp) > 0){
            echo 'Insert your structure resources name: ' . PHP_EOL;

            $name = trim(fgets($handle));

            if(count($exp) > 1){
                echo "Apply for all ? (y/n) "  . PHP_EOL;
                $apply_all = trim(fgets($handle));
                if($apply_all == '' || $apply_all == null){
                    $apply_all = 'y';
                }
            }else{
                $apply_all = 'y';
            }
            if($apply_all == 'y'){
                foreach ($exp as $item) {
                    if ($item == '0') {
                        $arr['action'] = $name;
                    } elseif ($item == '1') {
                        $arr['model'] = $name;
                    } elseif ($item == '2') {
                        $arr['graphql'] = $name;
                    } elseif ($item == '3') {
                        $arr['task'] = $name;
                    }
                }
            }else{
                foreach ($exp as $item) {
                    if ($item == '0') {
                        echo "Insert Action name: " . PHP_EOL;
                        $arr['action'] = trim(fgets($handle));
                    } elseif ($item == '1') {
                        echo "Insert Model name: " . PHP_EOL;
                        $arr['model'] = trim(fgets($handle));
                    } elseif ($item == '2') {
                        echo "Insert GraphQL Object name: " . PHP_EOL;
                        $arr['graphql'] = trim(fgets($handle));
                    } elseif ($item == '3') {
                        echo "Insert Task name: " . PHP_EOL;
                        $arr['task'] = trim(fgets($handle));
                    }
                }
            }
        }

        $this->buildStructure($arr);
    }


    public function buildStructure($arr)
    {
        if(isset($arr['action'])){
            ActionGenerator::make($arr['action']);
        }
        if(isset($arr['model'])){
            ModelGenerator::make($arr['model']);
        }
        if(isset($arr['graphql'])){
            GraphQLGenerator::make($arr['graphql']);
        }
        if(isset($arr['task'])){
            TaskActionGenerator::make($arr['task']);
        }
    }

}