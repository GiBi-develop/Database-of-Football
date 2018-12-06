<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Footbal administration</title>
    <link rel="stylesheet" href="Site.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="Style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="Navigation">
    <ul class="Navigation">
        <li><a href="Site.php">Главная</a></li>
        <li><a href="Transfer.php">Перевод игрока</a></li>
        <li><a href="Trainer.php">Переназначение тренера</a></li>
        <li><a href="Decline_meeting.php">Отмена встречи</a></li>
        <li><a href="Exit.php">Выход</a></li>
    </ul>
</div>
<form action="Trainer_check.php" class="form_trainer" method="post">
    <div class="col-md-4 pd-3 form_trainer">
        <label for="exampleInputEmail1">Команда</label>
        <input type="text" name="Id" class="form-control" id="exampleInputEmail1" placeholder="Название команды, в которой нужно изменить тренера">
        <br>
        <label for="exampleInputEmail1">ФИО тренера</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="ФИО назначаемого тренера">
        <br>
        <button type="submit" name="submit" class="btn btn-primary form_trainer">Подтверждение</button>
    </div>
</form>
<br>
<?php
session_start();
?>
</body>
</html>