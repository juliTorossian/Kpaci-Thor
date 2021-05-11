<?php

    class CategoriaDAO{

        public static $FILE_CAT    = './json/categoria.json';
        public static $FILE_SUBCAT = './json/subcategoria.json';

        public static function cargarCategorias(){
            $content     = file_get_contents(CategoriaDAO::$FILE_CAT);
            $a_categoria = json_decode($content, true);
            return $a_categoria;
        }

        public static function cargarSubCategorias(){
            $content        = file_get_contents(CategoriaDAO::$FILE_SUBCAT);
            $a_subcategoria = json_decode($content, true);
            return $a_subcategoria;
        }
    }

?>