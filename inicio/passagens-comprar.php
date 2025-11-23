<?php
session_start();
$localhost = "localhost";
$username = "root";
$senha = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha, $database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!isset($_SESSION['id'])) {
        echo "Erro: Usuário não logado.";
        exit;
    }

    $id_usuario = $_SESSION['id'];
    $id_viagem = $_POST['id_viagem'];

    $assento = rand(1, 42); 

    $sql = "INSERT INTO passagens (id_usuario, id_viagem, assento, status) 
            VALUES ('$id_usuario', '$id_viagem', '$assento', 'CONFIRMADA')";

    if ($conn->query($sql) === TRUE) {
        echo "sucesso";
    } else {
        echo "Erro ao comprar: " . $conn->error;
    }
}
$conn->close();
?>