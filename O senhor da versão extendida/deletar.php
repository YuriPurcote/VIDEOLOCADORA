<?php include("conexao.php")?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/logoGuia.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosPrincipais.css">
    <title>O Senhor da Versão Extendida</title>
</head>
<?php
  @$id= $_GET["id"] ;
  
  $sql = "SELECT * FROM clientes WHERE id = $id ";
  
  @$result = mysqli_query($mysqli,$sql);

?>
<body>
    <div class="col-ghost"></div>
    <div class="col-menu">
        <div class="inicio">
            <a href="inicio.php"><img src="imagens/logoGuia.png" alt=""></a>
        </div>
        <a href="cliente.php" class="creditos bloco fonte">
            <h4>C</h4>liente
        </a >
        <a href="titulo.php" class="pesquisa bloco fonte">
            <h4>T</h4>itulo
        </a >
        <a href="login.php" class="creditos bloco fonte areaFuncionario">
            <h4>F</h4>uncionario
        </a >
    </div>
    <div class="col-conteudo ">
        <div class="titulo">
            Cliente
        </div>
        <div class="subtitulo">
            Cadastro de Clientes
        </div>
        <div class="subtitulo red">
            <?php  echo @$_GET["msg"] ?>
        </div>
        <div class="campos-edicao">
            <?php 
            if(@$itens = mysqli_fetch_assoc($result)):
            ?>
                <div class="campos">
                    <form method="GET" action="deletar.php" >
                        <input id="id" name="id"   type="hidden"  value="<?= $itens['id'] ?> " >
                        <input class="login" type="text"  maxlength="25" name="nome"  placeholder="Nome " value="<?= $itens['nome'] ?> ">        
                        <input class="login" type="text"  maxlength="25" name="CPF"  placeholder="CPF " value="<?= $itens['CPF'] ?> ">        
                        <input class="login" type="text"  maxlength="25" name="numero"  placeholder="Numero " value="<?= $itens['numero'] ?> ">        
                        <button name="confirmaExcluir" class="btnLogin" type="submit">Deletar</button>
                    </form>
                </div>
            <?php endif;?>
        </div>
    </div>
</body>
<?php       



    $sql = "DELETE FROM clientes WHERE id = $id ";
    if (isset($_GET['confirmaExcluir'])) {
        if (@$selecao = mysqli_query($mysqli, $sql) ) {
            header("Location:cliente.php?msg=Cliente Alterado com sucesso!");
        }
    }
?>
