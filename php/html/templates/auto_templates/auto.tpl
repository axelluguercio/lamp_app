{include file='../header.tpl'}

<div class="mb-3">
    <img src='{$auto->img}' class="img-fluid" max-width: 100% height: auto>
</div>
<div class="mb-3" id='div-data' data-auto="{$auto->id_auto}" data-auto-modelo="{$auto->modelo}" data-user-id="{$smarty.session.ID_USER}" data-api-pass='{$smarty.session.PASSWORD}' data-api-user='{$smarty.session.USERNAME}'>
    <h2> {$auto->modelo} </h2>
    <p> modelo {$auto->anio} </p>
</div>

<div class="d-flex flex-row">
    <div class="p-4">
        {include file="vue/vue-comentarios.tpl"}
    </div>
    <div class="p-2">
        {include file="vue/vue-crear-comentario.tpl"}
        
    </div>  
</div>

<script src= "{BASE_URL}/js/fetchs.js"></script>
<script src= "{BASE_URL}/js/dataset.js"></script>
<script src= "{BASE_URL}/js/comentario-auto.js"></script>
<script src= "{BASE_URL}/js/crear_comentario.js"></script>

{include file='../footer.tpl'}