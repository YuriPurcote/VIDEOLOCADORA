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
<script language="JavaScript">
    function login() {
        var ID = document.getElementById("chave").value;
        var SENHA = document.getElementById("senha").value;
        if (ID ==''||SENHA =='',ID ==''&& SENHA =='' ) {
            alert('Olá o ID é 123 e a Senha 123 tambem');
            return false;
        }
        if (ID =='123'&& SENHA =='123') {
            document.form = "cliente.php";
        }
    }
</script>

<body>
<!-- coluna fantasma -->
    <div class="col-ghost"></div>
<!-- coluna esquerda do menu -->
    <div class="col-menu">
        <div class="inicio">
            <a href="Interface do Usuario/inicio.php"><img src="imagens/logoGuia.png" alt=""></a>
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
            <form onsubmit=" return login()" >
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