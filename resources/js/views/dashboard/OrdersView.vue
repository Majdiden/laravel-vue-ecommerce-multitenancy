
<template >










<div class="all">
  <v-btn rounded outlined color="#7367F0" class="ml-12 mb-8" @click="showDrawer()">ADD NEW</v-btn>
  <side-panel :drawer="drawer"></side-panel>
  <v-row  class="row header mx-12">
    <v-col cols="2">
      <p>NAME</p>
    </v-col>
    <v-col cols="2">
      <p  >LOCATION</p>
    </v-col>
    <v-col cols="2">
      <p  >PHONE #</p>
    </v-col>
    <v-col cols="2">
      <p  >STATUS</p>
    </v-col>
    <v-col cols="2">
      <p>PRICE</p>
    </v-col>
    <v-col cols="2">
      <p>DATE</p>
    </v-col>
  </v-row>

  <v-row class="row data ml-12 mr-12 mb-5 pt-2">
    <v-col cols="2">

      <h5  >Omer Abdelfattah</h5>
      <p class="grey--text" >#2020202020</p>

    </v-col>

    <v-col cols="2">
      <p  >Khartoum, Bahri</p>
    </v-col>
    <v-col cols="2">
      <p >249903775676</p>
    </v-col>
    <v-col cols="2">
      <p  >Processing</p>
    </v-col>
    <v-col cols="2">
      <p  >250,000</p>
    </v-col>
    <v-col cols="2">
      <p  >22-11-2020</p>
    </v-col>


  </v-row>

</div>


















</template>

<script>


export default {
  name: 'Orders',
  data(){
    return{

    }
  }
}
</script>

<style scoped>
$checkbox{
  border-color: white;
}
.all{
  padding-top:100px;
  font-family: 'Montserrat';
  height: 100vh;
}
.row{
  padding-left: 80px;
  border-radius: 10px;
}
.header{

}
.data{
    height: 60px;
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
</style>
