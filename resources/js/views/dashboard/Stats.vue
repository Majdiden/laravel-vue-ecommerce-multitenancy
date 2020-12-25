<template>
  <v-container class="ma-12 mx-1">

    <v-layout row wrap justify-space-between class="">

    <v-col cols="3">
        <v-card flat class="pa-4">
          <v-row>
          <v-col cols="8">
            <div class="display-1">5.6K</div>
            <div class="subheading grey--text font-weight-light">Total Revenue</div>

          </v-col>
          <v-col cols="4">
            <ion-icon name="cash-outline"></ion-icon>
          </v-col>
          </v-row>
        </v-card>
    </v-col>
    <v-col cols="3">
        <v-card flat class="pa-4">
          <v-row>
            <v-col cols="8">
                <div class="display-1">473</div>
                <div class="subheading grey--text font-weight-light">Total Sales</div>
            </v-col>

            <v-col cols="4">
              <ion-icon name="stats-chart-outline"></ion-icon>
            </v-col>
            </v-row>
        </v-card>
      </v-col>

      <v-col cols="3">
          <v-card flat class="pa-4">
            <v-row>
              <v-col cols="8">
                <div class="display-1">139</div>
                <div class="subheading grey--text font-weight-light">Orders</div>
              </v-col>

            <v-col cols="4">
                  <ion-icon name="cart-outline"></ion-icon>
            </v-col>

            </v-row>
          </v-card>
        </v-col>

        <v-col cols="3">
            <v-card flat class="pa-4">
              <v-row>
                <v-col cols="8">
                  <div class="display-1">235</div>
                  <div class="subheading grey--text">Total Customers</div>
                </v-col>

              <v-col cols="4">
                  <ion-icon name="people-outline"></ion-icon>
              </v-col>

              </v-row>
            </v-card>
          </v-col>


    </v-layout>

    <v-layout row wrap justify-space-between>
      <v-col cols="9">
          <v-card flat class="pa-4">
            <v-row>
            <v-col cols="12">

              <v-card-title>Revenue</v-card-title>

              <v-sparkline :value="value"  smooth="16" color="#7367F0" line-width="3" auto-draw stroke-linecap="round" type="trend">

              </v-sparkline>
            </v-col>
            </v-row>
          </v-card>
      </v-col>
      <v-col cols="3" justify-center>
          <v-card flat class="pa-1">
            <v-row>
            <v-col cols="12">
            <v-card-title>Goal Overview</v-card-title>
            <v-card-subtitle>Achieving 600 Sales</v-card-subtitle>
            <v-progress-circular
            size="150"
             value="70"
              color="#7367F0"
              width="7"
               rotate="70"
                class="ml-12 mt-5 mb-5">
                <span class="display-2">70%</span>
              </v-progress-circular>
            </v-col>
            </v-row>
          </v-card>
      </v-col>

    </v-layout>

  </v-container>

</template>

<script>
// @ is an alias to /src

export default {
  name: 'Stats',
  data(){
    return{
      value: [0, 2, 5, 9, 5, 10, 3, 5, 0, 0, 1, 8, 2, 9, 0]
    }
  }

}
</script>

<style scoped>
ion-icon {
  font-size: 50px;
  color: #7367F0;
}
</style>
