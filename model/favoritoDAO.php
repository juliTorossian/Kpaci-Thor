<?php

    include('./conn.php');

    class favoritoDAO{

        public static $FILE_PRO = './json/producto.json';
        public static $FILE_FAV = './json/favorito.json';

        public static function cargarProductosFavoritosPorUsuario($usuario){

            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM `usuario` WHERE usrNombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $usrId = $stmt->get_result()->fetch_assoc()['usrId'];

            $query = "SELECT * FROM favorito INNER JOIN prd_fav ON favorito.favoritoId = prd_fav.favoritoId INNER JOIN prd ON prd_fav.prdId = prd.prdId WHERE favorito.usrId = ? ";

            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("i", $usrId);
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $a_productos_favoritos = array();
            
            while($producto = $resultado->fetch_assoc()){
                $prdId        = $producto['prdId'];
                $prdNombre    = $producto['prdNombre'];
                $prdDesc      = $producto['prdDesc'];
                $prdPrecio    = $producto['prdPrecio'];
                $prdNomImg    = $producto['prdNomImg'];
                $prdStock     = $producto['prdStock'];
                $prdNuevo     = $producto['prdNuevo'];
                $prdPromocion = $producto['prdPromocion'];
                $prdDescuento = $producto['prdDescuento'];
                $prdCategoria = $producto['categoriaId'];

                $a_productos_favoritos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
            }
            return $a_productos_favoritos;
        }
    }


?>