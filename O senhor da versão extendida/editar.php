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
  
  $query = "SELECT * FROM clientes WHERE id = $id ";
  
  @$result = mysqli_query($mysqli,$query);

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
        <a href="pesquisa.php" class="pesquisa bloco fonte">
            <h4>P</h4>esquisa
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
                var_dump($result);
            if(@$itens = mysqli_fetch_assoc($result)):
            ?>
                <div class="campos">
                    <form method="POST" action="editar.php">
                        <input id="id"          name="id"   type="hidden"  value="<?= $itens['id'] ?> " >
                        <input class="login" type="text"   maxlength="25" name="nome"  placeholder="Nome " value="<?= $itens['nome'] ?> ">        
                        <input class="login" type="number" maxlength="12"  name="numero" placeholder="Numero" value="<?= $itens['cpf']?> ">        
                        <input class="login" type="number"   maxlength="11"  name="cpf"  placeholder="Cpf" value="<?= $itens['numero'] ?> ">        
                        <button  class="btnLogin" type="submit">Alterar</button>
                    </form>
                </div>
            <?php endif;?>
        </div>
    </div>
</body>
<?php       

    @$new_id  = $_POST["id"];
    @$new_nome  = $_POST["new_nome"];
    @$new_numero = $_POST["new_numero"];
    @$new_cpf  = $_POST["new_cpf"];

    $query = "UPDATE tb_pessoas SET
        pes_nome='" .$new_nome. "',
        pes_numero='" .$new_numero. "',
        pes_cpf='" .$new_cpf. "' 
        WHERE id_pessoas = $new_id  ";

    
    if (@$selecao = mysqli_fetch_assoc($sql) ) {
        header("Location:cliente.php?msg=Cliente Alterado com sucesso!");
    }
?>
