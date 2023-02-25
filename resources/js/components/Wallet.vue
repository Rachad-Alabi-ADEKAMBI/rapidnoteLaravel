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
                            <div class="card-text__top">
                                <strong>
                                   10 ghc
                                </strong>

                               </div>
                          </div>
                          <div class="currencies">
                            <div class="currency">
                                <span>12 ghc</span> <img
                                src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt=""> !

                            </div>

                            <div class="currency">
                                <span> 12 usd</span> <img
                                src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""
                                class='flag'>
                            </div>
                          </div>
                            <hr>
                     </div>

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

        <div class="row" v-if="showWithdraw">
                        <div class="col-sm-12 col-md-6">
                                   <form action="">

                                   </form>
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
    },
    displayLoad(){
        this.showWallet= false;
    this.showLoad = true;
    this.showWithdraw = false;
    },
    displayWithdraw(){
        this.showWallet= false;
    this.showLoad = false;
    this.showWithdraw = true;
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