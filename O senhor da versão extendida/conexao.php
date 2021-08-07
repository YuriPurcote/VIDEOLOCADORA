<?php
    $host = "localhost"    ;
    $usuario = "root";
    $senha = "";
    $bd = "videolocadora";/* banco de dados */

    $mysqli = new mysqli($host,$usuario,$senha,$bd);
    if ($mysqli->connect_errno) {
        echo"FALHA NA CONEXÃO: (".$mysqli->connect_errno."): ".$mysqli->connect_error;
    }
?>
