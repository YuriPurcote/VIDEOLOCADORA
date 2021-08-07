<?php
include 'conexao.php';
require_once 'objcliente.php';
$cliente = new cliente();

    @$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
        /* incluir completo */
        if($acao == 'incluir'){

            $nome = $cliente ->setNome($_POST['nome']);
            $numero = $cliente ->setNumero($_POST['numero']);
            $cpf = $cliente ->setCpf($_POST['cpf']);

            $nome = $cliente ->getNome($_POST['nome']);
            $numero = $cliente ->getNumero($_POST['numero']);
            $cpf = $cliente ->getCpf($_POST['cpf']);
            $i=1;
            $id= $i++;
            if ($cliente == NULL ) {

                header("Location:cliente.php?msg=Favor preencher todos os campos");
            }else{
                $sql = "INSERT INTO clientes(
                        nome,
                        numero,
                        cpf
                    )values(
                    ' $nome',
                        $numero,
                    ' $cpf '  
                    )";
                if (mysqli_query($mysqli, $sql)) {
                    
                    header("Location:cliente.php?msg=cliente Incluida com sucesso!");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            }}
            