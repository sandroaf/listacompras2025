<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apaga Lista</title>
</head>
<body>
    <?php 
        require_once("conexao.php");
        if (isset($_GET["codigo"])) {
            $codigo = $_GET["codigo"];
            //Apagar itens da Lista
            try {
                $parametro = ["codigo" => $codigo];
                $stmt = $conn->prepare("DELETE FROM item WHERE codigo_lista = :codigo");
                if ($stmt->execute($parametro)) {
                    //Apagar a lista
                    try {
                        $stmt = $conn->prepare("DELETE FROM lista WHERE codigo = :codigo");
                        if ($stmt->execute($parametro)) {
                           header("Location: index.php");     
                        }
                    } catch (PDOException $e) {
                        echo "Erro ao apagar a lista ".$e->getMessage();
                    }
                } 
            } catch (PDOException $e) {
                    echo "Erro ao apagar os Item da lista ".$e->getMessage();
            }
        }
    ?>
</body>
</html>