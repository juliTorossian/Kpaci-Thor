<?php
    $precioTotal = 0;
    if (!empty($productos)){
        foreach ($productos as $key => $value) {
            $precioTotal += intval($value->proPrecio);
        }
    }

    require_once('header.php');

?>

    <div class="container bg-white py-4">
        <div class="row mx-auto my-auto">
            <h3 style="text-align: center; margin-bottom: 30px;">Carrito</h3>
            <div class="px-5">
                <div class="row">
                    <div class="col my-auto"></div>
                    <div class="col-2 my-auto text-center"><h6>Cantidad</h6></div>
                    <div class="col-4 my-auto text-center"><h6>Precio</h6></div>
                </div>
            </div>
            <div class="px-5">
                <?php
                    if (!empty($productos)){
                        $posicion = -1;
                        foreach ($productos as $key => $value) {
                            $posicion += 1;
                            $precio = round($value->proPrecio / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2);

                            $symPrecio = $monedas[intval($_SESSION['moneda'])-1]->monSimbolo;
                ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <a href="./index.php?controller=productoCON&action=verProducto&productoId=<?php echo($value->productoId); ?>"><img src="./public/img/img_productos/<?php echo($value->proNomImagen);?>_220x220.jpg" alt="imagen producto"></a>
                            </div>
                            <div class="col-3 my-auto">
                                <h5 class="card-title"><a href="./index.php?controller=productoCON&action=verProducto&productoId=<?php echo($value->productoId); ?>"><?php echo($value->proNombre);?></a></h5>
                            </div>
                            <div class="col-2 my-auto">
                                <div class="input-group mb-3">
                                <a onclick="restar(<?php echo($posicion);?>)" class="btn btn-outline-secondary" type="button" id="bRestar">-</a>
                                <span class="input-group-text" id="sCant"><?php echo($value->proCantCarrito);?></span>
                                <a onclick="sumar(<?php echo($posicion);?>)" class="btn btn-outline-secondary" type="button" id="bSumar">+</a>
                                </div>
                            </div>
                            <div class="col-2 my-auto text-center">
                                <h5 style="border-right: 1px solid gray;" id="preIndPrd"><?php echo("$symPrecio $precio"); ?></h5>
                            </div>
                            <div class="col-2 my-auto text-center">
                                <h5 id="preTotPrd"><?php echo("$symPrecio $precio"); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }else{
                ?>
                    <p>Su carrito esta vacio</p>
                <?php
                    }
                ?>
            </div>
            <div class="px-5">
                <hr>
                <div class="row">
                    <div class="col my-auto"></div>
                    <div class="col-2 my-auto text-center"><h5>Total:</h5></div>
                    <div class="col-4 my-auto text-center"><h5 id='preTotal'><?php echo("$symPrecio $precioTotal"); ?></h5></div>
                </div>
            </div>
        </div>
            
    </div>
    
    <script src="./public/js/carrito.js"></script>

</main>



<?php 

    require_once('footer.php');

?>