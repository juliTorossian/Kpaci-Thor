<?php

    class subscripcionDAO{

        public static $FILE_SUB = './json/suscripciones.json';


        public static function addSuscriptor($mailSuscriptor){
            $a_suscripciones = json_decode(file_get_contents(subscripcionDAO::$FILE_SUB), true);

            $suscriptor = array(
                'mailSuscriptor'=>$mailSuscriptor
            );
            array_push($a_suscripciones, $suscriptor);
            $j_suscripciones = json_encode($a_suscripciones);
            file_put_contents(subscripcionDAO::$FILE_SUB, $j_suscripciones);
        }

        public static function existeSub($mailSuscriptor){
            $a_suscripciones = json_decode(file_get_contents(subscripcionDAO::$FILE_SUB), true);
            
            $return = false;
            foreach($a_suscripciones as $mail){
                if ($mail["mailSuscriptor"] == $mailSuscriptor){
                    $return = true;
                    break;
                }
            }
            return $return;
        }
    }

?>