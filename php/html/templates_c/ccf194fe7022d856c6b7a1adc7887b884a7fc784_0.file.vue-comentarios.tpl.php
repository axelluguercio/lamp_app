<?php
/* Smarty version 3.1.39, created on 2021-11-27 21:35:04
  from '/var/www/html/tpe-2/templates/vue/vue-comentarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61a2a488d347a0_60318941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccf194fe7022d856c6b7a1adc7887b884a7fc784' => 
    array (
      0 => '/var/www/html/tpe-2/templates/vue/vue-comentarios.tpl',
      1 => 1638048903,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61a2a488d347a0_60318941 (Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="template-vue-comentarios">
        <div class="col-sm-5 col-md-6 col-12 pb-4">
            <h1>{{ subtitle }}</h1>
            <div class="comment mt-4 text-justify float-left">
                <form name='formulario'>
                    <label for="exampleInputEmail1" class="form-label">Filtrar por puntuacion</label>
                    <select v-model="filtro" class="form-control">
                        <option disabled value="">Elija un puntaje</option>
                        <option value=''></option>
                        <option value='1'> 1 </option> 
                        <option value='2'> 2 </option>
                        <option value='3'> 3 </option>
                        <option value='4'> 4 </option>
                        <option value='5'> 5 </option>
                    </select>
                    <button @click="handlerFilter" :value='filtro' class="btn btn-primary"> Filtrar </button>
                </form>

                <div class="comment mt-4 text-justify float-left" v-for="comt in comts">
                    <h4>{{ comt.nombre }}</h4> <span>{{ comt.puntuacion }} </span>  <br>
                    <p>{{ comt.descripcion }}</p>
                    <button @click="handlerButton" :value="comt.id" class="btn btn-secondary"> Eliminar </button>
                </div>  
                <div class='mb-2'>
                    {{ mess_err }}
                </div>
            </div>
        </div>
    </div>
</section>


<?php }
}
