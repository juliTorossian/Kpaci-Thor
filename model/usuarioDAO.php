<?php

    class UsuarioDAO{

        public static $FILE = './json/usuarios.json';

        public static function existeUsuario($usuario, $pass){
            $content    = file_get_contents(UsuarioDAO::$FILE);
            $a_usuarios = json_decode($content, true);

            $return = false;
            foreach ($a_usuarios as $usu){
                if ($usu['user'] == $usuario && $usu['pass'] == $pass){
                    $return = true;
                    break;
                }
            }
            return $return;
        }

        public static function crearUsuario($usuario, $pass){
            $a_usuarios = json_decode(file_get_contents(UsuarioDAO::$FILE), true);

            $usuario = array(
                'user'=>$usuario,
                'pass'=>$pass
            );
            array_push($a_usuarios, $usuario);
            $j_usuario = json_encode($a_usuarios);
            file_put_contents(UsuarioDAO::$FILE, $j_usuario);
        }

        public static function usuarioOcupado($usuario){
            $content = file_get_contents(UsuarioDAO::$FILE);
            $a_usuarios = json_decode($content, true);
            
            $return = false;
            foreach($a_usuarios as $user){
                if ($user["user"] == $usuario){
                    $return = true;
                    break;
                }
            }
            return $return;
        } 
    }

?>