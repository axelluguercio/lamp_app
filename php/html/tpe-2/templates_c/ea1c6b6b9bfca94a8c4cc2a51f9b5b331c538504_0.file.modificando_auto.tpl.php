<?php
/* Smarty version 3.1.39, created on 2021-11-29 19:08:29
  from '/var/www/html/tpe-2/templates/auto_templates/modificando_auto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61a5252d3c7670_86532231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea1c6b6b9bfca94a8c4cc2a51f9b5b331c538504' => 
    array (
      0 => '/var/www/html/tpe-2/templates/auto_templates/modificando_auto.tpl',
      1 => 1638212908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_61a5252d3c7670_86532231 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<form name='formulario' method='POST' action='modificar_auto' enctype='multipart/form-data'>
    <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['auto']->value->id_auto;?>
'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Modelo</label>
        <input type='text' name='modelo' value='<?php echo $_smarty_tpl->tpl_vars['auto']->value->modelo;?>
' class="form-control">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Año</label>
        <input type='text' name='anio' value='<?php echo $_smarty_tpl->tpl_vars['auto']->value->anio;?>
' class="form-control">
     </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cargar imagen</label>
        <input type="file" name="img" class="form-control">
    </div>
    <select name='id_marca' class="form-control">
	    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
$_smarty_tpl->tpl_vars['marca']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['marca']->do_else = false;
?>
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['auto']->value->id_marca;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable1 == $_prefixVariable2) {?>
		        <option value='<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
' selected='selected'> <?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
 </option> 
            <?php } else { ?>
                <option value='<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
'> <?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
 </option> 
            <?php }?>
	    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</select>
    <input type='submit' value='Modificar' class="btn btn-primary" />
</form>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
