<?php 
require 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">


</head>
<body class="body-plus">
    <div class="container-plus">
        <div class="box-login-register d-flex justify-content-center ">

            <div class="Login-Register align-self-center mb-5">
                
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'success'){ ?>
                    <div class="alert alert-success" id="success" role="alert">
                    You have successfully created a new account!!!
                    </div>
                    <script>
                        setTimeout(function(){
                            var successDiv = document.getElementById("success");
                            successDiv.style.display = "none";
                        }, 2500);
                    </script>
                <?php }elseif(isset($_GET['mess']) && $_GET['mess'] == 'warning'){ ?>
                    <div class="alert alert-danger" id="error" role="alert">
                    Please log in to your account.
                    </div>
                    <script>
                        setTimeout(function(){
                            var errorDiv = document.getElementById("error");
                            errorDiv.style.display = "none";
                        }, 3500);
                    </script>
                 <?php }elseif(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                    <div class="alert alert-danger" id="error" role="alert">
                    An error occurred while logging into your account.
                    </div>
                    <script>
                        setTimeout(function(){
                            var errorDiv = document.getElementById("error");
                            errorDiv.style.display = "none";
                        }, 3500);
                    </script>
                <?php } ?>

                
                <div class="top-header">
                    <h3>Login</h3>
                </div>
                <div class="input-group-plus">
                    <form action="loginFunction.php" method="POST">
                    <div class="input-field">
                        <input type="text" class="input-box" id="mail" name="email" required>
                        <label for="mail">E-mail</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input-box" id="pass" name="password" required>
                        <label for="pass">Password</label>
                    </div>
                    <button class="input-submit input-field">Login</button>
                    <p>Not registered? <a href="register.php" class="btn btn-secondary" role="button" data-bs-toggle="button">Create an account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>