

<?php

    if(isset($_SESSION['error'])){
?>
    <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <div style="margin-left: 10px;">
            <?php   
                echo($_SESSION['error']); 
                unset($_SESSION['error']);
            ?>
        </div>        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    }else{
        if (isset($_SESSION['msg'])) {
?>
    <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        <div style="margin-left: 10px;">
            <?php   
                echo($_SESSION['msg']); 
                unset($_SESSION['msg']);
            ?>
        </div>        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
        }
    }

?>

    <footer>
        <div class="container-fluid">
            <div class="row sup pt-3 px-5">
                <div class="col-4 p-4">
                    <p style="font-size: 28px;">Suscribite para estar al dia!</p>
                    <form action="./index.php?controller=footer&action=agregarSub" method="post">
                        <div class="input-group input-group-color" style="z-index: 2;">
                            <input  type="mail" name="mail" class="form-control input-group-der" placeholder="mail@mail.com" aria-label="Example text with button addon" aria-describedby="button-addon1" require>
                            <button class="btn btn-outline-secondary input-group-izq input-group-color" type="submit" id="button-addon2"> <i class="bi bi-envelope-fill"></i> Suscribirse</button>
                        </div>
                    </form>
                    <!--<div class="icon-fondo">
                        <i class="bi bi-envelope"></i>
                    </div>-->
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-4">
                            <p>CATEGORIAS</p>
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <li><a href="./index.php?controller=oferta&action=ofertas">OFERTAS</a></li>
                                <li><a href="./index.php?controller=productoCON&action=verListaProductos">Lista de Productos</a></li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul>
                                <li>
                                    <p>INFO</p>
                                    <ul>
                                        <li><a href="./index.php?controller=home&action=envios">Envios</a></li>
                                        <li><a href="./index.php?controller=home&action=contacto">Contacto</a></li>
                                        <li><a href="./index.php?controller=home&action=terycond">Terminos y Condiciones</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul>
                                <li>
                                    <p>CUENTA</p>
                                    <ul>
                                        <li><a href="./index.php?controller=favoritoCON&action=favoritos">Favoritos</a></li>
                                        <li><a href="./index.php?controller=UsuarioCON&action=miCuenta">Mi Cuenta</a></li>
                                        <li><a href="./index.php?controller=UsuarioCON&action=misCompras">Mis Compras</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-4 bajo">
                <div class="col-4">
                    <ul>
                        <li><a href="tel:+542944900241">(+54) 294-4900241</a></li>
                        <li><a href="mailto:julian.torossian@davinci.edu.ar">julian.torossian@davinci.edu.ar</a></li>
                        <li><a href="https://goo.gl/maps/4XdSbHynP8342Z9r5" target="blank">Av. Corrientes 2037, C1001 CABA</a></li>
                    </ul>
                </div>
                <div class="col-4 p-2">
                    <img src="./public/img/formas_pago_footer.png" alt="formas de pago">
                </div>
                <div class="col-4" id="centrador">
                    <img src="./public/img/mercadopago-vertical-logo.png" alt="mercado pago logo" style="width: 110px;" id="imagen">
                </div>
            </div>
        </div>
        
    </footer>




    <script src="./public/js/buscador.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>