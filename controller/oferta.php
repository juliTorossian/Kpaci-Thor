<?php

    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');

    class Oferta{

        public function ofertas(){
            $a_categoria        = CategoriaDAO::cargarCategorias();
            $a_subcategoria     = CategoriaDAO::cargarSubCategorias();
            $a_productos_promo  = ProductoDAO::cargarProductosEnPromo();
            require_once("view/ofertas.php");
        }

    }


?>