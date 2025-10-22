<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Altera Item - <?=$_GET["codigo"]?></title>
</head>
<body>
    <?php
        //Charmar aquivo conexão Banco de Dados
        require_once("conexao.php");

        try {
            $parametros = ['codigo' => $_POST['icodigo']
                          ,'descricao' => $_POST['idescricao']
                          ,'quantidade' => $_POST['iquantidade']];
            $stmt = $conn->prepare("UPDATE item 
                                       SET descricao = :descricao
                                          ,quantidade = :quantidade
                                          ,datahora = current_timestamp()
                                        WHERE codigo = :codigo");
            if ($stmt->execute($parametros)) {
                //se alteração bem sucedida redireciona para a listagem de listas
                header("Location:item.php?lista=".$_POST['icodigo_lista']);    
            } 
        } catch (PDOException $e) {
            echo "Erro ao alterar o item: ".$e->getMessage();
        }
    ?> 
</body>
</html>