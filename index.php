<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Lista de Compras</title>
    <script>
        function apagalista(codigo, nome) {
            console.log("apagando lista");
            if (confirm("Confima exclusão da lista: "+codigo+" - "+nome+" ?")) {
                location.href="apagalista.php?codigo="+codigo;
            };
        }
    </script>
</head>
<body>
    <h1>Listas de Compras</h1>
    <br>
    <button onclick="window.location.href='novalista.php' ">Nova Lista</button>
    <br>
    <?php
        //Abrir aquivo conexão Banco de Dados
        require_once("conexao.php");

        //Prepera o comando SQL para Executar
        $stmt = $conn->prepare("SELECT * FROM lista");
        $stmt->execute(); //Executa o SQL
        echo "<br><ul>";
        //Repete para cada linha da tabela Lista
        foreach ($stmt as $lista) { 
            $listacodigo = $lista['codigo'];
            $listanome= $lista['nome'];
            echo "<li>";
            echo "<a class='dados' href='item.php?lista=$listacodigo'>$listacodigo";
            echo " - $listanome";
            echo "</a>&nbsp;";
            echo "<a class='acao' href='alteralista.php?codigo=$listacodigo'>";
            echo "&nbsp;<img src='img/editar.png'>";
            echo "</a>&nbsp;";
            echo "<a class='acao' onclick='apagalista($listacodigo,\"$listanome\")'><img src='img/bloquear.png'>";
            echo "</a>&nbsp;";
            echo "</li>";
        }
        echo "</ul>";
        $conn = null; //encerr conexão com Banco de Dados
    ?>
</body>
</html>