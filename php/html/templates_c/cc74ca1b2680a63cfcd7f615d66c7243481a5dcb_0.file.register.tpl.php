<?php
/* Smarty version 3.1.39, created on 2021-11-29 18:10:22
  from '/var/www/html/tpe-2/templates/auth_templates/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61a5178e3dfd59_10344652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc74ca1b2680a63cfcd7f615d66c7243481a5dcb' => 
    array (
      0 => '/var/www/html/tpe-2/templates/auth_templates/register.tpl',
      1 => 1638209419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_61a5178e3dfd59_10344652 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="h1"> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<form name='formulario' method='POST' action='register/'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type='text' name='nombre' value='' class="form-control">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type='email' placeholder='example@example.com' name='email' value='' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type='password' placeholder='minimo 6 caracteres' name='password' value='' class="form-control" id="exampleInputPassword1">
    </div>
   <input type='submit' value='Registrarse' class="btn btn-primary"/>
</form>

<div class='mt-3 mb-3'>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['error']->value;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1) {?>
         <div class="alert alert-danger" role="alert">
            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

        </div>
    <?php }?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
