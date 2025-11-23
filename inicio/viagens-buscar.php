<?php
header('Content-Type: application/json');
$localhost = "localhost";
$username = "root";
$senha_db = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha_db, $database);

$origem = isset($_GET['origem']) ? $_GET['origem'] : '';
$destino = isset($_GET['destino']) ? $_GET['destino'] : '';
$data = isset($_GET['data']) ? $_GET['data'] : '';

$sql = "SELECT * FROM viagens WHERE 1=1";

if ($origem != '') { 
    $sql .= " AND origem LIKE '%$origem%'";
}
if ($destino != '')  {
    $sql .= " AND destino LIKE '%$destino%'"; 
}
if ($data != '') {
    $sql .= " AND data_ida = '$data'";
}

$result = $conn->query($sql);

$viagens = [];
if ($result) {
    while($row = $result->fetch_assoc()) {
        $viagens[] = $row;
    }
}

echo json_encode($viagens);
$conn->close();
?>