<?php

namespace AnthraxisBR\FastWork\Database;

use Doctrine\ORM\Tools\Setup;
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Yaml\Yaml;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;


class Connect
{
    private $default = [];

    private $yaml_file = [];

    private $driver = '';

    private $user = '';

    private $password = '';

    private $dbname = '';

    private $dev_mode = false;

    private $paths = [];

    public $entity_manager;

    public $config;

    public $pdo_conn;

    public $host;

    public function __construct()
    {
        $config = getenv('root_folder') . 'config/database.yaml';
        $this->yaml_file = Yaml::parseFile($config);
        $this->setEnv();
        $this->setPaths();
        $this->setDefault();
        $this->connect();
        /*"phpunit/phpunit": "^8.2@dev",*/

    }

    public function getEntityManager() : EntityManager
    {
        return $this->entity_manager;
    }

    /**
     * @param $config
     * @return \PDO
     * @deprecated
     */
    public static function getConnectPDO($config)
    {
        $pdo = new \PDO("{$config['driver']}:port={$config['port']};host={$config['host']};dbname={$config['database']}", $config['username'], $config['password']);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        return $pdo;
    }

    public function connect() : void
    {

        $driver = new AnnotationDriver(new AnnotationReader(), $this->paths);


        $this->config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->dev_mode);

        $this->config->setMetadataDriverImpl($driver);

        $this->entity_manager = EntityManager::create([
            'driver'   => $this->driver,
            'user'     => $this->user,
            'host'     => $this->host,
            'port'     => $this->port,
            'password' => $this->password,
            'dbname'   => $this->dbname,
            /*'config'   => [
                1000 => true
            ]*/
        ], $this->config);


    }

    private function setDefault() : void
    {
        if(isset($this->yaml_file['databases']['default'])){
            $this->default = $this->yaml_file['databases']['default'];
            $this->setDriver($this->default['driver']);
            $this->setUser($this->default['user']);
            $this->setPassword($this->default['password']);
            $this->setDatabase($this->default['dbname']);
            $this->setHost($this->default['host']);
            $this->setPort($this->default['port']);
        }
    }

    public function changePath(): void
    {
        $this->paths = [getenv('root_folder') . 'Application/Entities'];
    }

    private function setPaths(): void
    {
        $this->paths = [getenv('root_folder') . 'Utils/Entities'];
    }

    private function setEnv() : void
    {
        $this->dev_mode = getenv('env') == 'Development' ? true : false;
    }

    private function setDriver(string $driver) : void
    {
        $this->driver = $driver;
    }

    private function setHost(string $host) : void
    {
        $this->host = $host;
    }

    private function setPort(string $port) : void
    {
        $this->port = $port;
    }

    private function setUser(string $user) : void
    {
        $this->user = $user;
    }

    private function setPassword(string $password) : void
    {
        $this->password = $password;
    }

    private function setDatabase(string $database) : void
    {
        $this->dbname = $database;
    }


}