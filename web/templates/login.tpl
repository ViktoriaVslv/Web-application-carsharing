<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Каршеринг</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
    <body>
        <div align="center">
            <h1>Авторизация</h1>
            <form action="index.php" method="post" name="modelsForm">
                Логин: <input  type="text"  name="login" value = "" ><br>
                    <font color="red">{$er} {$wrongFields1[0]}  <br><br></font>
                Пароль: <input  type="password"  name="pass" value = "" ><br>
                        <font color="red">{$er2}{$wrongFields1[1]}  <br></font>
                <button type="Submit" name="page" value="enter"> Войти </button><br><br>
             </form>
            <form action="index.php" method="post" name="modelsForm">
                <button type="Submit" name="page" value="showMenu">Просмотр без авторизации</button><br><br>
            </form>
        </div>
    </body>
</html>
