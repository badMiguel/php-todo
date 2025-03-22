<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo app</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>oops...</h1>
    <p><em>dw i got u</em></p>
    <br>

    <?php
    echo "<p><strong>hint:</strong> {$_GET["hint"]}</p>";
    if (isset($_GET["message"])) {
        echo "<p><strong>error message:</strong> {$_GET["message"]}</p>";
    }
    ?>
</body>

</html>
