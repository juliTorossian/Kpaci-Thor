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
        </div>
    </div>
    </div>

</main>




<?php

    require_once('footer.php');

?>