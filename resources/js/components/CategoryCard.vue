<template>
  <router-link :to="{name: 'category', params: {id: id, slug: slug}}">
    <div class="category d-flex flex-column align-start justify-end pl-4">
            <h4>{{name}}</h4>
            <p>Browse Category</p>
    </div>
  </router-link>
</template>

<script>
  export default{

    props: {
      name: String,
      slug: String,
      id: String|Number
    },
    data(){
      return{

      }
    }
  }
</script>

<style scoped>
.category{
  width: 300px;
  height: 150px;
  margin: 5px;
  border: 1px solid #E5E5E5;
  background: #fff;
  color: #000;
}

.category p{
  font-size: 12px;
}

a{
  text-decoration: none;
}
</style>
