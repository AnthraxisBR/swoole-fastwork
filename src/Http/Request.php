<?php

namespace AnthraxisBR\SwooleFW\Http;
use AnthraxisBR\SwooleFW\traits\Injection;
use GuzzleHttp\Psr7\Request as RequestBase;
use Swoole\Http\Request as SwooleRequest;

class Request extends RequestBase
{

    use Injection;

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
        SwooleRequest $request = null,
        $method = '',
        $uri = '',
        array $headers = [],
        $body = null,
        $version = '1.1'
    )
    {
        if(!is_null($request)) {
            $this->swoole_request = $request;

            if (in_array($request->server['request_method'], ['POST', 'PUT', 'PATCH'])) {
                $this->setData($request->rawContent());
            }

            parent::__construct(
                $request->server['request_method'],
                $request->server['request_uri'],
                $request->header,
                $request->post,
                explode('/', $request->server['server_protocol'][1])
            );
        }


        parent::__construct(
            $method,
            $uri,
            $headers,
            $body,
            $version
        );
    }


    public function getSwooleRequest()
    {
        return $this->swoole_request;
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
        return (array) $this->getSwooleRequest()->headers;
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




}