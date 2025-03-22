<?php

error_log(message: "initialising db");


try {

    /*
    it is recommended to create a new user in mysql per project. 
    run the following command:
        -- create the user
        mysql -u root -p -e "CREATE USER 'todo_user'@'localhost' IDENTIFIED BY 'password'"
        
        -- create the database
        mysql -u root -p -e "CREATE DATABASE todo_db"
        
        -- add privileges to the created user to access
        mysql -u root -p -e "GRANT ALL PRIVILEGES ON todo_db.* TO 'todo_user'@'localhost';"
        
        -- apply privileges
        mysql -u root -p -e "FLUSH PRIVILEGES"
    */

    $username = "todo_user";
    $password = "password";

    $db = new PDO("mysql:host=localhost;dbname=todo_db", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec("
        CREATE TABLE IF NOT EXISTS todo (
            todo_id BIGINT AUTO_INCREMENT,
            todo_title VARCHAR(100),
            todo_desc TEXT,
            completed TINYINT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (todo_id) 
        )
    ");

    error_log("successfully initialised db");
} catch (PDOException $err) {
    // error handle
    header("Location: /error?hint=error%20initialising%20db%20at%20models.php&message={$err->getMessage()}");
    exit();
}
