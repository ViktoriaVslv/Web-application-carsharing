<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-27 11:19:25
  from 'C:\Users\aser\Documents\NetBeansProjects\Autopark\include\smarty-3.1.35\libs\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f98023d8f2158_84122582',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52f7c3d37c527a33c52f2607719fe3075f9ac47f' => 
    array (
      0 => 'C:\\Users\\aser\\Documents\\NetBeansProjects\\Autopark\\include\\smarty-3.1.35\\libs\\templates\\main.tpl',
      1 => 1603795925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f98023d8f2158_84122582 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Каршеринг</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
    <body>
        <div align="center">
            <h1>Каршеринг</h1>
            <form action="index.php" method="post" name="modelsForm">
                <button type="Submit" name="page" value="auto"> Автомобили </button><br><br>
            </form>

            <form action="index.php" method="post" name="cityForm">
                <button type="Submit" name="page" value="city"> Города </button><br><br>
            </form>

            <form action="" method="post" name="typeForm">
                <button type="Submit" name="page" value="model1"> Марки автомобилей </button><br><br>
            </form>

            <form action="" method="post" name="workersForm">
                <button type="Submit" name="page" value="workers"> Работники  </button><br><br>
            </form>

            <form action="" method="post" name="clientsForm">
                <button type="Submit" name="page" value="clients"> Клиенты </button><br><br>
            </form>

            <form action="" method="post" name="ordersForm">
                <button type="Submit" name="page" value="orders"> Заказы </button><br><br>
            </form>

        </div>
    </body>
</html><?php }
}
