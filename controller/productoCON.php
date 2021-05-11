<?php

    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');

    class ProductoCON{

        public function verProducto(){
            $a_categoria        = CategoriaDAO::cargarCategorias();
            $a_subcategoria     = CategoriaDAO::cargarSubCategorias();
            $producto = ProductoDAO::cargarProductoPorId($_GET['productoId']);
            require_once("view/producto.php");
        }

    }


?>