<template>
  <nav :class="{change_color: scrollPosition > 0}">
    <ul>
      <router-link to="/" tag="li" exact>HOME</router-link>
      <router-link to="/products" tag="li" exact>SHOP</router-link>
      <li>ABOUT</li>
      <li class="logo">{{storename}}</li>
      <li>ACCOUNT</li>
      <router-link to="/dashboard/stats" tag="li" exact>DASHBOARD</router-link>

      <router-link to="/cart"><v-icon class="material-icons">shopping_cart</v-icon> </router-link>
    </ul>
  </nav>
</template>

<script>
import {mapState} from 'vuex';
  export default{
    data(){
      return {
        scrollPosition: null
      }
    },

    methods: {
      updateScroll(){
        this.scrollPosition = window.scrollY
      }
    },

    mounted(){
      window.addEventListener('scroll', this.updateScroll)

    },

    computed: {
   ...mapState('tenant', [
     'storename'
   ]),
 }
  }
</script>

<style scoped>

li{
  display: inline-block;
  margin: 10px 0 0 40px;
  margin-right: 40px;
  cursor: pointer;
}
li.logo{
  padding: 30px;
}
ul{
    position: fixed;
    left : 12%;
    padding-top: 20px;
}

.logo{

  border-radius: 600px;
  background-color: #7367F0;
  color: white;
}
.change_color {
background-color: #7367F0;
}

</style>
