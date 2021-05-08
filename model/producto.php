<?php

    class ProductoMOD{

        public static $FILE_CAT = './json/producto.json';

        public static function cargarProductos(){
            $content    = file_get_contents(ProductoMOD::$FILE_CAT);
            $a_producto = json_decode($content, true);
            return $a_producto;
        }

        public static function cargarProductosEnPromo(){
            $a_producto_promo = array();
            $content    = file_get_contents(ProductoMOD::$FILE_CAT);
            $a_producto_all = json_decode($content, true);
            
            foreach ($a_producto_all as $key => $value) {
                if ($value['promocion'] == 'S') {
                    $producto = array(
                        'proId'=>$value['proId'],
                        'proNombre'=>$value['proNombre'],
                        'proDesc'=>$value['proDesc'],
                        'proValores'=>$value['proValores'],
                        'proPrecio'=>$value['proPrecio'],
                        'categoriaId'=>$value['categoriaId']
                    );
                    array_push($a_producto_promo, $producto);
                }
            }
            return $a_producto_promo;
        }

        public static function cargarProductosNuevos(){
            $a_productos_nuevos = array();
            $content    = file_get_contents(ProductoMOD::$FILE_CAT);
            $a_producto_all = json_decode($content, true);
            
            foreach ($a_producto_all as $key => $value) {
                if ($value['promocion'] == 'S') {
                    $producto = array(
                        'proId'=>$value['proId'],
                        'proNombre'=>$value['proNombre'],
                        'proDesc'=>$value['proDesc'],
                        'proValores'=>$value['proValores'],
                        'proPrecio'=>$value['proPrecio'],
                        'categoriaId'=>$value['categoriaId']
                    );
                    array_push($a_productos_nuevos, $producto);
                }
            }
            return $a_productos_nuevos;
        }
    }

?>