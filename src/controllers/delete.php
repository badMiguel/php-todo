<?php

declare(strict_types=1);

$todoId = $_POST['todo_id'];
if (!isset($todoId)) {
    header("Location: /error?hint=todo%20id%20doesnt%20exist%20at%20delete.php");
    exit();
}

require_once __DIR__ . "/../models/db.php";
if (!$db) {
    header("Location: /error?hint=db%20doesnt%20exist%20at%20home.php.%20Maybe%20the%20db%didnt%20initialise%20at%20db.php");
    exit();
}

try {
    $statement = $db->prepare("
        DELETE FROM todo WHERE todo_id = :todoId
    ");
    $statement->execute(["todoId" => $todoId]);
    header("Location: /");
    exit();
} catch (PDOException $err) {
    header("Location: /error?hint=error%20deleting%20todo%20at%20delete.php&message={$err->getMessage()}");
    exit();
}
