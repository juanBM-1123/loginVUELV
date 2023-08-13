<script setup>
import { useAuthStore } from '../stores/auth';
import {ref} from 'vue';
const userStore = useAuthStore();
const form = ref({email:' ',password:' '});
</script>
<template>
    {{ userStore.user }}
    <div class="container_login">
        <form action="" method="post" @submit.prevent="$event=>userStore.login(form)">
            <div>
            <p>{{ mensajeBienvenida }}</p>
            <label for="username">Username</label><br>
            <input type="text" id="username" v-model="form.email"><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" v-model="form.password">
        </div>
        <div>
            <input type="submit" value="Iniciar Sesion" >
        </div>
        </form>
        <div>
            {{ form }}
        </div>
    </div>
</template>
<script>
import axios from 'axios';
 export default {
    components:{

    },
    data(){
        return{
            mensajeBienvenida:"Login",
            //username:" ",
            //password:" ",
            seInicioSesion:false,
            seEstablecioProteccionCSRF:false
        }
    },
    methods:{
        /*Aqui agregamos funciones*/
        iniciarSesion(event){
           event.preventDefault();
           //let formUser = {"email":this.email,"password":this.password};
            //userStore.getSessionToken();
            //userStore.login(formUser);
        },
        obtenerProteccionCSRFLogin(dataUser){
            axios.get("http://127.0.0.1:8000/sanctum/csrf-cookie")
            .then(
                response=>{
                    console.log(response);
                     axios.post("http://127.0.0.1:8000/api/login",dataUser).then(
                response=>{
                    console.log(response);
                    window.alert("Has iniciado sesion.");
                    
                }
            ).catch(
                response=>{
                    console.log(response);
                }
            );
                }
            )
            .catch(
                response=>{
                    console.log(response);
                }
            );
        },
        login(dataUser){
             axios.post("http://127.0.0.1:8000/api/login",dataUser).then(
                response=>{
                    console.log(response);
                }
            ).catch(
                response=>{
                    console.log(response);
                }
            );
        }
    },

 }
</script>
<style>
.container_login{
    display: flex;
    align-content: center;
    justify-content: center;
}
</style>