<?php
    require_once("./model/UsuarioDAO.php");
    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');
    require_once('./model/favoritoDAO.php');
    
    class UsuarioCON {

        function loginView(){
            require_once('./view/login.php');
        }

        function login(){
            if(isset($_POST['username']) && isset($_POST['password'])){
                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    echo(UsuarioDAO::existeUsuario($_POST['username'], $_POST['password']));
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

        function registrarView(){
            require_once("./view/register.php");
        }

        function registrar(){
            if(isset($_POST['username']) && isset($_POST['password'])){
                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    if(!UsuarioDAO::nombreDeUsuarioOcupado($_POST['username'])){
                        UsuarioDAO::crearUsuario($_POST['username'], $_POST['password'], $_POST['mail']);
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

        function miCuenta(){
            if(!isset($_SESSION['username'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $usuario    = UsuarioDAO::datosUsuario($_SESSION['username']);
                $monedas    = monedaDAO::cargarMonedas();
                require_once('./view/miCuenta.php');
            }
        }

        function cambiarContrasenia(){
            return UsuarioDAO::cambiarContrasenia($_SESSION['username'], $_POST['newPassword']);
        }
        function veficarContrasenia(){
            echo(UsuarioDAO::existeUsuario($_SESSION['username'], $_POST['password'])) ;
        }

        function misCompras(){
            if(!isset($_SESSION['username'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $monedas    = monedaDAO::cargarMonedas();
                require_once('./view/misCompras.php');
            }
        }
    }

?>