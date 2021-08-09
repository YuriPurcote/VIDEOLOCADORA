<?php
include 'conexao.php';
require_once 'objcliente.php';
require_once 'objTitulo.php';
require_once 'objAlugado.php';
$cliente = new Cliente();
$titulo = new Titulo();
$alugado = new Alugado();
    @$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
        /* incluir completo */
        if($acao == 'incluir'){

            $nome = $cliente ->setNome($_POST['nome']);
            $numero = $cliente ->setNumero($_POST['numero']);
            $cpf = $cliente ->setCpf($_POST['cpf']);

            $nome = $cliente ->getNome($_POST['nome']);
            $numero = $cliente ->getNumero($_POST['numero']);
            $cpf = $cliente ->getCpf($_POST['cpf']);
            if ($cliente == NULL ) {

                header("Location:cliente.php?msg=Favor preencher todos os campos");
            }else{
                $sql = "INSERT INTO clientes(
                        nome,
                        numero,
                        CPF
                    )values(
                    ' $nome',
                        $numero,
                    ' $cpf '  
                    )";
                if (mysqli_query($mysqli, $sql)) {
                    
                    header("Location:cliente.php?msg=Cliente Incluido com sucesso!");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            }
        }
        /* incluir titulo */
        if($acao == 'incluirTitulo'){

            $nome = $titulo ->setNome($_POST['nome']);
            $qtd = $titulo ->setQtd($_POST['qtd']);
            $disp = $titulo ->setDisp($_POST['disp']);


            $nome = $titulo ->getNome($_POST['nome']);
            $qtd = $titulo ->getQtd($_POST['qtd']);
            $disp = $titulo ->getDisp($_POST['disp']);
            if ($nome == NULL&& $qtd == NULL) {

                header("Location:cliente.php?msg=Favor preencher todos os campos");
            }else{
                $sql = "INSERT INTO titulos(
                        nome,
                        qtd,
                        disp
                    )values(
                        ' $nome ',
                        ' $qtd  ',
                        ' $disp '
                    )";
              
                if (mysqli_query($mysqli, $sql)) {
                    
                    header("Location:titulo.php?msg=Incluido com sucesso!");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            }
        }
        if($acao == 'incluirAlugado'){

            $cliente = $alugado ->setCliente($_POST['cliente']);
            $filme = $alugado ->setTitulo($_POST['titulo']);
            $retirada = $alugado ->setRetirada($_POST['retirada']);

            $cliente = $alugado ->getCliente($_POST['cliente']);
            $filme = $alugado ->getTitulo($_POST['titulo']);
            $retirada = $alugado ->getRetirada($_POST['retirada']);
            if ($cliente == NULL&& $filme == NULL&& $retirada == NULL) {
                header("Location:alugados.php?msg=Favor preencher todos os campos");
            }else{
                $sql = "INSERT INTO alugados(
                        cliente,
                        titulo,
                        retirada
                    )values(
                        ' $cliente ',
                        ' $filme  ',
                        ' $retirada  '
                    )";
              
                if (mysqli_query($mysqli, $sql)) {
                    
                    header("Location:alugados.php?msg=Incluido com sucesso!");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            }
        }
