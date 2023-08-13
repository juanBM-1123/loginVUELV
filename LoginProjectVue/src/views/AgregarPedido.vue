<script setup>
    import { useAuthStore } from '../stores/auth';
    import Logout from '../components/Logout.vue'

    const userStore = useAuthStore();
</script>

<template>
   <main>
    <div>
        <Logout></Logout>
    </div>
    <div>
        Aqui estaran sus pedidos.
        {{ userStore.user }}
        {{ userStore.token }}
        <ul>
            <li v-for = "pedido in pedidosHechos" :key="pedido.name_pedido">
            {{ pedido }}
            </li>
        </ul>
    </div>
   </main>
</template>
<script>
    import axios from 'axios';
    export default {
        data(){
            return {
                pedidosHechos:null,
            }
        },
        mounted(){
            this.obtenerPedidos();
        },
        methods:{
            obtenerPedidos(){
                axios.get("http://127.0.0.1:8000/api/pedidos")
                .then((response)=>{console.log("se obtuvieron los pedidos con exito"); console.log(response.data);
                this.pedidosHechos = response.data;
            })
                .catch((response)=>{console.log("Los pedidos no se pudieron recuperar");console.log(response)});
            }
        }
    }
</script>
