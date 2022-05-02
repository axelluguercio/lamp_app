{include file='../header.tpl'}

<h1 class="h1"> {$titulo} </h1>

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
    {if {$error}}
        <div class="alert alert-danger" role="alert">
            {$error}
        </div>
    {/if}
</div>

{include file='../footer.tpl'}