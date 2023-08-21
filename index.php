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
                <form action="change_status.php" method="POST">
                    <input type="hidden" name="todo_name" value="<?php echo $todoName; ?>">
                    <input type="checkbox" <?php echo $todo->completed ? 'checked' : ''; ?>>
                    <?php echo $todoName; ?>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function () {
                this.parentNode.submit();
            }
        });
    </script>
</body>

</html>