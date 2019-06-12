<?php


namespace AnthraxisBR\FastWork\CloudServices\Endpoints;


use AnthraxisBR\FastWork\CloudServices\AWS\ApiGateway\ApiGateway;
use AnthraxisBR\FastWork\CloudServices\AWS\ApiGateway\RouteExpression;
use AnthraxisBR\FastWork\CloudServices\CloudService;
use AnthraxisBR\FastWork\CloudServices\CloudServicesCommandsInterface;
use AnthraxisBR\FastWork\CloudServices\GCP\Enpoints\GoogleEndpoints;
use Google\Api\Endpoint;
use function GuzzleHttp\Psr7\str;

class Endpoints extends CloudService implements CloudServicesCommandsInterface
{


    public $ApiKeySelectionExpression = '';

    public $Description;

    /**
     * @var bool
     */
    public $DisableSchemaValidation;

    public $name;

    public $protocolType;

    /**
     * @see https://docs.aws.amazon.com/pt_br/apigateway/latest/developerguide/apigateway-websocket-api-selection-expressions.html#apigateway-websocket-api-route-selection-expressions
     * @ref RouteExpression
     * @var string
     */
    public $RouteSelectionExpression;

    public $version;

    public $endpointsTypes = [
        'gcp' => GoogleEndpoints::class,
        'aws' => ApiGateway::class,
        'azure' => AzureFunction::class
    ];

    public function getApiGatewayArray() : array
    {

        return [
            'ApiKeySelectionExpression' => '<string>',
            'Description' => '<string>',
            'DisableSchemaValidation' => true || false,
            'Name' => '<string>', // REQUIRED
            'ProtocolType' => 'WEBSOCKET', // REQUIRED
            'RouteSelectionExpression' => '<string>', // REQUIRED
            'Version' => '<string>',
        ];
    }

    public function getApiKeySelectionExpression() : string
    {
        return (string) $this->ApiKeySelectionExpression;
    }

    public function getDescription() : string
    {
        return (string) $this->Description;
    }

    public function getDisableSchemaValidation() : bool
    {
        return (bool) $this->DisableSchemaValidation;
    }

    public function getName() : string
    {
        return (string) $this->name;
    }

    public function getProtocolType() : string
    {
        return (string) $this->protocolType;
    }

    public function getRouteSelectionExpression() : string
    {
        return (string) $this->getRouteSelectionExpression();
    }

    public function getVersion() : string
    {
        return (string) $this->version;
    }

    public function readCommand($command)
    {

    }

}