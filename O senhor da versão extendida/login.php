<?php include("conexao.php")?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/logoGuia.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilosPrincipais.css">
    <title>O Senhor da Versão Extendida</title>
</head>

<body>
<!-- coluna fantasma -->
    <div class="col-ghost"></div>
<!-- coluna esquerda do menu -->
    <div class="col-menu">
        <div class="inicio">
            <a href="inicio.php"><img src="imagens/logoGuia.png" alt=""></a>
        </div>
    </div>
<!-- coluna de conteudos -->
    <div class="col-conteudo ">
        <div class="titulo">
            Login
        </div>
        <div class="subtitulo">
            não a necessidade de colocar quaisquer conteudo nos campos,apenas clicle em login
        </div>
        <div class="campos">
            <form action="cliente.php" >
                <label for="id">ID:</label>
                <input class="login" type="text" id="chave" name="id"><br><br>
                <label for="senha">Senha:</label>
                <input class="login"type="text" id="senha" name="senha"><br><br>
                <input class="btnLogin" type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>