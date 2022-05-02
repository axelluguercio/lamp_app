<?php
/* Smarty version 3.1.39, created on 2021-11-27 20:19:31
  from '/var/www/html/tpe-2/templates/vue/vue-crear-comentario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61a292d32e77a3_43336362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b9fe75326abe81586c3e8877641a7f7781c641f' => 
    array (
      0 => '/var/www/html/tpe-2/templates/vue/vue-crear-comentario.tpl',
      1 => 1638044369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a292d32e77a3_43336362 (Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="template-vue-crear-comentario">
    <h1 class="h1"> {{ subtitle }} </h1>
    <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
        <form @submit.prevent="addRemark">
            <div class="form-group">
                <h4>Su opinion</h4>
                <p style="white-space: pre-line;"> {{ message }} </p>
                <br>
                <textarea v-model="message" placeholder="agregar su opinion" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <select v-model="selected" class="form-control">
                    <option disabled value="">Elija un puntaje</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
                    <span>Puntaje seleccionado: {{ selected }} </span>
                </select> 
            </div>
            <input type="submit" value="comentar" class="btn btn-primary">
        </form>
    </div>
</section>

<?php }
}
