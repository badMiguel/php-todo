<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>Todo App</h1>
    <p><em>learning php!</em></p>

    <form action="add" method="post">
        <label for="todo_title">Todo title</label>
        <input type="text" id="todo_title" name="todo_title" />
        <label for="todo_desc">Todo desc</label>
        <input type="text" id="todo_desc" name="todo_desc" />
        <input type="submit" value="Submit" />
    </form>

    <h2>List:</h2>
    <?php
    require_once __DIR__ . "/../models/db.php";

    if (!$db) {
        header("Location: /error");
        return;
    }

    $statement = $db->query("SELECT * FROM todo", PDO::FETCH_ASSOC);
    $todoList = $statement->fetchAll(PDO::FETCH_ASSOC);


    foreach ($todoList as $todo) {
        echo "
        <h3>{$todo['todo_title']}</h3>
        <p><em>Created at: {$todo['created_at']}</em></p>
        <p><em>Last updated: {$todo['updated_at']}</em></p>
        <p>{$todo['todo_desc']}</p>

        <form action='delete' method='post'>
            <input type='hidden' name='todo_id' value='{$todo['todo_id']}' />
            <input type='submit' value='Delete' />
        </form>

        <hr>
    ";
    }
    ?>
</body>

</html>
