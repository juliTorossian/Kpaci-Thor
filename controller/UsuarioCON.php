<?php
    require_once("./model/UsuarioDAO.php");
    
    class UsuarioCON {

        function login(){
            if(isset($_POST['username']) && isset($_POST['password'])){
                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    if(UsuarioDAO::existeUsuario($_POST['username'], $_POST['password'])){
                        $_SESSION['username'] = $_POST['username'];
                        header('Location: ./index.php');
                    }else{
                        $_SESSION['error'] = 'Usuario Incorrecto';
                        require_once('./view/login.php');
                    }
                }else{
                    $_SESSION['error'] = 'Campos Incorrectos';
                    require_once('./view/login.php');
                }
            }else{
                $_SESSION['error'] = 'Campos Incorrectos';
                require_once('./view/login.php');
            }
        }

        function registrar(){
            if(isset($_POST['username']) && isset($_POST['password'])){
                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    if(!UsuarioDAO::usuarioOcupado($_POST['username'])){
                        UsuarioDAO::crearUsuario($_POST['username'], $_POST['password']);
                        $_SESSION['username'] = $_POST['username'];
                        header('Location: ./index.php');
                    }else{
                        $_SESSION["error"] = "El usuario ya existe";
                        require_once("./view/register.php");
                    }
                }else{
                    $_SESSION['error'] = 'Campos Incorrectos';
                    require_once('./view/register.php');
                }
            }else{
                $_SESSION['error'] = 'Campos Incorrectos';
                require_once('./view/register.php');
            }
        }

        function cerrarsesion(){
            if(isset($_SESSION['username'])){
                unset($_SESSION["username"]);
                header('Location: ./index.php');
            }
        }
    }

?>