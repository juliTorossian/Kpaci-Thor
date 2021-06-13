<?php

    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/categoria.php');
    require_once('./model/monedaDAO.php');
    require_once('./model/moneda.php');
    require_once('./model/favoritoDAO.php');

    class favoritoCON{

        function favoritos(){
            if(!isset($_SESSION['username'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $productos  = favoritoDAO::cargarProductosFavoritosPorUsuario($_SESSION['username']);
                $monedas    = monedaDAO::cargarMonedas();
                require_once('./view/favoritos.php');
            }
        }
        
        function favoritosOnly(){
            if(!isset($_SESSION['username'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $productos  = favoritoDAO::cargarProductosFavoritosPorUsuario($_SESSION['username']);
                require_once('./view/favoritosOnly.php');
            }
        }
    }


?>
