<?php

namespace App\CloudServices;


use AnthraxisBR\SwooleFW\CloudServices\AWS\S3\Bucket;
use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\ObjectStorage;

class Exemplo extends ObjectStorage
{

    public $serviceProvider = 'aws';

    public $blob = '';

    public $container = '';

    public $bucket = 'exemplo';

    public $key = 'file';

    public $body = 'asdasd';


}
