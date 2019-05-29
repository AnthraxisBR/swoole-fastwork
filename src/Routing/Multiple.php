<?php


namespace AnthraxisBR\SwooleFW\Routing;


class Multiple extends Route
{

    public function __construct($methods)
    {
        foreach ($methods as $method){
            $this->methods[$method] = '';
        }
    }

    /**
     * @param string $action
     * @return Route
     */
    public function actionPost(string $action) : Route
    {
        $this->methods['POST'] = $action;
        return $this;
    }

    /**
     * @param string $action
     * @return Route
     */
    public function actionGet(string $action) : Route
    {
        $this->methods['GET'] = $action;
        return $this;
    }
}