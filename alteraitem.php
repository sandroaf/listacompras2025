<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Altera Item - codigo: <?=$_GET['codigo']?></title>
</head>
<body>
    <h1>Altera Item - codigo: <?=$_GET['codigo']?></h1>
    <?php
        require_once("conexao.php");
        try {
            $parametro = ["codigo" => $_GET['codigo']];
            $stmt = $conn->prepare("SELECT * FROM item where codigo=:codigo");
            if ($stmt->execute($parametro)) {
                $item = $stmt->fetch(PDO::FETCH_ASSOC);
                $codigolista = $item['codigo_lista'];
            }
         } catch (PDOException $e) {
            echo "Erro ao consultar Lista: ".$e->getMessage();
        }
    ?>
    <form action="alteraitemsalva.php" method="post">
        <label for="icodigo_lista">Código da Lista:</label>
        <input type="text" id="icodigo_lista" name="icodigo_lista" value="<?=$codigolista?>" readonly size=5>
        <br>
        <input type="hidden" id="icodigo" name="icodigo" value="<?=$item['codigo']?>">
        <label for="idescricao">Descrição:</label>
        <input type="text" id="idescricao" name="idescricao" size="60" value="<?=$item['descricao']?>">
        <br>
        <label for="iquantidade">Quantidade:</label>
        <input type="text" id="iquantidade" name="iquantidade"
        value="<?=$item['quantidade']?>">
        <br>
        <br><br>
        <button name="bincluirlista">Alterar</button>&nbsp;
        <button type="reset" onclick="window.location.href='item.php?lista=<?=$codigolista?>'">Cancelar</button>
    </form>
</body>
</html>