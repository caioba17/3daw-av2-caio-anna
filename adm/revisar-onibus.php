<?php
header('Content-Type: application/json');
$localhost = "localhost";
$username = "root";
$senha_db = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha_db, $database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id'];
    $sql = "UPDATE onibus SET km_rodados = 0 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Revisão registrada com sucesso! O contador de KM foi zerado.";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}

$conn->close();
?>