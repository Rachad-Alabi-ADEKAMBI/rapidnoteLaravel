<template>
    <div class="container">
      <div class="row">
            <form class='form' v-if="showBuy">
                                <h1>
                                    Buy currrency
                                </h1>

                                <hr>

                                <label for="" class="label1">
                                    Amount you need: <br>
                                    <input type="text" v-model="amount"
                                        class="input">
                                </label> <br>
                                <div class="currencies">
                            <div class="currency">
                                <span>10 GHC</span> <img
                                src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt="">

                            </div>
                            |
                            <div class="currency">
                                <span> USD 10</span> <img
                                src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""
                                class='flag'>
                            </div>
                          </div>
                          <hr>

                                <label for="" class="label1">
                                    Amount you receive: <br>
                                    <input type="text" v-model="need"  class="input">
                                </label> <br>
                                <div class="currencies">
                            <div class="currency">
                                <span>10 GHC</span> <img
                                src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt="">

                            </div>
                            |
                            <div class="currency">
                                <span> USD 10 </span> <img
                                src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""
                                class='flag'>
                            </div>
                          </div>
                          <hr>



                                <div class="buttons">
                                    <a class="btn btn-danger  text-center" href="/dashboard" >
                                    Cancel
                                </a>

                                <button class="btn btn-primary  text-center" @click="displayPayments()">
                                    Next
                                </button>
                                </div>

                            </form>

                            <form class="form" v-if="showPayments" >

                                <h2 class="form__title">
                                    Payment Methods
                                </h2>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form__items__item">
                                                <img src="http://127.0.0.1/rn2/resources/img/img-mtn.png" alt="">
                                                <p>
                                                    MTN MOBILE MONEY
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form__items__item">
                                                <img src="http://127.0.0.1/rn2/resources/img/img-mtn.png" alt="">
                                                <p>VODAFONE CASH</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
        </div>
    </div>
  </template>

  <script>
   export default {
  name: 'Buy',
  props: {
    msg: String
  },
  data() {
    return {
        details:[],
        showBuy: false,
        showPayments: false

    }
  },
  mounted: function() {
   this.displayBuy();
  },
  computed: {
    id() {
      return this.$route.query.id;
    }
  },
  methods: {
    displayBuy(){
    axios.get('http://127.0.0.1:8000/rateApi/1')
        .then(response => {
        this.details = response.data;
        this.showBuy = true;
        this.showPayments = false
        })
        .catch(error => {
        console.log(error);
        });
    },
    displayPayments(){
        this.showBuy = false;
        this.showPayments = true;
    },
    format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
  },
    getImgUrl(pic) {
    return "http://127.0.0.1/rn2/resources/img/" + pic;
  },
  }
   }
  </script>