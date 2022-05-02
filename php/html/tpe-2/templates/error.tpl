<script>
    {if isset({$errors})}
        {foreach from=$errors item=err}
            alert({$err});
        {/foreach}
    {/if}
</script>