<template >
  <div class="products-table" >

  <v-container class="ma-12 mx-2" >
    <v-btn outlined rounded text color="#7367F0">
      <v-icon size="20" left>mdi-filter-outline</v-icon>
      <span class="subtitle-2">Filter</span></v-btn>
      <v-btn outlined rounded text color="#7367F0">
        <v-icon size="20" left>mdi-export</v-icon>
        <span class="subtitle-2">Export</span></v-btn>
    <v-card flat class="pa-7 mt-5" elevation="6">

      <v-row class="mx-3" align="center">
            <v-btn rounded class="white--text caption" color="#7367F0" medium>Quick Edit</v-btn>

      </v-row>



      <v-data-table
        v-model="selected"
        :headers="headers"
        :items="products"
        item-key="id"
        item-class="item"
        show-select
        class="mt-12 p-tabel"
        >
        <template v-slot:item.categories="{item}">
                <td v-for="category in item.categories" :key="category.id">
                  {{category.name}}
                </td>
        </template>
        <template v-slot:item.attributes="{item}">
                <td v-for="attribute in item.attributes" :key="attribute.id">
                  {{attribute.value}}
                </td>
        </template>
        <template v-slot:item.action="{ item }">
     <ion-icon
        name="pencil-outline"
       class="mr-2 material-icons"
       @click="editItem(item)"

     >
       edit
     </ion-icon>
     <ion-icon name="trash-outline" @click="deleteProduct(item.id)" class="mr-2 trash">
       delete
     </ion-icon>
   </template>

    </v-data-table>

    </v-card>
    <v-dialog v-model="dialog" width="500">

    <v-card>
      <v-card-title>
        <span class="headline">Edit Product</span>
      </v-card-title>

      <v-card-text>
        <v-container>
          <v-row>
            <v-col cols="6">
              <v-text-field label="Product name" color="purple" v-model="Product.name"  required></v-text-field>
            </v-col>
            <v-col cols="6">
            <v-select
                :items="cats"
                item-text="name"
                item-value="id"
                v-model="Product.categories"
                label="Category"
                multiple

              >
              </v-select>
            </v-col>
            <v-col cols="6">
              <v-text-field label="Quantity" type="number" color="purple" v-model="Product.quantity"  required></v-text-field>
            </v-col>
            <v-col cols="6">
              <v-text-field label="Price" type="number" color="purple" v-model="Product.price"  required></v-text-field>
            </v-col>
            <v-col cols="6">
              <v-text-field label="Sold" type="number" color="purple" v-model="Product.sold"  required></v-text-field>
            </v-col>
            <v-col cols="6">
              <v-text-field label="Remaining" type="number" color="purple" v-model="Product.remaining"  required></v-text-field>
            </v-col>
            <v-col cols="6">
              <span class="subtitle-1">Rating</span>
              <v-rating length="5"  size="18" color="black" v-model="Product.rating"  background-color="black">
                <v-icon>mdi-star</v-icon>
              </v-rating>
              </v-col>
              <v-row align="center" class="mx-2">
                <v-checkbox color="purple" v-model="Product.bestSelling"  ></v-checkbox>
                <v-col cols="7">
                  <span>Best Selling</span>
                </v-col>
              </v-row>
              <v-row align="center">
                <v-checkbox color="purple" v-model="Product.featured"  ></v-checkbox>
                <v-col cols="7">
                  <p>Featured</p>
                </v-col>
              </v-row>


          </v-row>



        </v-container>
        <v-row align="start" justify="center">
          <v-col cols="5">
            <v-btn type="submit" @click="updateProduct(Product)" tile >Update Product</v-btn>
          </v-col>
        </v-row>
      </v-card-text>
    </v-card>
    </v-dialog>

  </v-container>
</div>
</template>
<script>
import {mapState} from 'vuex';
import {mapGetters} from 'vuex';
//import {mapMutations} from 'vuex';

export default {
  name: 'Products',
  data(){
    return{
                selected: [],
          headers: [
              {
                text: 'Product',
                align: 'start',
                value: 'name'
              },
              {text: 'SKU', align:'start', value:'sku'},
              {text: 'Price', align:'start', value:'price'},
              {text: 'Categories', align:'start', value:'categories'},
              {text: 'Attributes', align:'start', value:'attributes'},
              {text: 'QTY', align:'start', value:'quantity'},
              {text: 'Actions', align:'start', value:'action'}

          ],
          n: 0,

          dialog: false,
          editedIndex: 0,
          Product: {
            id: this.editedIndex,
            name: '',
            categories: [],
            price: '',
            total: '',
            sold: '',
            remaining: '',
            rating: 0,
            bestSelling: '',
            featured: ''
          }

    }
  },

  mounted(){
    this.$store.dispatch('store/loadProducts'),
    this.$store.dispatch('store/getCat'),
    this.items = this.products
  },

  methods: {
    editItem (item) {
        this.editedIndex = this.products.indexOf(item)
        this.Product = Object.assign({}, item)
        this.dialog = true
      },
      updateProduct(Product){
        this.$store.dispatch('store/updateProduct', Product)

      },
      deleteProduct(id){
        this.$store.dispatch('store/deleteProduct', id)
      }

    //  pushCategories(){
      //  for(let i = 0; i <= this.products.length; i++){
        //      this.categories.push(this.products.categories[i])
          //    console.log(this.categories)
        //}


  },

  computed: {
  ...mapState('store', [
    'products'
  ]),
  ...mapGetters('store', [
    'Categories'
  ]),
  ...mapState('store', [
    'cats'
   ])

  //CurrentProductCategories(){
    //const productsArray = this.products
    //productsArray.forEach(product => {

      //return product.categories
    //})

  //}

  }
}
</script>

<style scoped>
$checkbox{
  border-color: white;
}
.products-table{
  height: 100vh;
}
.tar{
  padding-top: 500px;
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
