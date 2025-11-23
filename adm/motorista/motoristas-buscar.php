<?php
header('Content-Type: application/json');
$localhost = "localhost";
$username = "root";
$senha = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha, $database);
    
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM motoristas WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode([]);
}

$conn->close();
?>
