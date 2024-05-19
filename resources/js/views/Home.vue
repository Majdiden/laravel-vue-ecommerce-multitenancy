<template>
  <div class="home">
    <main-nav/>
    <div class="hero-section">
      <v-carousel cycel height="550" hide-delimiter-background show-arrows-on-hover>
        <v-carousel-item v-for="image in hero_image" :key="image.hero_image">
          <img :src="image.hero_image"/>
        </v-carousel-item>
      </v-carousel>


      <!-- <v-row align="center">
        <v-col cols="12" align="center">
          <img class="hero-image" :src="hero_image"/>
        </v-col> -->


        <!--  <v-col cols="7" class="hero-text">
            <h3>CLEAN and ELEGANT!</h3>
            <h1>BLACK BACKBAG</h1>
            <p>BlackBird collection of minimal, sleek and functional Carryalls<br/> were designed
                with creatives in mind.</p>
                <v-btn outlined>SHOP NOW</v-btn>
          </v-col>
          <v-col cols="5"class="hero-image">
          </v-col> -->

  <!--      <v-col cols="5">
          <div class="box-side">
          C:\laragon\www\shops\resources\js\views\Home.vue
          </div>
        </v-col>
        <v-col cols="7">
          <v-row>
            <div class="box-top">
            <img src="../../img/Capture.png"/>

            </div>
          </v-row>
          <v-row>
            <div class="box-bottom">

            </div>
          </v-row>
        </v-col> -->
      <!-- </v-row> -->
    </div>

    <section class="services mt-5 ml-0 pl-12 pr-12">
      <v-row>
        <v-col cols="4" align="left" class="service">
          <v-row>
            <span class="ser-icon mdi mdi-check-decagram"></span>
            <p class="subtitle-1 black--text font-weight-bold">100% Originals</p>

          </v-row>
        </v-col>
        <v-col cols="4" align="left" class="service">
          <v-row>
            <span class="ser-icon mdi mdi-face-agent"></span>
            <p class="subtitle-1 black--text font-weight-bold">24/7 Support</p>
          </v-row>
        </v-col>
        <v-col cols="4" align="left" class="service">
          <v-row>
            <span class="ser-icon mdi mdi-truck-fast"></span>
            <p class="subtitle-1 black--text font-weight-bold">Fast Delivery</p>
          </v-row>
            </v-col>
      </v-row>
    </section>

    <section class="trending-categories">
      <v-row>
        <v-col cols="3">
          <v-row class="d-flex flex-column align-start">
            <h1>Trending</h1>
            <h2>Categories</h2>
            <p>Shop All Categories</p>
          </v-row>
        </v-col>
        <v-col cols="9">
          <v-row>
              <div v-for="category in cats" :key="category.id">
                    <category-card :name="category.name" :slug="category.slug" :id="category.id"/>
              </div>
          </v-row>
        </v-col>
      </v-row>
    </section>

    <section class="featured pl-8 pr-8">
          <v-row>
            <v-col cols="12" class="d-flex justify-space-around align-baseline">
                <hr/>
                <h2>Featured Products</h2>
                <hr/>
          </v-col>
          </v-row>

        <v-slide-group  show-arrows class="mt-8">
          <v-slide-item v-for="product in products" :key="product.id">
              <product-card
                  :name="product.name"
                  :image="product.images"
                  :category="product.categories"
                  :price="product.price"
                  :sale_price="product.sale_price"
                  :rating="product.rating"
                  :id="product.id"
              ></product-card>
          </v-slide-item>
      </v-slide-group>


    </section>

    <section class="best-seller">
      <v-row>
        <v-col cols="12" class="d-flex justify-space-around align-baseline">
            <hr/>
            <h2>Best Selling Products</h2>
            <hr/>
      </v-col>
      </v-row>
      <v-layout row wrap class="mt-12">
        <v-row>

              <!--    <product-card cols="2" v-for="product in bestSellingProducts" :key="product.id" :name="product.name" :price="product.price" :rating="product.rating" :id="product.id"></product-card> -->

        </v-row>
      </v-layout>
    </section>

    <section class="newsletter d-flex align-center" >
      <v-layout row class="d-flex flex column align-center justify-center">
          <h2 class="mb-12">NEWSLETTER</h2>
          <v-text-field class="mt-8" outlined label="Enter your email"></v-text-field>
          <v-btn color="black white--text">Subscribe</v-btn>
      </v-layout>
    </section>
  </div>
</template>

<script>
import ProductCard from '../components/ProductCard';
import CategoryCard from '../components/CategoryCard';
//import {mapGetters} from 'vuex';
import {mapState} from 'vuex';
import {mapActions} from 'vuex';




export default {
  name: "home",
  data(){
    return {
      model: null
    }
  },
  components: {
   'product-card' : ProductCard,
   'category-card' : CategoryCard
  },

  methods: {
    updateScroll(){
      this.scrollPosition = window.scrollY
    }
  },

  beforeMount(){
    window.addEventListener('scroll', this.updateScroll)
      this.$store.dispatch('store/loadProducts')

      console.log(this.hero_image)
  },


  computed: {
 ...mapState('tenant', [
   'storename',
   'hero_image'
 ]),
 ...mapState('store', [
   'products',
   'cats'
 ])
  //...mapGetters ([
  //  'featuredProducts',
  //  'bestSellingProducts'
//  ])

  }
}
</script>


<style scoped>

  .home{
      background-color: #F3F5F6;
  }

.hero-section{
  width: 100vw;


}

.hero-section > h1, h3{
margin-top: 120px;
line-height: 50px;
}
.hero-section h1{
  font-size: 50px;
}
.hero-section h3{
  font-weight: 400;
  font-size: 30px;
}
.hero-section p{
  line-height: 20px;
  font-size: 15px;
}

.hero-text{
  padding-left: 80px;
}

.hero-image{
  height: 80vh;
/*  background-image: url(../../img/backbag3.png); */
  background-size: cover;
  background-position: center;
}

.box-side{
  width: 100%;
  height:91.5vh;
  background-image: url(../../img/david-suarez-IOreXYD68PM-unsplash.jpg);
  background-size: cover;
  background-position: center bottom;
}
.box-top{
  width: 100%;
  height:45vh;
  background-image: url(../../img/Capture.png);
  background-position: center center;
  background-size: cover;
}
.box-bottom{
  margin-top:10px;
  width: 100%;
  height:45vh;
  background-image: url(../../img/Capture2.png);
  background-size: cover;
}

.services {
  position: relative;
  top: 0px;
  /* right: -100px; */
  width: 100vw;
  height: 150px;
}

.service{
  background: #fff;
  border: 1px solid #E5E5E5;
  padding-top: 50px;
}

.ser-icon{
  font-size: 50px;
  padding: 10px;
  margin-top: -35px;
  margin-right: 30px;
  margin-left: 10px;
}

.trending-categories{
  margin-top: 20px;
  margin-left: 90px;
}

.trending-categories h1{
  font-size: 30px;
  margin-top: 30%;
}
.trending-categories h2{
  font-size: 30px;
}
.trending-categories p{
  font-size: 14px;
  margin-top: 12px;
}



.featured{
  width: 100vw;
  height: 100vh;
  margin-top: 100px;
}
.best-seller{
  width: 99vw;
  height: 100vh;
  margin-top: 100px;
}
.newsletter{
  width: 100%;
  height: 80vh;
  background-color: #E5E5E5;
}
.newsletter h2{
  font-size: 45px;
}


hr {
  width: 30%;
}

.v-text-field{
  margin-top: 20px;
  width: 350px;
}


img{
  width: 100%;
  height: 100%;
}


</style>
