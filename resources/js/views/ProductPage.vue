<template>
    <v-container>
      <main-nav/>
      <v-row class="row">
        <v-col cols="7">
          <div class="product-images">
      <!--     <img src="../../../public/storage/products/xVgUVUDbt0FtW56N02dy8ffF6.webp"/> -->
          </div>
        </v-col>
        <v-col cols="5">
          <v-row class="product-name my-12">
            <h1>{{product.name}}</h1>
          </v-row>
          <v-row class="product-category mt-n12 mb-12">
            <template v-for="(category, index) in product.categories">
              <template v-if="index > 0"> > </template>
              <p  :key="category.id"> {{category.name}}  </p>
            </template>
          </v-row>
          <v-row class="product-price mt-n4">
            <h5>SDG {{product.price}}</h5>
          </v-row>
          <v-divider></v-divider>
          <v-row class="product-info">
            <div class="product-attrs d-flex flex-column">

              <p>SELECT YOUR COLOR</p>
              <div class="colors d-flex">
            <template v-for="attribute in product.attributes">
                    <p>{{attribute.attribute_id}}</p>
                    <p>{{attribute.value}}</p>
              </template>
            </div>

              <v-col cols="4">

              </v-col>

              <v-divider></v-divider>

              <div class="actions mt-8">
                <v-btn @click="AddToCart(item)" depressed class="white--text" color="#7367F0">ADD TO CART</v-btn>
              </div>
            </div>

          </v-row>
        </v-col>
      </v-row>
    </v-container>
</template>

<script>
import {mapState} from 'vuex';

export default {
  data(){
    return{

      id: this.$route.params.id,
      item: {
        id: this.$route.params.id
      }
    }
  },

  mounted(){
    this.init()
  },

  methods: {
    AddToCart(item){
      this.$store.dispatch('store/addCart', item)
    },

    init(){
      this.$store.dispatch('store/loadProduct', this.item.id)
    }
  },

  computed: {
    ...mapState('store', [
      'product'
    ])
  }


}

</script>

<style scoped>

.product-images{
height: 100vh;
background-size: contain;
}

img{
  margin-left: 80px;
  margin-top: 50px;
  width: 450px;
}
.colors{
  display: inline;

}
.color1{
  width: 25px;
  height: 25px;
  border-radius: 50%;
  margin-right: 10px;
}
.color2{
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background-color: teal;
  margin-right: 10px;
}
.color3{
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background-color: indigo;
  margin-right: 10px;
}
.color4{
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background-color: cyan;
  margin-right: 10px;
}

.product-attrs{
  width: 100%;
}

.row{
  margin-top: 100px;
}

</style>
