<?php
    require_once 'conn.php';

    if(isset($_POST['newToDoTitle']) && isset($_POST['newToDoInfo'])){
    
        $newToDoTitle = $_POST['newToDoTitle'];
        $newToDoInfo = $_POST['newToDoInfo'];
        echo $newToDoTitle ."<br>". $newToDoInfo;


        
        if(empty($newToDoTitle) || empty($newToDoInfo) ){
            header("Location: index.php?mess=error");
        }else {
            $query = $conn->prepare("INSERT INTO todos(title, info) VALUES (?, ?)");
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