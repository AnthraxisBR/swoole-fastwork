<?php


namespace AnthraxisBR\FastWork\CloudServices\GCP;


use AnthraxisBR\FastWork\Exceptions\GoogleExceptions;
use function GuzzleHttp\Psr7\str;

class Google extends  \Google_Client
{

    /**
     * @var mixed
     */
    public $credential_file = false;

    /**
     * @var string
     */
    public $application_name = '';

    /**
     * @var array
     */
    public $scopes = [];

    /**
     * Google constructor.
     * @throws GoogleExceptions
     * @throws \Google_Exception
     */
    public function __construct()
    {
        $this->checkServiceAccountCredentialsFile();

        return true; // temporário

        if ($this->credential_file) {
            $this->setAuthConfig($this->credential_file);
        } elseif (getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
            $this->useApplicationDefaultCredentials();
        } else {
            throw new GoogleExceptions('Impossible to instantiate Google class', [
                'no authentication found for Google Cloud'
            ]);
        }


        $this->setApplicationName($this->getApplicationName());
        $this->setScopes($this->getDefinedScopes());


    }

    public function getDefinedScopes() : array
    {
        return (array) $this->scopes;
    }

    public function getApplicationName() : string
    {
        return (string) $this->application_name;
    }

    public function checkServiceAccountCredentialsFile() : void
    {
        $file = getenv('root_folder') . '/credentials.json';
        $this->credential_file = file_exists($file) ? $file : false;
    }
}