<?php
    require_once("./model/UsuarioDAO.php");
    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');
    require_once('./model/carritoDAO.php');

    class carritoCON{

        function miCarrito(){
            if(!isset($_SESSION['username'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $monedas    = monedaDAO::cargarMonedas();
                // $productos  = carritoDAO::cargarProductosCarritoPorUsuario($_SESSION['username']);
                require_once('./view/carrito.php');
            }
        }
    }


?>