<?php


namespace AnthraxisBR\SwooleFW\CloudServices\Endpoints;

/**
 * Interface representing functions of Enpoints tool on aws, Azure e GCP
 *    AWS   : Aws\ApiGatewayV2
 *    GCP   :
 *    Azure :
 *
 * Interface FwEndpointsInterface
 * @package AnthraxisBR\SwooleFW\CloudServices\Endpoints
 */
interface FwEndpointsInterface
{

    /**
     * References to:
     *    AWS   : createApi
     *    GCP   :
     *    Azure :
     * @return mixed
     */
    public function createEndpoint(array $array);

    /**
     * References to:
     *    AWS   : deleteApi
     *    GCP   :
     *    Azure :
     * @return mixed
     */
    public function deleteEndpoint(array $array);

    /**
     * References to:
     *    AWS   : getApi
     *    GCP   :
     *    Azure :
     * @return mixed
     */
    public function getEndpoint(array $array);

    /**
     * References to:
     *    AWS   : getApis
     *    GCP   :
     *    Azure :
     * @return mixed
     */
    public function getEndpoints(array $array);

    /**
     * References to:
     *    AWS   : createApi
     *    GCP   :
     *    Azure :
     * @return mixed
     */
    public function updateEndpoint(array $array);

    /**
     * TODO: Criar demais funções | create another functions references
     */
}