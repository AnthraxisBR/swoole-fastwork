<?php

namespace AnthraxisBR\FastWork\Http;
use AnthraxisBR\FastWork\traits\Injection;
use GuzzleHttp\Psr7\Request as RequestBase;
use Psr\Http\Message\RequestInterface;
use Swoole\Http\Request as SwooleRequest;

class Request extends RequestBase
{

    use Injection;

    public $name;
    /**
     * @var string
     */
    public static $injection_reference = 'request';

    /**
     * Request constructor.
     * @param SwooleRequest $request
     * @param string $method
     * @param string $uri
     * @param array $headers
     * @param null $body
     * @param string $version
     */
    public function __construct(
        $request = null,
        $method = '',
        $uri = '',
        array $headers = [],
        $body = null,
        $version = '1.1'
    )
    {
        if(!is_null($request)) {

            if(is_array($request->server)) {
                $this->swoole_request = $request;
                if (in_array($request->server['request_method'], ['POST', 'PUT', 'PATCH'])) {
                    $this->setData($request->rawContent());
                }
            }else{
                $this->base_request = $request;
                if (in_array($request->server->get('REQUEST_METHOD'), ['POST', 'PUT', 'PATCH'])){
                    $this->setData($request->getContent());
                }

                parent::__construct(
                    $request->server->get('REQUEST_METHOD'),
                    $request->server->get('REQUEST_URI'),
                    (array) $request->headers->all(),
                    $this->getBody(),
                    explode('/', $request->get('SERVER_PROTOCOL')[1])
                );
                return;
            }
        }

        parent::__construct(
            $method,
            $uri,
            $headers,
            $body,
            $version
        );
    }

    public function isSwoole()
    {
        return isset($this->swoole_request);
    }


    public function getSwooleRequest()
    {
        return isset($this->swoole_request) ? $this->swoole_request : null;
    }

    /**
     * @return object
     */
    public function getPostBody() : object
    {
        return (object) json_decode($this->getSwooleRequest()->rawContent());
    }

    /**
     * @return array
     */
    public function getHeaders() : array
    {
        return $this->base_request->headers->all();
        //return (array) is_object($this->getSwooleRequest()) ? $this->getSwooleRequest()->header : $this->base_request->headers->all();
    }

    /**
     * @return string
     */
    public function getRequestMethod() : string
    {
        return (string) $this->getSwooleRequest()->server['request_method'];
    }

    /**
     * @return string
     */
    public function getRequestServerProtocol() : string
    {
        return (string) $this->getSwooleRequest()->server['server_protocol'];
    }

    /**
     * @return string
     */
    public function getRequestRemoteAddr() : string
    {
        return (string) $this->getSwooleRequest()->server['remote_addr'];
    }


    /**
     * @return string
     */
    public function getRequestUri() : string
    {
        return (string) $this->getSwooleRequest()->server['request_uri'];
    }

    public function getServerJson()
    {
        return $this->swoole_request->server;
    }

    public function setData($data)
    {
        $this->data = json_decode($data);
    }

    public function getJsonData()
    {
        return json_encode($this->data);
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public static function getInjectionReference(): string
    {
        return self::$injection_reference;
    }

    /**
     * @param string $injection_reference
     */
    public static function setInjectionReference(string $injection_reference): void
    {
        self::$injection_reference = $injection_reference;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }




}