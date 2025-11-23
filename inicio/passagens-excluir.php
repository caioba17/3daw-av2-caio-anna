<?php
$localhost = "localhost";
$username = "root";
$senha = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha, $database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM passagens WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Passagem cancelada e reembolso solicitado!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
$conn->close();
?>