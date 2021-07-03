<?php

    class carritoDAO{
        
        public static function cargarProductosCarritoPorUsuario($usuario){

            global $mysqli;

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

                $a_productos_carrito[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
            }
            return $a_productos_carrito;
        }

        public static function realizarCompra($compra, $usuario){

            global $mysqli;
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $date = date('Y-m-d H:i:s', time());

            $stmt = $mysqli->prepare("SELECT usrId FROM usuario WHERE usrNombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $usrId = $stmt->get_result()->fetch_assoc()['usrId'];
            
            $stmt = $mysqli->prepare("INSERT INTO comprahis(usrId, fecha) VALUES(?, ?)");
            $stmt->bind_param("ss", $usrId, $date);
            $stmt->execute();

            $stmt = $mysqli->prepare("SELECT LAST_INSERT_ID() AS 'compraHisId'");
            $stmt->execute();
            $compraHisId = $stmt->get_result()->fetch_assoc()['compraHisId'];

            $ok = true;


            foreach ($compra as $key => $value) {
                
                $id = intval($value['id']);
                $cantidad = intval($value['cantidad']);
                $aux = intval($compraHisId);

                $stmt = $mysqli->prepare("INSERT INTO prd_com(prdId, compraHisId, prdCantCar) VALUES(?, ?, ?)");
                $stmt->bind_param("iii", $id, $aux, $cantidad);
                $ok = $stmt->execute();

            }

            if(!$ok){
                echo('fallo');
            }
            
            //$ok = false;
            return $ok;
        }

    }

?>