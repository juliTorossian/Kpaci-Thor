<?php

    class Categoria{

        public $cateId;
        public $cateNombre;

        public function __construct($id, $nombre){
            $this->cateId     = $id;
            $this->cateNombre = $nombre;
        }

    }

?>