<?php

    require_once("./model/subscripcionDAO.php");

    class footer{

        function agregarSub(){
            if(isset($_POST['mail'])){
                if(!empty($_POST['mail'])){
                    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                        if(!subscripcionDAO::existeSub($_POST['mail'])){
                            subscripcionDAO::addSuscriptor($_POST['mail']);
                            $_SESSION["msg"] = "Suscripto satisfactoramente!";
                            header('location:'.$_SERVER['HTTP_REFERER']);
                        }else{
                            $_SESSION["error"] = "El mail ya esta suscripto";
                            header('location:'.$_SERVER['HTTP_REFERER']);
                        }
                    }else{
                        $_SESSION['error'] = 'Ingrese un mail valido';    
                        header('location:'.$_SERVER['HTTP_REFERER']);
                    }
                }else{
                    $_SESSION['error'] = 'Campos Incorrectos';
                    header('location:'.$_SERVER['HTTP_REFERER']);
                }
            }else{
                $_SESSION['error'] = 'Campos Incorrectos';
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }

    }

?>