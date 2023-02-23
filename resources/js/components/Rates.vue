<template>
    Rates
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
        searchText: ''

    }
},
mounted: function() {
   this.getAllCars();
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
    getToSell(){
        axios.get('http://127.0.0.1/rn/api/rates').then(response =>
            this.details = response.data);

    },
    getCar(id){
        window.location.replace('http://127.0.0.1:8080/ad/'+id);
    },
    format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
},
    getImgUrl(pic) {
    return "http://127.0.0.1/luuluilui/assets/img/" + pic;
},
}
}
</script>