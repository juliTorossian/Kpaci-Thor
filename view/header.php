<?php 

    //unset($_SESSION['moneda']);
    //session_start();
    if(isset($_GET['moneda'])){
        $_SESSION['moneda'] = $monedas[$_GET['moneda'] - 1]->monId;
    }else{
        if(!isset($_SESSION['moneda'])){
            $_SESSION['moneda'] = $monedas[0]->monId;
        }
    }

    // echo('<pre>');
    // // print_r($_SESSION['moneda']);
    // echo($_SERVER['HTTP_SELF']);
    // echo('</pre>');
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/css/style.css">

    <title>Kpaci-Thor</title>
  </head>
  <body>
    
    <header class="navbar navbar-expand-lg">
        <div class="container-fluid align-items-center">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item item-header"><i class="bi bi-whatsapp icon-header"     ></i> <a href="tel:+542944900241">(+54) 294-4900241</a></li>
                <li class="nav-item item-header"><i class="bi bi-envelope-fill icon-header"></i> <a href="mailto:julian.torossian@davinci.edu.ar">julian.torossian@davinci.edu.ar</a></li>
                <li class="nav-item item-header"><i class="bi bi-geo-fill icon-header"     ></i> <a href="https://goo.gl/maps/4XdSbHynP8342Z9r5" target="blank">Av. Corrientes 2037, C1001 CABA</a></li>
            </ul>
            <div>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo($monedas[intval($_SESSION['moneda'])-1]->monSimbolo); ?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 65px;">
                    <?php
                        foreach ($monedas as $key => $value) {
                            if($value->monId != $monedas[intval($_SESSION['moneda'])-1]->monId){
                    ?>
                    <a href="index.php?moneda=<?php echo($value->monId);?>"class="dropdown-item"><?php echo($value->monSimbolo); ?></a>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cuenta  <i class="bi bi-person-circle icon-header-cuenta"></i></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if (isset($_SESSION["username"])){?>
                        <a href="./index.php?controller=UsuarioCON&action=miCuenta" class="dropdown-item">Mi Cuenta</a>
                        <a href="index.php?controller=UsuarioCON&action=cerrarsesion" class="dropdown-item">Cerrar Sesion</a>
                    <?php }else{?>
                        <a href="index.php?controller=UsuarioCON&action=loginView" class="dropdown-item">Iniciar Sesion</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </header>
    
    <nav>
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-3" style="color: white; font-size: 32px;"><a href="./index.php"><img src="./public/img/logo_blanco.png" alt="logo" class="img-logo"></a></div>
                <div class="col-6">
                    <div class="input-group input-group-color">
                        <select class="form-select input-group-der" id="categoria">
                            <option value="999" selected>All</option>
                        <?php
                            foreach ($categorias as $key => $value) {
                                if($value->catePadre == 0){
                                    $nombreCat = $value->cateNombre;
                                    $valueCat  = $value->cateId;
                        ?>
                            <option value="<?php echo($valueCat);?>"><?php echo($nombreCat);?></option>
                        <?php   }
                            } 
                        ?>
                        </select>
                        <input  type="text" class="form-control" placeholder="Buscar..." aria-label="Example text with button addon" aria-describedby="button-addon1" id="busqueda">
                        <button onclick="buscar()" class="btn btn-outline-secondary input-group-izq input-group-color" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <ul>
                        <li><a href="./index.php?controller=carritoCON&action=miCarrito"><span><i class="bi bi-basket3 icon-nav"></i></span></a></li>
                        <li><a href="./index.php?controller=favoritoCON&action=favoritos"><span><i class="bi bi-heart icon-nav"></i></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="menu-HOR">
            <div class="container">
                <div class="row text-center py-3">
                    <div class="col-4"><a href="./index.php">Home</a></div>
                    <div class="col-4"><a href="./index.php?controller=oferta&action=ofertas">Ofertas</a></div>
                    <div class="col-4">
                        <div id="menu-desplegable">
                            <ul>
                                <li class="nivel1"><a href="#" class="nivel1">Categorias</a>
                                    <ul class="nivel2">
                                        <?php
                                            $primero = true;
                                            foreach ($categorias as $key => $value) {
                                                $id        = $value->cateId;
                                                $idPadre   = $value->catePadre;
                                                $nombreCat = $value->cateNombre;
                                                $tieneSub  = $value->tieneSub;
                                                
                                                if ($idPadre == 0){
                                                    if (!$tieneSub){
                                                        if ($primero) {
                                        ?>
                                        <li class="primero"><a href="./index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=<?php echo($id); ?>"><?php echo($nombreCat);  ?></a></li>
                                        <?php
                                                            $primero = false;
                                                        }else{
                                        ?>
                                        <li class=""><a href="./index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=<?php echo($id); ?>"><?php echo($nombreCat);  ?></a></li>
                                        <?php
                                                        }
                                                    }else{
                                        ?>
                                        <li class="nivel2"><a class="nivel2" href="./index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=<?php echo($id); ?>"><?php echo($nombreCat);  ?></a>
                                            <ul class="nivel3">
                                        <?php
                                                    foreach ($categorias as $key => $valor) {
                                                        $subId        = $valor->cateId;
                                                        $cateId       = $valor->catePadre;
                                                        $nombreSubCat = $valor->cateNombre;
                                                        $tieneSub     = $valor->tieneSub;
                                                        
                                                        if ($id == $cateId) {
                                        ?>
                                                <li><a href="./index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=<?php echo($subId); ?>"><?php echo($nombreSubCat);  ?></a></li>
                                        <?php
                                                            }
                                                        }
                                        ?>
                                            </ul>
                                        </li>
                                        <?php
                                                    }
                                                }
                                            }
                                        
                                        ?>
                                    </ul>
                                </li>
                            </ul>	
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="" method="POST">
        <input type="hidden" id="myReport" value=""/>
        </form>

        <script src="./public/js/buscador.js"></script>
