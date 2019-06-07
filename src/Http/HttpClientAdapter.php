<?php

namespace AnthraxisBR\SwooleFW\Http;


use AnthraxisBR\SwooleFW\Exceptions\MethodNotAllowed;
use GuzzleHttp\Promise\FulfilledPromise;
use phpWhois\Whois;
use Psr\Http\Message\RequestInterface;
use Swlib\Http\Exception\RequestException;
use Swlib\SaberGM;

class HttpClientAdapter
{

    private $client;

    public function __invoke(RequestInterface $request, array $options)
    {

        $method = $request->getMethod();

        $this->client = new SaberGM();

        try{

            $uri = (string) $request->getUri();

            /* @var $response \Swlib\Http\Response */
            $response = $this->client->patch($uri);

            return new FulfilledPromise(
                new \GuzzleHttp\Psr7\Response($response->getStatusCode(),$response->getHeaders(),$response->getBody())
            );

        }catch (RequestException $e){
            throw new \AnthraxisBR\SwooleFW\Exceptions\RequestException($e->getMessage());
        }catch (\Exception $e){
            throw new MethodNotAllowed([$e->getMessage()], $method);
        }
    }
}