<?php

require_once 'conn.php';

if(isset($_POST['id'])){

    $id = $_POST['id'];
   

    $query = $conn->prepare("DELETE FROM todos WHERE id = ?");
    $query->execute([$id]);

    header("Location: index.php?");
    
} else {
    echo "POST verileri eksik.";
    print_r($_POST);
}

?>