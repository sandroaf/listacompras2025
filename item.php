<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Lista de compras - <?=$_GET['lista']?></title>
    <script>
        function apagaitem(codigolista,codigo,descricao) {
            if (confirm("Apagar item: "+codigo+" - "+descricao+"? ")) {
                location.href = "apagaitem.php?codigo="+codigo+"&lista="+codigolista;
            }
        }
    </script>
</head>
<body>
    <h1>Lista de compras - <?=$_GET['lista']?></h1>
    <br>
    <button onclick="window.location.href='novoitem.php?lista=<?=$_GET['lista']?>'">Novo Item</button>    
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
            $codigo = $item["codigo"];
            $descricao = $item["descricao"];
            $codigolista = $item["codigo_lista"];
            echo "<li>";
            echo $item["descricao"]." - ";
            echo $item["quantidade"];
            $dh = strtotime($item["datahora"]);
            echo "&nbsp;<span class='inf' title='Código: ".$item["codigo"]."\nData e Hora: ".date("d/m/Y H:i:s",$dh)."'>&nbsp;!&nbsp;</span>";
            echo "&nbsp;<a class='acao' href='alteraitem.php?codigo=$codigo'>";
            echo "&nbsp;<img src='img/editar.png'>";
            echo "</a>&nbsp;";
            echo "<a class='acao' onclick='apagaitem($codigolista,$codigo,\"$descricao\")'><img src='img/bloquear.png'>";
            echo "</a>&nbsp;";            
            echo "</li>"; 
       }
       echo "</ul>"; 
       $conn = null; //ecerrar conexão com Banco de Dados
    ?>
    <button onclick="window.location.href='index.php'">Voltar</button>
</body>
</html>