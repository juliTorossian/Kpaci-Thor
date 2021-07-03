<?php
    require_once('header.php');

    // echo('<pre>');
    // var_dump($producto);
    // echo('</pre>');

?>



    <div class="container bg-white py-4">
        <div class="row mx-auto my-auto">

            <div class="row">
                <div class="col-7">
                    <img src="./public/img/img_productos/<?php echo($producto->proNomImagen);?>_550x550.jpg" alt="Imagen producto" class="px-auto">
                </div>
                <div class="col-5" style="text-align: center;">
                    <h2><?php echo($producto->proNombre);?></h2>

                    <div class="mt-5">
                        <h4>Descripcion</h4>
                        <p>
                            <?php echo($producto->proDescripcion); ?>
                        </p>
                    </div>
                    

                    <!-- <div class="h5">
                        <div style="text-align: left !important;">
                            <ul>
                                <?php
                                    //$a_valores = explode(",", $producto->proValores);
                                    //foreach ($a_valores as $key => $value) {
                                ?>
                                    <li>¤ <?php //echo($value); ?></li>
                                <?php
                                    //}
                                ?>
                            </ul>
                        </div>
                    </div> -->
                    <div style="text-align: right !important; display: flex;">
                        <?php
                            $precio = round(intval($producto->proPrecio) / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2);
                            $precio = ($producto->proPromo) ? $precio - $precio * (($producto->proDescuento / 100)) : $precio;
                        ?>
                        <h5 class="h3">$<?php echo($precio);?></h5>
                        <p style="background-color: green; border-radius: 4px; color: white;"> <?php echo($producto->proDescuento ) ?>% OFF </p>
                    </div>

                    <div class="botones_producto">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-warning" type="button" id="addCarrito">Agregar al carrito</button>
                            <button class="btn btn-success" type="button" id="comprar">Comprar ahora</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="./public/producto.js"></script>
</main>




<?php 

    require_once('footer.php');

?>