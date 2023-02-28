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
                                <span class="text text-center">12 ghc</span> <img
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
        showRates: false,

    }
},
mounted: function() {
   this.getAllRates();
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
    },
    displayBuy(id){
      window.location.replace('/buy?id='+id)
    },
    displaySell(id){
        window.location.replace('/sell?id='+id)
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