<?php

    require_once('header.php');

?>



    <div class="container bg-white py-4">
        <div class="row mx-auto my-auto">
            <p style="text-align: center; font-size: 32px;">LO NUEVO</p>
            <div id="carouselNuevo" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselNuevo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselNuevo" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselNuevo" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                        <?php
                        $dividirGrupo = 3;
                        $cant = 0;
                        $cantTotal = sizeof($a_productos_nuevos);
                        foreach ($a_productos_nuevos as $key => $value) {
                            $symPrecio = $monedas[intval($_SESSION['moneda'])-1]->monSimbolo;
                            $url = "./index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=$value->categoria?>";
                            $cant++;
                            if ($cant == 1) {
                echo('<div class="carousel-item active">
                        <div class="col">
                            <div class="card-group">');
                            }
                    ?>
                            <div class="card" style="max-width: 33% !important;">
                                <a href="<?php echo($url);?>">
                                <img src="./public/img/img_productos/<?php echo($value->proNomImagen); ?>_220x220.jpg" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                <a href="<?php echo($url);?>" class="card-title" style="white-space:nowrap;"><?php echo($value->proNombre);?></a>
                                <p class="card-text"><?php echo($value->proDescripcion);?></p>

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

                                <!-- <p class="card-text mr-2" style="text-align: right;">$<?php //echo(round($value->proPrecio / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2));?></p> -->
                                </div>
                                <!-- <div class="card-footer">
                                    <div class="btn-group text-center" role="group" aria-label="">
                                        <button type="button" class="btn btn-outline-primary">Favoritos</button>
                                        <button type="button" class="btn btn-outline-primary">Carrito</button>
                                    </div>
                                </div> -->
                            </div>
                    <?php
                            if ($cant == $dividirGrupo && $cant < $cantTotal) {
                                $dividirGrupo += 3;
                    echo('  </div>
                        </div>
                    </div>');
                    echo('<div class="carousel-item"><div class="col"><div class="card-group">');
                            }else if($cant == $cantTotal){
                    echo('</div></div></div>');
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
    <div class="row mx-auto my-auto">
            <p style="text-align: center; font-size: 32px;">Promociones</p>
            <div id="carouselOfertas" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselOfertas" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselOfertas" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselOfertas" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                        <?php
                        $dividirGrupo = 3;
                        $cant = 0;
                        $cantTotal = sizeof($a_productos_promo);
                        foreach ($a_productos_promo as $key => $value) {
                            $symPrecio = $monedas[intval($_SESSION['moneda'])-1]->monSimbolo;
                            $url = "./index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=$value->categoria?>";
                            $cant++;
                            if ($cant == 1) {
                echo('<div class="carousel-item active">
                        <div class="col">
                            <div class="card-group">');
                            }
                    ?>
                            <div class="card" style="max-width: 33% !important;">
                                <a href="<?php echo($url);?>"><img src="./public/img/img_productos/<?php echo($value->proNomImagen); ?>_220x220.jpg" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                <a href="<?php echo($url);?>" class="card-title" style="white-space:nowrap;"><?php echo($value->proNombre);?></a>
                                <p class="card-text"><?php echo($value->proDescripcion);?></p>

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


                                <!-- <p class="card-text mr-2" style="text-align: right;">$<?php //echo(round($value->proPrecio / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2));?></p> -->
                                </div>
                                <!-- <div class="card-footer">
                                    <div class="btn-group text-center" role="group" aria-label="">
                                        <button type="button" class="btn btn-outline-primary">Favoritos</button>
                                        <button type="button" class="btn btn-outline-primary">Carrito</button>
                                    </div>
                                </div> -->
                            </div>
                    <?php
                            if ($cant == $dividirGrupo && $cant < $cantTotal) {
                                $dividirGrupo += 3;
                    echo('  </div>
                        </div>
                    </div>');
                    echo('<div class="carousel-item"><div class="col"><div class="card-group">');
                            }else if($cant == $cantTotal){
                    echo('</div></div></div>');
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
</main>



<?php 

    require_once('footer.php');

?>