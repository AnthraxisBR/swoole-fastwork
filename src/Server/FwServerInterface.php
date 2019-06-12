<?php


namespace AnthraxisBR\FastWork\Server;


interface FwServerInterface
{
    function start();

    function onRequest();

    function implements_config($config);

    function hasServerConfigs();

    function getConfigs();

    function getServerConfig();

    function bindTaskEvents();

    function onTask();

    function onWorkerStart();

    function onWorkerStop();

    function configure($configs);

    function setAllWorkersConfigs();

    function hasWorkerEnabled();

    /**
     * @return mixed
     */
    function getHost();

    /**
     * @param mixed $host
     */
    function setHost($host);

    /**
     * @return mixed
     */
    function getPort();

    /**
     * @param mixed $port
     */
    function setPort($port);

    /**
     * @return mixed
     */
    function getConfig();

    /**
     * @param mixed $config
     */
    function setConfig($config);
}