<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-28 13:26:54
  from 'C:\Users\aser\Documents\NetBeansProjects\Autopark\web\templates\viewTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc2501ebc9273_31375549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66fea41f6eaf1559ea6bfab6f073bd48c7392609' => 
    array (
      0 => 'C:\\Users\\aser\\Documents\\NetBeansProjects\\Autopark\\web\\templates\\viewTable.tpl',
      1 => 1606569992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:..\\javascript\\alert.js' => 1,
  ),
),false)) {
function content_5fc2501ebc9273_31375549 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Каршеринг</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <style>
            .b1 {
                background: navy; /* Синий цвет фона */
                color: white; /* Белые буквы */
                font-size: 9pt; /* Размер шрифта в пунктах */
            }
        </style>
        <?php echo '<script'; ?>
 type="text/javascript">  
            <?php $_smarty_tpl->_subTemplateRender("file:..\javascript\alert.js", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php echo '</script'; ?>
>   
    </head>
        
    <body>
       <?php if ($_smarty_tpl->tpl_vars['role']->value != "Admin" || $_smarty_tpl->tpl_vars['name']->value == "users") {?>
        <form action="index.php" method="post" name="factoriesForm">
            <button type="Submit" name="page" value="showMenu"> Меню </button><br><br>
        </form>
        <?php } else { ?>
            <form action="index.php" method="post" name="factoriesForm">
                <button type="Submit" name="page" value="showMenu"> Меню </button><br><br>
            </form>
    
        <form action="index.php" method="post" >
            <input type="hidden" name="tabName" value = "<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" >
            <button type="Submit" name="page" value="add"> Добавить</button><br><br>
            <input type="hidden" name="pc" value = <?php echo $_smarty_tpl->tpl_vars['pcI']->value;?>
>
            <input type="hidden" name="pc_num" value = "<?php echo $_smarty_tpl->tpl_vars['pc_num']->value;?>
">
        </form>
        <?php }?>

        <table id="myTable2" class="table_sort" border="1" width="100%" cellpadding="5">
            <thead>
                <tr>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['end2']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['end2']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                        <th onclick="sortTable(<?php echo $_smarty_tpl->tpl_vars['i']->value-1;?>
)" width="10%"><?php echo $_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</th>
                    <?php }
}
?>
                    <th  width="10%">Опции</th>
                </tr>
            </thead>
            <tbody>
                
                <?php if (($_smarty_tpl->tpl_vars['end1']->value > $_smarty_tpl->tpl_vars['pcI']->value*$_smarty_tpl->tpl_vars['pc_num']->value+($_smarty_tpl->tpl_vars['pc_num']->value-1))) {?>
                <?php $_smarty_tpl->_assignInScope('end1', $_smarty_tpl->tpl_vars['pcI']->value*$_smarty_tpl->tpl_vars['pc_num']->value+($_smarty_tpl->tpl_vars['pc_num']->value-1));?>
                <?php }?>
               
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->tpl_vars['end1']->value)+1 - (($_smarty_tpl->tpl_vars['pcI']->value*$_smarty_tpl->tpl_vars['pc_num']->value)) : ($_smarty_tpl->tpl_vars['pcI']->value*$_smarty_tpl->tpl_vars['pc_num']->value)-(($_smarty_tpl->tpl_vars['end1']->value))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = ($_smarty_tpl->tpl_vars['pcI']->value*$_smarty_tpl->tpl_vars['pc_num']->value), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                <tr>
                    <?php
$_smarty_tpl->tpl_vars['j'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['j']->step = 1;$_smarty_tpl->tpl_vars['j']->total = (int) ceil(($_smarty_tpl->tpl_vars['j']->step > 0 ? $_smarty_tpl->tpl_vars['end2']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['end2']->value)+1)/abs($_smarty_tpl->tpl_vars['j']->step));
if ($_smarty_tpl->tpl_vars['j']->total > 0) {
for ($_smarty_tpl->tpl_vars['j']->value = 1, $_smarty_tpl->tpl_vars['j']->iteration = 1;$_smarty_tpl->tpl_vars['j']->iteration <= $_smarty_tpl->tpl_vars['j']->total;$_smarty_tpl->tpl_vars['j']->value += $_smarty_tpl->tpl_vars['j']->step, $_smarty_tpl->tpl_vars['j']->iteration++) {
$_smarty_tpl->tpl_vars['j']->first = $_smarty_tpl->tpl_vars['j']->iteration === 1;$_smarty_tpl->tpl_vars['j']->last = $_smarty_tpl->tpl_vars['j']->iteration === $_smarty_tpl->tpl_vars['j']->total;?>
                        <?php if ($_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['j']->value] == 'Изображение') {?>
                           <td> <img src="<?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value];?>
"></td>
                        <?php } elseif ($_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['j']->value] == 'Сайт') {?>
                             <td width="10%"><a href="<?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value];?>
</td>
                        <?php } elseif ($_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['j']->value] == 'Роль') {?>
                            <?php if ($_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][2]) {?>
                                 <td width="10%">Админ</td>
                            <?php } else { ?>
                                <td width="10%">Пользователь</td>
                            <?php }?>
                        <?php } else { ?>
                            <td width="10%"><?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value];?>
