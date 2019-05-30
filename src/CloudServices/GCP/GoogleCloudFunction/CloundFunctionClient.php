<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction;


use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\server\Client;

class CloundFunctionClient extends Client
{

    public const url = 'https://cloudfunctions.googleapis.com/v1/';

    public const attr = '{name}';

    /**
     * @param string $name
     * @return Request
     */
    public function call(string $name) : Request
    {
        $url = $this::url . $name . '/call';
        return $this->get($url);
    }

    public function create(CloudFunctionObject $cloudFunctionObject, $location) : Request
    {
        $url = $this::url . $location . '/functions';
        $this->post($url, $cloudFunctionObject->json());
    }

}