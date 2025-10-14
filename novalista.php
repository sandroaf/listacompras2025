<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Lista</title>
</head>
<body>
    <h1>Nova Lista</h1>
    <form action="incluirlista.php" method="post">
        <label for="inome">Nome da lista:</label>
        <input type="text" required id="inome" name="inome" size="60">;
        <br><br>
        <button name="bincluirlista">Incluir</button>&nbsp;
        <button onclick="window.location.href='index.php'">Cancelar</button>
    </form>
</body>
</html>