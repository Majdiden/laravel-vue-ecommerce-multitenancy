<template>

    <v-app>
      <router-view></router-view>
    </v-app>



</template>

<script>
export default {
  name: "app",

  beforeMount(){
      this.$store.dispatch('tenant/loadStoreData')
      this.$store.dispatch('tenant/StoreHero')
        this.$store.dispatch('store/getCat')
  }
};
</script>
<style>
*{
  font-family: 'Montserrat';

}

a:hover {
  text-decoration: none;
}
button:focus{
  outline: none;
}
</style>
