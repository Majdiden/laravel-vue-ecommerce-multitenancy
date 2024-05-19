<template>
    <v-container>
      <v-row class="mt-12">
        <v-col cols="12" align="center" class="mt-12">
          <h1> Welcome {{storename}}!</h1>
          <p>Your store is now up and running</p>
          <v-row class="mt-12" dense>
            <v-col cols="12" align="center">
              <ul>
                <li class="box1">
                  <ion-icon name="compass-outline"></ion-icon>
                  <p>Explore</p>
                </li>
              <router-link to="/dashboard/createproduct">
                <li class="box1" to="/dashboard/createproduct">
                  <ion-icon name="add-outline"></ion-icon>
                  <p>Create a product</p>
                </li>
              </router-link>
              <router-link to="/">
                <li class="box1">
                  <ion-icon name="storefront-outline"></ion-icon>
                  <p>Visit your store</p>
                </li>
              </router-link>
              </ul>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
</template>

<script>
import {mapState} from 'vuex';

export default {
  data(){
  return {

  }
  },

  beforeMount(){
        this.$store.dispatch('tenant/loadStoreData')
  },

  computed: {
 ...mapState('tenant', [
   'storename'
 ])
}
}
</script>

<style scoped>
.box1{
  display: inline-block;
  border: 2px solid #E5E5E5;
  border-radius: 5px;
  width: 150px;
  height: 100px;
  margin-top: 80px;
  margin-right: 50px;
  padding: 20px 0;
}
h1{
  font-size: 50px;
  background-color: #08AEEA;
  background-image: linear-gradient(60deg, #08AEEA 0%, #2AF598 100%);

  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;


}
.title{
  margin-left: 30px;
  margin-top: 15px;
}

.box1 p {
  font-size: 15px;
}

a {
  background-color: black;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

ion-icon{
  font-size: 25px;
  color : black;
}
</style>
