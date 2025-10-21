<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Altera Lista - <?=$_GET['codigo']?></title>
</head>
<body>
    <h1>Altera Lista - <?=$_GET['codigo']?></h1>
    <?php
        require_once("conexao.php");
        try {
            $parametro = ["codigo" => $_GET['codigo']];
            $stmt = $conn->prepare("SELECT codigo,nome FROM lista where codigo=:codigo");
            if ($stmt->execute($parametro)) {
                $lista = $stmt->fetch(PDO::FETCH_ASSOC);
            }
         } catch (PDOException $e) {
            echo "Erro ao consultar Lista: ".$e->getMessage();
        }    ?>
    <form action="alteralistasalva.php" method="post">
        <label for="icodigo">Código:</label>
        <input type="text" id="icodigo" name="icodigo" value="<?=$lista['codigo']?>" readonly>
        <br>
        <label for="inome">Nome da lista:</label>
        <input type="text" required id="inome" name="inome" size="60" value="<?=$lista['nome']?>">;
        <br><br>
        <button name="balteralista">Alterar</button>&nbsp;
        <button type="reset" onclick="window.location.href='index.php'">Cancelar</button>
    </form>
</body>
</html>