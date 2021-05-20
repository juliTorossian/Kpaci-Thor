<?php

    class Categoria{

        public $cateId;
        public $catePadre;
        public $cateNombre;
        public $tieneSub;

        public function __construct($id, $padre, $nombre, $tieneSub){
            $this->cateId     = $id;
            $this->catePadre = $padre;
            $this->cateNombre = $nombre;
            $this->tieneSub  = $tieneSub;
        }

    }
?>