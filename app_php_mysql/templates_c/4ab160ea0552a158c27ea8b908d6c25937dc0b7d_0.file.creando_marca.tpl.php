<?php
/* Smarty version 3.1.39, created on 2021-11-25 18:03:20
  from '/var/www/html/tpe-2/templates/marca_templates/creando_marca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619fcfe8041643_42424760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ab160ea0552a158c27ea8b908d6c25937dc0b7d' => 
    array (
      0 => '/var/www/html/tpe-2/templates/marca_templates/creando_marca.tpl',
      1 => 1637690057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_619fcfe8041643_42424760 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<form name='formulario' method='GET' action='insertar_marca'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre marca</label>
        <input type='text' name='nombre' value='' class="form-control">
        <label for="exampleInputEmail1" class="form-label">Origen</label>
        <input type='text' name='origen' value='' class="form-control">
    </div>
   <input type='submit' value='Crear' class="btn btn-primary" />
</form>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
