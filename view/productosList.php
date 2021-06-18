<?php
    require_once('header.php');

    // echo('<pre>');
    // var_dump($productos);
    // echo('</pre>');
    
?>



    <div class="container bg-white py-4">
        <div class="row">
            <div class="col-3">
                <form action="" method="post">
                    <h1 class="mb-4 text-center" id="productos">Categorias</h1>
                    <?php //ListaDeCategorias($a_categorias);

                    foreach ($categorias as $key => $value) {
                    $id        = $value->cateId;
                    $idPadre   = $value->catePadre;
                    $nombreCat = $value->cateNombre;
                    $tieneSub  = $value->tieneSub;

                        if($idPadre == 0){
                            if ($tieneSub) {
                                //imprime check comun
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo($id);?>" name="chk<?php echo($id);?>">
                        <label class="form-check-label" for="flexCheckDefault">
                        <?php echo($nombreCat);?>
                        </label>
                    </div>
                    <?php
                            }else{
                                //imprime check comun
                                //recorre e imprime check de sub
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo($id);?>" name="chk<?php echo($id);?>" id="flexCheckIndeterminate">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                        <?php echo($nombreCat);?>
                        </label>
                    </div>
                    <?php
                                foreach ($categorias as $key => $valor) {
                                    $subId        = $valor->cateId;
                                    $idPadre      = $valor->catePadre;
                                    $nombreSubCat = $valor->cateNombre;
                                    $tieneSub     = $valor->tieneSub;
                                    if ($id == $idPadre) {
                    ?>
                        <div class="form-check" style="margin-left: 24px;">
                            <input class="form-check-input" type="checkbox" value="<?php echo($subId);?>" name="chk<?php echo($id);?>" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            <?php echo($nombreSubCat);?>
                            </label>
                        </div>
                    <?php
                                    }
                                }
                            }
                        }
                    }
                    ?>

                    <button class="btn btn-outline-secondary" type="submit" id="">Aplicar</button>
                    <?php
                        if(isset($_POST['submit'])){
                            //echo();
                        }
                    ?>
                </form>
            </div>


            <div class="col-lg-9">
                <div class="row">
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
                            
                            $idPro       = $value->productoId;
                            $nombrePro   = $value->proNombre;
                            $precioPro   = round($value->proPrecio / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2);
                            $descPro     = $value->proDescripcion;
                            $descImg     = $value->proNomImagen."_220x220.jpg";
                            $linkDetalle = "./index.php?controller=productoCON&action=verProducto&productoId=$value->productoId"

                    ?>
                    
                    <div class="p-1 col-4<?php echo(($posicion > 2) ? ' mt-4' : ''); ?>"> 
                    
                        <h5 style="text-overflow: ellipsis;" id="nomPro"><?php echo($nombrePro)?></h5>

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
                                    <a onclick="restar(<?php echo($posicion);?>)" class="btn btn-outline-secondary" type="button" id="bRestar">-</a>
                                    <span class="input-group-text" id="sCant"><?php echo(0);?></span>
                                    <a onclick="sumar(<?php echo($posicion);?>)" class="btn btn-outline-secondary" type="button" id="bSumar">+</a>
                                </div>
                            </div>
                            <div class="col-6 center-block">
                                <h6 class="h4" id="preTotPrd"><?php echo("$symPrecio 0.00"); ?></h6>
                            </div>
                        </div>
                        
                        <button class="btn btn-success center-block" style="width: 80%; margin-top: 15px;" type="button" id="comprar" onclick="agregarProductoAlCarrito(<?php echo($posicion.','.$idPro.',\''.$_SESSION['username'].'\'');?>)">Comprar ahora</button>

                    </div>

                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
<script src="./public/js/producto.js"></script>
</main>




<?php

    require_once('footer.php');

?>