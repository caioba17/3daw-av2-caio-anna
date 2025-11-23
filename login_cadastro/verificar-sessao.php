<?php
session_start();

header('Content-Type: application/json');

if (isset($_SESSION['id'])) {
    echo json_encode([
        'status' => 'logado',
        'id' => $_SESSION['id'],
        'nome' => $_SESSION['nome'],
        'tipo' => $_SESSION['tipo'] 
    ]);
} else {
    echo json_encode([
        'status' => 'deslogado'
    ]);
}
?>