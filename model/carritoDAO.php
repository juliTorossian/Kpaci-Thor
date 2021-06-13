<?php

    class carritoDAO{

        public static $FILE_PRO = './json/producto.json';
        public static $FILE_CAT = './json/categoria.json';
        public static $FILE_FAV = './json/favorito.json';
        public static $FILE_CAR = './json/carrito.json';
        
        public static function cargarProductosCarritoPorUsuario($usuario){

            $HOST   = 'localhost';
            $USER   = 'root';
            $PASS   = '';
            $DBNAME = 'kpacithor';

            $mysqli = new mysqli($HOST, $USER, $PASS, $DBNAME);

            $stmt = $mysqli->prepare("SELECT usrId FROM usuario WHERE usrNombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();

            $usrId = $stmt->get_result()->fetch_assoc()['usrId'];

            $stmt = $mysqli->prepare("SELECT * FROM carrito INNER JOIN prd_car ON carrito.carritoId = prd_car.carritoId INNER JOIN prd ON prd_car.prdId = prd.prdId WHERE carrito.usrId = ?");
            $stmt->bind_param("i", $usrId);
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $a_productos_carrito   = array();
            
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

                $a_productos_carrito[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg);
            }
            return $a_productos_carrito;
        }

    }

?>