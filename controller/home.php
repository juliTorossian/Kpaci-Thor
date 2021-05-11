<?php

    require_once('./model/categoriaDAO.php');
    require_once('./model/productoDAO.php');

    class home {
        function inicio(){
            
            $a_categoria        = CategoriaDAO::cargarCategorias();
            $a_subcategoria     = CategoriaDAO::cargarSubCategorias();
            $a_productos_nuevos = ProductoDAO::cargarProductosNuevos();
            require_once("view/home.php");
        }
    }

?>