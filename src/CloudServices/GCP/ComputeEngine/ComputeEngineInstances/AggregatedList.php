<?php


namespace AnthraxisBR\FastWork\CloudServices\GCP\ComputeEngine\ComputeEngineInstances;


class AggregatedList
{

    public $uri = 'https://www.googleapis.com/compute/v1/projects/{project}/aggregated/instances';

    protected $uri_args = [
        //'project' => ''
    ];
    /**
     * Scope to oauth2
     */
    public const SCOPE = 'https://www.googleapis.com/auth/compute';

    public const IAM_PERMISSIONS = ['compute.instances.list'];
}