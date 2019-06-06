<?php


namespace AnthraxisBR\SwooleFW\Http;


use GuzzleHttp\HandlerStack;

class Client extends \GuzzleHttp\Client
{

    public function __construct(array $config = [])
    {
    }

    public function constructCoroutinesAdapter(Request $request)
    {

        $handler = new HttpClientAdapter($request);

        $config['handler'] = HandlerStack::create($handler);

        parent::__construct($config);
    }

}