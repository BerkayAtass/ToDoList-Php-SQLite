<?php

require_once 'conn.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    
    header('Location: login.php?mess=warning');
    exit; 
}

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $userId = $_SESSION['user_id'];
    
    $todosTable = "todos_$userId";
    $query = $conn->prepare("DELETE FROM $todosTable WHERE id = ?");
    $query->execute([$id]);

    header("Location: index.php?");
    
} else {
    echo "POST verileri eksik.";
    print_r($_POST);
}

?>