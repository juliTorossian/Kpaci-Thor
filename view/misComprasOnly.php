<?php
    // echo('<pre>');
    // print_r($productos_compra);
    // echo('</pre>');
?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/css/style.css">

<div class="container bg-white py-4">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php
                $count = 0;
                foreach ($productos_compra as $key => $value) {

            ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo($count);?>" aria-expanded="false" aria-controls="flush-collapseOne">
                        <?php echo("Compra realizada el ".$value['fecha']); ?>
                    </button>
                </h2>
                <div id="flush-collapse-<?php echo($count);?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body p-0" style="border: 2px solid #e7f1ff">
            <?php
                    $primero = true;
                    $precioTotalCompra = 0;
                    foreach ($value['productos'] as $key => $valor) {
                        $symPrecio = $monedas[intval($_SESSION['moneda'])-1]->monSimbolo;
            ?>
                        <div class="row mx-0" <?php echo((!$primero) ? 'style="border-top: 2px solid #e7f1ff"' : ''); ?>>
                            <div class="col-3">
                                <a href="./index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=<?php echo($valor->categoria); ?>"><img src="./public/img/img_productos/<?php echo($valor->proNomImagen);?>_220x220.jpg" alt="imagen producto"></a>
                            </div>
                            <div class="col-5 my-auto">
                                <a href="./index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=<?php echo($valor->categoria); ?>"><h4><?php echo($valor->proNombre); ?></h4></a>
                            </div>
                            <div class="col-2 my-auto">
                                <h5>Cantidad:</h5>
                                <h6 class="text-center"><?php echo($valor->proCantCarrito); ?> u</h6>
                            </div>
                            <div class="col-2 my-auto">
                                <h5>Precio total:</h5>
                                <?php
                                    $precio = round(intval($valor->proPrecio) / $monedas[intval($_SESSION['moneda'])-1]->monDivisa, 2);
                                    $precio = ($valor->proPromo) ? $precio - $precio * (($valor->proDescuento / 100)) : $precio;
                                    $precio = $precio * $valor->proCantCarrito;
                                    $precioTotalCompra = $precioTotalCompra + $precio;
                                ?>
                                <h6 class="text-center"><?php echo("$symPrecio " .$precio)?></h6>
                            </div>
                        </div>
                        
                <?php   
                        if ($primero){
                            $primero = false;
                        }
                    }
                ?>
                        <h2 class="accordion-header mt-2 p-3 text-end" style="background-color: #e7f1ff;">
                            Total =      <?php echo("$symPrecio " .$precioTotalCompra); ?>
                        </h2>
                    </div>
                </div>
            </div>
            <?php
                    $count = $count +1;
                }
            ?>
        </div>

    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
