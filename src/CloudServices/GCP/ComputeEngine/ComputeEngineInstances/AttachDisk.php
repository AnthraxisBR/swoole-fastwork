<?php


namespace AnthraxisBR\FastWork\CloudServices\GCP\ComputeEngine\ComputeEngineInstances;


use AnthraxisBR\FastWork\CloudServices\GCP\IAM\Modes;
use Google\Cloud\Datastore\V1\CommitRequest\Mode;

class AttachDisk
{

    public $uri = 'https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/attachDisk';

    protected $uri_args = [
        'project' => '',
        'zone' => '',
        'resourceId' => ''
    ];
    /**
     * Scope to oauth2
     */
    public const SCOPE = 'https://www.googleapis.com/auth/compute';

    /**
     * Iam permission required for use this request
     */
    public const IAM_PERMISSIONS = ['compute.instances.attachDisk'];

    public $type = AttachDiskTypes::PERSISTENT;

    public $mode = Modes::READ_WRITE;

    /**
     * Authorization requires one or more of the following Google IAM permissions on the specified resource source:
     *
     *      compute.disks.use
     *      compute.disks.useReadOnl
     * Une of see
     * @see AttachDiskSources
     * @var string
     */
    public $source;

    /**
     * @var string
     */
    public $deviceName;

    /**
     * @var int
     */
    public $index;

    /**
     * @var bool
     */
    public $boot;

    /**
     * @var AttachDiskInitializeParams
     */
    public $initializeParams;

    /**
     * @var bool
     */
    public $autoDelete;

    /**
     * @var array
     */
    public $licenses;

    /**
     * @var string
     */
    public $interface = AttachDiskInterfaces::SCSI;

    /***
     * @var array
     */
    public $guestOsFeatures = [];

    /**
     * @var string
     */
    public $diskEncryptionKey_rawKey;

    /**
     * @var string
     */
    public $sdiskEncryptionKey_kmsKeyName;

    /**
     * @var string
     */
    public $diskEncryptionKey_sha256;

    /**
     * [Output Only] Type of the resource. Always compute#attachedDisk for attached disks.
     * @var string
     */
    public $kind;


    public function getArgs()
    {
        return $this->uri_args;
    }

    public function getUri() : string
    {
        return (string) $this->uri;
    }

}