<?php


namespace AnthraxisBR\FastWork\CloudServices\AWS\ApiGateway;


class RouteExpression
{
    /**
     * https://docs.aws.amazon.com/pt_br/apigateway/latest/developerguide/apigateway-websocket-api-selection-expressions.html#apigateway-websocket-api-route-selection-expressions
     * ${request.body.service}/${request.body.action}
     *
     * {
     *    "service" : "chat",
     *    "action" : "join",
     *    "data" : {
     *      "room" : "room1234"
     *    }
     *  }
     */
    public const ROUTE_EXPRESSION = '$request.body.{path_to_body_element}';
}