</td>
                        <?php }?>
                    <?php }
}
?>
                    <td width="10%">
                        <form action="index.php" method="post" name="factoriesForm" >
                            <input type="hidden" name="id" value = "<?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][0];?>
" >
                            <input type="hidden" name="pc" value = "<?php echo $_smarty_tpl->tpl_vars['pcI']->value;?>
">
                            <input type="hidden" name="pc_num" value = "<?php echo $_smarty_tpl->tpl_vars['pc_num']->value;?>
">
                            <input type="hidden" name="tabName" value = "<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" >
                            <input type="hidden" name="page" value = "show" >
                            <?php if ($_smarty_tpl->tpl_vars['role']->value != "Admin") {?>
                                <button type= "submit" name ="flag"  value ="hidden">Просмотр</button><br>
                            <?php } else { ?>
                                <?php if ($_smarty_tpl->tpl_vars['name']->value == "users") {?>
                                    <?php if ($_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][2] != 1) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][3]) {?>
                                       
                                       <button type= "submit" name ="login"  value ="<?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][1];?>
">Разбанить</button><br>
                                       <input type="hidden" name="ban" value = "0" >
                                       <input type="hidden" name="page" value = "ban" >
                                    <?php } else { ?>
                                        <button type= "submit" name ="login"  value ="<?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][1];?>
">Забаниить</button><br>
                                        <input type="hidden" name="ban" value = "1" >
                                        <input type="hidden" name="page" value = "ban" > 
                                    <?php }?>
                                    <?php }?>
                                <?php } else { ?>
                                    <button type= "submit" id = "search"  name ="page" onClick ="return isDelete();"   value ="delete" >Удалить </button><br>
                                    <button type= "submit" name ="flag"  value ="Submit">Изменить</button><br>
                                    <button type= "submit" name ="flag"  value ="hidden">Просмотр</button><br>
                                <?php }?>
                            <?php }?>
                        
                        </form>
                    </td>
                </tr>
            </tbody>
            <?php }
}
?>
        </table> 
        <div align="center">
            <table>   
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pc']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['pc']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                   <th>
                        <form action="view.php" method="post" name="factoriesForm" >
                             <input type="hidden" name="pc" value = "<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                             <input type="hidden" name="pc_num" value = "<?php echo $_smarty_tpl->tpl_vars['pc_num']->value;?>
">
                             <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['pcI']->value) {?> 
                                 <button type= "submit" class ="b1" name ="page"  value ="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</button>
                             <?php } else { ?>
                                 <button type= "submit" name ="page"  value ="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</button>
                             <?php }?>
                         </form>
                    </th>
                <?php }
}
?>
             </table>
             <table>
                  <td>
                   Количество записей на странице 
                   </td>
                   <td>
                   <?php if ($_smarty_tpl->tpl_vars['pc_num']->value == 5) {?> 
                   <form action="view.php" method="post" name="factoriesForm" >
                        <input type="hidden" name="pc_num" value = "5">
                        <input type="hidden" name="pc" value = "0">
                        <button type= "submit" name ="page" class ="b1" value ="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">5</button> 
                    </form>
                    </td>
                    <td>
                        
                   <form action="view.php" method="post" name="factoriesForm" >
                        <input type="hidden" name="pc_num" value = "10">
                        <input type="hidden" name="pc" value = "0">
                        <button type= "submit"   name ="page"  value ="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">10</button> 
                    </form>
                    </td>
                    <?php } else { ?>
                        <form action="view.php" method="post" name="factoriesForm" >
                        <input type="hidden" name="pc_num" value = "5">
                        <input type="hidden" name="pc" value = "0">
                        <button type= "submit" name ="page"  value ="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">5</button> 
                    </form>
                    </td>
                    <td>
                        
                   <form action="view.php" method="post" name="factoriesForm" >
                        <input type="hidden" name="pc_num" value = "10">
                        <input type="hidden" name="pc" value = "0">
                        <button type= "submit"   name ="page" class ="b1" value ="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">10</button> 
                    </form>
                    </td>
                        
                    <?php }?>
                
             </table> 
         </div>

       
        </body>
    </html>
<?php }
}
