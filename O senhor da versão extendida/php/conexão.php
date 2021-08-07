<?php
    
    $conexao = pg_connect("host='localhost' port='5432' dbname='Pessoas' user='postgres' password='acesse'");
    if(!$conexao) {
        die("Nao foi possivel se conectar ao banco de dados!");
    }  
    $pessoas = array();

    $query = "SELECT * FROM tb_pessoas Order by id_pessoas ";

    $lista = pg_query($conexao,$query); 

?>
