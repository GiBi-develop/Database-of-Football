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
</div>
<br>
<?php
session_start();

error_reporting(0);

if (isset($_POST['Id'])) { $login = $_POST['Id']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (empty($login)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo '<script>location.replace("Cost.php");</script>'; exit;
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

$query = "SELECT Cost FROM match_of_footbal WHERE id_match='$login'";

$result = mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));

$cost = mysqli_fetch_row($result);

$query = "SELECT teams.win_Last FROM match_of_footbal INNER JOIN teams ON match_of_footbal.id_match='$login' AND match_of_footbal.First_Team = teams.Name";

$result = mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));

$FirstTeam = mysqli_fetch_row($result);

$query = "SELECT teams.win_Last FROM match_of_footbal INNER JOIN teams ON match_of_footbal.id_match='$login' AND match_of_footbal.Second_Team = teams.Name";

$result = mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));

$SecondTeam = mysqli_fetch_row($result);

$query = "SELECT stadium.Capacity FROM stadium INNER JOIN match_of_footbal ON match_of_footbal.id_match = '$login' AND match_of_footbal.Stadium = stadium.Id";

$result = mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));

$Capacity = mysqli_fetch_row($result);

$res = $cost[0] + $Capacity[0]/100 + 1000/$FirstTeam[0] + 1000/$SecondTeam[0];
$res = round($res);
echo "<table class=\"table\" cellspacing='0' ><tr><th>Цена</th></tr>";
echo "<tr>";
echo "<td>$res</td>";
echo "</tr>";
?>
</body>
</html>