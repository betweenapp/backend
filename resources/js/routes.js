import Vue from 'vue'
import Router from 'vue-router'
import { TokenService } from '@/backend/services/storage.service'

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
        component: () => import('@/backend/screens/login/LoginIndexScreen'),
        meta: {
          public: true,
          onlyWhenLoggedOut: true
        }
      },
      {
        path: 'settings',
        name: 'settings',
        component: () => import('@/backend/layouts/BackendLayout'),
        children: [
          {
            path: ':vendor/:package/:controller',
            component: () => import('@/backend/screens/settings/index'),
            children: [
              {
                path: '/',
                name: 'settings-list',
                component: () => import('@/backend/screens/list/index'),
                props: true
              }
            ]
          }
        ]
      }
    ]
  }
]

const router = new Router({
  mode: 'history',
  base: 'backend',
  routes
})

router.beforeEach((to, from, next) => {
  const isPublic = to.matched.some(record => record.meta.public)
  const onlyWhenLoggedOut = to.matched.some(record => record.meta.onlyWhenLoggedOut)
  const loggedIn = !!TokenService.getToken();

  if (!isPublic && !loggedIn) {
    return next({
      path:'/login',
      query: {redirect: to.fullPath}  // Store the full path to redirect the user to after login
    });
  }

  // Do not allow user to visit login page or register page if they are logged in
  if (loggedIn && onlyWhenLoggedOut) {
    return next('/')
  }

  next();
})



export default router
