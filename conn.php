<?php

    global $mysqli;

    $HOST   = 'localhost';
    $USER   = 'root';
    $PASS   = '';
    $DBNAME = 'kpacithor';

    $mysqli = new mysqli($HOST, $USER, $PASS, $DBNAME);
    
    if($mysqli->connect_errno){
        die("Error " .$mysqli->connect_errno ." - " .$mysqli->connect_errno);
    }

    //echo('Holas'); tambien con import error
?>