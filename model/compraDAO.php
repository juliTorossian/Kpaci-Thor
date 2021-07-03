<?php

    include('./conn.php');

    class compraDAO{

        public static function cargarProductosCompraHisPorUsuario($usuario){

            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM `usuario` WHERE usrNombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $usrId = $stmt->get_result()->fetch_assoc()['usrId'];

            $query = "SELECT * FROM comprahis WHERE usrId = ?";

            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("i", $usrId);
            $stmt->execute();

            $resultadoH   = $stmt->get_result();
            $a_productos_compraHis = array();
            $a_productos_compraHis_productos = array();
            $oldCompraHisId = 0;
            $count = 0;
            
            while ($compraHis = $resultadoH->fetch_assoc()) {
                $query = "SELECT * FROM prd_com INNER JOIN prd ON prd_com.prdId = prd.prdId WHERE compraHisId = ?";

                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("i", $compraHis['compraHisId']);
                $stmt->execute();
                $resultado   = $stmt->get_result();

                $count2 = 0;
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
    
                    $a_productos_compraHis_productos[$count2]= new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
                    $a_productos_compraHis_productos[$count2]->setCantCarrito($producto['prdCantCar']);
                    $count2 = $count2 + 1;
                }

                if ($oldCompraHisId != $compraHis['compraHisId']){
                    $oldCompraHisId = $compraHis['compraHisId'];
                    $a_productos_compraHis[$count]['fecha'] = $compraHis['fecha'];
                    $a_productos_compraHis[$count]['productos'] = $a_productos_compraHis_productos;
                    $a_productos_compraHis_productos = array();
                    $count = $count +1;
                }
                
            }

            return $a_productos_compraHis;
        }
    }


?>