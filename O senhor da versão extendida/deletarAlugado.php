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
  
  $sql = "SELECT * FROM alugados WHERE id = $id ";
  
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
        <a href="alugados.php" class="pesquisa bloco fonte">
            <h4>A</h4>lugados
        </a >
        <a href="login.php" class="creditos bloco fonte areaFuncionario">
            <h4>F</h4>uncionario
        </a >
    </div>
    <div class="col-conteudo ">
        <div class="titulo">
            Pagamento
        </div>
        <div class="subtitulo">
            Realização do Pagamento
        </div>
        <div class="subtitulo red">
            <?php  echo @$_GET["msg"] ?>
        </div>
        <div class="campos-edicao">
            <?php 
            if(@$itens = mysqli_fetch_assoc($result)):
            ?>
                <div class="campos">
                    <form method="get" >
                        <input id="id" name="id"   type="hidden"  value="<?= $itens['id'] ?> " >
                        <input class="login" type="text"  maxlength="25" name="titulo"  placeholder="titulo " value="<?= $itens['titulo'] ?> "disabled style="width:70vh  ">    
                        <input class="login" type="text"  maxlength="25" name="cliente"  placeholder="CPF " value="<?= $itens['cliente'] ?> "disabled>  
                        <input class="login" type="text"  maxlength="25" name="cliente"  placeholder="CPF " value="<?= $itens['retirada'] ?> "disabled>       
                        <a id="today" class="fas fa-angle-down red" onclick="today()">Hoje</a>
                        <a style="margin-left: 39vh;" class="login" id="multa"> </a>
                        <button name="confirmaExcluir" class="btnLogin" type="submit">Pago</button>

                    </form>
                </div>
            <?php endif;?>
        </div>
    </div>
    <script>
        /* logica  pegar o valor de retirada(V) e o valor do hoje que é quando é clicado no botao(V) então o valor da data de retirada menos o valor de entrega */
        function today(){
            var dt = new Date().toISOString().slice(0, 10);
            var retirada = document.querySelector("#dataRetirada");
            
            today =document.querySelector("#today") ;
            today.innerHTML =dt;

            var timeDiff = Math.abs(dt.getTime() - retirada.getTime());
            alert(timeDiff);
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
            var diff =  Math.floor(( Date.parse(dt) - Date.parse(retirada) ) / 86400000); 
            if (diff =>2) {
                var multa = document.querySelector("#multa");
                multa.innerHTML=""+5*diff+"";
            }else{
                multa.innerHTML ="Sem Multa";
            }
            }

    </script>
</body>
<?php       

    $sql = "DELETE FROM alugados WHERE id = $id ";
    if (isset($_GET['confirmaExcluir'])) {
        if (@$selecao = mysqli_query($mysqli, $sql) ) {
            header("Location:alugados.php?msg=Pagamento Realizado!");
        }
    }
?>
