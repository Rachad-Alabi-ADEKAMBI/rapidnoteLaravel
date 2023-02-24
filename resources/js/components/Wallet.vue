<template>
    <div class="container">
        <div class="row" v-if="showWallet">
             <!--
            <div class="col-sm-12 col-md-4">

                <div class="card">
                    <img class="card-img-top" src="./public/img/bitcoin.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title">Wallet</p>
                        <p class="card-text">
                            <strong>
                                Balance
                            </strong> <br>
                            <span> 100 ghc</span> <img
                                src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt=""> !
                            <span> 10 usd</span> <img
                                src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""> !
                            <hr>
                        </p>

                        <p class="card-text"><small class="text-muted">Last updated 3 mins
                                ago</small></p>
                    </div>
                </div>

            </div>
              -->
            <div class="col-sm-12 col-md-5" v-for="detail in details" :key="detail.id">
                <div class="card p-0">
                    <i class="card-img-top" ></i>

                    <div class="card-body">
                        <p class="card-title">
                            Wallet
                        </p>
                        <div class="card-text">
                            <div class="card-text__top">
                                <strong>
                                    {{ detail.balance }} ghc
                                </strong>
                                <button class="btn btn-success mr-0" @click="displayBuy(detail.id)" >
                                    Add
                                </button>

                                <button class="btn btn-danger mr-0" @click="displayBuy(detail.id)" >
                                    Sell
                                </button>
                          </div>
                            <span>{{ detail.balance }} ghc</span> <img
                                src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt=""> !
                            <span> {{ detail.balance  }} usd</span> <img
                                src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""
                                class='flag'>
                            <hr>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="showWithdraw">
                        <div class="col-sm-12 col-md-6">
                                    withdraw
                        </div>

        </div>

        <div class="row" v-if='showLoad'>
           load
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
        showWithdraw: false

    }
},
mounted: function() {
   this.getMyDetails();
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
    getMyDetails(){
        const userId = this.getCurrentUserId();
    axios.get(`http://127.0.0.1:8000/userApi/${userId}`)
        .then(response => {
        this.details = response.data;
        })
        .catch(error => {
        console.log(error);
        });
    this.showWallet= true;
    this.showWithdraw = false;
    this.showLoad = false;
    },
    getAdd(){
    axios.get('http://127.0.0.1:8000/userApi')
        .then(response => {
        this.details = response.data;
        })
        .catch(error => {
        console.log(error);
        });
    this.showWallet= false;
    this.showWithdraw = false;
    this.showLoad = true;
    },
    getWithdraw(){
    axios.get('http://127.0.0.1:8000/userApi')
        .then(response => {
        this.details = response.data;
        })
        .catch(error => {
        console.log(error);
        });
    this.showWallet= false;
    this.showWithdraw = true;
    this.showLoad = false;
    },
    format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
},
    getImgUrl(pic) {
    return "http://127.0.0.1/rn2/resources/img/" + pic;
},
getCurrentUserId() {
      return '{{ Auth::id() }}'; // Get the current user ID using the auth helper function
    }
}
}
</script>