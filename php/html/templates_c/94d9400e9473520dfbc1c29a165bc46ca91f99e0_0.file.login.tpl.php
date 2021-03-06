<?php
/* Smarty version 3.1.39, created on 2021-11-29 18:08:38
  from '/var/www/html/tpe-2/templates/auth_templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61a5172671cc82_18990961',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94d9400e9473520dfbc1c29a165bc46ca91f99e0' => 
    array (
      0 => '/var/www/html/tpe-2/templates/auth_templates/login.tpl',
      1 => 1638209110,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_61a5172671cc82_18990961 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="h1"> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </h1>

<form name='formulario' method='POST' action='login/'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type='email' placeholder='example@example.com' name='email' value='' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">No vamos a compartir su informcion con nadie</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type='password' placeholder='Ingrese su password...' name='password' value='' class="form-control">
    </div>
   <input type='submit' value='Ingresar'  class="btn btn-primary"/>
</form>

<div class="mt-3">
    <h2 class="h2"> No esta Registrado? <a href='register/'> Registrarse </a>  </h2>
</div>

<div class="mt-3 mb-3">
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
