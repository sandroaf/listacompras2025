<?php
//variáveis Banco de Dados
$db_servidor = "localhost";
$db_name = "listacompras";
$db_user = "root";
$db_senha = "";

//conexão Banco de Dados    
try {
    $conn = new PDO("mysql:host=$db_servidor;dbname=$db_name",$db_user,$db_senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem sucedida";
} catch (PDOException $e) {
    echo "Erro ao conectar banco de dados: ".$e->getMessage();
}
?>