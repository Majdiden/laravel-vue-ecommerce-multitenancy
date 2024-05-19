<template>
  <div class="holder">

      <Navbar/>
        <v-main class=" main-area">
          <transition name="fade" mode="out-in">
            <router-view></router-view>
          </transition>
      </v-main>
  </div>


</template>

<script>
// @ is an alias to /src
import Navbar from '../../components/Dashboard/Navbar.vue';
import {mapState} from 'vuex';

export default {
  name: 'Dashboard',
  components: {
    Navbar
  },
  data(){
    return{
      value: [0, 2, 5, 9, 5, 10, 3, 5, 0, 0, 1, 8, 2, 9, 0]
    }
  },




}
</script>

<style scoped>
.holder{
  z-index: 0;
}
.main-area{
  height: auto;
  background-color: #F8F8F8;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .3s ease;
}
.fade-enter, .fade-leave-to
/* .component-fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}

</style>
