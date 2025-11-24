<?php
session_start();
header('Content-Type: application/json');
$localhost = "localhost";
$username = "root";
$senha_db = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha_db, $database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'FUNCIONARIO') {
        echo "Erro: Acesso negado.";
        exit;
    }

    $id_funcionario = $_SESSION['id'];
    $id_viagem = $_POST['id_viagem'];
    
    $assento = rand(1, 32);

    $check = $conn->query("SELECT id FROM passagens WHERE id_viagem = $id_viagem AND assento = $assento");
    if ($check->num_rows > 0) { $assento++; }

    $sql = "INSERT INTO passagens (id_usuario, id_viagem, assento, status) 
            VALUES ('$id_funcionario', '$id_viagem', '$assento', 'CONFIRMADA')";

    if ($conn->query($sql) === TRUE) {
        echo "Venda Registrada! Assento gerado: " . $assento;
    } else {
        echo "Erro: " . $conn->error;
    }
}
$conn->close();
?>