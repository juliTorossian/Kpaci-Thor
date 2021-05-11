<?php
    require_once('./model/producto.php');

    class ProductoDAO{

        public static $FILE_PRO = './json/producto.json';
        public static $FILE_CAT = './json/categoria.json';

        public static function cargarProductos(){
            $content     = file_get_contents(ProductoDAO::$FILE_CAT);
            $a_categoria = json_decode($content, true);
            $a_productos    = array();
            $content        = file_get_contents(ProductoDAO::$FILE_PRO);
            $a_producto_all = json_decode($content, true);
            
            foreach ($a_producto_all as $key => $value) {
                $producto = new Producto($value['proId'],$value['proNombre'],$value['proDesc'],$value['proValores'],$value['proPrecio'],$value['categoriaId']);
                $producto->setNuevo($value['nuevo']);
                $producto->setPromo($value['promocion']);
                $producto->setStock($value['stock']);
                array_push($a_productos, $producto);
            }
            return $a_productos;
        }

        public static function cargarProductosEnPromo(){
            $a_productos_promo = array();
            $content           = file_get_contents(ProductoDAO::$FILE_PRO);
            $a_producto_all    = json_decode($content, true);
            
            foreach ($a_producto_all as $key => $value) {
                if ($value['promocion'] == 'S') {
                    $producto = new Producto($value['proId'],$value['proNombre'],$value['proDesc'],$value['proValores'],$value['proPrecio'],$value['categoriaId']);
                    $producto->setNuevo($value['nuevo']);
                    $producto->setPromo($value['promocion']);
                    $producto->setStock($value['stock']);
                    array_push($a_productos_promo, $producto);
                }
            }
            return $a_productos_promo;
        }

        public static function cargarProductosNuevos(){
            $a_productos_nuevos = array();
            $content            = file_get_contents(ProductoDAO::$FILE_PRO);
            $a_producto_all     = json_decode($content, true);
            
            foreach ($a_producto_all as $key => $value) {
                if ($value['nuevo'] == 'S') {
                    $producto = new Producto($value['proId'],$value['proNombre'],$value['proDesc'],$value['proValores'],$value['proPrecio'],$value['categoriaId']);
                    $producto->setNuevo($value['nuevo']);
                    $producto->setPromo($value['promocion']);
                    $producto->setStock($value['stock']);
                    array_push($a_productos_nuevos, $producto);
                }
            }
            return $a_productos_nuevos;
        }

        public static function cargarProductoPorId($productoId){
            $content        = file_get_contents(ProductoDAO::$FILE_PRO);
            $a_producto_all = json_decode($content, true);
            $producto       = null;
            
            foreach ($a_producto_all as $key => $value) {
                if ($value['proId'] == $productoId) {
                    $producto = new Producto($value['proId'],$value['proNombre'],$value['proDesc'],$value['proValores'],$value['proPrecio'],$value['categoriaId']);
                    $producto->setNuevo($value['nuevo']);
                    $producto->setPromo($value['promocion']);
                    $producto->setStock($value['stock']);
                }
            }
            return $producto;
        }
    }

?>