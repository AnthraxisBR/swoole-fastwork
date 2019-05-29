<?php

//include "../application/bootstrap.php";

class Route {

    public function route($closure){
        var_dump($closure);
        exit();
        $reflection = new ReflectionFunction($closure);
        $arguments  = $reflection->getParameters();
        $rs = call_user_func_array($closure,$arguments);

        var_dump($rs);
    }

}

$Routes = new Route();

$Routes->route(

);
