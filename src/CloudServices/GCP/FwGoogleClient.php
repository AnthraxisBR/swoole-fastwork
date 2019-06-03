<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP;


use AnthraxisBR\SwooleFW\CloudServices\GCP\IAM\Credentials;
use GuzzleHttp\Client;

use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Subscriber;

class FwGoogleClient extends Client
{

    /**
     * @var Credentials
     */
    private $credentials;

    public $getScope;

    /**
     * @var array
     */
    public $config;

    public function __construct(array $config = [])
    {
        $this->config = ['base_url'=> $this->url];

        $this->auth();
    }

    protected function auth()
    {
        $this->credentials = new Credentials();

        $reauth_config = [
            "client_id" => $this->credentials->getClientId(),
            "client_secret" => $this->credentials->getClientSecret(),
            "scope" => $this->getScope(), // optional
            "state" => time(), // optional
        ];

        $grant_type = new ClientCredentials($this, $reauth_config);

        $oauth = new OAuth2Subscriber($grant_type);

        $this->config['auth'] = ['oauth'];

        parent::__construct($this->config);

        $this->getEmitter()->attach($oauth);

    }

    public function getScope()
    {
        return $this->scope;
    }

    public function setScope(string $scope)
    {
        $this->scope;
    }

    public function replaceUri(string $uri, array $args)
    {
        foreach ($args as $arg => $value) {
            $uri = str_replace($arg, $value, $uri);
        }
        return $uri;
    }

    public function parseArgs($url_str = null, array  $args)
    {
        $url = '';
        if(count($args) > 0){
            $url = '?';
        }
        $c = 1;
        foreach ($args as $arg => $value){
            $url .= $arg . '=' . $value;
            if(count($args) > $c){
                $url .= '&';
            }
            $c += 1;
        }

        if($url != ''){
            if(is_null($url_str)){
                $url = $this->url . $url;
            }else{
                $url = $url_str . $url;
            }
        }

        return $url;
    }

}