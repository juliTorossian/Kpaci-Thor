<?php

    function call($controller, $action){

        require_once("controller/$controller.php");

        $controller = new $controller;
        $controller->{$action}();
    }

    $controllers = array('home'           => ['inicio'],
                         'UsuarioCON'     => ['login', 'registrar', 'loginView', 'registrarView', 'cerrarsesion', 'miCuenta', 'favoritos', 'misCompras'],
                         'oferta'         => ['ofertas'],
                         'productoCON'    => ['verProducto', 'verListaProductos', 'verProductosPorCategoria', 'verProductosFavoritos'],
                         'footer'         => ['agregarSub'],
                         'carritoCON'     => ['miCarrito', 'aumentarCantidad']
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