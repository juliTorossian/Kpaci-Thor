<?php

    class CategoriaMOD{

        public static $FILE_CAT = './json/categoria.json';

        public static function cargarCategorias(){
            $content    = file_get_contents(CategoriaMOD::$FILE_CAT);
            $a_categoria = json_decode($content, true);
            return $a_categoria;
        }

    }

?>