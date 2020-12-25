import Vue from 'vue'
import Vuex from 'vuex'
import router from '../routes'
import axios from 'axios'
//import { getField, updateField } from 'vuex-map-fields'
//import VuexPersist from 'vuex-persist';

Vue.use(Vuex, axios)

axios.defaults.withCredentials = true;
export default new Vuex.Store({
     //plugins: [vuexLocalStorage.plugin],

     modules : {
            tenant: {
              namespaced: true,
                    state: () =>  ({
                      storename: null,
                    }),

                    getters: {

                    },

                    mutations: {
                      StoreData(state, data) {
                        state.storename = data
                        console.log(data)
                      }
                    },

                    actions: {

                      createStore({commit}, StoreData) {
                        axios
                        .post('/api/create', StoreData)
                        .then((response) => {console.log(response.data);})
                        .catch(error => console.log(error.response.data))
                      },
                      Signup({commit}, StoreData) {
                        axios
                        .post('/api/signup', StoreData)
                        .then((response) => {console.log(response.data);})
                        .catch(error => console.log(error.response.data))
                      },
                      Login({commit}, StoreData) {
                        axios
                        .post('api/login', StoreData)
                        .then(response => {localStorage.setItem("token", response.data);
                                            router.push({name: 'Stats'});
                            })
                        .catch(error => console.log(error.response.data))
                      },
                      Logout(){
                        axios
                        .post('/api/logout')
                        .then(response => {
                                            localStorage.removeItem('token');
                                              route.push({name: 'login'}); })
                        .catch(error => console.log(error.response.data))
                      },
                      loadStoreData({commit}) {
                        axios
                        .get('/api/load')
                        .then(response => {commit('StoreData', response.data)})
                        .catch(error => console.log(error.response.data))
                      }
                    }

                  },

            store: {
              namespaced: true,

              state: () => ({
                products: [],
                attributes: null,
                crntprdct: null,
                crntattr: null,
                product: '',
                carts: [],
                cats: []
              }),

              getters: {
                featuredProducts: state => {
              return state.products.filter(section => section.featured)
                   },
                   Categories: state => {
                   let product;
                   let category;
                   for (product in state.products){
                         for(category in state.products[product].categories){
                           return category.name
                         }
                   }
                   //  return categories
                   }
              },

              mutations: {
                SET_PRODUCTS(state, data) {
                  state.products = data
                  console.log(state.products)
                },
                GET_PRODUCT(state, data){
                  state.product = data
                  console.log(state.product)
                },
                GET_ATTRS(state, data){
                  state.attributes = data
                  console.log(state.attributes)
                },
                CURRENT_PRODUCT(state, data){
                  state.crntprdct = data
                },
                CURRENT_ATTRIBUTE(state, data){
                state.crntattr = data
                  console.log(state.crntattr)
                },
                DELETE_PRODUCT(state, id){
                  state.products.splice(id, 1)
                },
                SET_CATEGORIES(state, data){
                state.cats.push(data)
                },
                DELETE_CATEGORY(state, id){
                  state.cats.splice(id, 1)
                },
                CREATE_PRODUCT(state, newProduct) {
                  state.products.unshift(newProduct)
                },
                GET_CART(state, data) {
                  state.carts.push(data)

                },
                GET_CAT(state, data){
                  state.cats = data
                  console.log(state.cats)

                }
              },


              actions: {
                 loadProducts({commit}){
                   axios
                   .get('/api/products')
                   .then(response => {commit('SET_PRODUCTS', response.data)})
                   .catch(error => console.log(error.response.data))
                 },

                 loadProduct({commit}, id){
                   axios.get('/api/products/'+ id)
                   .then(response =>  {commit('GET_PRODUCT', response.data)})
                   .catch(error => console.log(error.response.data))
                 },

                 createProduct({commit}, newProduct) {
                   axios
                   .post('/api/products', newProduct, {headers: {'Content-Type' : 'multipart/form-data'}})
                   .then(response => {commit('CURRENT_PRODUCT', response.data)})
                   .catch( error => console.log(error.response.data))
                 },

                 updateProduct({commit}, Product){
                   axios
                   .put('/api/products/' + Product.id, Product)
                   .then((response) => {

                       console.log(response.data);

                     })
                     .catch(error => console.log(error.response.data))
                 },

                 deleteProduct({commit}, id){
                   axios
                   .delete('/api/products/' + id)
                   .then(response => {commit('DELETE_PRODUCT', id)})
                   .catch(error => console.log(error.response.data))
                 },

                 createAttr({commit}, attributes){
                   axios
                   .post('/api/attributes', attributes)
                   .then(response => {commit('CURRENT_ATTRIBUTE', response.data)})
                   .catch(error => console.log(error.response.data))
                 },

                 addAttrValues({commit}, attrvalues){
                   axios
                   .post('/api/attributes/add', attrvalues)
                   .then(response => console.log(response.data))
                   .catch(error => console.log(error.response.data))
                 },

                 getAttrs({commit}){
                   axios
                   .get('/api/attributes')
                   .then(response => {commit('GET_ATTRS', response.data)})
                   .catch(error => console.log(error.response.data))
                 },

                 addCart({commit}, item) {
                   axios
                   .post('/api/cart/add', item)
                   .then(response => response.data.items)
                   .catch(error => console.log(error.response.data))
                 },
                 createCategory({commit}, newCategory) {
                   axios
                   .post('/api/categories', newCategory, {headers: {'Content-Type' : 'multipart/form-data'}})
                   .then(response => {commit('SET_CATEGORIES', response.data)})
                   .catch(error => console.log(error.response.data))
                 },
                 deleteCategory({commit}, id){
                   axios
                   .delete('/api/categories/' + id)
                   .then(()=> {commit('DELETE_CATEGORY', id)})
                   .catch(error => console.log(error))
                 },

                 getCart({commit}){
                   axios
                   .get('/api/cart')
                   .then(response => {commit('GET_CART', response.data)})
                   .catch(error => console.log(error.response.data))
                 },

                 placeOrder({commit}, order){
                   axios
                   .post('/api/checkout', order)
                   .then(response => console.log(response.data))
                   .catch(error => console.log(error.response.data))
                 },

                 getCat({commit}){
                   axios
                   .get('/api/categories')
                   .then(response => {commit('GET_CAT', response.data)})
                   .catch(error => console.log(error.response.data))
                 },

                 addAttribute({commit}){
                   let data = {
                     attribute_id: 1,
                     value:  'red',
                     quantity: 1,
                     price: 2,
                     product_id: 1,
                            };
                   axios
                   .post('/api/attributes/add', {
                               data: data
                   })
                   .then(response => console.log(response.data))
                   .catch(error => console.log(error.response.data))
                 }
              }


     }
   }


   })
