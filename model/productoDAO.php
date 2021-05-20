<?php
    require_once('./model/producto.php');

    class ProductoDAO{

        public static $FILE_PRO = './json/producto.json';
        public static $FILE_CAT = './json/categoria.json';
        public static $FILE_FAV = './json/favorito.json';

        public static function cargarProductos(){
            $a_productos    = array();
            $content        = file_get_contents(ProductoDAO::$FILE_PRO);
            $a_producto_all = json_decode($content, true);
            
            foreach ($a_producto_all as $key => $value) {
                $producto = new Producto($value['proId'],$value['proNombre'],$value['proDesc'],$value['proValores'],$value['proPrecio'],$value['categoriaId']);
                $producto->setNuevo($value['nuevo']);
                $producto->setPromo($value['promocion']);
                $producto->setStock($value['stock']);
                $producto->setDescuento($value['descuento']);
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
                    $producto->setDescuento($value['descuento']);
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
                    $producto->setDescuento($value['descuento']);
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
                    $producto->setDescuento($value['descuento']);
                }
            }
            return $producto;
        }


        public static function cargarProductosPorCategoria($categoriaId){
            $productos = array();
            $content            = file_get_contents(ProductoDAO::$FILE_CAT);
            $a_categorias       = json_decode($content, true);
            $content            = file_get_contents(ProductoDAO::$FILE_PRO);
            $a_producto_all     = json_decode($content, true);
            
            foreach ($a_categorias as $key => $value) {
                if ($value['cateId'] == $categoriaId){
                    if ($value['tieneSub'] == 'N'){
                        foreach ($a_producto_all as $key => $valueP) {
                            if ($valueP['categoriaId'] == $categoriaId) {
                                $producto = new Producto($valueP['proId'],$valueP['proNombre'],$valueP['proDesc'],$valueP['proValores'],$valueP['proPrecio'],$valueP['categoriaId']);
                                $producto->setNuevo($valueP['nuevo']);
                                $producto->setPromo($valueP['promocion']);
                                $producto->setStock($valueP['stock']);
                                $producto->setDescuento($valueP['descuento']);
                                array_push($productos, $producto);
                            }
                        }
                    }else{
                        foreach ($a_categorias as $key => $valor) {
                            if ($valor['catePadre'] == $categoriaId){
                                $categoriaIdACT = $valor['cateId'];
                                foreach ($a_producto_all as $key => $valueP) {
                                    if ($valueP['categoriaId'] == $categoriaIdACT) {
                                        $producto = new Producto($valueP['proId'],$valueP['proNombre'],$valueP['proDesc'],$valueP['proValores'],$valueP['proPrecio'],$valueP['categoriaId']);
                                        $producto->setNuevo($valueP['nuevo']);
                                        $producto->setPromo($valueP['promocion']);
                                        $producto->setStock($valueP['stock']);
                                        $producto->setDescuento($valueP['descuento']);
                                        array_push($productos, $producto);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return $productos;
        }

        public static function cargarProductosFavoritosPorUsuario($usuario){
            $a_productos_favoritos = array();
            $content               = file_get_contents(ProductoDAO::$FILE_PRO);
            $a_producto_all        = json_decode($content, true);
            $content               = file_get_contents(ProductoDAO::$FILE_FAV);
            $a_favorito_all        = json_decode($content, true);
            
            foreach ($a_favorito_all as $key => $value) {
                if ($value['usuario'] == $usuario) {
                    $a_idProductos = explode(",", $value['idProductos']);
                    foreach ($a_idProductos as $key => $valor) {
                        foreach ($a_producto_all as $key => $valorP) {
                            if ($valorP['proId'] == $valor) {
                                $producto = new Producto($valorP['proId'],$valorP['proNombre'],$valorP['proDesc'],$valorP['proValores'],$valorP['proPrecio'],$valorP['categoriaId']);
                                $producto->setNuevo($valorP['nuevo']);
                                $producto->setPromo($valorP['promocion']);
                                $producto->setStock($valorP['stock']);
                                $producto->setDescuento($valorP['descuento']);
                                array_push($a_productos_favoritos, $producto);
                            }
                        }
                    }
                }
            }
            return $a_productos_favoritos;
        }
    }

?>