<template>
  <v-app>

<div class="login">

  <v-container container--fluid class="pa-0">

    <v-row align="stretch">

      <v-flex align="stretch" class="l-panel md6 teal accent-3 pl-12">
        <h1 class="heading black--text font-weight-bold text-uppercase display-3"><span class="font-weight-light">PROMOTE,</span> SELL<br> <span class="font-weight-light">and</span> <span class="ls">MEASURE</span></h1>
      </v-flex>

      <v-flex class="r-panel md6 align-self-center pa-6">
        <h1 class="heading black--text text-center text-uppercase mt-7">Stores</h1>

        <v-row class="justify-center">
          <v-col cols="7">

            <h3 class="heading black--text text-center text-uppercase mb-7">Create your store</h3>

            <v-stepper v-model="el" class="stepper">
              <v-stepper-items>
              <v-stepper-content step="1">
                <p>Personal Details</p>

                <v-form @submit="Vform" class="" ref="form lazy-validation">

                  <v-text-field color="teal accent-3" label="Username" type="text" v-model="StoreData.name" outlined required></v-text-field>
                  <v-text-field color="teal accent-3" :rules="emailRules" label="E-mail" type="email" v-model="StoreData.email" outlined required></v-text-field>
                  <v-text-field color="teal accent-3" :rules="passwordRules" label="Password" type="password" v-model="StoreData.password" outlined required></v-text-field>

                  <v-row class="justify-center">

                    <v-col cols="9">
                      <v-btn block large depressed type="submit" @click="validate, loader = 'loading1', el = 2">Next</v-btn>
                    </v-col>
                  <!--  <v-col cols="12" class=" mt-0 pt-0">
                      <v-btn block large depressed rounded class="teal accent-3" type="submit"  :loading="loading2" @click="loader = 'loading2'">LOGIN USING GOOGLE ACCOUNT</v-btn>
                    </v-col> -->

                  </v-row>
                </v-form>
              </v-stepper-content>
              <v-stepper-content step="2">

                <p>Store details</p>
                <v-form @submit="Vform" class="" ref="form lazy-validation">
                  <v-text-field color="teal accent-3" label="Store Name" type="text" v-model="StoreData.sname" outlined required></v-text-field>
                  <v-text-field color="teal accent-3" label="Domain Name" type="text" suffix=".shops.test" v-model="StoreData.domain" outlined required></v-text-field>

                  <v-checkbox color="teal accent-3"  :rules="[v => !!v ]" label="I agree to the Privacy Policy, Terms & Conditions"></v-checkbox>

                  <v-row class="justify-center">

                    <v-col cols="4">
                      <v-btn block large depressed  type="submit" @click="validate, loader = 'loading1', el = 1;">Back</v-btn>
                    </v-col>
                    <v-col cols="8">
                      <v-btn block large depressed  type="submit" :loading="loading1" @click="validate, loader = 'loading1', CreateStore();">Create Store</v-btn>
                    </v-col>
                  <!--  <v-col cols="12" class=" mt-0 pt-0">
                      <v-btn block large depressed rounded class="teal accent-3" type="submit"  :loading="loading2" @click="loader = 'loading2'">LOGIN USING GOOGLE ACCOUNT</v-btn>
                    </v-col> -->

                  </v-row>
                  <!-- <v-row class="justify-center">

                    <v-col cols="9">
                      <v-btn block large depressed rounded type="submit" :loading="loading1" @click="validate, loader = 'loading1', el = 3">LOGIN</v-btn>
                    </v-col>
                    <v-col cols="12" class=" mt-0 pt-0">
                      <v-btn block large depressed rounded class="teal accent-3" type="submit"  :loading="loading2" @click="loader = 'loading2'">LOGIN USING GOOGLE ACCOUNT</v-btn>
                    </v-col>

                  </v-row> -->

                </v-form>
              </v-stepper-content>
              </v-stepper-items>

            </v-stepper>

          </v-col>
        </v-row>
      </v-flex>

    </v-row>

  </v-container>

</div>

</v-app>
</template>

<script>
export default {
  name: "register",
  data() {

    return {
      el: 1,
      emailRules: [
      v => !!v || 'E-mail is required',
      v => /.+@.+\..+/.test(v) || 'E-mail must be valid'
    ],

      passwordRules: [
        v => !!v || 'Password is required'
      ],

      errors: [],
      loader: null,
    loading1: false,
    loading2: false,
    StoreData: {

      name: null,
      email: null,
      password: null,
      sname: null,
      domain: null
    }
}
  },

watch: {
  loader () {
    const l = this.loader
    this[l] = !this[l]

    setTimeout(() => (this[l] = false), 3000)

    this.loader = null
}

},

methods:
{

  validate () {
       this.$refs.form.validate()
     },


  Vform(e){
    this.errors = []

    if (!this.email || !this.validemail(this.email) || !this.password){
      this.errors.push('Some Fields Missing');
      console.log(this.errors);
    }

    e.preventDefault();
  },


  validemail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },

    CreateStore(StoreData){
      this.$store.dispatch('tenant/createStore', this.StoreData)
      this.$store.dispatch('tenant/Signup', this.StoreData)
      console.log(this.StoreData)
    }
}
}
</script>

<style>


* {
  font-family: "Segoe UI";
}

.l-panel {
  height: 625px;
}

.l-panel h1 {
  position: relative;
  top: 35%;
}

.r-panel {
  height: 100vh;
    overflow-y: none;
}

.ls {
  letter-spacing: 10px;
}

.stepper{
  margin-top: 50px;
  box-shadow: none !important;
}
</style>
