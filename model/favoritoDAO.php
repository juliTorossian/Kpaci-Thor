<?php

    class favoritoDAO{

        public static $FILE_PRO = './json/producto.json';
        public static $FILE_FAV = './json/favorito.json';

        public static function cargarProductosFavoritosPorUsuario($usuario){
            $a_productos_favoritos = array();
            $content               = file_get_contents(favoritoDAO::$FILE_PRO);
            $a_producto_all        = json_decode($content, true);
            $content               = file_get_contents(favoritoDAO::$FILE_FAV);
            $a_favorito_all        = json_decode($content, true);
            
            foreach ($a_favorito_all as $key => $value) {
                if ($value['usuario'] == $usuario) {
                    $a_idProductos = explode(",", $value['idProductos']);
                    foreach ($a_idProductos as $key => $valor) {
                        foreach ($a_producto_all as $key => $valorP) {
                            if ($valorP['proId'] == $valor) {
                                // $producto = new Producto($valorP['proId'],$valorP['proNombre'],$valorP['proDesc'],$valorP['proValores'],$valorP['proPrecio'],$valorP['categoriaId'], $valorP['proNomImg']);
                                // $producto->setNuevo($valorP['nuevo']);
                                // $producto->setPromo($valorP['promocion']);
                                // $producto->setStock($valorP['stock']);
                                // $producto->setDescuento($valorP['descuento']);
                                //array_push($a_productos_favoritos, $producto);
                            }
                        }
                    }
                }
            }
            return $a_productos_favoritos;
        }
    }


?>