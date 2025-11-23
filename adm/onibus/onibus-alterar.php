<?php
$conn = new mysqli("localhost", "root", "", "av2-caio-anna");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $capacidade = $_POST['capacidade'];
    $km = $_POST['km'];

    $sql = "UPDATE onibus SET placa='$placa', modelo='$modelo', capacidade='$capacidade', km_rodados='$km' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "sucesso";
    } else {
        echo "Erro: " . $conn->error;
    }
}
$conn->close();
?>