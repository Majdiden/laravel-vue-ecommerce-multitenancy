
<template >
<div class="all">
  <side-panel :drawer="drawer"></side-panel>

  <v-row>
    <v-col cols="6" class="d-flex flex-row align-end">
      <v-btn outlined text color="#7367F0">
        <v-icon size="20" left>mdi-export</v-icon>
        <span class="subtitle-2">Export</span></v-btn>
    </v-col>

    <v-col cols="6"  class="d-flex flex-row align-end">
      <v-text-field style="width:230px; top:29px;" dense outlined label="Search" v-model="search"></v-text-field>
      <v-btn class="ml-3" outlined  text color="#7367F0">
        <v-icon size="20" left>mdi-filter-outline</v-icon>
        <span class="subtitle-2">Filter</span></v-btn>

    </v-col>
    </v-row>

  <v-card flat class="pa-7 mt-5">
  <v-data-table
  v-model="selected"
  :headers="headers"
  :items="orders"
  :search="search"
  item-key="id"
  show-select
  class="p-tabel"
  >
  <template v-slot:item.status="{item}">
          <v-icon v-if="item.status == 'pending'">mdi-clock-outline</v-icon>
          <v-icon v-else-if="item.status == 'processing'"  color="yellow">mdi-dots-vertical-circle-outline</v-icon>
          <v-icon v-else-if="item.status == 'shipped'" color="black">mdi-truck</v-icon>
          <v-icon v-else="item.status == 'completed'" color="green">mdi-check-circle-outline</v-icon>
  </template>
  <template v-slot:item.id="{item}">
          <v-icon @click="updateOrder(item)">mdi-dots-vertical</v-icon>
  </template>
  </v-data-table>

</v-card>


<!-- <div id="chips-container" v-for="order in orders" :key="order.id">

  <v-row class="row data ml-12 mr-12 mb-5 pt-3" >
    <v-col cols="2">

      <h5>{{order.first_name}}</h5>
      <p class="grey--text" >{{order.order_number}}</p>

    </v-col>

    <v-col cols="2">
      <p  >{{order.address}}</p>
    </v-col>
    <v-col cols="2">
      <p >{{order.number}}</p>
    </v-col>
    <v-col cols="2">
      <v-tooltip bottom>
        <template v-slot:activator="{on, attrs}">
          <span>
            <v-icon v-on="on" v-bind="attrs">mdi-clock-outline</v-icon>
          </span>
        </template>
        Pending Payment
      </v-tooltip>
    </v-col>
    <v-col cols="2">
      <p  >{{order.grand_total}} SDG</p>
    </v-col>
    <v-col cols="2">
      <p  >22-11-2020</p>
    </v-col>


  </v-row>
</div> -->

</div>
</template>

<script>
import {mapState} from 'vuex';

export default {
  name: 'Orders',
  data(){
    return{
      items: ['completed', 'pending'],
      status: 'completed',
      selected: [],
      search: '',
      headers: [
        {text: 'Order ID', align:'start', value:'order_number' },
        {text: 'Customer', align: 'start', value: 'first_name' },
        {text: 'Location', align: 'start', value: 'address' },
        {text: 'Phone', align: 'start', value: 'number' },
        {text: 'Status', align: 'start', value: 'status' },
        {text: 'Total', align: 'start', value: 'grand_total' },
        {text: 'Date', align: 'start', value: '1 Second Ago' },
        {text: 'Actions', align: 'start', value: 'id' }
      ]
    }
  },
  beforeMount(){
    this.$store.dispatch('store/getOrders')
  },

  methods: {
    updateOrder(id){
      id.status = this.status
      this.$store.dispatch('store/updateOrder', id, this.status)
     console.log(this.orders[id])

    }
  },

  computed: {
    ...mapState('store', [
      'orders'
    ])
  }
}
</script>

<style scoped>
$checkbox{
  border-color: white;
}
.all{
  height: 120vh;
  padding: 20px;
  font-family: 'Montserrat';
}
.row{
  padding-left: 10px;
  border-radius: 10px;
}
.header{

}
.data{
    height: 70px;
    margin-bottom: 0;
    background-color: white;

}
img{
  width: 30px;
  height: 30px;
}
p{
font-weight: 600;
font-size: .75rem;
}

ion-icon{
  cursor: pointer;
    font-size: 19px;
  color: #7367F0;
  margin-right: 15px;
}

ion-icon.trash{
  color: red;
}
#chips-container .v-chip.completed{
  background: green;
}
#chips-container .v-chip.pending{
  background: orange;
}
</style>
