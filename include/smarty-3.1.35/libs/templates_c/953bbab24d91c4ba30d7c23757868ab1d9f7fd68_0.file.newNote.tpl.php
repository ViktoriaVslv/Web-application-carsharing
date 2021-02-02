<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-22 11:19:47
  from 'C:\Users\aser\Documents\NetBeansProjects\Autopark\web\templates\newNote.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fba49533e21a9_03539204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '953bbab24d91c4ba30d7c23757868ab1d9f7fd68' => 
    array (
      0 => 'C:\\Users\\aser\\Documents\\NetBeansProjects\\Autopark\\web\\templates\\newNote.tpl',
      1 => 1606039458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fba49533e21a9_03539204 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Каршеринг</title>
    </head>
    <body>
        <div align="center">
            <h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
        <form action="index.php" method="post" name="factoriesForm">
            <input type="hidden"  name="p0" value = "<?php echo $_smarty_tpl->tpl_vars['info']->value[0][0];?>
" >  <br><br>
            <input type="hidden" name="tabName" value = "<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" >
                
            <?php if ($_smarty_tpl->tpl_vars['flag']->value == "Submit") {?> 
                <input type="hidden" name="rt" value = <?php $_smarty_tpl->_assignInScope('count', 0);?>>
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['end1']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['end1']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['index']->value[$_smarty_tpl->tpl_vars['count']->value]) {?>
                        <?php echo $_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['i']->value];?>
: <select name="p<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                            <?php
$_smarty_tpl->tpl_vars['x'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['x']->step = 1;$_smarty_tpl->tpl_vars['x']->total = (int) ceil(($_smarty_tpl->tpl_vars['x']->step > 0 ? $_smarty_tpl->tpl_vars['endList']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['endList']->value)+1)/abs($_smarty_tpl->tpl_vars['x']->step));
if ($_smarty_tpl->tpl_vars['x']->total > 0) {
for ($_smarty_tpl->tpl_vars['x']->value = 0, $_smarty_tpl->tpl_vars['x']->iteration = 1;$_smarty_tpl->tpl_vars['x']->iteration <= $_smarty_tpl->tpl_vars['x']->total;$_smarty_tpl->tpl_vars['x']->value += $_smarty_tpl->tpl_vars['x']->step, $_smarty_tpl->tpl_vars['x']->iteration++) {
$_smarty_tpl->tpl_vars['x']->first = $_smarty_tpl->tpl_vars['x']->iteration === 1;$_smarty_tpl->tpl_vars['x']->last = $_smarty_tpl->tpl_vars['x']->iteration === $_smarty_tpl->tpl_vars['x']->total;?>
                                <?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['x']->value][$_smarty_tpl->tpl_vars['count']->value*2] != '') {?>
                                    <option name="p<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value = "<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['x']->value][$_smarty_tpl->tpl_vars['count']->value*2+1];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['x']->value][$_smarty_tpl->tpl_vars['count']->value*2];?>
</option>
                                <?php }?>
                            <?php }
}
?>
                        </select>
                        <br><br>
                        <input type="hidden" name="yu" value = <?php echo $_smarty_tpl->tpl_vars['count']->value++;?>
>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['i']->value];?>
: <input  type="text"  name="p<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value = "<?php echo $_smarty_tpl->tpl_vars['info']->value[0][$_smarty_tpl->tpl_vars['i']->value];?>
" ><br>
                        <font color="red"><?php echo $_smarty_tpl->tpl_vars['wrongFields']->value[$_smarty_tpl->tpl_vars['i']->value];?>
  <br><br></font>
                    <?php }?>
                <?php }
}
?>
                <button type="Submit" name="page" value="<?php echo $_smarty_tpl->tpl_vars['func']->value;?>
"> Сохранить </button><br><br>
                <button type="Submit" name="page" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"> Отмена </button><br><br>
            <?php } else { ?>
                <input type="hidden" name="" value = <?php $_smarty_tpl->_assignInScope('count', 0);?>>
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['end1']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['end1']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['index']->value[$_smarty_tpl->tpl_vars['count']->value]) {?>
                        <?php echo $_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['i']->value];?>
: <input type="text"  readonly name="p<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value = "<?php echo $_smarty_tpl->tpl_vars['list1']->value[$_smarty_tpl->tpl_vars['count']->value];?>
" >  <br><br>
                                     <input type="hidden"   name="p<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value = "<?php echo $_smarty_tpl->tpl_vars['info']->value[0][$_smarty_tpl->tpl_vars['i']->value];?>
" >
                                     <input type="hidden" name="yu" value = <?php echo $_smarty_tpl->tpl_vars['count']->value++;?>
>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['head']->value[$_smarty_tpl->tpl_vars['i']->value];?>
: <input type="text"   readonly name="p<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value = "<?php echo $_smarty_tpl->tpl_vars['info']->value[0][$_smarty_tpl->tpl_vars['i']->value];?>
" >  <br><br>
                    <?php }?>
                <?php }
}
?>
                <button type="Submit" name="page" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"> Назад </button><br><br>
            <?php }?>
            <input type="hidden" name="pc" value = "<?php echo $_smarty_tpl->tpl_vars['pc']->value;?>
">
            <input type="hidden" name="pc_num" value = "<?php echo $_smarty_tpl->tpl_vars['pc_num']->value;?>
">
        </form>
        </div>
         
    </body>
</html><?php }
}
