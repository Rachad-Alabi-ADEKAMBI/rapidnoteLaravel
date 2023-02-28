<!--
template de la page 'mes transactins'

-->

<template>
    <div class="container">
         <div class="row">
             <div class="col">
                 <div class="table-responsive">
                     <table class="table">
   <thead>
     <tr>
       <th scope="col">#</th>
       <th scope="col">Date</th>
       <th scope="col">Name</th>
       <th scope="col">Amount</th>
       <th scope="col">Status</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <th scope="row">488</th>
       <td data-label="Date">15/01/2023</td>
       <td data-label="Name">Buying from Rapid note</td>
       <td data-label="Amount">230 ghc</td>
       <td data-label="Status">Pending</td>
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
   name: 'Wallet2',
   props: {
     msg: String
   },
   data() {
     return {
         details:[],
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
     axios.get(`http://127.0.0.1:8000/transactionApi/1`)
         .then(response => {
         this.details = response.data;
         })
         .catch(error => {
         console.log(error);
         });
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