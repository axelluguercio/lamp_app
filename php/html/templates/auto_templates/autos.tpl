{include file='../header.tpl'}

{if {$titulo}}
    <h1 class="h1"> {$titulo} </h1>
{else} 
    <h1 class="h1"> {$marca->nombre} </h1>
{/if}

{if !empty($message)}
    {if {$message} == 'success'}
        <div class="alert alert-success" role="alert">
    {else}
        <div class="alert alert-danger" role="alert">
    {/if}
        {$message}
    </div>
{/if}

<table class="table table-striped">
    <thead>
        <th>
            <tr>
            <td> Foto </td>
            <td> Modelo </td>
            <td> Año </td>
            </tr>
        </th>
    </thead>
    <tbody>
        {foreach from=$autos item=auto} 
	    <tr>
            <td> <img {if empty({$auto->img})} src="empty.jpg" {else} src={$auto->img} {/if} height="50px" weight="50px"> </td>
		    <td> <a href='auto/{$auto->id_auto}'> {$auto->modelo} </a> </td> 
            <td> {$auto->anio} </td>
            {if isset($smarty.session.ID_USER)}
                {if isset($buttons)}
                    <td> <a href='borrar_auto/{$auto->id_auto}'> eliminar </a> </td>
                    <td> <a href='modificar_auto/{$auto->id_auto}'> editar </a> </td>
                {/if}
            {/if}
        </tr>
        {/foreach} 
    </tbody>
</table>
<div class="mb-3">
    {if isset($pag)}
        {for $foo=1 to $pag}
            {if !isset({$marca})}
                <a href='autos/?pagina={$foo}'> {$foo} </a>
            {/if}
        {/for}
    {/if}
</div>

{include file='../footer.tpl'}
