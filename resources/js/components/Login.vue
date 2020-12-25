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

            <h3 class="heading black--text text-center text-uppercase mb-7">Login to you store</h3>


                            <v-form @submit="Vform" class="" ref="form lazy-validation">


                              <v-text-field color="teal accent-3" :rules="emailRules" label="E-mail" type="email" v-model="StoreData.email" outlined required></v-text-field>
                              <v-text-field color="teal accent-3" :rules="passwordRules" label="Password" type="password" v-model="StoreData.password" outlined required></v-text-field>

                              <v-row class="justify-center">

                                <v-col cols="9">
                                  <v-btn block large depressed rounded type="submit" @click="validate, loader = 'loading1', CreateStore();">Login</v-btn>
                                </v-col>
                              <!--  <v-col cols="12" class=" mt-0 pt-0">
                                  <v-btn block large depressed rounded class="teal accent-3" type="submit"  :loading="loading2" @click="loader = 'loading2'">LOGIN USING GOOGLE ACCOUNT</v-btn>
                                </v-col> -->

                              </v-row>
                            </v-form>

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
  name: "login",
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

      email: null,
      password: null
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
      this.$store.dispatch('tenant/Login', this.StoreData)
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
