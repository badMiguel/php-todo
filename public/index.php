<?php

$route = $_SERVER["REQUEST_URI"];

switch ($route) {
    case "/":
        require_once __DIR__ .  '/../src/views/home.php';
        break;
    case "/add":
        require_once __DIR__ .  '/../src/controllers/crud.php';
        break;
    case "/error":
        require_once __DIR__ .  '/../src/views/error.php';
        break;
    default:
        break;
}

