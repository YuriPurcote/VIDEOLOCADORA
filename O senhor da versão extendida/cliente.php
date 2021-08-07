<?php include("conexao.php")?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icone da guia -->
    <link rel="shortcut icon" href="imagens/logoGuia.png" type="image/x-icon">
    <!-- AWESOME ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- estilo da pagina -->
    <link rel="stylesheet" href="css/estilosPrincipais.css">
    <title>O Senhor da Versão Extendida</title>
</head>
<!---CONEXAO COM O BANCO DE DADOS E LISTAGEM------------------------------------------------------>
<?php

    $sql = "SELECT * FROM clientes Order by id ";

    $lista = mysqli_query($mysqli, $sql); 

    if($sql === FALSE) { 
        die(mysqli_error($sql));
     }
?>

<body>
<!-- coluna fantasma -->
    <div class="col-ghost"></div>
<!-- coluna esquerda do menu -->
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
<!-- coluna de conteudos -->
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
        <div class="campos">
            <form method="POST" action="acoes.php?acao=incluir">
                <input class="login" type="text"    name="nome"  placeholder="Nome">        
                <input class="login" type="text"    name="cpf"  placeholder="Cpf">        
                <input class="login" type="text"  name="numero" placeholder="Numero">        
                <button  class="btnLogin" type="submit">Incluir</button>
            </form>
        </div>
        <!---LISTAGEM DE DADOS---------------------------------------------------------------------------->
            <table>
                <tr >
                    <td class="td-id">
                        ID
                    </td>
                    <td class="td-nome">
                        Nome
                    </td>
                    <td class="td-sexo">
                        Cpf
                    </td>
                    <td class="td-idade">
                        Numero
                    </td>
                    <td class="td-acao">
                        Ação
                    </td>
                </tr>
                <?php while($row = mysqli_fetch_assoc($lista)): ?>
                    <tr>
                        <td class="" >
                            <?php echo $row['id'];?>
                        </td>
                        <td class="">
                            <?php echo $row['nome'];?>
                        </td>
                        <td class="">
                            <?php echo $row['CPF'];?>
                        </td>
                        <td class="">
                            <?php echo $row['numero'];?>
                        </td>
                        <td class="td-acao-corpo">
                            <a class="fas fa-pen-nib botao-acao-lista red" href="editar.php?id=<?= $row['id'];?>" title="Alterar"></a>
                        </td>
                    </tr>
                <?php endwhile; ?>  
            </table>
        </div>
    </div>
</body>
</html>
