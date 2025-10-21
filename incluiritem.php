<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Incluir Item</title>
</head>
<body>
    <?php
        //Charmar aquivo conexão Banco de Dados
        require_once("conexao.php");

        try {
            $parametros = ['codigo_lista' => $_POST['icodigo_lista']
                          ,'descricao' => $_POST['idescricao']
                          ,'quantidade' => $_POST['iquantidade'] ];
            $stmt = $conn->prepare("INSERT INTO item (codigo_lista,descricao,quantidade) VALUES (:codigo_lista, :descricao, :quantidade)");
            if ($stmt->execute($parametros)) {
                //se inclusão bem sucedida redireciona para a listagem de listas
                header("Location:item.php?lista=".$_POST['icodigo_lista']);    
            } 
        } catch (PDOException $e) {
            echo "Erro ao incluir Lista: ".$e->getMessage();
        }
    ?> 
</body>
</html>