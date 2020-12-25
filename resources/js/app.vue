<template>

    <v-app>
      <router-view></router-view>
    </v-app>


</template>

<script>
export default {
  name: "app"
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
