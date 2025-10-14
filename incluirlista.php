<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Lista</title>
</head>
<body>
    <?php
        //Charmar aquivo conexão Banco de Dados
        require_once("conexao.php");

        try {
            $parametro = ['nome' => $_POST['inome']];
            $stmt = $conn->prepare("INSERT INTO lista (nome) VALUES (:nome)");
            if ($stmt->execute($parametro)) {
                //se inclusão bem sucedida redireciona para a listagem de listas
                header("Location:index.php");    
            } 
        } catch (PDOException $e) {
            echo "Erro ao incluir Lista: ".$e->getMessage();
        }
    ?> 
</body>
</html>