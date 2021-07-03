<?php

    include('./conn.php');

    class favoritoDAO{

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

        public static function eliminarProductoCarrito($usuario, $productoId){
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE usrNombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $usrId = $stmt->get_result()->fetch_assoc()['usrId'];

            $query = "DELETE prd_fav FROM prd_fav INNER JOIN favorito ON prd_fav.favoritoId = favorito.favoritoId WHERE prd_fav.prdId = ? AND favorito.usrId = ?";

            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ii",$productoId ,$usrId);
            $stmt->execute();
        }

        public static function agregarProductoCarrito($usuario, $productoId){
            global $mysqli;
            $return = false;

            $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE usrNombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $usrId = $stmt->get_result()->fetch_assoc()['usrId'];

            
            $stmt = $mysqli->prepare("SELECT COUNT(*) AS cantidad FROM favorito INNER JOIN prd_fav ON favorito.favoritoId = prd_fav.favoritoId WHERE prd_fav.prdId = ? AND favorito.usrId = ?");
            $stmt->bind_param("ii",$productoId ,$usrId);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $cantResults = $resultado->fetch_assoc();
            $return = ($cantResults['cantidad'] > 0) ? true : false;

            if(!$return){
                $query = "INSERT INTO prd_fav(prdId, favoritoId) VALUES(?, (SELECT favoritoId FROM favorito WHERE usrId = ?))";

                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("ii",$productoId ,$usrId);
                $stmt->execute();
            }
        }
    }


?>