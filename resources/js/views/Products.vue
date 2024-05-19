<template>
  <div>
  <main-nav/>
  <div class="products pa-12">
    <h1>All Products</h1>
    <v-layout row wrap>
      <v-row>
        <v-col cols="3">
          <div class="test">
            <v-checkbox class="mt-n3" v-for="cat in cats" :key="cat.id" v-model="filtered" :label="cat.name" :value="cat.name"></v-checkbox>
          </div>
        </v-col>
        <v-col cols="9">
          <v-row v-if="filtered.length && !filteredProducts.length" align="center" justify="center" class="d-flex flex-column pt-12">
            <v-icon size="50" class="mb-5">mdi-emoticon-sad-outline</v-icon>
            <p>No available products for this category.</p>
          </v-row>
          <v-row>
            <product-card v-if="!filtered.length" cols="4"  v-for="(product, index) in products" :key="product.id" :image="product.images" :name="product.name" :category="product.categories" :featured="product.featured" :price="product.price" :rating="product.rating" :id="product.id"></product-card>
            <product-card v-if="filtered.length" cols="4"  v-for="(product, index) in filteredProducts" :key="product.id" :image="product.images" :name="product.name" :featured="product.featured" :price="product.price" :rating="product.rating" :id="product.id"></product-card>
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

  data(){
    return {
      filtered: [],
      filteredProducts: []
    }
  },

  watch: {
    filtered: {
      handler: function() {
        this.filteredProducts = []
        this.products.forEach(product => {
          product.categories.forEach(category => {
            if(this.filtered.includes(category.name)){
              this.filteredProducts.push(product)
              console.log(this.filteredProducts)
              console.log(this.filtered)
            }
          })
        })
    },
    deep: true
    }
  },

beforeMount(){
  this.$store.dispatch('store/loadProducts')
  console.log(this.cats)
},

computed: {
...mapState('store', [
  'products',
  'cats'
 ])

}
}
</script>

<style scoped>

.products{
  margin-top: 160px;
}
h2{
  margin-bottom: 40px;
}
.test{
  border: 1px solid #E5E5E5;
  padding: 20px;
  height: 100vh;
}
</style>
