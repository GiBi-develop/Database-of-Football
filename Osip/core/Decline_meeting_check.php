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
<form action="Decline_meeting_check.php" class="form_trainer" method="post">
    <div class="col-md-4 pd-3 form_trainer">
        <label for="exampleInputEmail1">Встреча</label>
        <input type="text" name="Id" class="form-control" id="exampleInputEmail1" placeholder="Номер встречи, которую надо отменить">
        <br>
        <label for="exampleInputEmail1">Статус встречи</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Статус">
        <br>
        <button type="submit" name="submit" class="btn btn-primary form_trainer">Подтверждение</button>
    </div>
</form>
<br>
<?php
session_start();

error_reporting(0);

if (isset($_POST['Id'])) { $login = $_POST['Id']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['name'])) { $expert = $_POST['name']; if ($expert == '') { unset($expert);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (empty($login) or empty($expert)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo '<script>location.replace("Decline_meeting.php");</script>'; exit;
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$login = trim($login);
$expert = stripslashes($expert);
$expert = htmlspecialchars($expert);
$expert = trim($expert);

// В массиве данные для получения доступа к
$settings = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'db_name' =>'football'
];

$link = mysqli_connect($settings['host'],$settings['user'],$settings['password'],$settings['db_name']);

if(!$link)
{
    die('Db connection Error!' .mysqli_connect_errno().' error message'.mysqli_connect_error());
}

mysqli_set_charset ($link , 'utf8');

$query = "UPDATE match_of_footbal SET Status='$expert' WHERE id_match = '$login'";

$result = mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));

if($res === false)
{
    echo mysqli_error($link);
}
else
{
    echo "<br>Переназначение произошло";
    $query = "SELECT * FROM `match_of_footbal` WHERE id_match ='$login'";
    $result = mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));
    $rows = mysqli_num_rows($result);//Количество строк в запросе
    echo "<table class=\"table\" cellspacing='0' ><tr><th>Id встречи</th><th>Первая команда</th><th>Вторая команда</th><th>Стадион</th><th>Цена</th><th>Дата</th><th>Время</th><th>Забито 1-й командой</th><th>Забито 2-й командой</th><th>Статус встречи</th></tr>";
    for($i = 0; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0 ; $j < 10 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}
mysqli_close($link);

?>
</body>
</html>