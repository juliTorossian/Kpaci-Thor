<?php

    include('./conn.php');

    class subscripcionDAO{

        public static $FILE_SUB = './json/suscripciones.json';


        public static function addSuscriptor($mailSuscriptor){
            
            global $mysqli;

            $stmt = $mysqli->prepare("INSERT INTO suscripciones(susMail) VALUES(?)");
            $stmt->bind_param("s", $mailSuscriptor);
            $stmt->execute();

        }

        public static function existeSub($mailSuscriptor){
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM suscripciones WHERE susMail = ?");
            $stmt->bind_param("s", $mailSuscriptor);
            $stmt->execute();
            $resultado   = $stmt->get_result();
            
            $return = false;
            while($mail = $resultado->fetch_assoc()){
                if ($mail != ''){
                    $return = true;
                    break;
                }

            }
            return $return;
        }
    }

?>