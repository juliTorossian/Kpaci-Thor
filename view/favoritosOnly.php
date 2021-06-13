    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/css/style.css">
    
    <div class="container bg-white py-4">
        <div class="row mx-auto my-auto">
            <h3 style="text-align: center; margin-bottom: 30px;">Favoritos</h3>
            <div class="px-5">
                <?php
                    if (!empty($productos)){
                        foreach ($productos as $key => $value) {
                ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <a href="./index.php?controller=productoCON&action=verProducto&productoId=<?php echo($value->productoId); ?>"><img src="./public/img/img_productos/<?php echo($value->proNomImagen);?>_220x220.jpg" alt="imagen producto"></a>
                            </div>
                            <div class="col-6 col-md-4 my-auto">
                                <h5 class="card-title"><a href="./index.php?controller=productoCON&action=verProducto&productoId=<?php echo($value->productoId); ?>"><?php echo($value->proNombre);?></a></h5>
                            </div>
                            <div class="col-3 my-auto float-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary">Comprar</button>
                                    <button type="button" class="btn btn-primary">Carrito</button>
                                    <button type="button" class="btn btn-primary">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }else{
                ?>
                    <p>Lista de Favoritos Vacia</p>
                <?php
                    }
                ?>
            </div>
        </div>
            
    </div>

</main>

