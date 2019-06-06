<?php


namespace AnthraxisBR\SwooleFW\Http;


use AnthraxisBR\SwooleFW\Exceptions\MethodNotAllowed;
use GuzzleHttp\Promise\FulfilledPromise;
use phpWhois\Whois;
use Psr\Http\Message\RequestInterface;

class HttpClientAdapter
{

    public function __invoke(RequestInterface $request, array $options)
    {
        $domain = "https://reqres.in";

    var_dump($result);
        $http_client = new \Swoole\Coroutine\Http\Client($domain, 80);
        $http_client->get('/users');
        var_dump($http_client->body);
        // websocket
        var_dump($http_client->recv()->data);

        /*$method = 'get';//$request->getMethod();
        var_dump(get_class($cli));
        try{
            var_dump((string) $request->getUri());
            $uri = 'https://reqres.in/api/users'; //(string) $request->getUri()
            $response = $cli->{strtolower($method)}($uri);
        }catch (\Exception $e){
            throw new MethodNotAllowed($e->getMessage());
        }
        var_dump(get_class($response));
var_dump($cli->recv());
        $cli->close();
*/
        if(is_null($cli->headers)){
            $headers = [];
        }else{
            $headers = $cli->headers;
        }

        return new FulfilledPromise(
            new Response(null, $cli->statusCode, $headers, $cli->body)
        );
    }
}