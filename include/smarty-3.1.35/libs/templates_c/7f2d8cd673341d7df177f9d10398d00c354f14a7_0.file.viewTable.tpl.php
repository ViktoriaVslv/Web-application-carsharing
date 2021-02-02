<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-29 11:40:03
  from 'C:\Users\aser\Documents\NetBeansProjects\Autopark\include\smarty-3.1.35\libs\templates\viewTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f9aaa13b0ecc4_83331980',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f2d8cd673341d7df177f9d10398d00c354f14a7' => 
    array (
      0 => 'C:\\Users\\aser\\Documents\\NetBeansProjects\\Autopark\\include\\smarty-3.1.35\\libs\\templates\\viewTable.tpl',
      1 => 1603971598,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f9aaa13b0ecc4_83331980 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Каршеринг</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <?php echo '<script'; ?>
 type="text/javascript">
            function isDelete() {    
  		return confirm("Вы точно хотите удалить запись? :)");   
            }
        
            function sortTable(n) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("myTable2");
                switching = true;
                dir = "asc";
                while (switching) {
                  switching = false;
                  rows = table.getElementsByTagName("TR");
                  for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        switchcount ++;
                    } else {
                        if (switchcount == 0 && dir == "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }

        <?php echo '</script'; ?>
>
        <style>
            .b1 {
                background: navy; /* Синий цвет фона */
                color: white; /* Белые буквы */
                font-size: 9pt; /* Размер шрифта в пунктах */
            }
        </style>
     <!-- <?php echo '<script'; ?>
 language="Javascript" type="text/javascript" src="'C:\Users\aser\Documents\NetBeansProjects\Autopark\web\javascript\alert.js"><?php echo '</script'; ?>
>-->
    </head>
        
    <body>
       
        <form action="index.php" method="post" name="factoriesForm">
            <button type="Submit" name="page1" value=""> Меню </button><br><br>
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
                           <td> <img src=<?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value];?>
></td>
                        <?php } elseif ($_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['j']->value] == 'Сайт') {?>
                             <td width="10%"><a href="<?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value];?>
</td>
                        <?php } else { ?>
                            <td width="10%"><?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][$_smarty_tpl->tpl_vars['j']->value];?>
</td>
                        <?php }?>
                    <?php }
}
?>
                    <td width="10%">
                        <form action="view.php" method="post" name="factoriesForm" >
                            <input type="hidden" name="id" value = "<?php echo $_smarty_tpl->tpl_vars['notes']->value[$_smarty_tpl->tpl_vars['i']->value][0];?>
" >
                            <input type="hidden" name="pc" value = "<?php echo $_smarty_tpl->tpl_vars['pcI']->value;?>
">
                            <input type="hidden" name="pc_num" value = "<?php echo $_smarty_tpl->tpl_vars['pc_num']->value;?>
">
                            <input type="hidden" name="tabName" value = "<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" >
                            <button type= "submit" id = "search"  name ="page" onClick ="return isDelete();"   value ="delete" >Удалить </button><br>
                            <button type= "submit" name ="page"  value ="show">Изменить</button><br>
                            <button type= "submit" name ="page"  value ="show1">Просмотр</button><br>
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
