<?php
$localhost = "localhost";
$username = "root";
$senha = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha, $database);
    
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $status = $_POST['status'];

    $sql = "UPDATE motoristas 
            SET nome='$nome', matricula='$matricula', status='$status' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "sucesso";
    } else {
        echo "Erro: " . $conn->error;
    }
}
$conn->close();
?>