<?php

    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');
    require_once('./model/compraDAO.php');

    class compraCON{

        function compraHis(){
            if(!isset($_SESSION['username'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $productos_compra  = compraDAO::cargarProductosCompraHisPorUsuario($_SESSION['username']);
                $monedas    = monedaDAO::cargarMonedas();
                require_once('./view/misCompras.php');
            }
        }
        
        function compraHisOnly(){
            if(!isset($_SESSION['username'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $productos_compra  = compraDAO::cargarProductosCompraHisPorUsuario($_SESSION['username']);
                $monedas    = monedaDAO::cargarMonedas();
                require_once('./view/misComprasOnly.php');
            }
        }
    }


?>
