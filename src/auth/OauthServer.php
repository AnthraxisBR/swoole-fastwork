<?php


namespace AnthraxisBR\FastWork\auth;


use League\OAuth2\Server\ResourceServer;
use OAuth2ServerExamples\Repositories\AccessTokenRepository;

class OauthServer
{

    public $resource_server;

    public function __construct()
    {
        $accessTokenRepository = new AccessTokenRepository();

        $publicKeyPath = getenv('root_folder') . 'private.key';

        $this->resource_server = new ResourceServer(
            $accessTokenRepository,
            $publicKeyPath
        );
    }
}