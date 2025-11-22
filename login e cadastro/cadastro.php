<?php
$localhost = "localhost";
$username = "root";
$senha = "";
$database = "av2-copia";

$conn = new mysqli($localhost, $username, $senha, $database);
    
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];
    
    $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('" . $nome . "', '" . $email . "', '" . $senha . "', '" . $tipo . "')";
    $resultado = $conn->query($sql);
    
    if ($resultado === true) {
        echo "Usuário " . $nome . " cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
} else {
    echo "Método não permitido.";
}

$conn->close();
?>