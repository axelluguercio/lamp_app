{include file='../header.tpl'}

<h1 class="h1"> {$titulo} </h1>

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
    {if {$error}}
         <div class="alert alert-danger" role="alert">
            {$error}
        </div>
    {/if}
</div>

{include file='../footer.tpl'}