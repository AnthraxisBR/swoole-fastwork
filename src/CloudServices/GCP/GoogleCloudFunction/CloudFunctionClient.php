<?php


namespace AnthraxisBR\FastWork\CloudServices\GCP\GoogleCloudFunction;


use AnthraxisBR\FastWork\CloudServices\GCP\Google;
use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\Http\Response;
use AnthraxisBR\FastWork\Server\Client;

class CloudFunctionClient extends Google
{

    public const url = 'https://cloudfunctions.googleapis.com/v1/';

    public const attr = '{name}';

    public $client;

    public function __construct(array $config = array())
    {
/*
        try {
            $client = new \Google_Client();
            //$credentials = getenv('root_folder') . 'application/CloudServices/credentials.json';
            //$client->setAuthConfig($credentials);
            $client->useApplicationDefaultCredentials();

            $client->addScope(\Google_Service_CloudFunctions::CLOUD_PLATFORM);
            /*$client->addScope(\Google_Service_Drive::DRIVE_METADATA_READONLY);
            $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
            $client->setAccessType('offline');        // offline access
            $client->setIncludeGrantedScopes(true);
            //var_dump($client->fetchAccessTokenWithAssertion());
            $this->client = $client->authorize();

        } catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }*/

        parent::__construct($config);
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

    public function create(CloudFunctionObject $cloudFunctionObject, string $application) : \GuzzleHttp\Psr7\Response
    {
        $client = new \AnthraxisBR\FastWork\Http\Client();

        $url = $this::url . $application . '/functions';

        $client->constructSaberAdapt(new Request(
            $request = null,
            $method = 'post',
            $uri = $url,
            $body = (array) $cloudFunctionObject
        ));

        return $client->request('POST', $url, [
            'json' =>json_decode($cloudFunctionObject)
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