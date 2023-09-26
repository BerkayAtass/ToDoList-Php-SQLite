<?php
    require_once 'conn.php';
    session_start();
    if (!isset($_SESSION['user_id'])) {
    
        header('Location: login.php?mess=warning');
        exit; 
    }

    if(isset($_POST['newToDoTitle']) && isset($_POST['newToDoInfo'])){
    
        $newToDoTitle = $_POST['newToDoTitle'];
        $newToDoInfo = $_POST['newToDoInfo'];
       
        $userId = $_SESSION['user_id'];


        
        if(empty($newToDoTitle) || empty($newToDoInfo) ){
            header("Location: index.php?mess=error");
        }else {
            $todosTable = "todos_$userId";
            $query = $conn->prepare("INSERT INTO $todosTable(title, info) VALUES (?, ?)");
            $query->execute(array(
                $newToDoTitle,
                $newToDoInfo,
            ));

            header("Location: index.php?mess=success");
        }


        
    } else {
        header("Location: index.php?mess=error");
        print_r($_POST);
    }


?>