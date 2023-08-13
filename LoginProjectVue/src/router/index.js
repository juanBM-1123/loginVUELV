import { createRouter, createWebHistory } from 'vue-router';
import { useAuthStore } from '../stores/auth';
import HomeView from '../views/HomeView.vue';
import InicioSesion from '../views/InicioSesion.vue';
import RegistrarUsuario from '../views/RegistrarUsuario.vue';
import AgregarPedido from '../views/AgregarPedido.vue';
import axios from 'axios';


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path:'/iniciar_sesion',
      name:'iniciar_sesion',
      component:InicioSesion
    },
    {
      path:'/registrar_usuario',
      name:'registrar_usuario',
      component:RegistrarUsuario
    },
    {
      path:'/agregar_pedido',
      name:'agregar_pedido',
      component:AgregarPedido
    },
  ]
});



router.beforeEach((to,from)=>{
  const userStore = useAuthStore();
  const rutasPublicas = ["/iniciar_sesion","/registrar_usuario"];
  if(!rutasPublicas.includes(to.path) && !userStore.estaAutenticado){
      return "/iniciar_sesion";
  }
  if(userStore.estaAutenticado){
    axios.defaults.headers.common = {'Authorization': "Bearer " + userStore.token };
  }
})

export default router;