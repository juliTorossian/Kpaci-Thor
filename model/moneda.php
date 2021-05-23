<?php

    class moneda{
        public $monId;
        public $monSimbolo;
        public $monNombre;
        public $monDivisa;

        public function __construct($id, $simbolo, $nombre, $Divisa){
            $this->monId      = $id;
            $this->monSimbolo = $simbolo;
            $this->monNombre  = $nombre;
            $this->monDivisa  = $Divisa;   
        }

    }

?>