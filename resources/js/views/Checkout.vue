<template>
    <div>
      <main-nav/>
      <div class="container">
        <h1> Checkout </h1>
        <v-row>
          <v-col cols="8">
          <v-row>
            <v-col cols="6">
            <v-text-field outlined dense label="First Name" v-model="order.first_name"></v-text-field>
          </v-col>
            <v-col cols="6">
              <v-text-field outlined dense label="Last Name" v-model="order.last_name"></v-text-field>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="6">
            <v-text-field outlined dense label="Email"></v-text-field>
          </v-col>
            <v-col cols="6">
              <v-text-field outlined dense label="Phone Number" v-model="order.number"></v-text-field>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12">
            <v-text-field outlined dense label="Address" v-model="order.address"></v-text-field>
          </v-col>
          </v-row>
          <v-row>
            <v-col cols="12">
              <v-textarea outlined desnse label="Notes" v-model="order.notes"></v-textarea>
            </v-col>
          </v-row>
          <v-btn @click="placeOrder()"  color="#000" width="250" class="white--text">Continue to payment</v-btn>
        </v-col>

        <v-col cols="4">
          <v-card class="pa-7 mt-2" color="#7367F0" >
            <h2 class="white--text">Order Details</h2>

          <!--  <div class="items">
              <v-card class="pa-4 pb-2 mt-7 mb-5" shaped >
                <div class="items-container">
                  <v-row v-for ="(item, index) in cart.items" :key="index">
                    <v-col cols="8">
                      <p>{{item.name}}</p>
                    </v-col>
                    <v-col cols="4">
                      <p>{{item.price}}</p>
                    </v-col>
                    <v-divider></v-divider>
                  </v-row>
                </div>
                <v-row justify="end" class="ml-4">
                  <p>Subtotal: {{cart.subtotal}}</p>
                </v-row>
              </v-card>
            </div> -->
            <v-row>
              <v-col cols="8">
                <h5 class="white--text">Subtotal : </h5>
              </v-col>
              <v-col cols="4">
              <h6 class="white--text">  {{carts.subtotal}} SDG</h6>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="8">
                <h5 class="white--text">Delivery : </h5>
              </v-col>
              <v-col cols="4">
                <h6 class="white--text">  {{carts.shippingCharges}} SDG</h6>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="8">
                <h5 class="white--text">Tax : </h5>
              </v-col>
              <v-col cols="4">
                <h6 class="white--text">  {{carts.tax}} SDG</h6>
              </v-col>
            </v-row>
            <v-text-field color="white" dense outlined label="Copoun Code"></v-text-field>
            <v-row justify="end" class="mb-7 mr-1 mt-n3">
              <v-btn  small >Apply</v-btn>

            </v-row>
            <v-divider></v-divider>
            <v-row>
              <v-col cols="8">
                <h5 class="white--text">Discount % : </h5>
              </v-col>
              <v-col cols="4">
              <h6 class="white--text">  {{carts.discountPercentage}} SDG</h6>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="8">
                <h4 class="white--text">Total to pay : </h4>
              </v-col>
              <v-col cols="4">
              <h5 class="white--text">  {{carts.total}} SDG</h5>
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
      </div>
    </div>
</template>

<script>
import {mapState} from 'vuex';
import {mapActions} from 'vuex';

export default{
  data(){
    return {
      order: {
        first_name: '',
        last_name: '',
        address: '',
        number: '',
        notes: ''
      }
    }
  },

  beforeMount(){
    this.$store.dispatch('store/getCart')

  },

  mounted(){
    console.log(this.carts)
  },

  methods: {


    placeOrder(){
      this.$store.dispatch('store/placeOrder', this.order)
      console.log(this.order)
    }

  },

  computed: {
    ...mapState('store', [
      'carts'
     ])
  }
}

</script>

<style scoped>
.container {
  margin-top: 160px;
  margin-bottom: 80px;
}

.order-details{
  height: 100vh;
  background-color: #7367F0;
}

.items-container{
  max-height: 183px;
  overflow-y: scroll;
  overflow-x: hidden;
}

.items-container::-webkit-scrollbar{
  width: 8px;
}

.items-container::-webkit-scrollbar-thumb{
  background-color: #7367F0;
  border-radius: 150px;
}

</style>
