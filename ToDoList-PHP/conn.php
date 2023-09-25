<?php
  
    // check if the database file exists and create a new one if not
    // if (!is_file('database/todosDB.sqlite3')) {
    //     file_put_contents('database/todosDB.sqlite3', null);
    // }

    // connecting the database
    $conn = new PDO('sqlite:todosDB.sqlite3');

    // Setting connection attributes
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "CREATE TABLE IF NOT EXISTS todos (
       id INTEGER PRIMARY KEY AUTOINCREMENT,
     title TEXT NOT NULL,
        info TEXT NOT NULL
    );";


    // Execute the queries
    $conn->exec($query);
    
?>