<?php
session_start();
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "av2-caio-anna");

if (!isset($_SESSION['id'])) {
    echo json_encode([]);
    exit;
}

$id_usuario = $_SESSION['id'];

$sql = "SELECT 
            p.id as id_passagem, p.assento, p.status,
            v.origem, v.destino, v.data_ida, v.hora_saida, v.tipo_onibus
        FROM passagens p
        JOIN viagens v ON p.id_viagem = v.id
        WHERE p.id_usuario = $id_usuario
        ORDER BY v.data_ida DESC";

$result = $conn->query($sql);

$dados = [];
if ($result) {
    while($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }
}

echo json_encode($dados);
$conn->close();
?>  