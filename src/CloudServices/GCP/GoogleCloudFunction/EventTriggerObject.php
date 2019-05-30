<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction;


class EventTriggerObject
{
    /**
     * @var string
     */
    public $eventType;

    /**
     * @var string
     */
    public $resource;

    /**
     * @var string
     */
    public $service;

    /**
     * @var FailurePolicy
     */
    public $failurePolicy;
}