<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Footbal administration</title>
    <link rel="stylesheet" href="Style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
session_start();
error_reporting(0);
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);

//Данные для БД
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

$query = "SELECT * FROM names WHERE login='$login'";

$result = mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));
if($res === false)
{
    echo mysqli_error($link);
}
else
{
    $row = mysqli_fetch_row($result);
    if(!mysqli_num_rows($result))
    {
        echo "<div id=\"login-form\">
    <h1>Попробовать снова</h1>
    <fieldset>
        <form action=\"index.php\" method=\"post\">
            <input type=\"submit\" value=\"На главную\">
        </form>
    </fieldset>
</div>
<h2>Введенный вами пароль или логин не верны</h2>";
    }
    else{
        if($row[2]==$password){
            $_SESSION['login']=$row[1];
            $_SESSION['password']=$row[0];
            echo '<script>location.replace("core/Site.php");</script>'; exit;
        }
        else{
            echo "
<div id=\"login-form\">
    <h1>Попробовать снова</h1>
    <fieldset>
        <form action=\"index.php\" method=\"post\">
            <input type=\"submit\" value=\"На главную\">
        </form>
    </fieldset>
</div>
<h2>Введенный вами пароль или логин не верны</h2>";
        }
    }
    mysqli_free_result($result);
}
mysqli_close($link);
?>
</body>
</html>
