import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue'
import Home from '../components/Home.vue'

const routes = [
  { path: '/', redirect: '/login' },
  { path: '/login', component: Login },
  { path: '/home', component: Home, meta: { requiresAuth: true } }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to) => {
  const sudahLogin = localStorage.getItem('username') !== null

  // tendang ke Login
  if (to.meta.requiresAuth && !sudahLogin) {
    return '/login'
  }
  //  arahkan ke Home
  if (to.path === '/login' && sudahLogin) {
    return '/home'
  }
})

export default router