<?php

echo "foo<br>";
try {
    $db = new PDO("mysql:host=localhost;dbname=todo_db", "todo_db", "password");
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

    echo "db initialised <br>";
} catch (PDOException $err) {
    // error handle
    echo "<h1>ERROR INITIALIZE DB</h1>";
    echo "<p>$err</p>";
}
