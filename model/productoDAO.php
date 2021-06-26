<?php

    include('./conn.php');

    class ProductoDAO{

        public static $FILE_PRO = './json/producto.json';
        public static $FILE_CAT = './json/categoria.json';
        public static $FILE_FAV = './json/favorito.json';
        public static $FILE_CAR = './json/carrito.json';

        public static function cargarProductos(){
            
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM prd");
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $a_productos = array();

            while($producto = $resultado->fetch_assoc()){              
                $prdId        = $producto['prdId'];
                $prdNombre    = $producto['prdNombre'];
                $prdDesc      = $producto['prdDesc'];
                $prdPrecio    = $producto['prdPrecio'];
                $prdNomImg    = $producto['prdNomImg'];
                $prdStock     = $producto['prdStock'];
                $prdNuevo     = $producto['prdNuevo'];
                $prdPromocion = $producto['prdPromocion'];
                $prdDescuento = $producto['prdDescuento'];
                $prdCategoria = $producto['categoriaId'];

                $a_productos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
            }
            return $a_productos;
        }



        public static function cargarProductosEnPromo(){

            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM prd WHERE prdPromocion = ?");
            $s = 'S';
            $stmt->bind_param("s", $s);
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $a_productos_promo = array();
            
            while($producto = $resultado->fetch_assoc()){
                $prdId        = $producto['prdId'];
                $prdNombre    = $producto['prdNombre'];
                $prdDesc      = $producto['prdDesc'];
                $prdPrecio    = $producto['prdPrecio'];
                $prdNomImg    = $producto['prdNomImg'];
                $prdStock     = $producto['prdStock'];
                $prdNuevo     = $producto['prdNuevo'];
                $prdPromocion = $producto['prdPromocion'];
                $prdDescuento = $producto['prdDescuento'];
                $prdCategoria = $producto['categoriaId'];

                $a_productos_promo[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
            }
            return $a_productos_promo;
        }

        public static function cargarProductosNuevos(){
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM prd WHERE prdNuevo = ?");
            $s = 'S';
            $stmt->bind_param("s", $s);
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $a_productos_nuevos = array();
            
            while($producto = $resultado->fetch_assoc()){
                $prdId        = $producto['prdId'];
                $prdNombre    = $producto['prdNombre'];
                $prdDesc      = $producto['prdDesc'];
                $prdPrecio    = $producto['prdPrecio'];
                $prdNomImg    = $producto['prdNomImg'];
                $prdStock     = $producto['prdStock'];
                $prdNuevo     = $producto['prdNuevo'];
                $prdPromocion = $producto['prdPromocion'];
                $prdDescuento = $producto['prdDescuento'];
                $prdCategoria = $producto['categoriaId'];

                $a_productos_nuevos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
            }
            return $a_productos_nuevos;
        }

        public static function cargarProductoPorId($productoId){
        
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM prd WHERE prdId = ?");
            $stmt->bind_param("i", $productoId);
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $producto    = null;
            
            while($prd = $resultado->fetch_assoc()){
                $prdId        = $prd['prdId'];
                $prdNombre    = $prd['prdNombre'];
                $prdDesc      = $prd['prdDesc'];
                $prdPrecio    = $prd['prdPrecio'];
                $prdNomImg    = $prd['prdNomImg'];
                $prdStock     = $prd['prdStock'];
                $prdNuevo     = $prd['prdNuevo'];
                $prdPromocion = $prd['prdPromocion'];
                $prdDescuento = $prd['prdDescuento'];
                $prdCategoria = $prd['categoriaId'];

                $producto = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
            }
            return $producto;
        }


        public static function cargarProductosPorCategoria($categoriaId){

            global $mysqli;

            $stmt = $mysqli->prepare("SELECT categoriaTieneSub FROM categoria WHERE categoriaId = ?");
            $stmt->bind_param("s", $categoriaId);
            $stmt->execute();
            $tieneSub = $stmt->get_result()->fetch_assoc()['categoriaTieneSub'];
            
            $query = '';
            if($tieneSub == 'N'){
                $query = "SELECT * FROM prd LEFT JOIN categoria ON prd.categoriaId = categoria.categoriaId WHERE categoria.categoriaId = ?";
            }else{
                $query = "SELECT * FROM prd INNER JOIN categoria ON prd.categoriaId = categoria.categoriaId WHERE categoria.categoriaPadre = ?";
            }
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $categoriaId);
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $productos = array();
            
            while($producto = $resultado->fetch_assoc()){
                $prdId        = $producto['prdId'];
                $prdNombre    = $producto['prdNombre'];
                $prdDesc      = $producto['prdDesc'];
                $prdPrecio    = $producto['prdPrecio'];
                $prdNomImg    = $producto['prdNomImg'];
                $prdStock     = $producto['prdStock'];
                $prdNuevo     = $producto['prdNuevo'];
                $prdPromocion = $producto['prdPromocion'];
                $prdDescuento = $producto['prdDescuento'];
                $prdCategoria = $producto['categoriaId'];

                $productos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
            }
            return $productos;
        }

        public static function cargarProductosFavoritosPorUsuario($usuario){
            
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT usrId FROM usuario WHERE usrNombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();

            $usrId = $stmt->get_result()->fetch_assoc()['usrId'];

            $stmt = $mysqli->prepare("SELECT * FROM favorito INNER JOIN prd_fav ON favorito.favoritoId = prd_fav.favoritoId INNER JOIN prd ON prd_fav.prdId = prd.prdId WHERE favorito.usrId = ?");
            $stmt->bind_param("i", $usrId);
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $a_productos_favoritos   = array();
            
            while($producto = $resultado->fetch_assoc()){
                $prdId        = $producto['prdId'];
                $prdNombre    = $producto['prdNombre'];
                $prdDesc      = $producto['prdDesc'];
                $prdPrecio    = $producto['prdPrecio'];
                $prdNomImg    = $producto['prdNomImg'];
                $prdStock     = $producto['prdStock'];
                $prdNuevo     = $producto['prdNuevo'];
                $prdPromocion = $producto['prdPromocion'];
                $prdDescuento = $producto['prdDescuento'];
                $prdCategoria = $producto['categoriaId'];

                $a_productos_favoritos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
            }
            return $a_productos_favoritos;
        }

        public static function verProductosFiltradosBusquda($categoriaId, $busqueda){

            global $mysqli;
    
            $stmt = $mysqli->prepare("SELECT categoriaTieneSub FROM categoria WHERE categoriaId = ?");
            $stmt->bind_param("s", $categoriaId);
            $stmt->execute();
            $tieneSub = $stmt->get_result()->fetch_assoc()['categoriaTieneSub'];
            $paramLIKE = "%$busqueda%";
            
            $query = '';
            if($categoriaId == 999){
                $query = "SELECT * FROM prd LEFT JOIN categoria ON prd.categoriaId = categoria.categoriaId WHERE prdNombre LIKE ?";
            }
            if($tieneSub == 'N'){
                $query = "SELECT * FROM prd LEFT JOIN categoria ON prd.categoriaId = categoria.categoriaId WHERE categoria.categoriaId = ? AND prdNombre LIKE ?";
            }else{
                $query = "SELECT * FROM prd LEFT JOIN categoria ON prd.categoriaId = categoria.categoriaId WHERE categoria.categoriaPadre = ? AND prdNombre LIKE ?";
            }
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ss", $categoriaId, $paramLIKE);
            $stmt->execute();
    
            $resultado   = $stmt->get_result();
            $productos = array();
            
            while($producto = $resultado->fetch_assoc()){
                $prdId        = $producto['prdId'];
                $prdNombre    = $producto['prdNombre'];
                $prdDesc      = $producto['prdDesc'];
                $prdPrecio    = $producto['prdPrecio'];
                $prdNomImg    = $producto['prdNomImg'];
                $prdStock     = $producto['prdStock'];
                $prdNuevo     = $producto['prdNuevo'];
                $prdPromocion = $producto['prdPromocion'];
                $prdDescuento = $producto['prdDescuento'];
                $prdCategoria = $producto['categoriaId'];
    
                $productos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
            }
            return $productos;
        }
        
    }


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

        public function __construct($id, $nombre, $desc, $precio, $categoria, $nomImg, $esNuevo, $estaPromo, $porcDescuento, $cantStock){
            $this->productoId     = $id;
            $this->proNombre      = $nombre;
            $this->proNomImagen   = $nomImg;
            $this->proDescripcion = $desc;
            //$this->proValores     = $valores;
            $this->proPrecio      = $precio;
            $this->categoriaId    = $categoria;
            $this->proNuevo = ($esNuevo == 'S');
            $this->proPromo = ($estaPromo == 'S');
            $this->proDescuento = $porcDescuento;
            $this->proStock = $cantStock;
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