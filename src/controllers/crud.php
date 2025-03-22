<?php

declare(strict_types=1);

function checkVal(string|PDO|null ...$val): bool
{
    foreach ($val as $v) {
        if (!$v) {
            header("Location: /error");
            return false;
        }
    }
    return true;
}

require __DIR__ . "/../models/db.php";
$todoTitle = htmlspecialchars($_POST["todo_title"]);
$todoDesc = htmlspecialchars($_POST["todo_desc"]);

if (checkVal($todoTitle, $todoDesc, $db)) {
    header("Location: /");
}
