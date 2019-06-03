<?php

namespace AnthraxisBR\SwooleFW\CloudServices\GCP\IAM;

include '../../../../vendor/autoload.php';

use Tightenco\Collect\Support\Collection;

class Credentials
{

    /**
     * @var Collection
     */
    private $data;

    public function __construct()
    {
        $this->loadCredentialFile();
    }


    public function loadCredentialFile()
    {
        $this->data = new Collection(json_decode(file_get_contents('C:/Users/Gabriel/Downloads/client_secret_951143355931-gt3amaor93emh07m4hqgmrstpmb7ilcj.apps.googleusercontent.com.json')));
    }

    public function getClientId()
    {
        return $this->data->get('client_id');
    }

    public function getProjectId()
    {
        return $this->data->get('project_id');
    }

    public function authUri()
    {
        return $this->data->get('auth_uri');
    }

    public function tokenUri()
    {
        return $this->data->get('token_uri');
    }

    public function getAuthProviderx509_cert_url()
    {
        return $this->data->get('auth_provider_x509_cert_url');
    }

    public function getClientx509CertUrl()
    {
        return $this->data->get('client_x509_cert_url');
    }

    public function getClientSecret()
    {
        return $this->data->get('client_secret');
    }

    public function redirectUris()
    {
        return $this->data->get('redirect_uris');
    }
}




new Credentials();