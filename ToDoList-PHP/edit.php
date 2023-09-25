<?php
    require_once 'conn.php';

    if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['info'])){
       
        $id = $_POST['id'];
        $title = $_POST['title'];
        $info = $_POST['info'];
       

        $query = $conn->prepare("UPDATE todos SET title = ?, info = ? WHERE id = ?");
        $query->execute(array($title, $info, $id));
        

        header("Location: index.php");
        
    } else {
        echo "POST verileri eksik.";
        print_r($_POST);
    }


?>