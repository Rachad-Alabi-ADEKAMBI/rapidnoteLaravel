<template>
    <div class="container">
        <div class="row" v-if="showRates">
            <div class="col-sm-12 col-md-5" v-for="detail in details" :key="detail.id">
                <div class="card p-0">
                   <div class="card-img-top">
                    <img
                    :src="getImgUrl(detail.image)" alt="">

                   </div>
                    <div class="card-body">
                        <p class="card-title">
                            {{ detail.name }}
                        </p>
                        <div class="card-text">
                            <div class="card-text__top">
                                <strong>
                                    Buying
                                </strong>

                          </div>
                        </div>
                        <hr>

                        <div class="currencies">
                            <div class="currency">
                                <span>12 ghc</span> <img
                                src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt="">

                            </div>
                            |
                            <div class="currency">
                                <span> 12 usd</span> <img
                                src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""
                                class='flag'>
                            </div>
                          </div>

                         <div class="card-text">
                            <div class="card-text__top">
                                <button class="btn btn-primary mr-0" @click=displayBuy(detail.id)>
                                    <i class="fas fa-cart-shopping mr-1"></i> Buy
                                </button>
                            </div>
                         </div>

                          <hr>
                          <br>


                          <div class="card-text">
                            <div class="card-text__top">
                                <strong>
                                    Selling
                                </strong>

                          </div>
                        </div>
                        <hr>

                        <div class="currencies">
                            <div class="currency">
                                <span>12 ghc</span> <img
                                src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt="">

                            </div>
                            |
                            <div class="currency">
                                <span> 12 usd</span> <img
                                src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""
                                class='flag'>
                            </div>
                          </div>

                         <div class="card-text">
                            <div class="card-text__top">
                                <button class="btn btn-primary mr-0" @click="displayBuy(detail.id)" >
                                    <i class="fas fa-shop mr-1"></i>sell
                                </button>
                            </div>
                         </div>

                          <hr>
                          <br>


                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="showBuy">
                        <div class="col-sm-12 col-md-6" v-for='rate in rates'
                            :key="rate.id">
                            <form class='form'>
                                <h1>
                                    Buy {{rate.name}}
                                </h1>

                                <div class="form-check form-check-inline" >
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="" @click='getBuyingRate(rate.id)'>
                                    <label class="form-check-label" for="inlineRadio1">
                                        {{ rate.name }} <img :src='getImgUrl(rate.image)'>
                                    </label>
                                </div>
                                <hr>

                                <label for="" class="label1">
                                    Amount you need: <br>
                                    <input type="text" v-model="amount" @click="getNeed(amount, rate, id)"
                                        class="input">
                                    <div class="currency currency-gh">
                                        ghc <img src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" class="flag">
                                    </div>

                                    <div class="currency currency-usd">
                                        {{ format(amount/10)}}
                                        Usd <img src="http://127.0.0.1/rn2/resources/img/usd.png" class='flag'>
                                    </div>

                                    <img src="http://127.0.0.1/rn2/resources//img/visa.png" alt="" class="flag">
                                </label>

                                <label for="" class="label1">
                                    Amount you receive: <br>
                                    <input type="text" v-model="need" @click="getAmount(need, rate, id)" class="input">
                                    <div class="currency currency-gh">
                                        ghc <img src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" class="flag">
                                    </div>

                                    <div class="currency currency-usd">
                                        {{ format(need)/10}}
                                        Usd <img src="http://127.0.0.1/rn2/resources/img/usd.png" class='flag'>
                                    </div>
                                </label> <br>



                                <button class="btn btn-primary mx-auto text-center" @click="displayPayment()">
                                    Next
                                </button>

                            </form>



                        </div>

        </div>

        <div class="row" v-if='showPayment'>
            <form class="form" >
                <div class="form__close">
                    <span @click='displayBuy()'>
                        <i class="fas fa-arrow-left"></i> Previous
                    </span>
                </div>

                <h1 class="form__title">
                    Payment Methods
                </h1>

                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="form__items__item">
                                <img src="./public/img/img-mtn.png" alt="">
                                <p>
                                    MTN MOBILE MONEY
                                </p>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form__items__item">
                                <img src="./public/img/vodafone_cash.png" alt="">
                                <p>VODAFONE CASH</p>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form__items__item">
                                <img src="./public/img/bank.jpg" alt="">
                                <p>BANK DESPOSIT</p>
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
  name: 'Rates',
  props: {
    msg: String
  },
  data() {
    return {
        details:[],
        rates: [],
        searchText: '',
        showRates: false,
        showBuy: false,
        showSell: false

    }
},
mounted: function() {
   this.getAllRates();
},
computed: {
            filteredItems() {
                this.showAll = false;
                this.showSearch = true;
                return this.details.filter(ad => {
                    return ad.name.toLowerCase().includes(this.searchText.toLowerCase()) &&
                        ad.brand_name.toLowerCase().includes(this.searchText.toLowerCase())
                })
            }
        },
methods: {
    getAllRates(){
    axios.get('http://127.0.0.1:8000/ratesApi')
        .then(response => {
        this.details = response.data;
        })
        .catch(error => {
        console.log(error);
        });
    this.showRates= true;
    this.showBuy = false;
    this.showSell = false;
    },
    displayBuy(){
        axios.get('http://127.0.0.1:8000/rateApi/1')
        .then(response => {
        this.rates = response.data;
        })
        .catch(error => {
        console.log(error);
        });
        this.showRates= false;
        this.showBuy = true;
        this.showSell = false;
    },
    displaySell(id){
        axios.get('http://127.0.0.1:8000/ratesApi/'+id)
        .then(response => {
        this.details = response.data;
        })
        .catch(error => {
        console.log(error);
        });
        this.showRates= false;
        this.showBuy = false;
        this.showSell = true;
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