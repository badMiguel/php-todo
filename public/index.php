<?php

$route = $_SERVER["PATH_INFO"];
if (!$route) {
    $route = "/";
}

/*

note about "__DIR__":
- it is platform independent and should work similar to linux/windows
- it returns exact path were it is called

try uncommetting this and refreshing the website:

    echo __DIR__;


-------

furthermore, forward slashes "/" should work on windows
php will convert it to backslash "\"

*/

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
