<?php

declare(strict_types=1);

function checkVal(string|PDO|null ...$val): bool
{
    foreach ($val as $v) {
        if (!$v) {
            return false;
        }
    }
    return true;
}

require __DIR__ . "/../models/db.php";
$todoTitle = htmlspecialchars($_POST["todo_title"]);
$todoDesc = htmlspecialchars($_POST["todo_desc"]);

if (!checkVal($todoTitle, $todoDesc, $db)) {
    header("Location: /error");
    return;
}

$statement = $db->prepare("
    INSERT INTO todo (todo_title, todo_desc, completed) VALUES (:title, :desc, 0) 
");
$statement->execute(["title" => $todoTitle, "desc" => $todoDesc]);

header("Location: /");
