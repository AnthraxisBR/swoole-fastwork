<?php


namespace AnthraxisBR\FastWork\CloudServices\GCP\ComputeEngine;


use AnthraxisBR\FastWork\CloudServices\GCP\ComputeEngine\ComputeEngineInstances\AddAccessConfig;
use AnthraxisBR\FastWork\CloudServices\GCP\ComputeEngine\ComputeEngineInstances\AggregatedList;
use AnthraxisBR\FastWork\CloudServices\GCP\ComputeEngine\ComputeEngineInstances\AttachDisk;
use AnthraxisBR\FastWork\CloudServices\GCP\FwGoogleClient;
use function foo\func;

class ComputeEngineInstancesClient extends FwGoogleClient
{

    public $url = 'https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances';

    public $project;

    public $zone;


    public function addAccessConfig(AddAccessConfig $addAccessConfig, $resourceId)
    {
        $addAccessConfig->setProject($this->project);
        $addAccessConfig->setZone($this->zone);
        $addAccessConfig->setResourceId($resourceId);

        $this->setScope($addAccessConfig::SCOPE);

        $this->auth();

        $uri = $this->replaceUri($addAccessConfig->getUri(), $addAccessConfig->getArgs());

        $this->post($uri, $addAccessConfig->toArray());

    }

    public function aggregatedList(AggregatedList $aggregatedList, int $masResults = null, string $pageToken = null, $filter = null, $orderBy = null)
    {
        $url = $this->parseArgs($aggregatedList->uri, func_get_args());

        $this->setScope($aggregatedList::SCOPE);

        $this->auth();

        $this->get($url);

    }

    public function attachDisk(AttachDisk $attachDisk, string $requestId, bool $forceAttach)
    {
        $attachDisk->setProject($this->project);
        $attachDisk->setZone($this->zone);
        $attachDisk->setResourceId($this->resourceId);


        $this->setScope($attachDisk::SCOPE);

        $this->auth();

        $uri = $this->replaceUri($attachDisk->getUri(), $attachDisk->getArgs());

        $this->post($uri, $attachDisk->toArray());
    }

    public function delete()
    {

    }

    public function deleteAccessConfig()
    {

    }

    public function detachDisk()
    {

    }

    public function get()
    {

    }

    public function getIamPolicy()
    {

    }

    public function getSerialPortOutput()
    {

    }

    public function getShieldedInstanceIdentity()
    {

    }

    public function insert()
    {

    }

    public function list()
    {

    }

    public function listReferrers()
    {

    }

    public function reset()
    {

    }

    public function setDeletionProtection()
    {

    }

    public function setDiskAutoDelete()
    {

    }

    public function setIamPolicy()
    {

    }

    public function setLabels()
    {

    }

    public function setMachineResources()
    {

    }

    public function setMachineType()
    {

    }

    public function setMetadata()
    {

    }

    public function MinCpuPlatforrm()
    {

    }

    public function setScheduling()
    {

    }

    public function setServiceAccount()
    {

    }

    public function setShieldedInstanceIntegrityPolicy()
    {

    }

    public function setTags()
    {

    }

    public function simulateMaintenanceEvent()
    {

    }

    public function start()
    {

    }

    public function startWithEncryptionKey()
    {

    }

    public function stop()
    {

    }

    public function testIamPermissions()
    {

    }

    public function updateAccessConfig()
    {

    }

    public function updateNetworkInterface()
    {

    }

    public function updateShieldedInstanceConfig()
    {

    }

    public function setArgsAttrs() : void
    {
        $this->url = str_replace('{project}', $this->project, $this->url);
        $this->url = str_replace('{zone}', $this->zone, $this->url);
    }


}