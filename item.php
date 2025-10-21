<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de compras - <?=$_GET['lista']?></title>
</head>
<body>
    <h1>Lista de compras - <?=$_GET['lista']?></h1>
    <?php
       //Abrir aquivo conexão Banco de Dados
       require_once("conexao.php");    

       //Prepara o SELECT para consultar os itens da lista passada por parametro
       $stmt = $conn->prepare("SELECT * FROM item WHERE codigo_lista = :codigo");
       $parametro = ['codigo' => $_GET['lista']];
       $stmt->execute($parametro);
       echo "<ul>";
       //Para cada Item da busca, apresenta em tela
       foreach ($stmt as $item) {
            echo "<li>";
            echo $item["codigo"]." - ";
            echo $item["datahora"]." - ";
            echo $item["descricao"]." - ";
            echo $item["quantidade"];
            echo "</li>"; 
       }
       echo "</ul>"; 
       $conn = null; //ecerrar conexão com Banco de Dados
    ?>
    <button onclick="window.location.href='index.php'">Voltar</button>
</body>
</html>