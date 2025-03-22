<?php

$route = $_SERVER["PATH_INFO"];
if (!$route) {
    $route = "/";
}

switch ($route) {
    case "/":
        require_once __DIR__ .  '/../src/views/home.php';
        break;
    case "/add":
        require_once __DIR__ .  '/../src/controllers/add.php';
        break;
    case "/delete":
        require_once __DIR__ .  '/../src/controllers/delete.php';
        break;
    case "/error":
        require_once __DIR__ .  '/../src/views/error.php';
        break;
    default:
        header("Location: /error?hint=unknown%20route");
        exit();
}
