<template>
  <div class="home">
    <main-nav/>
    <div class="hero-section">
      <v-container  wrap justify-center>
        <v-col cols="12">
          <h1 class=" display-3 text-center">WHAT ARE YOU SELLING?</h1>
        </v-col>
        <v-col cols="12">
          <h2 class="text-center pb-12">what makes it so special?</h2>
        </v-col>


          <v-btn tile color="#7367F0" class=" white--text">SHOP NOW</v-btn>

      </v-container>

    </div>

    <section class="services pa-12 ma-12">
      <v-row>
        <v-col cols="4" align="center">
          <v-row class="pr-12">
            <v-col align="end">
              <p class="subtitle-2 pt-4">Originals</p>
              <p class="subtitle-2 grey--text">100%</p>
            </v-col>
            <v-col cols="3" >
              <v-icon class="ser-icon" ></v-icon>

            </v-col>
          </v-row>
        </v-col>
        <v-col cols="4" align="center">
          <v-row class="pr-12">
            <v-col align="end">
              <p class="subtitle-2 pt-4">Support</p>
              <p class="subtitle-2 grey--text">24/7</p>
            </v-col>
            <v-col cols="3" >
              <v-icon class="ser-icon" ></v-icon>

            </v-col>
          </v-row>
        </v-col>
        <v-col cols="4" align="center">
          <v-row class="pr-12">
            <v-col align="end">
              <p class="subtitle-2 pt-4">Delivery</p>
              <p class="subtitle-2 grey--text">4 days</p>
            </v-col>
            <v-col cols="3" >
              <v-icon class="ser-icon" ></v-icon>

            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </section>

    <section class="featured pa-12">
      <h2 class="display-2">Featured</h2>
      <hr>
      <v-layout row wrap class="mt-12">
        <v-row>

        <!--  <product-card cols="2" v-for="product in featuredProducts" :key="product.id" :name="product.name" :price="product.price" :rating="product.rating" :id="product.id"></product-card> -->
        </v-row>
      </v-layout>
    </section>

    <section class="best-seller pa-12">
      <h2 class="display-2">Best Seller</h2>
      <hr>
      <v-layout row wrap class="mt-12">
        <v-row>

              <!--    <product-card cols="2" v-for="product in bestSellingProducts" :key="product.id" :name="product.name" :price="product.price" :rating="product.rating" :id="product.id"></product-card> -->

        </v-row>
      </v-layout>
    </section>

    <section class="newsletter pa-12" >
      <v-layout row>
        <v-row>

          <v-col cols="6" class="subscribe">
              <h1 class="display-1">SUBSCRIBE TO OUR NEWSLETTER</h1>
              <h3>Signup for the best offers and get alerts on new products</h3>
              <v-text-field color="purple" label="E-mail" type="email" required class=" pt-12">
              </v-text-field>
              <v-btn text tile class="sbs-btn">SUBSCRIBE</v-btn>
            </v-col>
            <v-col cols="6">
              <div class="placeholder"></div>
            </v-col>

        </v-row>
      </v-layout>
    </section>
  </div>
</template>

<script>
//import ProductCard from '@/js/components/ProductCard';
//import {mapGetters} from 'vuex';
import {mapState} from 'vuex';
import {mapActions} from 'vuex';


export default {
  name: "home",
  data(){
    return {
      scrollPosition: null

    }
  },
  components: {
  //  'product-card' : ProductCard
  },

  methods: {
    updateScroll(){
      this.scrollPosition = window.scrollY
    }
  },

  mounted(){
    this.$store.dispatch('tenant/loadStoreData'),
    window.addEventListener('scroll', this.updateScroll)
  },


  computed: {
 ...mapState([
   'storename'
 ]),
  //...mapGetters ([
  //  'featuredProducts',
  //  'bestSellingProducts'
//  ])

  }
}
</script>


<style scoped>



.hero-section{
  width: 100vw;
  height: 50vh;
  margin:  auto;

}

.ser-icon{
  padding: 30px;
  border-radius: 500px;
  width: 10%;
  background-color: #7367F0;
}

.featured{
  width: 100%;
  height: 100vh;
}
.best-seller{
  width: 100%;
  height: 100vh;
  overflow: hidden;
}
.newsletter{
  width: 100%;
  height: 100vh;
}


hr {
  position: relative;
  bottom: 25px;
  left: 25%;
  width: 70%;
}
.subscribe{
  margin: 200px 0 ;
}
.v-text-field{
  margin-top: 30px;
  width: 570px;
}
.sbs-btn {
  position: absolute;
  left:70%;
  bottom: 12%;
}

.placeholder{
  border: 1px solid black;
  height: 80%;
  background-color: grey;
  margin-top: 70px;
}
</style>
