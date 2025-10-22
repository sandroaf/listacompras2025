<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apaga Item</title>
</head>
<body>
    <?php 
        require_once("conexao.php");
        if (isset($_GET["codigo"]) && isset($_GET["lista"])) {
            $codigo = $_GET["codigo"];
            $lista = $_GET["lista"];
            //Apagar itens da Lista
            try {
                $parametro = ["codigo" => $codigo];
                $stmt = $conn->prepare("DELETE FROM item WHERE codigo = :codigo");
                if ($stmt->execute($parametro)) {
                    header("Location: item.php?lista=$lista");     
                } 
            } catch (PDOException $e) {
                    echo "Erro ao apagar os Item da lista ".$e->getMessage();
            }
        }
    ?>
</body>
</html>