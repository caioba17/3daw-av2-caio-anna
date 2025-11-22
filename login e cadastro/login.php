<?php
$localhost = "localhost";
$username = "root";
$senha_db = "";
$database = "av2-caio-anna";

$conn = new mysqli($localhost, $username, $senha_db, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM usuarios WHERE email = '" . $email . "' AND senha = '" . $senha . "'";
    $resultado = $conn->query($sql);
    
    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        
        session_start();
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['tipo'] = $usuario['tipo'];   
        
        echo "sucesso:" . $usuario['tipo']; 
        
    } else {
        echo "Email ou senha incorretos.";
    }

} else {
    echo "Método não permitido.";
}

$conn->close();
?>