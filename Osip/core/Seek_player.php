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

if (isset($_POST['Id'])) { $login = $_POST['Id']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (empty($login)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo '<script>location.replace("Seek_in_Database.php");</script>'; exit;
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$login = trim($login);

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

$query = "SELECT * FROM players WHERE Name='$login'";

$result = mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));

if($result === false)
{
    echo mysqli_error($link);
}
else
{
    $rows = mysqli_num_rows($result);//Количество строк в запросе
    echo "<table class=\"table\" cellspacing='0' ><tr><th>Id игрока</th><th>Имя игрока</th><th>Возраст</th><th>Номер в команде</th><th>Команда</th></tr>";
    for($i = 0; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0 ; $j < 5 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}
mysqli_close($link);

?>
</body>
</html>