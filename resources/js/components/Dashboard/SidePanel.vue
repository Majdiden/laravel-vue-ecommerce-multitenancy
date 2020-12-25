<template>
  <v-navigation-drawer absolute right temporary v-model="drawer" width="360" class="drawer">


      <v-container>
        <v-list-item>
          <h5>ADD NEW CATEGORY</h5>
        </v-list-item>
          <v-divider></v-divider>

          <v-text-field dense label="Category name"  color="#7367F0"  outlined class="mt-12" v-model="newCategory.name"  required></v-text-field>

          <v-text-field dense label="Slug"  color="#7367F0"  outlined v-model="newCategory.slug" required></v-text-field>

          <v-text-field dense label="Description"  color="#7367F0"  outlined v-model="newCategory.description" required></v-text-field>

          <v-file-input  accept="image/*" dense label="Image" color="#7367F0"  outlined v-model="newCategory.image" required></v-file-input>

              <v-checkbox dense color="#7367F0" label="Featured" v-model="newCategory.featured"  ></v-checkbox>

              <v-divider></v-divider>

                  <v-btn @click="addCategory(newCategory);" depressed class="white--text" color="#7367F0" >ADD</v-btn>


        </v-container>




  </v-navigation-drawer>

</template>

<script>

  export default {
    props: {
      drawer: Boolean
    },
    data(){
      return {
        newCategory: {
          name: '',
          slug: '',
          description: '',
          image: [],
          featured: ''
        }
      }
    },

    methods:{

      addCategory(newCategory){
        newCategory = new FormData();
        newCategory.append('image', this.newCategory.image)
        newCategory.append('name',this.newCategory.name)
        newCategory.append('slug',this.newCategory.slug)
        newCategory.append('description',this.newCategory.description)
        this.$store.dispatch('store/createCategory', newCategory)
        this.drawer = false
        console.log(this.newCategory)
      }

    }


    }


</script>

<style scoped>
.drawer{
  height: 100vh;
  padding:0;
}
.drawer-inputs{
margin-right: 100px;
}
</style>
