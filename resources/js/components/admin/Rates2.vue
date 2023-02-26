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

                          <hr>


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
                          <br>
                          <hr>

                        <div class="buttons text-center">
                            <button class="btn btn-primary mx-auto" @click="displayEdit()">
                                <i class="fas fa-pen"></i> Edit
                            </button>
                        </div>

                          <hr>


                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="showEdit">
            <form class="form" action='./index.php?action=createRate' method='POST'>
                    <div class="form__close">
                        <a href="/dashboard">
                            back
                        </a>
                    </div>
                    <h1>
                        Edit rate
                    </h1>
                    <div class="card p-3">

                        <p> <img src="./public/img/<?= $data[
                            'image'
                        ] ?>" alt=""></p>
                        <div class="row mb-2">
                            <div class="col-md-8">
                                <label for=""></label>New buying price: <br>
                                <input type="text" placeholder='' name='buying_price'> ghc
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col-8">
                                <label for=""></label>New selling_price: <br>
                                <input type="text" placeholder='' name='selling_price'> ghc
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <a class="btn btn-danger" type="submit">
                                    Back
                                </a>

                                <button class="btn btn-primary" type="submit">
                                    Change
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
        </div>
    </div>
</template>

<script>
   export default {
  name: 'Rates2',
  props: {
    msg: String
  },
  data() {
    return {
        details:[],
        rates: [],
        searchText: '',
        showRates: false,
        showEdit: false,

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
    this.showEdit = false;
    },
    displayEdit(){
        this.showRates= false;
        this.showEdit = true;
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