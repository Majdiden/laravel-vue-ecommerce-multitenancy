<template>
  <div class="all">
    <v-btn rounded outlined color="#7367F0" class="ml-12 mb-8" @click="showDrawer()">ADD NEW</v-btn>
    <side-panel :drawer="drawer"></side-panel>
    <v-row  class="row header mx-12">
      <v-col cols="2">
        <p>IMAGE</p>
      </v-col>
      <v-col cols="4">
        <p  >NAME</p>
      </v-col>
      <v-col cols="2">
        <p  >SLUG</p>
      </v-col>
      <v-col cols="2">
        <p  >FEATURED</p>
      </v-col>
      <v-col cols="2">
        <p>ACTIONS</p>
      </v-col>
    </v-row>

    <v-row class="row data ml-12 mr-12 mb-5 pt-2" v-for="category in cats" :key="category.id">
      <v-col cols="2">
      <!--  <img :src="('../../../../public/storage/' + category.image)"/> -->
      </v-col>
      <v-col cols="4">
        <p  >{{category.name}}</p>
      </v-col>
      <v-col cols="2">
        <p  >{{category.slug}}</p>
      </v-col>
      <v-col cols="2">
        <p  >{{category.featured}}</p>
      </v-col>
      <v-col cols="2">
        <ion-icon name="pencil-outline" alt="edit category">
          edit
        </ion-icon>

        <ion-icon class="trash" @click="deleteCat(category.id);" name="trash-outline">
          delete
        </ion-icon>

      </v-col>
    </v-row>

  </div>
</template>

<script>
import SidePanel from '@/js/components/dashboard/SidePanel.vue';
import {mapState} from 'vuex';
  export default {
    data(){
      return {
        drawer: false
      }
    },

    components: {
      'side-panel' : SidePanel
    },

    mounted(){
      this.$store.dispatch('store/getCat')

    },
    methods: {
      deleteCat(id){
        this.$store.dispatch('store/deleteCategory', id)
      },

      showDrawer(value){
        this.drawer = !this.drawer
      }
    },

    computed: {
      ...mapState('store', [
        'cats'
      ])
    }

  }
</script>

<style scoped>

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
