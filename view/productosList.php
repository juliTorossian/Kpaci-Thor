<?php
    require_once('header.php');

    // echo('<pre>');
    // var_dump($productos);
    // echo('</pre>');
    
?>

    <body onload="actualizarCantidades()">
        <div class="container bg-white py-4">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-lg-10">
                    <div class="row productos">
                        <?php
                        $imprime = false;
                        $posicion = -1;
                        foreach ($productos as $key => $value) {
                            if(!(isset($_SESSION["categoria"])) or $_SESSION["categoria"] == 0){
                                $imprime = true;
                            }elseif($value->categoriaId == $_SESSION["categoria"]  ){
                                $imprime = true;
                            }

                            if($imprime){
                                $posicion += 1;
                                $imprime = false;
                                $symPrecio = $monedas[intval($_SESSION['moneda'])-1]->monSimbolo;
                                $usuario = (isset($_SESSION['username'])) ? $_SESSION['username'] : null;
                                
                                $idPro       = $value->productoId;
                                $nombrePro   = $value->proNombre;
                                $precioPro   = round($value->proPrecio / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2);
                                $descPro     = $value->proDescripcion;
                                $descImg     = $value->proNomImagen."_220x220.jpg";
                                $linkDetalle = "./index.php?controller=productoCON&action=verProducto&productoId=$value->productoId"

                        ?>
                        
                        <div class="p-1 col-4<?php echo(($posicion > 2) ? ' mt-4' : ''); ?>" id="idProducto" > 
                        
                            <h5 style="text-overflow: ellipsis;" id="nomPro" name="<?php echo($idPro);?>" usuario="<?php echo($usuario);?>" ><?php echo($nombrePro)?></h5>

                            <div class="precio-individual">
                                <?php
                                    $precio = round(intval($value->proPrecio) / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2);
                                    $precio = ($value->proPromo) ? $precio - $precio * (($value->proDescuento / 100)) : $precio;
                                ?>
                                <h5 class="h4" id="preIndPrd"><?php echo("$symPrecio " .$precio)?></h5>
                                <?php
                                    if($value->proPromo){
                                ?>
                                <p class="promo"> <?php echo($value->proDescuento ) ?>% OFF </p>
                                <?php   
                                    }
                                ?>
                            </div>
                            <div style="width: 100%; margin-top: 50px;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Modelo</td>
                                            <td>A3144</td>
                                        </tr>
                                        <tr>
                                            <td>voltaje</td>
                                            <td>5v</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            

                            <img id="imgPro" class="mt-2 center-block" style="width: initial;" src="./public/img/img_productos/<?php echo($descImg);?>" alt="<?php echo($nombrePro)?>">


                            <div class="row mt-3">
                                <div class="col-6 center-block">
                                    <div class="input-group" >
                                        <a  class="btn btn-outline-secondary bRestar" name="<?php echo($idPro); ?>" type="button" id="bRestar">-</a>
                                        <span class="input-group-text" id="sCant" name="<?php echo($idPro); ?>"><?php echo(0);?></span>
                                        <a  class="btn btn-outline-secondary bSumar" name="<?php echo($idPro); ?>" type="button" id="bSumar">+</a>
                                    </div>
                                </div>
                                <div class="col-6 center-block">
                                    <h6 class="h4" id="preTotPrd"><?php echo("$symPrecio 0.00"); ?></h6>
                                </div>
                            </div>
                            
                            <button class="btn btn-success center-block comprar" style="width: 80%; margin-top: 15px;" type="button" id="" >Comprar ahora</button>

                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="col-1"></div>
        </div>
    </body>
</div>
    
    
<!-- <script src="./public/js/producto.js"></script> -->
<script src="./public/js/carrito.js"></script>
<script src="./public/js/pedido.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</main>




<?php

    require_once('footer.php');

?>