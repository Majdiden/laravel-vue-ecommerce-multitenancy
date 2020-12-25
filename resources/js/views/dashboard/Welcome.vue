<template>
    <v-container>
      <v-row class="mt-12">
        <v-col cols="12" class="mt-12">
          <h1> Welcome {{storename}}</h1>
          <p class="title">Start with</p>
          <v-row class="mt-12">
            <v-col cols="4" align="center">
              <div class="box1 pt-12 ">
                  <ion-icon name="compass-outline"></ion-icon>
                  <p>Explore</p>
              </div>
            </v-col>
            <v-col cols="4" align="center">
              <div class="box1 pt-12">
                <ion-icon name="add-outline"></ion-icon>
                <p>Create a product</p>
              </div>
            </v-col>
            <v-col cols="4" align="center">
              <div class="box1 pt-12">
                <ion-icon name="storefront-outline"></ion-icon>
                <p>Visit your store</p>
              </div>
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

  mounted(){
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

  border: 1px solid #ABC798;
  width: 200px;
  height: 200px;
}
h1{
  font-size: 40px;
}
.title{
  margin-left: 180px;
  margin-top: 15px;
}

ion-icon{
  font-size: 40px;
  padding-bottom: 20px;
}
</style>
