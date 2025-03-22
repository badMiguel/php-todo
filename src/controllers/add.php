<?php

declare(strict_types=1);

require __DIR__ . "/../models/db.php";
if (!$db) {
    header("Location: /error?hint=db%20doesnt%20exist%20at%20add.php.%20Maybe%20the%20db%didnt%20initialise%20at%20db.php");
    exit();
}

$todoTitle = htmlspecialchars($_POST["todo_title"]);
$todoDesc = htmlspecialchars($_POST["todo_desc"]);
if (!$todoTitle || !$todoDesc) {
    header("Location: /?status=fail");
    exit();
}

$statement = $db->prepare("
    INSERT INTO todo (todo_title, todo_desc, completed) VALUES (:title, :desc, 0) 
");
$statement->execute(["title" => $todoTitle, "desc" => $todoDesc]);

header("Location: /");
