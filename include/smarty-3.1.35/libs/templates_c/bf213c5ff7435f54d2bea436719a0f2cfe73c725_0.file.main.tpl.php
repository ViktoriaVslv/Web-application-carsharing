<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-28 13:24:26
  from 'C:\Users\aser\Documents\NetBeansProjects\Autopark\web\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc24f8ad2de12_00101019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf213c5ff7435f54d2bea436719a0f2cfe73c725' => 
    array (
      0 => 'C:\\Users\\aser\\Documents\\NetBeansProjects\\Autopark\\web\\templates\\main.tpl',
      1 => 1606569858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc24f8ad2de12_00101019 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Каршеринг</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
    <body>
        <form action="index.php" method="post" name="factoriesForm">
                <button type="Submit" name="page1" value=""> Выйти</button><br><br>
        </form>
        <div align="center">
            <h1>Каршеринг</h1>
            <?php if ($_smarty_tpl->tpl_vars['role']->value == "noAuto") {?>
                <form action="index.php" method="post" name="modelsForm">
                    <button type="Submit" name="page" value="auto"> Автомобили </button><br><br>
                </form>
                <form action="" method="post" name="typeForm">
                    <button type="Submit" name="page" value="model1"> Марки автомобилей </button><br><br>
                </form>
            <?php }?>
           
            <?php if ($_smarty_tpl->tpl_vars['role']->value == "Auto") {?>
                <form action="index.php" method="post" name="modelsForm">
                    <button type="Submit" name="page" value="auto"> Автомобили </button><br><br>
                </form>
                <form action="" method="post" name="typeForm">
                    <button type="Submit" name="page" value="model1"> Марки автомобилей </button><br><br>
                </form>
                <form action="" method="post" name="ordersForm">
                    <button type="Submit" name="page" value="orders"> Заказы </button><br><br>
                </form>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['role']->value == "Admin") {?>
                 <form action="index.php" method="post" name="modelsForm">
                    <button type="Submit" name="page" value="auto"> Автомобили </button><br><br>
                </form>
                <form action="" method="post" name="typeForm">
                    <button type="Submit" name="page" value="model1"> Марки автомобилей </button><br><br>
                </form>
                   <form action="index.php" method="post" name="cityForm">
                <button type="Submit" name="page" value="city"> Города </button><br><br>
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
                <form action="" method="post" name="ordersForm">
                <button type="Submit" name="page" value="users"> Пользователи </button><br><br>
                </form>
            <?php }?>
        
        </div>
    </body>
</html><?php }
}
