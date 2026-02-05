import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/domain/storage/auth'


const routes = [
  { 
    path: '/', 
    component: () => import('@/presentation/pages/LoginPage.vue'),
    meta:{
      noAuth: true
    }
  },
  { 
    path: '/login', 
    component: () => import('@/presentation/pages/LoginPage.vue'),
    meta:{
      noAuth: true
    }
  },
  { 
    path: '/system',
    component: () => import('@/presentation/layouts/LayoutSystem.vue'),
    meta:{
      requiresAuth: true
    },
    children: [
      { path: '/system', component: () => import('@/presentation/pages/HomePage.vue') },
      { path: '/system/home', component: () => import('@/presentation/pages/HomePage.vue') },
      { path: '/system/productos', component: () => import('@/presentation/pages/ProductosPage.vue') },
      { path: '/system/productos/nuevo', component: () => import('@/presentation/pages/RegistrarProductoPage.vue') },
      { path: '/system/ingresos', component: () => import('@/presentation/pages/IngresosPage.vue') },
      { path: '/system/ingresos/nuevo', component: () => import('@/presentation/pages/RegistrarIngresoPage.vue') },
      { path: '/system/ventas', component: () => import('@/presentation/pages/VentasPage.vue') },
      { path: '/system/ventas/nuevo', component: () => import('@/presentation/pages/RegistrarVentaPage.vue') },
      { path: '/system/usuarios', component: () => import('@/presentation/pages/UsuariosPage.vue') },
      { path: '/system/clientes', component: () => import('@/presentation/pages/ClientesPage.vue') },
      { path: '/system/clientes/nuevo', component: () => import('@/presentation/pages/RegistrarClientePage.vue') },
      { path: '/system/config', component: () => import('@/presentation/pages/ConfigPage.vue') },
    ]
  },
  {
    path: '/**',
    redirect: '/system/home'
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {

  const authStore = useAuthStore()

  if(to.meta.requiresAuth && !authStore.token){
    return next('/login')
  }
  if(to.meta.noAuth && authStore.token){
    console.log('no auth')
    return next('/system')
  }
  
  next()
});


export default router