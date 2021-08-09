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

    $sql = "SELECT * FROM alugados Order by id ";

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
            <a href="Interface do Usuario/inicio.php"><img src="imagens/logoGuia.png" alt=""></a>
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
        <a href="alugados.php" class="creditos bloco fonte areaFuncionario">
            <h4>F</h4>uncionario
        </a >
    </div>
<!-- coluna de conteudos -->
    <div class="col-conteudo ">
        <div class="titulo">
            Alugados
        </div>
        <div class="subtitulo">
            Cadastro de Titulos retirados
        </div>
        <div class="subtitulo red">
            <?php  echo @$_GET["msg"] ?>
        </div>
        <div class="campos">
            <div class="subtitulo">
                Até 2 dias uteis para retorno de todos os titulos
            </div>
            <form method="POST" action="acoes.php?acao=incluirAlugado">
                <input class="login" type="text"  name="titulo"  placeholder="Titulo">        
                <input class="login" type="text"  name="cliente" placeholder="Cliente">        
                <input class="login red" type="date"  name="retirada" placeholder="Retirada">        
                <button  class="btnLogin" type="submit">Incluir</button>
            </form>
        </div>
        <!---LISTAGEM DE DADOS---------------------------------------------------------------------------->
            <table>
                <tr >
                    <td >
                        ID
                    </td>
                    <td >
                        Titulo
                    </td>
                    <td >
                        Cliente
                    </td>
                    <td >
                        Retirada
                    </td>
                    <td >
                        Entrega
                    </td>
                    <td >
                        Calculo
                    </td>
                    <td >
                        Multa
                    </td>
                </tr>
                <?php while($row = mysqli_fetch_assoc($lista)): ?>
                    <tr>
                        <td class="">
                            <?php echo $row['id'];?>
                        </td>
                        <td class="">
                            <?php echo $row['titulo'];?>
                        </td>
                        <td class="">
                            <?php echo $row['cliente'];?>
                        </td>
                        <td class="">
                            <?php echo $row['retirada'];?>
                        </td>
                        <td class="">
                            <a id="today" onclick="today()">V</a>
                        </td>
                        <td class="">
                            <a  class="fas fa-hand-holding-usd red" href="deletarAlugado.php?id=<?= $row['id'];?>" title="Pago" ></a>
                        </td>
                        <td class="">
                            <div>valor da multa</div>
                        </td>
                    </tr>
                <?php endwhile; ?>  
            </table>
        </div>
    </div>
    <script>
        /* logica  pegar o valor de retirada e o valor do hoje que é quando é clicado no botao então o valor da data de retirada menos o valor de entrega */
         function today(){
            var dt = new Date();
            var dia = dt.getDate();
            var mes = dt.getMonth();
            var ano = dt.getFullYear();

            alert($dt);
            $today =document.getElementById("today") ;
            $today.textContent=$dt;

            
        }

    </script>
</body>
</html>
