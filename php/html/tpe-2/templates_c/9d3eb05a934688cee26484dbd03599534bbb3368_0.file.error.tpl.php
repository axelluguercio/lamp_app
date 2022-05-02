<?php
/* Smarty version 3.1.39, created on 2021-11-28 16:42:12
  from '/var/www/html/tpe-2/templates/error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61a3b164931019_72249627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d3eb05a934688cee26484dbd03599534bbb3368' => 
    array (
      0 => '/var/www/html/tpe-2/templates/error.tpl',
      1 => 1638117613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a3b164931019_72249627 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['errors']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
            alert(<?php echo $_smarty_tpl->tpl_vars['err']->value;?>
);
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }
echo '</script'; ?>
><?php }
}
