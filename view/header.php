<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

    <title>Kpaci-Thor</title>
  </head>
  <body>
    
    <header class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item item-header"><i class="bi bi-whatsapp icon-header"></i><a href=""> (+54) 294-4900241</a></li>
                <li class="nav-item item-header"><i class="bi bi-envelope-fill icon-header"></i><a href=""> mail@gmail.com</a></li>
                <li class="nav-item item-header"><i class="bi bi-geo-fill icon-header"></i><a href=""> urquiza 4750 7F</a></li>
            </ul>
            <form class="d-flex">
                <select class="form-select selection-header">
                    <option value="1" selected>ARS$</option>
                    <option value="2">USD</option>
                    <option value="3">UY$</option>
                </select>
            </form>
            <a class="nav-link dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown">
                Cuenta
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Mi Cuenta</a></li>
                <li><a class="dropdown-item" href="#">Cerrar Sesion</a></li>
            </ul>
            </div>
        </div>
    </header>
    <nav>
        <div class="container py-5">
            <div class="row">
                <div class="col-3" style="color: white; font-size: 32px;"><p style=" margin: 0;">Venta</p></div>
                <div class="col-6">
                    <div class="input-group">
                        <select class="form-select input-group-der">
                            <option value="1" selected>All</option>
                            <option value="2">Capacitores</option>
                            <option value="3">Resistencias</option>
                        </select>
                        <input  type="text" class="form-control" placeholder="Buscar..." aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <button class="btn btn-outline-secondary input-group-izq" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <ul>
                        <li><i class="bi bi-heart icon-nav"></i></li>
                        <li><i class="bi bi-basket3 icon-nav"></i>></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
