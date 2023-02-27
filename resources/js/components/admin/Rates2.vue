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
                                <span>{{ format(detail.buying_price) }} GHC</span> <img
                                src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt="">

                            </div>
                            |
                            <div class="currency">
                                <span> USD {{ format(detail.buying_price/10) }}</span> <img
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
                                <span>{{ format(detail.selling_price) }} GHC</span> <img
                                src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt="">

                            </div>
                            |
                            <div class="currency">
                                <span>USD{{ format(detail.selling_price/10) }}</span> <img
                                src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""
                                class='flag'>
                            </div>
                          </div>
                          <br>
                          <hr>

                        <div class="buttons text-center">
                            <button class="btn btn-primary mx-auto" @click="displayEdit(detail.id)">
                                <i bclass="fas fa-pen"></i> Edit
                            </button>
                        </div>
                          <hr>


                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="showEdit">
            <form class="form" action="/editRate" method="POST">
        <div v-for="rate in rates" :key="rate.id">
          <h1>Edit</h1>
          <div class="card p-3">
            <p></p>
            <div class="row mb-2">
              <div class="col-md-8">
                <label>New buying price:</label><br>
                <input type="text" placeholder="" name="buying_price"> ghc
              </div>
            </div><br>
            <div class="row">
              <div class="col-8">
                <label>New selling_price:</label><br>
                <input type="text" placeholder="" name="selling_price"> ghc
              </div>
            </div>
            <div class="row mt-2">
              <div class="col">
                <a class="btn btn-danger" href="#">
                  Back
                </a>
                <button class="btn btn-primary" type="submit">
                  Change
                </button>
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
    displayEdit(id) {
     window.location.replace('/editRate?rate='+id)
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