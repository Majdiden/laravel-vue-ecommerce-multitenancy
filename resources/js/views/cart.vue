<template>
  <div>
  <main-nav/>
  <div class="container">
    <h1>Cart</h1>
    <v-card>
      <v-simple-table v-if="">
        <thead class="tabhead">
          <tr>
            <td>
              Product
            </td>
            <td>
              Price
            </td>
            <td>
              Quantity
            </td>
            <td>
              Total
            </td>
          </tr>
        </thead>

        <tbody>
          <tr v-for="item in items" :key="item.modelId">
            <td>
              {{item.name}}
            </td>
            <td>
              {{item.price}}
            </td>
            <td>
              <v-text-field solo type="number" :value="item.quantity" class="mt-6"></v-text-field>
            </td>
            <td>
              100
            </td>
          </tr>
        </tbody>
      </v-simple-table>
      <v-card-actions class="pl-12 pt-12 pr-12">
        <v-row justify="start">
          <v-col cols="6">
            <input type="text" placeholder="Coupon code"></input>
            <v-btn>Apply Coupon</v-btn>
          </v-col>
          <v-col cols="6">
            <v-row  justify="end">
              <v-btn>Update Cart</v-btn>
            </v-row>
          </v-col>
            <v-row  justify="end">
              <v-btn @click="placeOrder()">Place Order</v-btn>
            </v-row>
          </v-col>
        </v-row>
      </v-card-actions>
    </v-card>
  </div>
  </div>
</template>

<script>
import {mapState} from 'vuex';

  export default {
    data(){
      return {
        order: [{
        products: [


        ],
        cstmr_info: {
          first_name: 'Ahmed',
          last_name: 'Mustafa',
          address: 'St123',
          number: '0903775676',
          notes: 'sdjhg'
        }
      }

      ],

      items : []
}
    },

    mounted(){
      this.$store.dispatch('store/getCart'),

      this.carts.forEach(cart => {
          cart.items.forEach(item =>{
            this.order.forEach(order => {
                order.products.push(item)
          })
          this.items.push(item)
        })

      })
      console.log(this.items)
    },

    methods: {
      placeOrder(){
        this.$store.dispatch('store/placeOrder', this.order[0])
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
  margin-top: 120px;
  margin-bottom: 80px;
}

.tabhead{
  background-color: lightgrey;

}

.v-text-field{
  width: 80px;
}

</style>
