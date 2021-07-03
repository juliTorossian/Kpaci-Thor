<?php

    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');
    require_once('./model/productoDAO.php');

    class home {
        function inicio(){
            
            $categorias         = CategoriaDAO::cargarCategorias();
            $monedas            = monedaDAO::cargarMonedas();
            $a_productos_nuevos = ProductoDAO::cargarProductosNuevos();
            $a_productos_promo  = ProductoDAO::cargarProductosEnPromo();
            require_once("view/home.php");
        }

        function terycond(){
            
            $categorias         = CategoriaDAO::cargarCategorias();
            $monedas            = monedaDAO::cargarMonedas();
            require_once("view/terycondiciones.php");
        }

        function contacto(){
            
            $categorias         = CategoriaDAO::cargarCategorias();
            $monedas            = monedaDAO::cargarMonedas();
            require_once("view/contacto.php");
        }

        function envios(){
            
            $categorias         = CategoriaDAO::cargarCategorias();
            $monedas            = monedaDAO::cargarMonedas();
            require_once("view/envios.php");
        }
    }

?>