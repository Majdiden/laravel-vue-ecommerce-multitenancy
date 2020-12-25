<template>
  <v-col :cols="cols">

    <v-card>
      <v-row justify="center" align="center" class="pb-4">
          <router-link :to="{ name: 'product', params: { id: id, slug: name }}">
        <div class="p-image">
          <!--   <img src="../../../public/storage/products/xVgUVUDbt0FtW56N02dy8ffF6.webp"/> -->
        </div>
        </router-link>
      </v-row>
      <v-card-actions class="pa-4">
      <!--  <v-input type="hidden"  name="_token" :value="csrf"></v-input> -->
        <v-input type="hidden"  name="id" :value="id"></v-input>
        <!--  <v-text-field type="number" v-model="item.qty"></v-text-field> -->
        <v-btn type="submit" @click="AddToCart(item)" fab color="#7367F0" class="white--text" small ><v-icon size="15">mdi-cart</v-icon></v-btn>
        <v-btn type="submit" @click="AddToCart(item)" fab color="#7367F0" class="white--text" small ><v-icon size="15">mdi-heart</v-icon></v-btn>
      </v-card-actions>
    </v-card>
    <router-link :to="{ name: 'product', params: { id: id, slug: name }}">
    <div class="product-info" align="center">
      <p class="pt-4">{{name}}</p>
      <v-rating v-model="rating" readonly length="5"  size="18" color="black" background-color="black">
        <v-icon>mdi-star</v-icon>

      </v-rating>
    </div>
  </router-link>
  </v-col>
</template>

<script>
import {mapState} from 'vuex';
export default {

  props: {
  name: String,
  cols: [Number, String],
  price: Number,
  rating: Number,
  id: Number
},

data(){
  return {
  //  csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    item: {
      id : this.id
    }
  }
},

methods: {
  AddToCart(item){
    this.$store.dispatch('store/addCart', item)
  }
},

computed: {
  ...mapState('store', [
    'products'
  ])

}
}

</script>

<style scoped>
.p-image{
  height: 150px;

}
img{

  width: 150px;
}
</style>
