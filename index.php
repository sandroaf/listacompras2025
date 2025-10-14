<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
</head>
<body>
    <h1>Listas de Compras</h1>
    <?php
        //variáveis Banco de Dados
        $db_servidor = "localhost";
        $db_name = "listadecompras";
        $db_user = "root";
        $db_senha = "";

        try {
            $conn = new PDO("mysql:host=$db_servidor;dbname=$db_name",$db_user,$db_senha);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "Conexão bem sucedida";
        } catch (PDOException $e) {
            echo "Erro ao conectar banco de dados: ".$e->getMessage();
        }
        //Prepera o comando SQL para Executar
        $stmt = $conn->prepare("SELECT * FROM lista");
        $stmt->execute(); //Executa o SQL
        echo "<br><ul>";
        //Repete para cada linha da tabela Lista
        foreach ($stmt as $lista) { 
            echo "<li>";
            echo "<a href='item.php?lista='".$lista["codigo"].">".$lista["codigo"]."</a>";
            echo " - ".$lista["nome"];
            echo "</li>";
        }
        echo "</ul>";
        $conn = null; //encerr conexão com Banco de Dados
    ?>
</body>
</html>