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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $capacidade = $_POST['capacidade'];
    $km = $_POST['km'];

    $sql = "INSERT INTO onibus (placa, modelo, capacidade, km_rodados) VALUES ('$placa', '$modelo', '$capacidade', '$km')";

    if ($conn->query($sql) === true) {
        echo "sucesso";
    } else {
        echo $conn->error;
    }
}
$conn->close();
?>