<?php

    class Producto{

        public $productoId;
        public $proNombre;
        public $proDescripcion;
        public $proValores;
        public $proPrecio;
        public $proNuevo;
        public $proPromo;
        public $proStock;
        public $proDescuento;

        public $categoria;

        public function __construct($id, $nombre, $desc, $valores, $precio, $categoria){
            $this->productoId     = $id;
            $this->proNombre      = $nombre;
            $this->proDescripcion = $desc;
            $this->proValores     = $valores;
            $this->proPrecio      = $precio;
            $this->categoriaId    = $categoria;
        }

        public function setNuevo($esNuevo){
            $this->proNuevo = $esNuevo;
        }

        public function setPromo($estaPromo){
            $this->proDescuento = $estaPromo;
        }

        public function setDescuento($porcDescuento){
            $this->proStock = $porcDescuento;
        }

        public function setStock($cantStock){
            $this->proStock = $cantStock;
        }
    }

?>