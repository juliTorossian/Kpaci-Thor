<?php

    class carritoDAO{

        public static $FILE_PRO = './json/producto.json';
        public static $FILE_CAT = './json/categoria.json';
        public static $FILE_FAV = './json/favorito.json';
        public static $FILE_CAR = './json/carrito.json';
        
        public static function cargarProductosCarritoPorUsuario($usuario){
            $a_productos_carrito   = array();
            $a_producto_all        = json_decode(file_get_contents(carritoDAO::$FILE_PRO), true);
            $a_carrito_all         = json_decode(file_get_contents(carritoDAO::$FILE_CAR), true);
            
            foreach ($a_carrito_all as $key => $v_carrito) {
                if ($v_carrito['usuario'] == $usuario) {
                    foreach ($v_carrito['productos'] as $key => $v_proCant) {
                        foreach ($a_producto_all as $key => $v_producto_all) {
                            if ($v_producto_all['proId'] == $v_proCant['proId']) {
                                $producto = new Producto($v_producto_all['proId'],$v_producto_all['proNombre'],$v_producto_all['proDesc'],$v_producto_all['proValores'],$v_producto_all['proPrecio'],$v_producto_all['categoriaId'], $v_producto_all['proNomImg']);
                                $producto->setNuevo($v_producto_all['nuevo']);
                                $producto->setPromo($v_producto_all['promocion']);
                                $producto->setStock($v_producto_all['stock']);
                                $producto->setDescuento($v_producto_all['descuento']);
                                $producto->setCantCarrito($v_proCant['cantidad']);
                                array_push($a_productos_carrito, $producto);
                            }
                        }
                    }
                }
            }
            return $a_productos_carrito;
        }

        public static function sumarCantidadAUnProducto($usuario, $productoId){
            $a_carrito_all = json_decode(file_get_contents(carritoDAO::$FILE_CAR), true);

            // echo('<pre>');
            // print_r($a_carrito_all);
            // echo('</pre>');

            foreach ($a_carrito_all as $key => $v_carrito) {
                // echo('<pre>');
                // print_r($v_carrito);
                // echo('</pre>');
                if ($v_carrito['usuario'] == $usuario) {
                    foreach ($v_carrito['productos'] as $key => $v_proCant) {
                        // echo('<pre>');
                        // print_r($v_proCant);
                        // echo('</pre>');
                        if($v_proCant['proId'] == $productoId){
                            $v_proCant['cantidad'] == $v_proCant['cantidad'] +1;
                        }
                    }
                }
            }
            // echo('<pre>');
            // print_r($a_carrito_all);
            // echo('</pre>');
            // $a_usuarios = json_decode(file_get_contents(UsuarioDAO::$FILE), true);

            // $usuario = array(
            //     'user'=>$usuario,
            //     'pass'=>$pass
            // );
            // array_push($a_usuarios, $usuario);
            // $j_usuario = json_encode($a_usuarios);
            // file_put_contents(UsuarioDAO::$FILE, $j_usuario);

        }

    }

?>