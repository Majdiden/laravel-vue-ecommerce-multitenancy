<template>
  <div class="holder">

      <Navbar/>
        <v-main class="blue-grey lighten-5">
        <router-view></router-view>
      </v-main>
  </div>


</template>

<script>
// @ is an alias to /src
import Navbar from '/components/dashboard/Navbar.vue';

export default {
  name: 'Dashboard',
  components: {
    Navbar
  },
  data(){
    return{
      value: [0, 2, 5, 9, 5, 10, 3, 5, 0, 0, 1, 8, 2, 9, 0]
    }
  }

}
</script>

<style scoped>
.holder{
  z-index: 0;
}

</style>
