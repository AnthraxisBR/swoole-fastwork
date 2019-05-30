<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction;


class CloudFunctionStatusObject
{
    public const CLOUD_FUNCTION_STATUS_UNSPECIFIED = 'CLOUD_FUNCTION_STATUS_UNSPECIFIED';

    public const ACTIVE = 'ACTIVE';

    public const OFFLINE = 'OFFLINE';

    public const DEPLOY_IN_PROGRESS = 'DEPLOY_IN_PROGRESS';

    public const DELETE_IN_PROGRESS = 'DELETE_IN_PROGRESS';

    public const UNKNOWN = 'UNKNOWN';

}