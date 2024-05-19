<template>
  <div class="main">
    <v-snackbar v-model="snackbar" color="success" top centered timeout="2000">
      {{productmessage}}
    </v-snackbar>
    <v-row class="mt-6">
      <v-col cols="8" class="pl-8">
        <v-card flat >
          <v-card-title>
            <span class="title">Add Product</span>
          </v-card-title>
          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12">
                  <v-text-field outlined dense label="Product Name" color="purple" v-model="newProduct.name" required></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12">
                  <v-textarea outlined dense label="Description" color="purple" v-model="newProduct.desc" required></v-textarea>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="6">

                </v-col>
                <v-col cols="6">

                </v-col>
                <v-col cols="6">
                  <v-text-field outlined dense label="Quantity" type="number" color="purple" v-model="newProduct.quantity" required></v-text-field>
                </v-col>
                <v-col cols="6">
                  <v-text-field outlined dense label="Price" type="number" color="purple" v-model="newProduct.price" required></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field outlined dense label="Sale Price" type="number" color="purple" v-model="newProduct.sale_price"></v-text-field>
                </v-col>

                  <v-row align="center" class="mx-2 mb-9">
                    <v-checkbox dense color="purple" v-model="newProduct.status" ></v-checkbox>
                    <v-col cols="8">
                      <p class="my-4">Published</p>
                    </v-col>
                  </v-row>
                  <v-row align="center" class="mb-9">
                    <v-checkbox dense color="purple" v-model="newProduct.featured" >Featured</v-checkbox>
                    <v-col cols="8">
                      <p class="my-4">Featured</p>
                    </v-col>
                  </v-row>


              </v-row>

            </v-container>
          </v-card-text>
        </v-card>
        <v-card flat class="mt-6">
          <v-card-title>
            <span class="title">Product Options</span>
          </v-card-title>
          <v-card-text>
            <v-container>
              <template v-for="(attr, index) in newProduct.attrs">
                <v-row>
                  <v-col cols="12">
                    <v-select dense label="Select Attribute" v-model="attr.name" outlined :items="attributes" item-text="name" item-value="id"></v-select>
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="6">
                    <template >
                      <v-text-field dense outlined label="Value" v-for="(value, indx) in attr.value" :key="indx" v-model="attr.value[indx]">
                      </v-text-field>
                    </template>
                </v-col>

                <v-col cols="6">
                  <v-text-field dense outlined label="Price" v-for="(price, idx) in attr.values" v-model="price.price" :key="idx">
                  </v-text-field>
                </v-col>
                <v-btn small elevation="0" class="mr-3" @click="addNewValue(index)">Add New Value</v-btn>
                <v-btn small elevation="0" @click="addNewAttr()" >Add New Attribute</v-btn>
                </v-row>
            </template>
            </v-container>
          </v-card-text>
        </v-card>
      </v-col>
      <v-col cols="4">
        <v-card flat>
          <v-card-text>
            <v-container>
              <v-row>
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
              </v-row>
              <v-row>
                <v-col cols="12">
                        <v-text-field outlined dense label="SKU" color="purple" v-model="newProduct.sku" required></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12">
                    <v-file-input outlined dense label="Product Images" accept="image/*" color="purple" v-model="newProduct.images" required></v-file-input>
                </v-col>
              </v-row>
              <v-row align="start" justify="end">
                <v-col cols="12">
                  <v-btn elevation="0" type="submit" @click="addProduct(newProduct);" color="#7367F0" class="white--text" >Save</v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>

  </div>
</template>

<script>
import {mapState} from 'vuex';
  export default {

    data(){
      return {
        snackbar: false,
      createAttr: false,
      chooseAttr: false,
      items: ['Featured Products', 'Featured Categories'],

      newProduct: {
        name: '',
        sku: '',
        desc: '',
        quantity: '',
        images: [],
        categories: [],
        attrs: [{
          name: '',
          value: [],
          price: null
        }],
        price: '',
        sale_price: '',
        status: '',
        featured: null
    }
      }
    },

    beforeMount(){
      this.addAttr()
    },

    methods: {

      addNewValue(index){
        this.newProduct.attrs[index].value.push('')
          console.log(index)

      },

    addNewAttr(){
       this.newProduct.attrs.push({
         name: '',
         value: [],
         price: null
       })
       console.log(this.newProduct.attrs)
     },

     addProduct(newProduct){

        newProduct = new FormData();
        newProduct.append('name', this.newProduct.name)
        newProduct.append('sku', this.newProduct.sku)
        newProduct.append('description', this.newProduct.desc)
        newProduct.append('price', this.newProduct.price)
        newProduct.append('sale_price', this.newProduct.sale_price)
        newProduct.append('quantity', this.newProduct.quantity)
        let cats = JSON.stringify(this.newProduct.categories)
        newProduct.append('categories', cats)
        let attrs = JSON.stringify(this.newProduct.attrs)
        newProduct.append('attributes', attrs)
        newProduct.append('images', this.newProduct.images)
        newProduct.append('status', this.newProduct.status)
        newProduct.append('featured', this.newProduct.featured)
        this.$store.dispatch('store/createProduct', newProduct)
        console.log(this.newProduct.images)
        this.notify()
      },

    async  notify(){
        await this.productmessage
          this.snackbar = true
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
    },

    computed: {
      ...mapState('store', [
        'cats',
        'crntprdct',
        'productmessage',
        'crnattr',
        'attributes'
      ]),
      ...mapState('tenant', [
        'storename'
      ])
    }
  }
</script>

<style scoped>
.main{
  height: 100%;
}
</style>
