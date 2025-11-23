<?php
header('Content-Type: application/json');
$localhost = "localhost";
$username = "root";
$senha_db = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha_db, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM motoristas ORDER BY nome ASC";
$result = $conn->query($sql);

$dados = [];
if ($result) {
    while($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }
}

echo json_encode($dados);
$conn->close();
?>