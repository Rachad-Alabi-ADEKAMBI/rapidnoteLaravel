<template>

    <div class="container" v-if="showSearchBar">
        <div class="row">
            <form action="" class="search-bar">
                                <input type="text"
                                v-model="searchText" placeholder='Write something' name=''>
                                <i class="fas fa-xmark" @click="getAllUsers()"></i>

            </form>
        </div>

        <div class="row">

<div class="col">
    <div class="table-responsive">
                     <table class="table mt-2">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Status</th>

                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="detail in filteredItems" :key="detail.id">
                            <th scope="row">{{ detail.id  }}</th>
                            <td data-label="Name">{{ detail.name }} </td>
                            <td data-label="Balance">{{ detail.wallet  }} ghc</td>
                            <td data-label="Status">{{ detail.status  }}</td>
                            <td>
                                <i class="fas fa-eye mr-1"></i>
                <i class="fas fa-stop mr-1"></i>
                <i class="fas fa-envelope"></i>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                 </div>
</div>
        </div>



    </div>

    <div class="container" v-if="showUsers">
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
                            <th scope="col">Name</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Status</th>

                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="detail in details" :key="detail.id">
                            <th scope="row">{{ detail.id  }}</th>
                            <td data-label="Name">{{ detail.name }} </td>
                            <td data-label="Balance">{{ detail.wallet  }} ghc</td>
                            <td data-label="Status">{{ detail.status  }}</td>
                            <td>
                                <i class="fas fa-eye mr-1"></i>
                <i class="fas fa-stop mr-1"></i>
                <i class="fas fa-envelope"></i>
                            </td>
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
  name: 'Users',
  props: {
    msg: String
  },
  data() {
    return {
        details:[],
        searchText: '',
        showUsers: false,
        showUser: false,
        showSearchBar: false

    }
},
mounted: function() {
   this.getAllUsers();
},
computed: {
            filteredItems() {
                this.showUsers = false;
                this.showSearch = true;
                return this.details.filter(detail => {
                return detail.name.toLowerCase().includes(this.searchText.toLowerCase())
                })
            }
        },
methods: {
    getAllUsers(){
    axios.get('http://127.0.0.1:8000/usersApi')
        .then(response => {
        this.details = response.data;
        })
        .catch(error => {
        console.log(error);
        });
    this.showUsers= true;
    this.showUser = false;
    this.showSearchBar =false;
    },
    displaySearchBar(){
        this.showUsers= false;
        this.showUser = false;
        this.showSearchBar = true
    },
    displayUser(){
        this.showUsers= false;
        this.showUser = true;
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