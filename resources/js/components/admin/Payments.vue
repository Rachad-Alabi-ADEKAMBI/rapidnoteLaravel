<template>

    <div class="container" v-if="showSearchBar">
        <div class="row">
            <form action="" class="search-bar">
                                <input type="text"
                                v-model="searchText" placeholder='Write something' name=''>
                                <i class="fas fa-xmark" @click="getAllPayments()"></i>

            </form>
        </div>

        <div class="row">

<div class="col">
    <div class="table-responsive">
                     <table class="table mt-2">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="detail in details" :key="detail.id">
                            <th scope="row">{{ detail.id  }}</th>
                            <td data-label="Date">{{ detail.date_of_insertion  }}</td>
                            <td data-label="Name">{{ detail.comment }}</td>
                            <td data-label="Name">{{ detail.user_name }}</td>
                            <td data-label="Amount">{{ format(detail.amount) }} ghc</td>
                            </tr>
                        </tbody>
                        </table>
                 </div>
</div>
        </div>



    </div>

    <div class="container" v-if="showPayments">
        <div class="row">
            <div class="search-icon">
                <i class="fas fa-magnifying-glass" @click="displaySearchBar"></i>
            </div>
        </div>
         <div class="row">

             <div class="col">
                 <div class="table-responsive">
                     <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="detail in details" :key="detail.id">
                            <th scope="row">{{ detail.id  }}</th>
                            <td data-label="Date">{{ detail.date_of_insertion  }}</td>
                            <td data-label="Name">{{ detail.comment }}</td>
                            <td data-label="User">{{ detail.user_name }}</td>
                            <td data-label="Amount">{{ format(detail.amount) }} ghc</td>
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
  name: 'Payments',
  props: {
    msg: String
  },
  data() {
    return {
        details:[],
        searchText: '',
        showPayments: false,
        showSearchBar: false

    }
},
mounted: function() {
   this.getAllPayments();
},
computed: {
            filteredItems() {
                this.showAll = false;
                this.showSearch = true;
                return this.details.filter(detail => {
                return detail.comment.toLowerCase().includes(this.searchText.toLowerCase())
                })
            }
        },
methods: {
    getAllPayments(){
    axios.get('http://127.0.0.1:8000/paymentsApi')
        .then(response => {
        this.details = response.data;
        })
        .catch(error => {
        console.log(error);
        });
    this.showPayments= true;
    this.showSearchBar = false
    },
    displaySearchBar(){
        this.showPayments= false;
        this.showSearchBar = true
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