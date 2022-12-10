import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import(/* webpackChunkName: "home" */ '../views/Home.vue')
  },
  {
    path: '/category-product/:id/:name',
    name: 'categoryProduct',
    component: () => import(/* webpackChunkName: "categoryProduct" */ '../views/CategoryProduct.vue')
  },
  {
    path: '/product-detail/:id/:name',
    name: 'ProductDetail',
    component: () => import(/* webpackChunkName: "ProductDetail" */ '../views/ProductDetail.vue')
  },
  {
    path: '/my-shopping-cart',
    name: 'myShoppingCard',
    component: () => import(/* webpackChunkName: "myShoppingCard" */ '../views/myShoppingCard.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
