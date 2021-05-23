<?php
    require_once('header.php');

?>



    <div class="container bg-white py-4">
        <div class="row mx-auto my-auto">

            <div class="row">
                <div class="col-7">
                    <img src="./public/img/img_productos/<?php echo($producto->proNomImagen);?>_550x550.jpg" alt="Imagen producto" class="px-auto">
                </div>
                <div class="col-5" style="text-align: center;">
                    <h2><?php echo($producto->proNombre);?></h2>
                    <h4><?php echo("Desc: $producto->proDescripcion"); ?></h4>

                    <div class="h5">
                        <div style="text-align: left !important;">
                            <ul>
                                <?php
                                    $a_valores = explode(",", $producto->proValores);
                                    foreach ($a_valores as $key => $value) {
                                ?>
                                    <li>¤ <?php echo($value); ?></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div style="text-align: right !important;">
                        <?php
                            $precio = round($producto->proPrecio / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2);
                            $precio = ($producto->proPromo) ? $precio - $precio * (($producto->proDescuento / 100)) : $precio;
                        ?>
                        <h5 class="h3">$<?php echo($precio);?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>




<?php 

    require_once('footer.php');

?>