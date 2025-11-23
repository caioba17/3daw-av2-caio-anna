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
    
    $sqlBusca = "SELECT id_motorista FROM viagens WHERE id = $id";
    $res = $conn->query($sqlBusca);
    if ($res && $row = $res->fetch_assoc()) {
        $id_mot = $row['id_motorista'];
        $conn->query("UPDATE motoristas SET status = 'DISPONIVEL' WHERE id = $id_mot");
    }

    $conn->query("DELETE FROM passagens WHERE id_viagem = $id");
    
    $sql = "DELETE FROM viagens WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Excluído com sucesso!";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
} else {
    echo "Método inválido.";
}

$conn->close();
?>