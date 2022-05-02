<?php
/* Smarty version 3.1.39, created on 2021-11-25 18:06:23
  from '/var/www/html/tpe-2/templates/marca_templates/modificando_marca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619fd09fe8c9a5_79578561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a64cfad60fbf32e0dbc0abe91381e1e7a7a459e4' => 
    array (
      0 => '/var/www/html/tpe-2/templates/marca_templates/modificando_marca.tpl',
      1 => 1637690176,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_619fd09fe8c9a5_79578561 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<form name='formulario' method='GET' action='modificar_marca/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type='text' name='nombre' value='<?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
' class="form-control">
         <label for="exampleInputEmail1" class="form-label">Origen</label>
        <input type='text' name='origen' value='<?php echo $_smarty_tpl->tpl_vars['marca']->value->origen;?>
' class="form-control">
    </div>
    <input type='submit' value='Modificar' class="btn btn-primary" />
</form>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
