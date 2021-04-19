<template>
    <div class="container">
        <h3>Registro de Disciplinas</h3>
        <!--Listado de Disciplinas-->
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" v-model="nombre" placeholder="Nombre Disciplinas"></td>
                </tr>
                 <tr>
                    <td>Descripcion</td>
                    <td><input type="text" v-model="descripcion" placeholder="Nombre Descripcion"></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="button" @click="nuevo()">Nuevo</button>
                        <button type="button" @click="guardar()">Guardar</button>
                    </td>
                </tr>
            </table>
            <input type="text" v-model="buscar" placeholder="Nombre Disciplinas">
            <button type="button" @click="listar(buscar)">Buscar por Nombre</button>
        </form>
        <br>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="disciplinas in arrayDisciplinas" :key="disciplinas.id">
                    <td v-text="disciplinas.id"></td>
                    <td v-text="disciplinas.nombre"></td>
                    <td v-text="disciplinas.descripcion"></td>

                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nombre :'',
                descripcion : '',
                buscar : '',
                arrayDisciplinas : []
            }
        },
        methods:{
            listar(buscar){
                let me = this;
                var url='/disciplinas?buscar=' + buscar;
                axios.get(url).then(function(response){
                    me.arrayDisciplinas= response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            guardar(){
                let me = this;
                axios.post('disciplinas/registrar',{
                    'nombre': this.nombre,
                    'descripcion': this.descripcion
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });               
            },
            nuevo(){
                this.nombre = '';
                this.descripcion = '';
            },
        },
        mounted() {
            this.listar(this.buscar);
        }
    }
</script>