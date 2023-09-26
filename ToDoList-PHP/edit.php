<?php
    require_once 'conn.php';
    session_start();
    if (!isset($_SESSION['user_id'])) {
    
        header('Location: login.php?mess=warning');
        exit; 
    }

    if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['info'])){
       
        $id = $_POST['id'];
        $title = $_POST['title'];
        $info = $_POST['info'];
        $userId = $_SESSION['user_id'];

        $todosTable = "todos_$userId";
        $query = $conn->prepare("UPDATE $todosTable SET title = ?, info = ? WHERE id = ?");
        $query->execute(array($title, $info, $id));
        

        header("Location: index.php");
        
    } else {
        echo "POST verileri eksik.";
        print_r($_POST);
    }


?>