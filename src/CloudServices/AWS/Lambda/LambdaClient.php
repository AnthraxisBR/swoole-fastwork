<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda;

use Aws\Lambda\LambdaClient as LambdaClientAws;

class LambdaClient
{
    public function __construct()
    {
        $this->client = new LambdaClientAws([
            'version' => 'latest',
            'region' => getenv('AWS_REGION')
        ]);

    }


}