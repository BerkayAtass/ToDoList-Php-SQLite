<?php 
require 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">


</head>
<body class="body-plus">

    <div class="container-plus">
        <div class="box-login-register d-flex justify-content-center">

            <div class="Login-Register align-self-center mb-5">
                        
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                    <div class="alert alert-danger" id="error" role="alert">
                    An error occurred while creating an account!!!
                    </div>
                    <script>
                        setTimeout(function(){
                            var errorDiv = document.getElementById("error");
                            errorDiv.style.display = "none";
                        }, 3500);
                    </script>
                <?php } else if(isset($_GET['mess']) && $_GET['mess'] == 'emailExists'){ ?>
                    <div class="alert alert-danger" id="error" role="alert">
                    This email is already in use.
                    </div>
                    <script>
                        setTimeout(function(){
                            var errorDiv = document.getElementById("error");
                            errorDiv.style.display = "none";
                        }, 3500);
                    </script>
                <?php } ?>

                <div class="top-header">
                    <h3>Register</h3>
                </div>
                <div class="input-group-plus">
                    <form action="registerFunction.php" method="POST">
                    <div class="input-field">
                        <input type="text" class="input-box" id="user" name="username" required>
                        <label for="user">Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input-box" id="pass" name="password" required>
                        <label for="pass">Password</label>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input-box" id="mail" name="email" required>
                        <label for="mail">E-mail</label>
                    </div>
                    <button class="input-submit input-field">Register</button>
                    <p>Already has a account? <a href="login.php" class="btn btn-secondary" role="button" data-bs-toggle="button">Login now!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>