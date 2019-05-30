<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction;


use AnthraxisBR\SwooleFW\CloudServices\GCP\Google;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\server\Client;

class CloudFunctionClient extends Google
{

    public const url = 'https://cloudfunctions.googleapis.com/v1/';

    public const attr = '{name}';

    public $client;

    public function __construct(array $config = array())
    {
        $this->client = new Client();
        parent::__construct($config);
        var_dump('aa');
    }

    /**
     * @param string $name
     * @return Request
     */
    public function call(string $name) : Request
    {
        $url = $this::url . $name . '/call';
        return $this->get($url);
    }

    public function create(CloudFunctionObject $cloudFunctionObject, string $application) : Request
    {
        $url = $this::url . $application . '/functions';
        $this->client->post($url, [
            'json' => (string) $cloudFunctionObject
        ]);
    }

    public function deleteFunction(string $name)
    {
        $url = $this::url . $name;
        $this->delete($url);
    }

    public function generateDownloadUrl(string $name)
    {
        $url = $this::url . $name . ':generateDownloadUrl';
        $this->post($url);
    }


    public function generateUploadUrl(string $name)
    {
        $url = $this::url . $name . ':generateUploadUrl';
        $this->post($url);
    }

    public function getFunction(string $name)
    {
        $url = $this::url . $name;
        $this->get($url);
    }


    public function list(string $parent)
    {
        $url = $this::url . $parent . '/functions';
        $this->get($url);
    }


    public function patch(CloudFunctionObject $cloudFunctionObject, string $function, string $name)
    {
        $url = $this::url . $function . $name;
        $this->patch($url, $cloudFunctionObject->json());
    }



}