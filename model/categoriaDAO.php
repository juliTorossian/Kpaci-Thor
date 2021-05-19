<?php

    class CategoriaDAO{

        public static $FILE_CAT    = './json/categoria.json';

        public static function cargarCategorias(){
            $content     = file_get_contents(CategoriaDAO::$FILE_CAT);
            $a_categoria = json_decode($content, true);
            $categorias  = array();

            foreach ($a_categoria as $key => $value) {
                $categoria = new Categoria($value['cateId'], $value['catePadre'], $value['cateNombre'], $value['tieneSub']);
                array_push($categorias, $categoria);
            }
            return $categorias;
        }
    }

?>