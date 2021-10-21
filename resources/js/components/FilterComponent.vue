<template>

    
     <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-8 d-flex align-items-center input-search">
                <input  class="col-10 border-right"  type="search" name="title" id="title" @keyup="geocode()"  v-model="title">
                <button class="col-2" ><i class="bi bi-search"></i></button>
               
            </div>

            <div class="col-12 d-flex justify-content-center align-items-center p-3 ">
              
                <input for="n_room" v-model="n_room" class="mr-3" name="n_room" type="number" min="1" max="16" placeholder ="N. Bagni">
                <input  for="n_bed" v-model="n_bed" class="mr-3" name="n_bed" type="number" min="1" max="16" placeholder ="N. Camere">
                <div class="km-input d-flex align-items-center"> 
                     <label class="mr-3" for="distanza">Distanza</label>
                    <input v-model="valueKm" @change="geocode()" name="distanza" type="range" min="5" max="2000"> <span class="p-3">km</span>
                </div>
            </div>

            <div class="container-fluid">
                <h3>Aggiungi dei Servizi:</h3>
            
                    <div class="col-4 d-flex">
                       
                            <div class="d-flex p-2" v-for="service in services" :key="service.id">
                                <label class="p-1 text-nowrap":for="service.name">{{ service.name }}</label>
                                <input type="checkbox" :name="service.name" :id="service.name" :value="service.id" v-model="selectedServices">
                            </div>
                       
                    </div>
              
            </div>

        </div>

        <h1>Risultato:</h1>

        <div class="row justify-content-center">
        
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 ">

            <div class="card mb-3 ">

              <div class="card-header">
                <h4>
                 {{apartment.title}}
                </h4> 
              </div>

               <div class="card-image">
                <a href="">
                    <img :src=" `storage/${apartment.img}`"  :alt="apartment.title">                
                </a>
                     
               </div>
              <div class="card-body">
                    
                <div class="card-body">
                <h5>
                  <i class="bi bi-house-fill"></i>  N.di stanze: <strong>{{ apartment.n_beedroom}}</strong> 
                </h5> 
                <h5>
                  <i class="bi bi-layout-sidebar-reverse"></i> Camera da letto: <strong>{{ apartment.n_beds}}</strong> 
                </h5> 

                <h5>
                  <i class="bi bi-vr"></i> Numero di Bagni: <strong>{{ apartment.n_bathrooms}}</strong>
                </h5>
                <h5>
                  <i class="bi bi-app-indicator"></i> Metri quadrati: <strong>{{ apartment.square_meters}}</strong>
                </h5>
                <h5>
                  <i class="bi bi-geo-alt"></i> Indirizzo: <strong>{{ apartment.address}}</strong>
                </h5>
                <h5>
                <i class="bi bi-moon-stars-fill"></i>  Prezzo a notte: <strong>  € {{ apartment.price_per_night}} </strong>
                </h5>
              </div>

              </div>

              <div class="buttons">
                    <a :href="`/apartment/${apartment.id}`" target="">
                        <button class="btn btn-warning">
                            <i class="bi bi-zoom-in"></i>
                        </button>
                    </a>
                </div>
            </div>
          </div>
        <div>
    </div>
</template>
<script>
    export default {
        props:['apartments', 'services', 'apartmentservices', 'route'],
        data(){
            return {
                tt: window.tt,
                key: 'K35TCsKGW4huvzCAhYmRLYjgHewqTyhe',
                selectedServices: [],
                filteredApartments: [],
                closeApartments: [],
                resultsApartments:[],
                valueKm: 300,
                n_room: 1,
                n_bed: 1,
                title: '',
                position:'',
                long: '',
                lat:''
            }
        },

        computed: {

            results(){
                this.filteredApartments = [];
                this.apartments.forEach(apartment => {

                    if(apartment.n_beedroom >= this.n_room && apartment.n_beds >= this.n_bed){

                        if(this.closeApartments.includes(apartment)){
                            this.filteredApartments.push(apartment)
                        }

                        this.resultsApartments = [];
                        this.filteredApartments.forEach(apartment => {
                            let oneApartment = this.apartmentservices.filter(el => el.apartment_id == apartment.id);
                            let onseApartmentServices = [];
                            oneApartment.forEach(el => {
                                onseApartmentServices.push(el.service_id);
                            });
    
                            if (this.selectedServices.every(el => onseApartmentServices.includes(el)) && !this.filteredApartments.includes(apartment.id)) {
                                this.resultsApartments.push(apartment);
                            }
                        });
                    }

                });

                this.resultsApartments.sort(this.compare);
                return this.resultsApartments;

            },   
        },
        methods:{
            
            geocode(){
                console.log('geocode start');
                this.tt.services.geocode({
                key: this.key,
                query: this.title,
                }).then((response)=>{
                    // console.log(this.lat, this.long);
                    this.checkRadius(response);
                })

            },

            checkRadius(response){
                // console.log(response);
                console.log('checkRadius');
                // console.log(response.results[0].position.lat, response.results[0].position.lng);
                this.closeApartments = [];
                this.apartments.forEach((apartment) => {
                    if (this.getDistanceFromLatLonInKm(apartment, response.results[0].position.lat, response.results[0].position.lng, apartment.lat, apartment.long) < this.valueKm) {
                        this.closeApartments.push(apartment);
                }
                });

                console.log(this.closeApartments);
            },

            getDistanceFromLatLonInKm(apartment, lat1, lon1, lat2, lon2) {
                var R = 6371; // Radius of the earth in km
                var dLat = this.deg2rad(lat2-lat1);  // deg2rad below
                var dLon = this.deg2rad(lon2-lon1); 
                var a = 
                    Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) * 
                    Math.sin(dLon/2) * Math.sin(dLon/2); 
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
                var d = R * c; // Distance in km
                apartment.distance = d;
                
                return d;
            },

            deg2rad(deg) {
                return deg * (Math.PI/180)
            },

            compare( a, b ) {
                if ( a.distance < b.distance ){
                    return -1;
                }
                if ( a.distance > b.distance ){
                    return 1;
                }
            return 0;
            }

        }
    }
</script> 

<style lang="scss" scoped>
.input-search{
    border:3px solid rgb(255,90,96);
    outline:none;
   
    font-size:20px;
    border-radius:50px;
     
}
.input-search button{
    border-radius:20px;
    
}
input{
    border: 0px;
    border-bottom:1px solid lightgrey;
    outline:none;
    background:white;
}
.border-right{
    border-right:1px solid rgb(255,90,96);
}

</style>