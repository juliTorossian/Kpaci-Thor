<?php

    require_once('./model/categoria.php');
    require_once('./model/producto.php');

    class home {
        function inicio(){
            
            $a_categoria = CategoriaMOD::cargarCategorias();
            $a_productos_promo = ProductoMOD::cargarProductosEnPromo();
            require_once("view/home.php");
        }
    }

?>