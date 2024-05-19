<template >
  <nav>
  <v-app-bar flat extended  extension-height="35" app absolute color="white"  class="toolbar " >
    <v-text-field placeholder="Search" prepend-inner-icon="mdi-magnify" outlined dense class="mt-7"></v-text-field>
    <v-spacer></v-spacer>
    <v-btn @click="logout();"   color="#7367F0"  class="white--text caption">
      <v-icon left color="white" size="20">mdi-exit-to-app</v-icon>
      Sign Out
    </v-btn>
  </v-app-bar>

  <v-navigation-drawer  permanent app v-model="drawer" style="overflow-y:hidden;">
    <transition name="slide">
    <v-list v-if="!customize" class="menu #7367F0--text" nav dense>
      <v-list-item three-line to="/" class=" pt-4 white--text main">
        <v-list-item-icon>
          <v-icon color="white">mdi-storefront-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title class="white--text">{{storename}} Store</v-list-item-title>
          <p class="caption white--text">Visit Store <v-icon color="white" size="18">mdi-chevron-right</v-icon></p>
        </v-list-item-content>
      </v-list-item>
      <v-list-item to="stats" color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-view-dashboard-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Dashboard</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item to="/dashboard/orders"  color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-shopping-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Orders</v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-list-item to="/dashboard/products"  color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-package-variant-closed</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Products</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item to="/dashboard/categories" color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-tag-multiple-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Categories</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item @click="customize = !customize">
        <v-list-item-icon>
          <v-icon>mdi-monitor-edit</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Pages</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item>
        <v-list-item-icon>
          <v-icon>mdi-account-group-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Customers</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item>
        <v-list-item-icon>
          <v-icon>mdi-tune-vertical</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Store Settings</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item>
        <v-list-item-icon>
          <v-icon>mdi-account-settings-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Profile</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
    </transition>



    <transition name="slide" mode="in-out">
        <v-expansion-panels v-if="customize" class="customize">
          <v-row>
            <v-col cols="6" align="start">
              <v-icon class="ml-3" @click="customize = !customize">mdi-arrow-left</v-icon>
            </v-col>
            <v-col cols="6" align="end">
              <v-btn small color="blue" text class="white--text mr-3" type="submit" @click="saveSettings(hero)">Save</v-btn>
            </v-col>
          </v-row>
          <v-expansion-panel>
            <v-expansion-panel-header>
              Hero Section
            </v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-row class="d-flex">
                  <v-col cols="12">
                    <v-switch class="activation-switch" dense flat label="Activate Section"></v-switch>
                    <label>Display:</label>
                    <v-select dense outlined :items="items"></v-select>
                    <v-file-input outlined dense label="Hero Image" accept="image/*" color="purple" v-model="hero" required></v-file-input>

                  </v-col>
                </v-row>
            </v-expansion-panel-content>
          </v-expansion-panel>
          <router-link to="/dashboard/menu">

          <v-expansion-panel>
            <v-expansion-panel-header>
              Menu
            </v-expansion-panel-header>
          </v-expansion-panel>
        </router-link>
          <v-expansion-panel>
            <v-expansion-panel-header>
              Hero Section
            </v-expansion-panel-header>
          </v-expansion-panel>
          <v-expansion-panel>
            <v-expansion-panel-header>
              Hero Section
            </v-expansion-panel-header>
          </v-expansion-panel>
        </v-expansion-panels>

  <!--  <v-list v-if="customize" class="customize #7367F0--text" nav dense>

      <v-list-item to="stats" color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-view-dashboard-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Dashboard</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item to="/dashboard/orders"  color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-shopping-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Orders</v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-list-item to="/dashboard/productsview"  color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-package-variant-closed</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Products</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item to="/dashboard/categories" color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-tag-multiple-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Categories</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item @click="customize = !customize">
        <v-list-item-icon>
          <v-icon>mdi-monitor-edit</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Pages</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item>
        <v-list-item-icon>
          <v-icon>mdi-account-group-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Customers</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item>
        <v-list-item-icon>
          <v-icon>mdi-tune-vertical</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Store Settings</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item>
        <v-list-item-icon>
          <v-icon>mdi-account-settings-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Profile</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list> -->
</transition>





      <v-btn to="/dashboard/createproduct" text class="add-product-btn mx-2 my-n7">
        <v-icon top color="#7367F0" size="25">mdi-plus</v-icon>
        <span>Add new products</span>
      </v-btn>





  </v-navigation-drawer>
</nav>

</template>

<script>
import {mapState} from 'vuex';

