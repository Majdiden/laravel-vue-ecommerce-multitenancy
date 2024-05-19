<template>
    <div>

      <main-nav/>
      <v-row class="all">
        <v-col cols="7">
          <div class="product-images">
              <img :src="product.images[0].full"/>
          </div>
        </v-col>
        <v-col cols="5">
          <v-row class="product-name my-12">
            <h1 @click="loadattr()">{{product.name}}</h1>
          </v-row>
          <v-row class="product-category mt-n12 mb-12">
            <template v-for="(category, index) in product.categories">
              <template v-if="index > 0"> > </template>
              <p  :key="category.id"> {{category.name}}  </p>
            </template>
          </v-row>
          <v-row class="pr-5">
            <p>{{product.description}}</p>
          </v-row>
          <v-row class="product-price mb-3">
            <h3>SDG {{product.price}}</h3>
          </v-row>
          <v-divider></v-divider>
          <v-row class="product-info">
            <div class="product-attrs d-flex flex-column mt-6">
              <p>Select Your Color</p>
              <div class="colors d-flex">
              <template v-for="attr in attrs">
                    <div v-if="attr.name == 'color'" class="color" :style="{backgroundColor: attr.values}"></div>
                  </template>
                  <p>Select Your Size</p>
              <div v-for="attr in attrs">
                    <p v-if="attr.name == 'size'">{{attr.values}}</p>
                  </div>
            </div>

              <v-col cols="4">

              </v-col>

              <v-divider></v-divider>

              <div class="actions mt-8">
                <v-btn @click="AddToCart(item)" depressed class="white--text" color="#000">ADD TO CART</v-btn>
              </div>
            </div>

          </v-row>
        </v-col>
      </v-row>

    </div>
</template>

<script>
import {mapState} from 'vuex';

export default {
  data(){
    return{

      id: this.$route.params.id,
      item: {
        id: this.$route.params.id
      },

      attrs: []
    }
  },

  beforeMount(){
    this.init()
  },

  created(){

  },

  methods: {
    AddToCart(item){
      this.$store.dispatch('store/addCart', item)
    },

    init(){
       this.$store.dispatch('store/loadProduct', this.item.id)
    },

    loadattr(){

            this.product.attributes.forEach(attribute => {
            if(attribute.attribute_id = attribute.attribute.id){
              this.attrs.push({
                name: attribute.attribute.code,
                values: [attribute.value]
              })
            }
            })
            console.log(this.attrs)
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

.all{
margin-top: 50px;
}

.product-images{
height: 100vh;
background-size: contain;
}

img{
  margin-left: 80px;
  margin-top: 50px;
  width: 450px;
}
.color{
  display: inline;
  width: 20px;
  height: 20px;
  border-radius: 80%;
  margin-right: 5px;
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



</style>
