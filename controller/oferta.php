<?php

    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');

    class Oferta{

        public function ofertas(){
            $categorias         = CategoriaDAO::cargarCategorias();
            $a_productos_promo  = ProductoDAO::cargarProductosEnPromo();
            $monedas            = monedaDAO::cargarMonedas();
            require_once("view/ofertas.php");
        }

    }


?>