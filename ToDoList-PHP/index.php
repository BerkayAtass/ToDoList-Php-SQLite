<?php 
require 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>To Do List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="body-plus">
    <div class="container container-plus">
        <div class="box">
            <!------------------ To Do List Conteiner --------------------->
            <div class="box-ToDoList" id="ToDoList">

            <!------------------ To Do List Alert Div --------------------->
            <?php if(isset($_GET['mess']) && $_GET['mess'] == 'success'){ ?>
                <div class="alert alert-success" id="success" role="alert">
                You have successfully created a new todo!!!
                </div>
                <script>
                     setTimeout(function(){
                        var successDiv = document.getElementById("success");
                        successDiv.style.display = "none";
                    }, 2500);
                </script>
            <?php }elseif(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <div class="alert alert-danger" id="error" role="alert">
                Please check whether the title and info sections are filled!!!
                </div>
                <script>
                     setTimeout(function(){
                        var errorDiv = document.getElementById("error");
                        errorDiv.style.display = "none";
                    }, 3500);
                </script>
            <?php } ?>

            <!------------------ To Do List Box --------------------->
                <div class="top-header">
                    <h3>To Do List</h3>
                </div>
    
                <div class="search-group">
                    <div class="search-field">
                        <input type="text" class="search-box" id="newToDoTitle" required>
                        <label for="newToDoTitle">Search To Do</label>
                        <!--   <input type="submit" class="search-submit" value="search"> -->
                    </div>
                </div>
    
                <div class="to-do-list">
                    <ol>
                    <?php 
                    $todosDB = $conn->query("SELECT * FROM todos ORDER BY id DESC");
                    $todosDB->execute();
                    $todo = $todosDB->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($todo as $key => $value) {
                        //echo $key. "<br>" . $value;
                        //var_dump($value);
                        echo '<li class="list">
                        <div class="list-field">
                            <strong class="list-field" >'.$value["title"].'</strong>
                            <p>'.$value["info"].'</p>
                            <br>
                            <div>
                                <button type="submit" class="editbutton"  id="'.$value["id"].'">Edit</button>
                                <button type="submit"  onclick="deleteTodo('.$value["id"].')" id="'.$value["id"].'"  class="deletebutton">Delete</button>
                            </div>
                        </div>
                        <br>
                    </li>';
                        
                    }
                    ?>
                
                   
                    </ol>
                </div>     
    
            </div>
    
         <!-------------------- Add New To Do Box--------------------------->
        
         <div class="box-AddNewToDo" id="AddNewToDo">
    
            <div class="top-header">
               <h3>Add New To Do</h3>
            </div>

            <form id="todoForm" action="add.php" method="POST" autocomplete="off">
    
                <div class="input-group-plus">
                    <div class="input-field">
                        <input type="text" class="input-box" id="ToDoTitle" name="newToDoTitle" required>
                        <label for="ToDoTitle">To Do Title</label>
                    </div>
                    <div class="input-field">
                        <textarea type="text" class="input-box-area" id="ToDoInfo" name="newToDoInfo" required></textarea>
                        <label for="ToDoInfo">To Do Info</label>
                    </div>
                        <div class="input-field">
                            <button id="todoAdd" type="submit" class="input-submit">Add</button>
                    </div>
                    <br>
                </div>
            </form> 
            
       </div>
        <!------------------------ Switch -------------------------->
          
        <div class="switch">
            <a href="#" class="todoScreen" onclick="todosPage()">To Do List</a>
            <a href="#" class="addToDoScreen" onclick="AddTodoPage()">Add New To Do</a>
            <div class="btn-active" id="btn"></div>
        </div>
    
        </div>
     </div>
    

    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>