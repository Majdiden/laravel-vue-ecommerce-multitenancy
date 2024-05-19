<template>
  <div class="home">
    <main-nav/>
    <div class="hero-section">
      <v-row>
        <v-col cols="5">
          <div class="box-side">

          </div>
        </v-col>
        <v-col cols="7">
          <v-row>
            <div class="box-top">


            </div>
          </v-row>
          <v-row>
            <div class="box-bottom">

            </div>
          </v-row>
        </v-col>
      </v-row>
    </div>

    <section class="services pa-12 ma-12">
      <v-row>
        <v-col cols="4" align="center">
          <v-icon class="ser-icon" ></v-icon>
          <p class="ser-heading subtitle-2 grey--text pt-3">100%</p>
              <p class="ser-subheading subtitle-2 ">Originals</p>
        </v-col>
        <v-col cols="4" align="center">
          <v-icon class="ser-icon" ></v-icon>
          <p class="ser-heading subtitle-2 grey--text pt-3">24/7</p>
              <p class="ser-subheading subtitle-2">Support</p>
        </v-col>
        <v-col cols="4" align="center">
            <v-icon class="ser-icon" ></v-icon>
            <p class="ser-headingsubtitle-2 grey--text pt-3">4 days</p>
              <p class="ser-subheading subtitle-2">Delivery</p>
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

export default{
  name: 'home-loader',
  data(){
    return{

    }
  }
}


</script>


<style scoped>



.hero-section{
  width: 100vw;
  height: 50vh;
  margin-top: 50px;
  margin-bottom: 180px;
  padding-left: 20px;
  padding-right: 40px;
}

.box-side{
  width: 100%;
  height:91.5vh;
  background-color: grey;
}
.box-top{
  width: 100%;
  height:45vh;
  background-color: grey;
}
.box-bottom{
  margin-top:10px;
  width: 100%;
  height:45vh;
  background-color: grey;
}

.ser-icon{
  margin-top: 130px;
  padding: 30px;
  border-radius: 500px;
  width: 10%;
  background-color: grey;
}

.ser-heading{
  width: 30px;
  background-color: grey;
}

.ser-subheading{
  width: 50px;
  background-color: grey;
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
