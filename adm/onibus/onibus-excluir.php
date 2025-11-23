<?php
header('Content-Type: application/json');
$localhost = "localhost";
$username = "root";
$senha_db = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha_db, $database);
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $sql = "DELETE FROM onibus WHERE id = $id";
    if ($conn->query($sql) === true) { 
        echo "Excluído!"; 
    } 
    else { 
        echo "Erro ao excluir: " . $conn->error; 
    }
}
$conn->close();
?>