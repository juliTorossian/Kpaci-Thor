<?php

    require_once('./model/categoriaDAO.php');
    require_once('./model/productoDAO.php');
    require_once('./model/categoria.php');

    class home {
        function inicio(){
            
            $categorias         = CategoriaDAO::cargarCategorias();
            $a_productos_nuevos = ProductoDAO::cargarProductosNuevos();
            $a_productos_promo  = ProductoDAO::cargarProductosEnPromo();
            require_once("view/home.php");
        }
    }

?>