<template>
  <nav >
    <div class="logo">
      <v-row class="menus pl-7">
        <v-col cols="8" align="start">
          <v-row>
          <router-link class="pr-12" to="/" tag="h1" exact>{{storename}}</router-link>
              <ul v-for="category in cats" :key="category.id">
                <li>{{category.name}}</li>
              </ul>
          </v-row>
        </v-col>
        <v-col cols="4" align="end">
          <v-row class="pl-12">
            <div class="main-menu">

              <ul>
                <router-link to="/products" tag="li" exact>SHOP</router-link>
                <router-link v-show="storename" to="/dashboard/stats" tag="li" exact>DASHBOARD</router-link>
              </ul>
            </div>
          <div class="user-options">
            <router-link to="/checkout"><v-icon>mdi-account-outline</v-icon> </router-link>
            <router-link to="/shoppingcart"><v-icon>mdi-cart-outline</v-icon>
                <v-badge :content="cartCount" color="black" overlap class="mb-4 carticon"></v-badge>
            </router-link>
          </div>

          <div class="cartitems" v-for="cart in carts" :key="cart.id">
              <v-row v-for="cartitem in cart.items" :key="cartitem.id">
                <v-col cols="4">

                </v-col>
                <v-col cols="8">
                  <v-row>
                    <p>{{cartitem.name}}</p>
                  </v-row>
                  <v-row>
                    <p>{{cartitem.price}} SDG</p>
                  </v-row>
                </v-col>
              </v-row>
          </div>
          </v-row>
        </v-col>

      </v-row>
    </div>
  </nav>
</template>

<script>

window.addEventListener("scroll", function(){
  var menu = document.getElementsByClassName("row")[0];
  menu.classList.toggle("sticky", window.scrollY > 0);
})

import {mapState} from 'vuex';
  export default{
    data(){
      return {
        scrollPosition: null,
        cartitems: null
      }
    },

    methods: {


    },
    beforeMount(){
      this.$store.dispatch('store/getCat')
      this.$store.dispatch('store/getCart')

    },

    mounted() {
        this.$store.dispatch('store/getCartCount')
    },

    computed: {
   ...mapState('tenant', [
     'storename'
   ]),
   ...mapState('store', [
     'cats',
     'carts',
     'cartCount'
   ])
 }
  }
</script>

<style scoped>

.sticky{
  background-color: #000 !important;
  transition: 0.6s in-out;
}

.sticky, .sticky .user-options i{
  color: white;
  transition: 0.6s;

}

.menus{
  position: fixed;
  width: 100vw;
  z-index: 100000;
  background-color: #fff;
}

li{
  display: inline-block;
  margin-right: 30px;
  cursor: pointer;
  font-size: 12px;
  font-weight: 600;
}

ul{
    padding-top: 20px;
    display: inline-block;
}

.logo {
  width: 100%;
  height: 80px;
  color: #000;
  padding-right: 30px;
}

.logo h1{
font-size: 40px;
text-transform: uppercase;
cursor: pointer;
}
.main-menu ul li:hover{
  font-weight: 700;
  transition: 0.1s linear;
}
.user-options{
  padding-top: 20px;
}
.user-options a{
  text-decoration: none;
  padding-left: 20px;
}
.category-menu{
  background-color: #000;
  color: white;
}
.category-menu ul {
  margin-left: 20px;
  padding: 20px 0;
}
.category-menu ul li {
  margin-right: 10px;
  text-transform: uppercase;
  font-weight: 600;
}
.change_color {
background-color: #7367F0;
}

.cartitems{
  position: absolute;
  display: none;
  width: 360px;
  max-height: 300px;
  overflow-y: scroll;
  overflow-x: hidden;
  padding: 10px;
  background: #fff;
  box-shadow: 0px 5px 15px 0px grey;
  float: right;
  right: 10px;
  margin-top: 10px;
  z-index: 1000000;
  font-size: 12px;
}
</style>
