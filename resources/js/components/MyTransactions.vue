<template>
   <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
                </div>
            </div>
        </div>
   </div>
</template>

<script>
   export default {
  name: 'MyTransactions',
  props: {
    msg: String
  },
  data() {
    return {
        details:[],
        showWallet: false

    }
},
mounted: function() {
 //  this.getMyDetails();
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