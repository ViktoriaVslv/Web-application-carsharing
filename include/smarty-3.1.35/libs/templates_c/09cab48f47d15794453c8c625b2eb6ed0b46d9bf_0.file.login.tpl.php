<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-29 16:07:01
  from 'C:\Users\aser\Documents\NetBeansProjects\Autopark\web\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc3c725e12126_48346323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09cab48f47d15794453c8c625b2eb6ed0b46d9bf' => 
    array (
      0 => 'C:\\Users\\aser\\Documents\\NetBeansProjects\\Autopark\\web\\templates\\login.tpl',
      1 => 1606666016,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc3c725e12126_48346323 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
                    <font color="red"><?php echo $_smarty_tpl->tpl_vars['er']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['wrongFields1']->value[0];?>
  <br><br></font>
                Пароль: <input  type="password"  name="pass" value = "" ><br>
                        <font color="red"><?php echo $_smarty_tpl->tpl_vars['er2']->value;
echo $_smarty_tpl->tpl_vars['wrongFields1']->value[1];?>
  <br></font>
                <button type="Submit" name="page" value="enter"> Войти </button><br><br>
             </form>
            <form action="index.php" method="post" name="modelsForm">
                <button type="Submit" name="page" value="showMenu">Просмотр без авторизации</button><br><br>
            </form>
        </div>
    </body>
</html>
<?php }
}