export default{
  data(){
    return {
    //  color: '#1976D2FF',
    hero: null,
    customize: false,
  mask: '!#XXXXXXXX',
  menu: false,
      n: 0,
      drawer: false,
      dialog: false,
      stepper: 1,
      createAttr: false,
      chooseAttr: false,
      items: ['Featured Products', 'Featured Categories'],
      attrs: [
        {

          name: '',
          code: '',
          values: [{
            name: '',
            price: ''
          }]

      }],
      newProduct: {
        name: '',
        sku: '',
        desc: '',
        quantity: '',
        images: [],
        categories: [],
        price: '',
        status: '',
        featured: ''
      }
      //

    }

  },
  beforeMount() {
    this.$store.dispatch('store/getCat')
    this.$store.dispatch('store/getAttrs')



  },

  methods: {

    addNewValue(){
      this.attrs.forEach(attr => {
        attr.values.push({
          name: '',
          price: ''
        })
        console.log(attr.name)
      })
    },

  addNewAttr(){
     this.attrs.push({
       name: '',
       code: '',
       values: [{
         name: '',
         price: ''
       }]
     })
   },

    addProduct(newProduct){
      newProduct = new FormData();
      newProduct.append('name', this.newProduct.name)
      newProduct.append('sku', this.newProduct.sku)
      newProduct.append('description', this.newProduct.desc)
      newProduct.append('price', this.newProduct.price)
      newProduct.append('quantity', this.newProduct.quantity)
      newProduct.append('categories', this.newProduct.categories)
      newProduct.append('images', this.newProduct.images)
      newProduct.append('status', this.newProduct.status)
      newProduct.append('featured', this.newProduct.featured)
      this.$store.dispatch('store/createProduct', newProduct)
      console.log(newProduct)
    },

    addAttr(){
      let attributes =
      {
        name : this.attrs[0].name,
        code : this.attrs[0].code
      }
      this.$store.dispatch('store/createAttr', attributes)



    },

    addNewAttrValues(){
      this.attrs.forEach(attr => {
        attr.values.forEach(value => {

          let newattrvalues =
          {
            product_id: this.crntprdct.id,
            attribute_id: this.crntattr.id,
            value: value.name,
            price: value.price
          }
          this.$store.dispatch('store/addAttrValues', newattrvalues)
        })
      })

    },

    addExistingAttrValues(){
      this.attrs.forEach(attr => {
        attr.values.forEach(value => {

          let existingattrvalues =
          {
            product_id: this.crntprdct.id,
            attribute_id: attr.name,
            value: value.name,
            price: value.price
          }
          this.$store.dispatch('store/addAttrValues', existingattrvalues)
        })
      })
    },

    addCategory(newCategory){
      this.$store.dispatch('store/createCategory', newCategory)
    },

    closeDialog(){
      this.dialog = false
    },

    logout(){
      this.$store.dispatch('tenant/Logout');
    },

    saveSettings(){
    const  hero = new FormData();
      hero.append('hero', this.hero, this.hero.name)
      for(var pair of hero.entries()) {
    		console.log(pair[0]+ ', '+ pair[1]);
   		}
      this.$store.dispatch('tenant/StoreCustomizer', hero)
      console.log(hero)
    }


  },
  computed: {
    ...mapState('store', [
      'cats'
    ]),
    ...mapState('store', [
      'crntprdct'
    ]),
    ...mapState('store', [
      'crntattr'
    ]),
    ...mapState('store', [
      'attributes'
    ]),
    ...mapState('tenant', [
      'storename'
    ]),

    swatchStyle() {
      const { color, menu } = this
      return {
        backgroundColor: this.attrs[0].values[0].name,
        cursor: 'pointer',
        height: '30px',
        width: '30px',
        borderRadius: menu ? '50%' : '4px',
        transition: 'border-radius 200ms ease-in-out'
      }

  }
}
}
</script>

<style scoped>

.main{
  background-color: #7367F0;
}

.menu-drawer{
  overflow-y: hidden !important;
}

.stepper-header{
  background-color: #7367F0;
  color: white;
}
.add-product-btn{
  position: absolute;
  top: 500px;
  background-color: #F3F5F6;

}
.v-btn{
  min-height: 22%;

}

.menu{
  position: absolute;
  width: 100%;
}
.customize{
  position: relative;
}

.slide-leave-active,
.slide-enter-active {
  transition: .3s;
}
.slide-enter {
  transform: translate(100%, 0);
}
.slide-leave-to {
  transform: translate(-100%, 0);
}
.v-expansion-panel-content{
  background-color: #E5E5E5;
}
.v-input{
  font-size: 12px;
}

.v-switch .v-label{
  font-size: 12px;
}

label{
  font-size: 12px;
}


</style>
