import {defineStore} from 'pinia';
import axios from 'axios';
import router from '../router';

export const useAuthStore = defineStore('authStore',{
    state: ()=>(
        {
            token:"",
            user:null,
            authUrl:"",
            estaAutenticado:false,
        }
    ),
    actions:{
        async getSessionToken(){
            await axios.get("http://127.0.0.1:8000/sanctum/csrf-cookie");
        },
        async login(formUser){
            await this.getSessionToken();
            try {
                const response = await axios.post("http://127.0.0.1:8000/api/login", formUser);
                this.token = response.data.token;
                this.user = response.data.user;
                this.estaAutenticado = true;
                //axios.defaults.headers.commons["Authorization"] = "Bearer" + this.token;
                axios.defaults.headers.common = {'Authorization': "Bearer " + this.token };
                alert("Su token de inicio de sesión es: "+this.token);
                setTimeout(()=>{router.push("/agregar_pedido")},2000);
              } catch (error) {
                console.log(error);
              }
        },
        logout(){
            console.log("Estamos en logout",this.token);
            console.log(this.estaAutenticado);
            axios.post("http://127.0.0.1:8000/api/logout")
            .then(
                (response)=>{
                    this.token = "";
                    this.user = null;
                    this.estaAutenticado = false;
                    router.push("/iniciar_sesion");
                }
            )
            .catch(
                (response)=>{
                    console.log(alert("Por alguna razón no se pudo desloguear XD"));
                    console.log(response.data);
                }
            );
        }
    },
    persist:true
})

