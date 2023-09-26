<?php
    require_once 'conn.php';
    session_start();

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
       
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        if (empty($username) || empty($password) || empty($email)) {

            header("Location: register.php?mess=error");

        } else {
           
            $checkEmailQuery = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE email = :email");
            $checkEmailQuery->bindParam(':email', $email);
            $checkEmailQuery->execute();
            $result = $checkEmailQuery->fetch();
    
            if ($result['count'] > 0) {  

                header("Location: register.php?mess=emailExists");

            } else {
            
                $query = $conn->prepare("INSERT INTO users(username, pass, email) VALUES (?, ?, ?)");
                $query->execute(array(
                    $username,
                    $hashedPassword,
                    $email,
                ));
    
                $userId = $conn->lastInsertId();
                $createTodosTableQuery = "CREATE TABLE IF NOT EXISTS todos_$userId (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title TEXT NOT NULL,
                    info TEXT NOT NULL
                );";
                $conn->exec($createTodosTableQuery);
    
                $_SESSION['success'] = "Successfully created an account";
                header("Location: login.php?mess=success");

            }
        }

	
        
    } else {
        header("Location: register.php?mess=error");
        print_r($_POST);
    }


?>