<?php

declare(strict_types=1);

require __DIR__ . "/../models/db.php";
if (!$db) {
    header("Location: /error?hint=db%20doesnt%20exist%20at%20add.php.%20Maybe%20the%20db%didnt%20initialise%20at%20db.php");
    exit();
}

$todoTitle = isset($_POST["todo_title"]) ? htmlspecialchars($_POST["todo_title"]) : null;
$todoDesc = isset($_POST["todo_desc"]) ? htmlspecialchars($_POST["todo_desc"]) : null;
if (!$todoTitle || !$todoDesc) {
    header("Location: /?status=fail");
    exit();
}

try {
    $statement = $db->prepare("
        INSERT INTO todo (todo_title, todo_desc, completed) VALUES (:title, :desc, 0) 
    ");
    $statement->execute(["title" => $todoTitle, "desc" => $todoDesc]);
    header("Location: /");
} catch (PDOException $err) {
    header("Location: /error?hint=error%20adding%20todo%20at%20add.php&message={$err->getMessage()}");
    exit();
}
