<?php
    require_once('header.php');

    // echo('<pre>');
    // var_dump($productos);
    // echo('</pre>');
    
?>



    <div class="container bg-white py-4">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-10">
                <div class="row">
                    <?php
                    $imprime = false;
                    foreach ($productos as $key => $value) {
                        if(!(isset($_SESSION["categoria"])) or $_SESSION["categoria"] == 0){
                            $imprime = true;
                        }elseif($value->categoriaId == $_SESSION["categoria"]  ){
                            $imprime = true;
                        }

                        if($imprime){
                            $imprime = false;

                            $nombrePro   = $value->proNombre;
                            $precioPro   = round($value->proPrecio / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2);
                            $descPro     = $value->proDescripcion;
                            $descImg     = $value->proNomImagen."_220x220.jpg";
                            $linkDetalle = "./index.php?controller=productoCON&action=verProducto&productoId=$value->productoId"

                    ?>

                    <div class="col-4 mb-1">
                        <div class="card h-100">
                            <a href="<?php echo($linkDetalle);?>"><img class="card-img-top" src="./public/img/img_productos/<?php echo($descImg);?>" alt="<?php echo($nombrePro)?>"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo($linkDetalle);?>"><?php echo($nombrePro)?></a>
                                </h4>
                    <?php
                            if($value->proPromo){
                                $precioCDesc = $precioPro - (($value->proDescuento * $precioPro) / 100);
                    ?>
                                <h5 style="text-decoration:line-through;"><?php echo('$'.number_format($precioPro, 2))?></h5>
                                <h5><?php echo('$'.number_format($precioCDesc, 2))?></h5>
                    <?php
                            }else{
                    ?>
                                <h5><?php echo('$'.number_format($precioPro, 2))?></h5>
                    <?php
                            }
                    ?>
                                <p class="card-text"><?php echo($descPro)?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    </div>

</main>




<?php

    require_once('footer.php');

?>