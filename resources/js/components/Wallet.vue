<template>
   <div class="container">
        <div class="row" v-if="showWallet">
                   <div class="col-sm-12 col-md-5" >
                <div class="card p-0">
                    <div class="card-img-top" >
                        <i class="fas fa-wallet main-icon"></i>
                    </div>

                    <div class="card-body">
                        <p class="card-title">
                            Current balance:
                        </p>
                        <div class="card-text">
                            <div class="card-text__top text-center">
                                <strong class="text text-center mx-auto">
                                   10 GHC
                                </strong>
                               </div>
                          </div>
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

                            <div class="buttons">
                                 <button class="btn btn-success mr-0" @click="displayLoad()">
                                    Load
                                </button>

                                <button class="btn btn-danger mr-0" @click="displayWithdraw()" >
                                    Withdraw
                                </button>
                        </div>
                        </div>


                </div>
            </div>
        </div>

        <div class="row" v-if='showWithdraw'>
            <div class="form mx-left bg-light text-center ml-0">

                <h2 class="subtitle">
                    Withdraw
                </h2> <br>
                        <div class="form-group col-md-8  text-left ">
                            <label for="inputEmail4 text-left">Amount:</label>
                            <input type="email" class="form-control"
                            placeholder="amount to withdraw " id="inputEmail4">
                        </div>
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
                                 <br>

                       <p class="text text-left">
                            Balance after transaction:
                       </p>
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

                                <br>

                       <div class="buttons">
                        <button class="btn btn-danger" @click="getDetails()">
                        Previous
                       </button>

                       <button class="btn btn-primary" @click="displayConfirm()">
                        Next
                       </button>
                       </div>
                    </div>
        </div>

        <div class="row" v-if='showLoad'>
            <div class="form mx-left bg-light text-center ml-0">
                <i class="bi bi-x-lg" @click="getDetails()"></i>

                <h2 class="subtitle">
                    Load wallet
                </h2> <br>
                        <div class="form-group col-md-8  text-left ">
                            <label for="inputEmail4 text-left">Amount:</label>
                            <input type="email" class="form-control"
                            placeholder="amount to load " id="inputEmail4">
                        </div>

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

                       <p class="text text-left">
                            Balance after transaction:
                       </p>
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
                                <br>


                       <div class="buttons">
                        <button class="btn btn-danger" @click="getDetails()">
                        Previous
                       </button>

                       <button class="btn btn-primary" @click="displayPayments()">
                        Next
                       </button>
                       </div>
                    </div>
        </div>

       <div class="row" v-if="showPayments">
            <form class="form"  >
                <h2 class="form__title">
                    Payment Methods
                </h2>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form__items__item">
                                <img src="http://127.0.0.1/rn2/resources/img/img-mtn.png" alt="">
                                <p class="text text-center small">MTN MOBILE MONEY</p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form__items__item">
                                <img src="http://127.0.0.1/rn2/resources/img/vodafone_cash.png" alt="">
                                <p class="text text-center small">VODAFONE CASH</p>
                            </div>
                        </div>
                    </div>

                    <div class="buttons text-center">
                        <button  class="btn btn-danger mx-auto" @click="getDetails()">
                            Back
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row" v-if='showConfirm'>
            <div class="form mx-left bg-light text-center ml-0">

                <h2 class="subtitle">
                    Confirm withdrawal
                </h2>
                       <p class="text text-center">
                            Do you really want to withdraw 150 GHC ?
                       </p>
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

                                <br>

                       <div class="buttons">
                        <button class="btn btn-danger" @click="getDetails()">
                        No
                       </button>

                       <button class="btn btn-primary" @click="displayMessage()">
                       Yes
                       </button>
                       </div>
                    </div>
        </div>
    </div>
</template>

<script>
   export default {
  name: 'Wallet',
  props: {
    msg: String
  },
  data() {
    return {
        details:[],
        showWallet: false,
        showLoad: false,
        showWithdraw: false,
        showPayments: false
    }
},
mounted: function() {
   this.getDetails();
   this.getCurrentUserId();
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
    getCurrentUserId() {
      return '{{ Auth::id() }}'; // Get the current user ID using the auth helper function
    },
    getDetails(){
    axios.get(`http://127.0.0.1:8000/userApi/1`)
        .then(response => {
        this.details = response.data;
        })
        .catch(error => {
        console.log(error);
        });
    this.showWallet= true;
    this.showLoad = false;
    this.showWithdraw = false;
    this.showPayments = false;
    this.showConfirm = false;
    },
    displayLoad(){
        this.showWallet= false;
    this.showLoad = true;
    this.showWithdraw = false;
    this.showPayments = false;
    this.showConfirm = false;
    },
    displayWithdraw(){
        this.showWallet= false;
    this.showLoad = false;
    this.showWithdraw = true;
    this.showPayments = false;
    this.showConfirm = false;
    },
    displayPayments(){
        this.showWallet= false;
    this.showLoad = false;
    this.showWithdraw = false;
    this.showPayments = true;
    this.showConfirm = false;
    },
    displayConfirm(){
        this.showWallet= false;
    this.showLoad = false;
    this.showWithdraw = false;
    this.showPayments = false;
    this.showConfirm = true;
    },
    displayMessage(){
      //  this.showConfirm = false;
        alert('Your transaction will be done shorthly, thanks for using Rapidnote');
        window.location.replace('http://127.0.0.1:8000/myTransactions');

    },
    format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
},
    getImgUrl(pic) {
    return "http://127.0.0.1/rn2/resources/img/" + pic;
}
}
}
</script>