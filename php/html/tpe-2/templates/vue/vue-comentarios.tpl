{literal}

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

{/literal}
