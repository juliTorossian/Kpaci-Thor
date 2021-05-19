<?php

    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/categoria.php');

    class ProductoCON{

        public function verProducto(){
            $categorias = CategoriaDAO::cargarCategorias();
            $producto   = ProductoDAO::cargarProductoPorId($_GET['productoId']);
            require_once("view/producto.php");
        }

        public function verListaProductos(){
            $categorias = CategoriaDAO::cargarCategorias();
            $productos   = ProductoDAO::cargarProductos();
            require_once("view/productosList.php");
        }

        public function verProductosPorCategoria(){
            $categorias = CategoriaDAO::cargarCategorias();
            $productos   = ProductoDAO::cargarProductosPorCategoria($_GET['categoriaId']);
            require_once("view/productosList.php");
        }

        public function verProductosFavoritos(){
            $categorias = CategoriaDAO::cargarCategorias();
            $productos  = ProductoDAO::cargarProductosFavoritosPorUsuario($_SESSION['username']);
            require_once("view/favoritos.php");
        }

    }


?>