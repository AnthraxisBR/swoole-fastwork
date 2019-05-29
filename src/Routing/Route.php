<?php


namespace AnthraxisBR\SwooleFW\Routing;


class Route {

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $action = '';

    /**
     * @var bool
     */
    public $graphql_enabled = false;

    /**
     * @var array
     */
    public $args = [];


    /**
     * @var array
     */
    public $methods = [];


    public function __construct()
    {
        $this->methods[$this::method] = '';
    }

    public function name(string $name) : Route
    {
        $this->name = $name;
        return $this;
    }


    public function action(string $action) : Route
    {

        if(isset($this->methods[$this::method])){
            $this->methods[$this::method] = $action;
        }

        $this->action = $action;
        return $this;
    }

    public function graphqlEnabled(bool $grapghql_enabled) : Route
    {
        $this->graphql_enabled = $grapghql_enabled;
        return $this;
    }

    public function args(array $args) : Route
    {
        $this->args = $args;
        return $this;
    }

    public static function implements($prefix, $routes)
    {
        $route = [];
        $route[$prefix] = [];

        foreach ($routes as $row){
            if($row instanceof Route){
                $route[$prefix][] = [
                    'uri' => $row->name,
                    'methods' => $row->methods
                ];
            }
        }

        return $route;
    }

}