<?php

$todo = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json);
} else {
    $todo = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="newtodo.php" method="POST">
        <input type="text" name="todo_name" placeholder="Input your todo">
        <button>New Todo</button>
    </form>

    <div>
        <?php foreach ($todos as $todoName => $todo): ?>
            <div>
                <input type="checkbox" <?php echo $todo->completed ? 'checked' : '' ?> id="todo_<?= $todoName ?>" <label
                    for="todo_<?= $todoName ?>"><?= $todoName ?></label>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>