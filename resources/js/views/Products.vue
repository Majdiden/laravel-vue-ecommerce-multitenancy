<template>
  <div>
  <main-nav/>
  <div class="products pa-12">
    <h2 class="display-2">All Products</h2>
    <v-layout row wrap class="mt-12">
      <v-row>
        <v-col cols="3">
          <div class="test">
          </div>
        </v-col>
        <v-col cols="9">
          <v-row>
            <product-card cols="3"  v-for="product in products" :key="product.id" :name="product.name" :price="product.price" :rating="product.rating" :id="product.id"></product-card>
          </v-row>

        </v-col>
      </v-row>
    </v-layout>
  </div>
  </div>
</template>

<script>
import ProductCard from '../components/ProductCard.vue';
import {mapState} from 'vuex'
export default {
  components: {
    'product-card' : ProductCard
  },

mounted(){
  this.$store.dispatch('store/loadProducts')
},

computed: {
...mapState('store', [
  'products'
 ])

}
}
</script>

<style scoped>
h2{
  margin-top: 100px;
}
.test{
  border: 1px solid black;
  height: 100vh;
}
</style>
