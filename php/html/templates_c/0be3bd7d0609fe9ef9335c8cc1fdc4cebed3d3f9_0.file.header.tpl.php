<?php
/* Smarty version 3.1.39, created on 2021-11-29 18:56:20
  from '/var/www/html/tpe-2/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61a52254a07da9_22330894',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0be3bd7d0609fe9ef9335c8cc1fdc4cebed3d3f9' => 
    array (
      0 => '/var/www/html/tpe-2/templates/header.tpl',
      1 => 1638212179,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a52254a07da9_22330894 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.jpg">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"><?php echo '</script'; ?>
>
     <!-- development version, includes helpful console warnings -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"><?php echo '</script'; ?>
>
    <title> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 </title>
</head>
<body class="d-flex flex-column min-vh-100">
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="home/">
                    <img src="favicon.jpg" alt="" width="50" height="50" class="d-inline-block align-text-top">
                    automotriz
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home/"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="buscar/"> Buscar </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="autos/"> Autos </a>
                    </li>
                    <?php if ((isset($_SESSION['ID_USER']))) {?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Nuevo </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="nav-link" href="crear_marca/"> Nueva Marca </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="insertar_auto/"> Nuevo Auto </a>
                                </li>
                            </ul>
                        </li>
                        <?php if ($_SESSION['PERMISSIONS'] == 'A') {?>
                            <li class="nav-item">
                                <a class="nav-link" href="usuarios/"> Usuarios </a>
                            </li>
                        <?php }?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout/"> Salir </a>
                            </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" " href="login/"> Ingresar </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php }
}
