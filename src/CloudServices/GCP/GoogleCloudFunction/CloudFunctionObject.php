<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction;


class CloudFunctionObject
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var CloudFunctionStatusObject
     */
    public $status;

    /**
     * @var string
     */
    public $entryPoint;

    /**
     * @var string
     */
    public $runtime;

    /**
     * @var string
     */
    public $timeout;

    /**
     * @var int
     */
    public $availableMemoryMb;

    /**
     * @var string
     */
    public $serviceAccountEmail;

    /**
     * @var string
     */
    public $updateTime;

    /**
     * @var string
     */
    public $versionId;

    /**
     * @var array
     */
    public $labels;

    /**
     * @var array
     */
    public $enviromentVariables;

    /**
     * @var string
     */
    public $network;

    /**
     * @var int
     */
    public $maxInstances;

    /**
     * @var string
     */
    public $vpcConnector;

    /**
     * @var string
     */
    public $sourceArchiveUrl;

    /**
     * @var SourceRepositoryObject
     */
    public $sourceRepository;

    /**
     * @var string
     */
    public $sourceUploadUrl;

    /**
     * @var HttpsTriggerObject
     */
    public $httpsTrigger;

    /**
     * @var EventTriggerObject
     */
    public $eventTrigger;
}