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
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];

    $sql = "INSERT INTO motoristas (nome, matricula, status) VALUES ('$nome', '$matricula', 'DISPONIVEL')";

    if ($conn->query($sql) === true) {
        echo "sucesso";
    } else {
        echo $conn->error;
    }
}
$conn->close();
?>