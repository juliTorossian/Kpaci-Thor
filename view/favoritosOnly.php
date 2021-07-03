    <?php
        // echo('<pre>');
        // print_r($productos);
        // echo('</pre>');
    ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/css/style.css">

    <div class="container bg-white py-4">
        <div class="row mx-auto my-auto">
            <h3 style="text-align: center; margin-bottom: 30px;">Favoritos</h3>
            <div class="px-5 productos">
                <?php
                    if (!empty($productos)){
                        foreach ($productos as $key => $value) {
                            $url = "./index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=$value->categoria"
                ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <a href="<?php echo($url);?>"><img src="./public/img/img_productos/<?php echo($value->proNomImagen);?>_220x220.jpg" alt="imagen producto"></a>
                            </div>
                            <div class="col-xl-7 col-md-6 my-auto">
                                <h5 class="card-title" id="nomPro" name="<?php echo($value->productoId); ?>"><a href="<?php echo($url);?>""><?php echo($value->proNombre);?></a></h5>
                            </div>
                            <div class="col-xl-2 col-md-3 my-auto">
                                <div class="mx-auto">
                                    <a href="<?php echo($url);?>" class="btn btn-primary" style="font-size: 30px; border-radius: 14px !important;"><i class="bi bi-eye"></i></a>
                                    <button type="button" class="btn btn-primary eliminar-favoritos" style="font-size: 30px; border-radius: 14px !important;"><i class="bi bi-trash"></i></button>
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

    <script src="./public/js/favorito.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./public/js/jquery-3.6.0.js"></script>
</main>

