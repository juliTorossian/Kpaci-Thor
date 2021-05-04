<?php

    function call($controller, $action){

        require_once("controller/$controller.php");

        $controller = new $controller;
        $controller->{$action}();
    }

    $controllers = array('home'    => ['inicio'],
                         'usuario' => ['login', 'registrar', 'cerrarsesion']
                        );

    if (array_key_exists($controller, $controllers)){
        if (in_array($action, $controllers[$controller])){
            call($controller, $action);
        }else{
            call('errorController', 'error');
        }
    }else{
        call('errorController', 'error');
    }

?>