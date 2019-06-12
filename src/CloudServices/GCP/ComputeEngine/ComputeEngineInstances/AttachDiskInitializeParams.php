<?php


namespace AnthraxisBR\FastWork\CloudServices\GCP\ComputeEngine\ComputeEngineInstances;


class AttachDiskInitializeParams
{

    /**
     * @var string
     */
    public $diskName;

    /**
     * @var string
     */
    public $sourceImage;

    /**
     * @var int
     */
    public $diskSizeGb;

    /**
     * @var string
     */
    public $diskType;

    /**
     * @var object
     */
    public $sourceImageEncryptionKey_kmsKeyName;

    public $sourceImageEncryptionKey_sha256;

    /**
     * @var string
     */
    public $labels;

    /**
     * @var string
     */
    public $sourceSnapshot;

    public $sourceSnapshotEncryptionKey_rawKey;

    public $sourceSnapshotEncryptionKey_kmsKeyName;

    public $sourceSnapshotEncryptionKey_sha256;

    public $description;

}