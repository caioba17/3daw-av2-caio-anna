<?php
header('Content-Type: application/json');
$localhost = "localhost";
$username = "root";
$senha_db = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha_db, $database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $origem = $_POST['origem'];
    $destino = $_POST['destino'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $preco = $_POST['preco'];
    $id_onibus = $_POST['id_onibus'];
    $id_motorista = $_POST['id_motorista'];

    $sqlBuscaOnibus = "SELECT modelo FROM onibus WHERE id = $id_onibus";
    $res = $conn->query($sqlBuscaOnibus);
    
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $tipo_onibus = $row['modelo']; 

        $sql = "INSERT INTO viagens (origem, destino, data_ida, hora_saida, preco, tipo_onibus, id_onibus, id_motorista) 
                VALUES ('$origem', '$destino', '$data', '$hora', '$preco', '$tipo_onibus', '$id_onibus', '$id_motorista')";

        if ($conn->query($sql) === TRUE) {
            $conn->query("UPDATE motoristas SET status = 'EM_VIAGEM' WHERE id = $id_motorista");

            echo "sucesso";
        } else {
            echo "Erro ao criar viagem: " . $conn->error;
        }

    } else {
        echo "Erro: Ônibus ID $id_onibus não encontrado na frota.";
    }
}
$conn->close();
?>