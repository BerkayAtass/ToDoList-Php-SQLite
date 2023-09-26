<?php

session_start();
require_once 'conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $query = $conn->prepare("SELECT id, pass FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);


    if ($user && password_verify($password, $user['pass'])) {
        $_SESSION['user_id'] = $user['id']; 
        header('location: index.php'); 
    } else {
        $_SESSION['error'] = "Invalid username or password"; 
        header('location: login.php?mess=error'); 
    }

} else {
    header('location: login.php?mess=error'); 
}
?>
