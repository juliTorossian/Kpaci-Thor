<?php

    require_once('./model/categoriaDAO.php');
    require_once('./model/categoria.php');
    require_once('./model/monedaDAO.php');
    require_once('./model/moneda.php');
    require_once('./model/productoDAO.php');

    class home {
        function inicio(){
            
            $categorias         = CategoriaDAO::cargarCategorias();
            $monedas            = monedaDAO::cargarMonedas();
            $a_productos_nuevos = ProductoDAO::cargarProductosNuevos();
            $a_productos_promo  = ProductoDAO::cargarProductosEnPromo();
            require_once("view/home.php");
        }
    }

?>