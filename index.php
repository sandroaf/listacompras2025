<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
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
            echo "<li>";
            echo "<a href='item.php?lista=".$lista["codigo"]."'>".$lista["codigo"]."</a>";
            echo " - ".$lista["nome"];
            echo "</li>";
        }
        echo "</ul>";
        $conn = null; //encerr conexão com Banco de Dados
    ?>
</body>
</html>