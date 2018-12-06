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
        <li><a href="Seek_in_Database.php">Поиск в базе</a></li>
        <li><a href="Cost.php">Цены</a></li>
        <li><a href="Result_of_match.php">Результаты встречи</a></li>
        <li><a href="Exit.php">Выход</a></li>
    </ul>
<br>
    <br>
    <br>
<form action="Seek_player.php" class="form_trainer" method="post">
    <div class="col-md-4 pd-3 form_trainer">
        <label for="exampleInputEmail1">Поиск игрока по имени</label>
        <input type="text" name="Id" class="form-control" id="exampleInputEmail1" placeholder="Имя игрока">
        <br>
        <button type="submit" name="submit" class="btn btn-primary form_trainer">Подтверждение</button>
    </div>
</form>
<form action="Seek_stadium.php" class="form_trainer" method="post">
    <div class="col-md-4 pd-3 form_trainer">
        <label for="exampleInputEmail1">Поиск стадиона по городу</label>
        <input type="text" name="Id" class="form-control" id="exampleInputEmail1" placeholder="Город">
        <br>
        <button type="submit" name="submit" class="btn btn-primary form_trainer">Подтверждение</button>
    </div>
</form>
<form action="Seek_team.php" class="form_trainer" method="post">
    <div class="col-md-4 pd-3 form_trainer">
        <label for="exampleInputEmail1">Поиск команды по названию</label>
        <input type="text" name="Id" class="form-control" id="exampleInputEmail1" placeholder="Название команды">
        <br>
        <button type="submit" name="submit" class="btn btn-primary form_trainer">Подтверждение</button>
    </div>
</form>
</div>
<?php
session_start();
?>
</body>
</html>