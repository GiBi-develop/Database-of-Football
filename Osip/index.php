<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Footbal administration</title>
    <link rel="stylesheet" href="Style.css" media="screen" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="login-form">
    <h1>АВТОРИЗИРУЙТЕСЬ НА САЙТЕ</h1>
    <fieldset>
        <form action="Main.php" method="post">
            <input type="text" name="login" required value="Логин" onBlur="if(this.value=='')this.value='Логин'" onFocus="if(this.value=='Логин')this.value='' ">
            <input type="password" name="password" required value="Пароль" onBlur="if(this.value=='')this.value='Пароль'" onFocus="if(this.value=='Пароль')this.value='' ">
            <input type="submit" value="ВОЙТИ">
        </form>
    </fieldset>
</div>
<?php
session_start();
error_reporting(0);
$_SESSION['mes']='Вы вошли на сайт, как гость';
$_SESSION['mes1']='Данные не верны';
if (empty($_SESSION['login']) or empty($_SESSION['password']))
{
    echo '<h2>'.$_SESSION['mes'].'</h2>';
}
else {
    echo '<h2>'.$_SESSION['mes1'].'</h2>';
}
//session_destroy();
?>
</body>
</html>