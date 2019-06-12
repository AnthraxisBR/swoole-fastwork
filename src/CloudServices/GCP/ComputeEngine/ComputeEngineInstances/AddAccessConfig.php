<?php


namespace AnthraxisBR\FastWork\CloudServices\GCP\ComputeEngine\ComputeEngineInstances;

/**
 * @see https://cloud.google.com/compute/docs/reference/rest/v1/instances/addAccessConfig
 * Class AddAccessConfig
 * @package AnthraxisBR\FastWork\CloudServices\GCP\ComputeEngine\ComputeEngineInstances
 */
class AddAccessConfig
{

    protected $uri = 'https://www.googleapis.com/compute/v1/projects/{project}/zones/{zone}/instances/{resourceId}/addAccessConfig';

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
    public const IAM_PERMISSIONS = ['compute.instances.addAccessConfig','compute.networks.useExternalIp','compute.subnetworks.useExternalIp'];

    /**
     * @var string
     */
    public $type = AddAccessConfigTypes::ONE_TO_ONE_NAT;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $natIP;

    /**
     * @var string
     */
    public $setPublicPtr;

    /**
     * @var string
     */
    public $publicPtrDomainName;

    /**
     * @var AddAccessConfigNetworkTiers
     */
    public $networkTier;

    /**
     * @var string
     */
    public $kind;

    /**
     * @return string
     */

    public function getArgs()
    {
        return $this->uri_args;
    }

    public function getUri() : string
    {
        return (string) $this->uri;
    }

    public function setResourceId($resourceId)
    {
        $this->uri_args['resourceId'] = $resourceId;
    }

    public function setZone($zone)
    {
        $this->uri_args['zone'] = $zone;
    }

    public function setProject($project)
    {
        $this->uri_args['project'] = $project;
    }

    public function toArray()
    {
        $rs = [];
        $reflection = new \ReflectionClass($this);
        $arr = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($arr as $attr => $value){
            if(!is_null($value)){
                $rs[$attr] = $value;
            }
        }
        return $rs;
    }
}