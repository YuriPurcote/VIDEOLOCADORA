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
<!-- listagem -->
<?php
  @$id= $_GET["id"] ;
  
  $query = "SELECT * FROM titulos WHERE id = $id ";
  
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
        <a href="titulo.php" class="pesquisa bloco fonte">
            <h4>T</h4>itulo
        </a >
        <a href="login.php" class="creditos bloco fonte areaFuncionario">
            <h4>F</h4>uncionario
        </a >
    </div>
    <div class="col-conteudo ">
        <div class="titulo">
            Titulo
        </div>
        <div class="subtitulo">
            Edição de Titulo
        </div>
        <div class="subtitulo red">
            <?php  echo @$_GET["msg"] ?>
        </div>
        <div class="campos-edicao">
            <?php 
            if(@$itens = mysqli_fetch_assoc($result)):
            ?>
                <div class="campos">
                    <form method="POST" >
                        <input id="id" name="id"   type="hidden"  value="<?= $itens['id'] ?> " >
                        <input class="login" type="text"    name="nome"  placeholder="Filme" value="<?= $itens['nome'] ?> ">        
                        <input class="login" type="text"    name="qtd"  placeholder="qtd" value="<?= $itens['qtd'] ?> ">        
                        <input class="login" type="text"  name="disp" placeholder="disponivel" value="<?= $itens['disp'] ?> ">        
                        <button  class="btnLogin" type="submit">Alterar</button>
                    </form>
                </div>
            <?php endif;?>
        </div>
    </div>
</body>
<?php       
    @$new_id  = $_POST["id"];
    @$new_nome  = $_POST["nome"];
    @$new_qtd = $_POST["qtd"];
    @$new_disp  = $_POST["disp"];

    $sql = "UPDATE titulos SET
        nome='" .$new_nome. "',
        qtd='" .$new_qtd. "',
        disp='" .$new_disp. "' 
        WHERE id = $new_id  ";

    if (@$selecao = mysqli_query($mysqli, $sql) ) {
        header("Location:titulo.php?msg=Titulo Alterado com sucesso!");
    }
?>
