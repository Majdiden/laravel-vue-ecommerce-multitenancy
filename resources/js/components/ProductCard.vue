<template>
  <v-col class="prdct-card pt-0" :cols="cols">

    <v-card flat>
        <p v-if="featured = true" class="featured-tag">Featured</p>
        <p v-if="sale_price" class="sale-tag">Save {{price - sale_price}} SDG</p>

      <v-row justify="center" align="center" class="pb-4">
          <router-link :to="{ name: 'product', params: { id: id, slug: name }}">
        <div class="p-image">
             <img :src="image[0].full"/>
        </div>
        </router-link>
      </v-row>
      <v-card-actions class="pcard-options">
      <!--  <v-input type="hidden"  name="_token" :value="csrf"></v-input> -->
        <v-input type="hidden"  name="id" :value="id"></v-input>
        <!--  <v-text-field type="number" v-model="item.qty"></v-text-field> -->
        <v-btn type="submit" @click="AddToCart(item)" fab color="#000" class="white--text" small ><v-icon size="15">mdi-cart</v-icon></v-btn>
        <v-btn type="submit" @click="AddToCart(item)" fab color="#000" class="white--text" small ><v-icon size="15">mdi-heart</v-icon></v-btn>
      </v-card-actions>
    </v-card>
    <div class="product-info pl-3" align="start">
      <v-row>
        <v-col cols="6" align="star">
          <p class="font-weight-medium grey--text" v-for="categ in category" :key="categ.name">{{categ.name}}</p>
        </v-col>
        <v-col cols="6" align="end">
          <v-rating v-model="rating" readonly length="5" dense size="12" color="black" background-color="black">
            <v-icon>mdi-star</v-icon>

          </v-rating>
        </v-col>
      </v-row>
    <router-link :to="{ name: 'product', params: { id: id, slug: name }}">
      <p class="p-name font-weight-bold mt-n3">{{name}}</p>
      <p class="font-weight-medium grey--text">{{price}} SDG</p>
  </router-link>
</div>
  <div align="start">


</div>
  </v-col>
</template>

<script>
import {mapState} from 'vuex';
export default {

  props: {
  name: String,
  cols: [Number, String],
  price: [Number, String],
  sale_price: [Number, String],
  rating: Number,
  id: Number,
  image: Array,
  category: Array,
  featured: Boolean
},

data(){
  return {
  //  csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    item: [{
      id : this.id,
      name: this.name,
      qty: 1,
      price: this.price
    }]
  }
},


methods: {
  AddToCart(item){
     this.$store.dispatch('store/addCart', item)

  }
},

mounted(){
  console.log(this.image)
},

computed: {
  ...mapState('store', [
    'products'
  ])

}
}

</script>

<style scoped>

.prdct-card{
    border: 1px solid #E5E5E5;
    background-color: #fff;
}

.featured-tag{
  position: absolute;
  top: 10px;
  left: -13px;
  width: 100px;
  padding: 4px;
  font-size: 12px;
  font-weight: bold;
  color: white;
  background: #0774D7;
}
.sale-tag{
  position: absolute;
  top: 45px;
  left: -13px;
  width: 110px;
  padding: 4px;
  font-size: 12px;
  font-weight: bold;
  color: white;
  background: #000;
}

.p-image{
  width: 300px;
  height: 300px;

}

.product-info a{
  text-decoration: none;
  color: #000;
}

.p-name{
  width: 250px;
  word-break: normal;
  white-space: pre-wrap;
}

img{
  width: 100%;
  height: 100%;
  object-fit: cover;
}
p{
  font-size: 14px;
}
</style>
