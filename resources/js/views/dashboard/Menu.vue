<template>
  <div class="main">
      <div class="menu-area">
        <h4>Menu</h4>
        <div v-for="item in menu" :key="item.id">
          <div class="menu-item">
            <p>{{item.title}}</p>
            <v-icon size="15" class="delete-item">mdi-close</v-icon>
            <v-icon @click="pathInput = item.id" size="15" class="path-collapse">mdi-chevron-down</v-icon>
            <input v-show="pathInput == item.id" type="text" :value="item.path" class="path-input"/>
          </div>
        </div>
        <div class="add-item" @click="add = !add">
          <v-icon  size="25" class="add-icon">mdi-plus</v-icon>
          <div >
          <label>Title</label>
          <input  v-model="menus[0].title" type="text" placeholder="Page title" class="new-title-input"/>
          <label>Link</label>
          <input  v-model="menus[0].path" type="text" placeholder="Page link" class="new-path-input"/>
          <v-btn  elevation="false" @click="setMenu()" class="add-new-item" small>Add Page</v-btn>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
import {mapState} from 'vuex';
  export default {
    data(){
      return {
        pathInput: null,
        add: false,
          menus: [
            {
              title: '',
              path: ''
            }
          ]
      }
    },

    beforeMount(){
      this.$store.dispatch('tenant/GetMenu')
    },

    methods: {
      setMenu(){
        this.$store.dispatch('tenant/SetMenu', this.menus)
        console.log(this.menus)
      }
    },

    computed: {
      ...mapState('tenant', [
        'menu'
      ])
    }
  }
</script>

<style scoped>
.main{
  height: 100vh;
  padding-left: 30px;
}
.title, .path{
  width: 20%;
}
.menu-area{
  background: #fff;
  width: 1000px;
  height: auto;
  margin-top: 50px;
  padding: 20px 20px;
}
.menu-item{
  border: 1px solid #E8E8E4;
  width: 100%;
  height: auto;
  padding: 10px;
  margin-top: 10px;
}

.menu-item p {
  font-size: 12px;
}

.path-input{
  font-size: 12px;
  color: #ced4da;
  padding-left: 10px;
  position: relative;
  width: 100%;
  height: 40px;
  border: 1px solid #E8E8E4;
  bottom: 15px;
}

.delete-item{
  float: right;
  bottom:32px;
}
.path-collapse{
  float: right;
  right: 8px;
  bottom:32px;
}
.add-item{
  border: 1px dotted #E8E8E4;
  width: 100%;
  height: auto;
  padding: 10px;
  margin-top: 10px;
}
.add-icon{
  margin-left: 50%;
  text-align: center !important;
}

.add-item label{
  font-size: 15px;
  font-weight: normal;
}
.new-title-input{
  font-size: 12px;
  color: #ced4da;
  padding-left: 10px;
  position: relative;
  margin-bottom: 30px;
  width: 100%;
  height: 40px;
  border: 1px solid #E8E8E4;
}
.new-path-input{
  font-size: 12px;
  color: #ced4da;
  padding-left: 10px;
  position: relative;
  width: 100%;
  height: 40px;
  border: 1px solid #E8E8E4;
}
.add-new-item{
  top: 20px;
  margin-bottom: 25px;
}
</style>
