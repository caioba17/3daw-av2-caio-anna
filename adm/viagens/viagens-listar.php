<?php
header('Content-Type: application/json');
$localhost = "localhost";
$username = "root";
$senha_db = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha_db, $database);
$sql = "SELECT 
            viagens.*, 
            onibus.placa AS placa_onibus, 
            motoristas.nome AS nome_motorista
        FROM viagens
        LEFT JOIN onibus ON viagens.id_onibus = onibus.id
        LEFT JOIN motoristas ON viagens.id_motorista = motoristas.id
        ORDER BY data_ida DESC, hora_saida ASC";

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