<template >
  <nav>
  <v-app-bar flat extended  extension-height="20" app absolute color="white"  class="toolbar rounded-lg pa-1 ma-6" >
    <v-text-field placeholder="Search" prepend-inner-icon="mdi-magnify" rounded outlined dense class="mt-7"></v-text-field>
    <v-spacer></v-spacer>
    <v-btn @click="logout();"  rounded color="#7367F0"  class="white--text caption">
      <v-icon left color="white" size="20">mdi-exit-to-app</v-icon>
      Sign Out
    </v-btn>
  </v-app-bar>

  <v-navigation-drawer  permanent app v-model="drawer" style="overflow-y:hidden;">
    <v-list class="menu #7367F0--text">
      <v-list-item three-line to="/" class="mt-n2 pt-4 white--text main">
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
          <v-icon>mdi-finance</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Stats</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item to="/dashboard/orders"  color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-cart-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Orders</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-group value="false">
        <template v-slot:activator>
      <v-list-item class="mx-n4" to="/dashboard/productsview"  color="#7367F0">
        <v-list-item-icon>
          <v-icon>mdi-tshirt-crew-outline</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Products</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      </template>
      <v-list-item class="mx-7" to="/dashboard/categories" color="#7367F0">
        <v-list-item-content>
          <v-list-item-title>Categories</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      </v-list-group>
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
          <v-icon>mdi-cog-outline</v-icon>
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

    <v-dialog v-model="dialog" width="1000">
    <template v-slot:activator="{ on, attrs }">
      <v-btn   v-bind="attrs" v-on="on" rounded text class="grey lighten-2 my-12 mx-3" >
        <v-icon left color="blue">mdi-plus</v-icon>
        <span>Add new products</span>
      </v-btn>
    </template>

    <v-stepper v-model="stepper">
      <v-stepper-header class="stepper-header">
        <v-stepper-step step="1">Product Information</v-stepper-step>
        <v-divider></v-divider>
        <v-stepper-step step="2">Product Options</v-stepper-step>
        <v-divider></v-divider>
        <v-stepper-step step="3">Confirm Additional Information</v-stepper-step>
      </v-stepper-header>
      <v-stepper-items>
        <v-stepper-content step="1">
          <v-card>
            <v-card-title>
              <span class="headline">Add Product</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12">
                    <v-text-field outlined dense label="Product Name" color="purple" v-model="newProduct.name" required></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field outlined dense label="SKU" color="purple" v-model="newProduct.sku" required></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field outlined dense label="Description" color="purple" v-model="newProduct.desc" required></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-file-input outlined dense label="Product Images" accept="image/*" color="purple" v-model="newProduct.images" required></v-file-input>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field outlined dense label="Quantity" type="number" color="purple" v-model="newProduct.quantity" required></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field outlined dense label="Price" type="number" color="purple" v-model="newProduct.price" required></v-text-field>
                  </v-col>
                  <v-col cols="12">
                  <v-select
                      :items="cats"
                      item-text="name"
                      item-value="id"
                      v-model="newProduct.categories"
                      label="Category"
                      multiple
                      outlined
                      dense

                    ></v-select>
                  </v-col>
                    <v-row align="center" class="mx-2">
                      <v-checkbox color="purple" v-model="newProduct.status" ></v-checkbox>
                      <v-col cols="8">
                        <p class="my-4">Published</p>
                      </v-col>
                    </v-row>
                    <v-row align="center">
                      <v-checkbox color="purple" v-model="newProduct.featured" >Featured</v-checkbox>
                      <v-col cols="8">
                        <p class="my-4">Featured</p>
                      </v-col>
                    </v-row>


                </v-row>

              </v-container>
              <v-row align="start" justify="end">
                <v-col cols="3">
                  <v-btn type="submit" @click="stepper = 2; addProduct(newProduct);"  rounded color="#7367F0" class="white--text" >Next</v-btn>
                  <v-btn class="ml-3 white--text" @click="closeDialog();"  rounded color="#7367F0" >Cancel</v-btn>
                </v-col>
              </v-row>
            </v-card-text>
          </v-card>
        </v-stepper-content>
        <v-stepper-content step="2">
          <v-card>
            <v-card-text>
              <v-row align="center" justify="end">
                <v-col cols="9">
                  <v-btn @click="createAttr = false; chooseAttr = true" tile>Choose Attributes</v-btn>
                  <v-btn class=" ml-7 " @click="chooseAttr = false; createAttr = true" tile>Create New Attributes</v-btn>
                </v-col>
              </v-row>
              <template v-for="(attr, index) in attrs">
              <v-row>
                <v-col cols="12">
                  <v-text-field dense v-show="createAttr" v-model="attr.code" outlined dense label="Attribute Code" color="purple" required></v-text-field>

                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="12">
                  <v-text-field dense v-show="createAttr" v-model="attr.name" outlined dense label="Attribute Name" color="purple" required></v-text-field>
                  </v-col>
                </v-row>
                <v-btn v-show="createAttr" @click="addAttr()">Save Attribute</v-btn>

              <v-row>
                <v-col cols="6">
                <v-text-field dense outlined label="Value" v-show="createAttr" v-for="(value, idx) in attr.values" v-model="value.name" :key="idx">
                </v-text-field>
              </v-col>

              <v-col cols="6">
                <v-text-field dense outlined label="Price" v-show="createAttr" v-for="(price, idx) in attr.values" v-model="price.price" :key="idx">
                </v-text-field>
              </v-col>
              <v-btn v-show="createAttr" @click="addNewValue()">Add New Value</v-btn>
              </v-row>

              <v-row>
                <v-col cols="12">
                  <v-select label="Select Attribute" v-show="chooseAttr" v-model="attr.name" outlined :items="attributes" item-text="name" item-value="id"></v-select>
                </v-col>
              </v-row>

              <v-row>
                <v-col cols="6">
                  <template v-if="attr.name !== 2">
                    <v-text-field dense outlined label="Value" v-show="chooseAttr" v-for="(value, idx) in attr.values" v-model="value.name" :key="idx">
                    </v-text-field>
                  </template>
                  <template v-else>
                    <v-text-field v-for="(value, idx) in attr.values" v-model="value.name" :key="idx"  hide-details class="ma-0 pa-0" solo>
                              <template v-slot:append>
                                <v-menu v-model="menu" top nudge-bottom="105" nudge-left="16" :close-on-content-click="false">
                                  <template v-slot:activator="{ on }">
                                    <div :style="swatchStyle" v-on="on" />
                                  </template>
                                  <v-card>
                                    <v-card-text class="pa-0">
                                      <v-color-picker v-model="value.name" flat />
                                    </v-card-text>
                                  </v-card>
                                </v-menu>
                              </template>
                            </v-text-field>
                  </template>
              </v-col>

              <v-col cols="6">
                <v-text-field dense outlined label="Price" v-show="chooseAttr" v-for="(price, idx) in attr.values" v-model="price.price" :key="idx">
                </v-text-field>
              </v-col>
              <v-btn v-show="chooseAttr" @click="addNewValue()">Add New Value</v-btn>
              <v-btn v-show="chooseAttr" @click="addExistingAttrValues()" >Save Attribute Values</v-btn>
              <v-btn v-show="chooseAttr" @click="addNewAttr()" >Add New Attribute</v-btn>
              </v-row>


            </template>

              <v-btn v-show="createAttr" @click="addAttrValues()" >Save Attribute Value</v-btn>

            <!--  <v-divider></v-divider>

              <v-btn v-show="createAttr" @click="addNewAttr();">Add New Attribute</v-btn> -->
            </v-card-text>
          </v-card>
        </v-stepper-content>
      </v-stepper-items>
    </v-stepper>

    </v-dialog>




  </v-navigation-drawer>
</nav>

</template>

<script>
import {mapState} from 'vuex';

export default{
  data(){
    return {
    //  color: '#1976D2FF',
  mask: '!#XXXXXXXX',
  menu: false,
      n: 0,
      drawer: false,
      dialog: false,
      stepper: 1,
      createAttr: false,
      chooseAttr: false,
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
  mounted() {
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


</style>
