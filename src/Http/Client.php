<?php


namespace AnthraxisBR\FastWork\Http;


use GuzzleHttp\HandlerStack;

class Client extends \GuzzleHttp\Client
{

    public function __construct(array $config = [])
    {
    }

    public function constructSaberAdapt(Request $request)
    {

        $handler = new HttpClientAdapter($request);

        $config['handler'] = HandlerStack::create($handler);

        parent::__construct($config);
    }

}