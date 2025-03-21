<?php

$route = $_SERVER["REQUEST_URI"];


switch ($route) {
    case '/':
        require_once __DIR__ .  '/../src/views/home.php';
}
