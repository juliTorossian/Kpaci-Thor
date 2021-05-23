<?php

    class monedaDAO{

        public static $FILE_MON    = './json/moneda.json';

        public static function cargarMonedas(){
            $a_moneda = json_decode(file_get_contents(monedaDAO::$FILE_MON), true);
            $monedas  = array();

            foreach ($a_moneda as $key => $value) {
                $moneda = new moneda($value['monId'], $value['monSim'], $value['monNom'], $value['monDiv']);
                array_push($monedas, $moneda);
            }
            return $monedas;
        }
    }

?>