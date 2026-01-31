import { createRouter, createWebHistory } from 'vue-router'
import LoginPage from '@/pages/LoginPage.vue'

const routes = [
  { path: '/', component: LoginPage }
]

export default createRouter({
  history: createWebHistory(),
  routes
})