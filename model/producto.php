<?php

    class Producto{

        public $productoId;
        public $proNombre;
        public $proNomImagen;
        public $proDescripcion;
        public $proValores;
        public $proPrecio;
        public $proNuevo;
        public $proPromo;
        public $proStock;
        public $proDescuento;
        public $proCantCarrito;

        public $categoria;

        public function __construct($id, $nombre, $desc, $valores, $precio, $categoria, $nomImg){
            $this->productoId     = $id;
            $this->proNombre      = $nombre;
            $this->proNomImagen   = $nomImg;
            $this->proDescripcion = $desc;
            $this->proValores     = $valores;
            $this->proPrecio      = $precio;
            $this->categoriaId    = $categoria;
        }

        public function setNuevo($esNuevo){
            $this->proNuevo = ($esNuevo == 'S');
        }

        public function setPromo($estaPromo){
            $this->proPromo = ($estaPromo == 'S');
        }

        public function setDescuento($porcDescuento){
            $this->proDescuento = $porcDescuento;
        }

        public function setStock($cantStock){
            $this->proStock = $cantStock;
        }

        public function setCantCarrito($cantCarrito){
            $this->proCantCarrito = $cantCarrito;
        }
    }

?>