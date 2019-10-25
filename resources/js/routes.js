import Vue from 'vue'
import Router from 'vue-router'


Vue.use(Router)

const routes = [
  {
    path: '/',
    name: 'base',
    component: () => import('@/backend/layouts/BlankLayout'),
    children: [
      {
        path: 'login',
        name: 'login',
        component: () => import('@/backend/screens/login/LoginIndexScreen')
      }
    ]
  }
]

const router = new Router({
  mode: 'history',
  base: '/',
  routes
})



export default router
