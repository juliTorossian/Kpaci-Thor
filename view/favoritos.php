<?php

    require_once('header.php');

?>



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
                                <a href="./index.php?controller=productoCON&action=verProducto&productoId=<?php echo($value->productoId); ?>"><img src="https://via.placeholder.com/220.png" alt="imagen producto"></a>
                            </div>
                            <div class="col-6 my-auto">
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




<?php 

    require_once('footer.php');

?>