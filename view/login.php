<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">

    <title>Login</title>
</head>
<body class="">
    <div class="content-login cuadro-login">
        <img src="./public/img/login.png" alt="login image">
        <?php
            if(isset($_SESSION['error'])){
                echo '<p class="msgError">⦿ '.$_SESSION['error'].'</p>';
                unset($_SESSION["error"]);
            }
        ?>
        <div class="form_main">

            <form action="" method="POST">
                <p>Usuario: <input type="text" name="username" class="form_camp" required></p>
                <p>Contraseña: <input type="password" name="password" class="form_camp" required></p>
                <div class="form_add"><a href="index.php?controller=UsuarioCON&action=registrar">Registrarse</a></div>
                <input type="submit" name="submit" class="form_submit" value="Enviar 🡺">
            </form>
        </div>
</body>
</html>