import Vue from 'vue';
import VueRouter from 'vue-router';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Home from './views/Home.vue';
import Products from './views/Products.vue';
import Category from './views/Categories.vue';
import ProductPage from './views/ProductPage.vue';
import Cart from './views/cart.vue';
import Checkout from './views/Checkout.vue';
import Dashboard from './views/dashboard/Dashboard.vue';
import Welcome from './views/dashboard/Welcome.vue';
import Menu from './views/dashboard/Menu.vue';
import Orders from './views/dashboard/OrdersView.vue'
import ProductsView from './views/dashboard/ProductsView.vue'
import CreateProduct from './views/dashboard/CreateProduct.vue'
import CategoriesView from './views/dashboard/CategoriesView.vue'
import Stats from './views/dashboard/Stats.vue'
import Auth from './views/auth.vue'
import AuthClients from './views/authclients.vue'
// for later : import HomeLoader from './views/loaders/HomeLoader.vue'

Vue.use(VueRouter);

const router = new VueRouter({
      mode: 'history',
      routes: [
        {
        path: '/',
        name: 'home',
        component: Home
        },
    /*    {
          path: '/home-loader',
          name: 'home-loader',
          component: HomeLoader
        }, */
        {
        path: '/login',
        name: 'login',
        component: Login
        },
        {
        path: '/auth',
        name: 'auth',
        component: Auth
        },
        {
        path: '/authc',
        name: 'authclients',
        component: AuthClients
        },
        {
        path: '/products',
        name: 'products',
        component: Products
        },
        {
        path: '/category/:slug/:id',
        name: 'category',
        component: Category
        },
        {
        path: '/product/:slug/:id',
        component: ProductPage,
        name: 'product'
        },
        {
        path: '/shoppingcart',
        name: 'shoppingcart',
        component: Cart
      },
        {
        path: '/checkout',
        name: 'checkout',
        component: Checkout
      },
      {
        path: '/welcome',
        name: 'Welcome',
        component: Welcome
      },

      {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        children: [
            {
              path: '/dashboard/menu',
              name: 'Menu',
              component: Menu
            },
            {
              path: '/dashboard/orders',
              name: 'Orders',
              component: Orders
            },
            {
              path: '/dashboard/products',
              name: 'ProductsView',
              component: ProductsView,
            },
            {
              path: '/dashboard/createproduct',
              name: 'CreateProduct',
              component: CreateProduct
            },
            {
              path: '/dashboard/stats',
              name: 'Stats',
              component: Stats
            },
            {
              path: '/dashboard/categories',
              name: 'Categories',
              component: CategoriesView
            }
      ]
    },
    {
      path: '/register',
      name: 'register',
      component: Register
    }
  ]

})

export default router;
