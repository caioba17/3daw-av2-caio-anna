<?php
header('Content-Type: application/json');
$localhost = "localhost";
$username = "root";
$senha_db = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha_db, $database);
    
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM onibus ORDER BY km_rodados DESC";
$result = $conn->query($sql);

$dados = [];
while($linha = $result->fetch_assoc()) {
    $dados[] = $linha;
}

echo json_encode($dados);
$conn->close();
?>