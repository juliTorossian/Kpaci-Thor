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
                        foreach ($productos as $key => $value) {
                            $precio = round(intval($value->proPrecio) / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2);
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
                                <a href="" class="btn btn-outline-secondary" type="button" id="button-addon1">-</a>
                                <input type="text" value="<?php echo($value->proCantCarrito);?>" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <a href="./index.php?controller=carritoCON&action=aumentarCantidad" class="btn btn-outline-secondary" type="button" id="button-addon1">+</a>
                                </div>
                            </div>
                            <!-- <div class="col-2 my-auto text-center">
                                <h5 style="border-right: 1px solid gray;">$<?php echo($precio); ?></h5>
                            </div> -->
                            <div class="col-4 my-auto text-center">
                                <h5><?php echo("$symPrecio $precio"); ?></h5>
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
                    <div class="col-4 my-auto text-center"><h5><?php echo("$symPrecio $precioTotal"); ?></h5></div>
                </div>
            </div>
        </div>
            
    </div>

</main>



<?php 

    require_once('footer.php');

?>