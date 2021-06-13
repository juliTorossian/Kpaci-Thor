<?php

class CategoriaDAO{

        public static $FILE_CAT    = './json/categoria.json';

        public static function cargarCategorias(){
            $HOST   = 'localhost';
            $USER   = 'root';
            $PASS   = '';
            $DBNAME = 'kpacithor';

            $mysqli = new mysqli($HOST, $USER, $PASS, $DBNAME);
            //global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM categoria");
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $categorias = array();

            while($categoria = $resultado->fetch_assoc()){
                $categoriaId        = $categoria['categoriaId'];
                $categoriaNombre    = $categoria['categoriaNombre'];
                $categoriaTieneSub  = $categoria['categoriaTieneSub'];
                $categoriaPadre     = $categoria['categoriaPadre'];

                $categorias[] = new Categoria($categoriaId, $categoriaPadre, $categoriaNombre, $categoriaTieneSub);
            }
            return $categorias;
        }
    }

    class Categoria{

        public $cateId;
        public $catePadre;
        public $cateNombre;
        public $tieneSub;

        public function __construct($id, $padre, $nombre, $tieneSub){
            $this->cateId     = $id;
            $this->catePadre  = $padre;
            $this->cateNombre = $nombre;
            $this->tieneSub   = ($tieneSub == 'S');
        }

    }
?>