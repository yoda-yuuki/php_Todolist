<?php

$todos = [];
if(file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json,true);
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
      integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu"
      crossorigin="anonymous"
    />
    <title>Todolist</title>
    <!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
</head>
<body>
<div class="container">
  <!-- Content here -->
  <h1>Todoリスト <i class="fas fa-clipboard-list"></i></h1>
  <form id="form" action="newtodo.php" method="POST">
        <input id="text" type="text" name="todo_name" placeholder="todoを入力">
        <button id="update">追加</button>
    </form>
    <br>

<?php foreach($todos as $todoName =>$todo): ?>
    <div style="margin-bottom: 30px;">
        <form style="display: inline-block;" action="change_status.php" method="POST ">
            <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
            ・
        </form>
        
        <?php echo $todoName ?>
         <form style="display:inline-block" action="delete.php" method="POST">
            <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
            <button id="delete">削除</button>
        </form>
    </div>
<?php endforeach; ?>

</div>
   
<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox][name=todo_name]');
    checkboxes.forEach(ch => {
        ch.onclick = function () {
            this.parentNode.submit();
        };
    })
    


</script>

</body>
</html>