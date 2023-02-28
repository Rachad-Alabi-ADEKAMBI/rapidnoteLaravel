<template>
  <div class="container">
    <div class="row">
          <form class="col-sm-12 col-md-6" action="/editRate" method="POST">
          <div>
            <h1>Edit</h1>
            <div class="card p-3">
              <p></p>
              <div class="row mb-2">
                <div class="">
                  <label>New buying price:</label><br>
                  <input type="text" placeholder="" name="buying_price"> <br>
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
                </div><br>

              </div><br>
              <div class="row">
                <div class="">
                  <label>New selling price:</label><br>
                  <input type="text" placeholder="" name="selling_price"> <br>
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
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <a class="btn btn-danger" href="/dashboard">
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
name: 'Rate',
props: {
  msg: String
},
data() {
  return {
      details:[]

  }
},
mounted: function() {
 this.getAllDetails();
},
methods: {
  getAllDetails(){
  axios.get(`http://127.0.0.1/immo/api/item/${this.id}`)
      .then(response => {
      this.details = response.data;
      })
      .catch(error => {
      console.log(error);
      });
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