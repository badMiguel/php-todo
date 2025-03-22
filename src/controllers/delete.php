<?php

declare(strict_types=1);

$todoId = $_POST['todo_id'];
if (!isset($todoId)) {
    header("Location: /error");
    exit();
}

require_once __DIR__ . "/../models/db.php";
if (!$db) {
    header("Location: /error");
    exit();
}

$statement = $db->prepare("
    DELETE FROM todo WHERE todo_id = :todoId
");
$statement->execute(["todoId" => $todoId]);

header("Location: /");
exit();
