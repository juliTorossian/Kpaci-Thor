<?php

    function call($controller, $action){

        require_once("controller/$controller.php");

        $controller = new $controller;
        $controller->{$action}();
    }

    $controllers = array('home'           => ['inicio', 'terycond', 'contacto', 'envios'],
                         'UsuarioCON'     => ['login', 'registrar', 'loginView', 'registrarView', 'cerrarsesion', 'miCuenta', 'favoritos', 'misCompras', 'cambiarContrasenia', 'veficarContrasenia'],
                         'oferta'         => ['ofertas'],
                         'productoCON'    => ['verProducto', 'verListaProductos', 'verProductosPorCategoria', 'verProductosFavoritos', 'verProductosFiltradosBusquda'],
                         'footer'         => ['agregarSub'],
                         'carritoCON'     => ['miCarrito', 'realizarCompra'],
                         'favoritoCON'    => ['favoritos', 'favoritosOnly', 'eliminarProductoCarrito', 'agregarProductoCarrito'],
                         'compraCON'      => ['compraHis', 'compraHisOnly']
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