<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Item - lista: <?=$_GET['lista']?></title>
</head>
<body>
    <h1>Novo Item - lista: <?=$_GET['lista']?></h1>
    <form action="incluiritem.php" method="post">
        <label for="icodigo_lista">Código da Lista:</label>
        <input type="text" id="icodigo_lista" name="icodigo_lista" value="<?=$_GET['lista']?>" readonly size=5>
        <br>
        <label for="idescricao">Descrição:</label>
        <input type="text" id="idescricao" name="idescricao" size="60">
        <br>
        <label for="iquantidade">Quantidade:</label>
        <input type="text" id="iquantidade" name="iquantidade">
        <br>
        <br><br>
        <button name="bincluirlista">Incluir</button>&nbsp;
        <button onclick="window.location.href='index.php'">Cancelar</button>
    </form>
</body>
</html>