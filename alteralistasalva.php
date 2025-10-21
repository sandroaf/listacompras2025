<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Altera Lista</title>
</head>
<body>
    <?php
        //Charmar aquivo conexão Banco de Dados
        require_once("conexao.php");

        try {
            $parametros = ['codigo' => $_POST['icodigo']
                         ,'nome' => $_POST['inome']];
            $stmt = $conn->prepare("UPDATE lista SET nome = :nome WHERE codigo = :codigo");
            if ($stmt->execute($parametros)) {
                //se inclusão bem sucedida redireciona para a listagem de listas
                header("Location:index.php");    
            } 
        } catch (PDOException $e) {
            echo "Erro ao alterar Lista: ".$e->getMessage();
        }
    ?> 
</body>
</html>