{literal}

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

{/literal}