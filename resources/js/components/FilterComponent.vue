<template>
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-12">
                <input class="col-md-6 mt-4" type="text" name="title" id="title" @keyup="geocode()"  v-model="title">
            </div>

            <div class="col-12">
                <label for="n_room">Numero minimo di stanze</label>
                <input name="n_room" type="number" min="1" max="6" v-model="n_room">
                <label for="n_bed">Numero minimo di letti</label>
                <input type="number" min="1" max="12" v-model="n_bed">
                <label for="distanza">Distanza</label>
                <input name="distanza" type="range" min="20" max="2000" v-model="valueKm" @change="geocode()"> <span>{{valueKm}} km</span>
            </div>

            <div class="container-fluid">
                <h1>Ricerca per servizi:</h1>
                <div class="row justify-content-center p-3">
                    <div class="col-4 d-flex justify-content-center " v-for="service in services" :key="service.id">
                        <label class="p-1" :for="service.name">{{ service.name }}</label>
                        <input type="checkbox" :name="service.name" :id="service.name" :value="service.id" v-model="selectedServices">
                    </div>
                </div>
            </div>

        </div>

        <h1>Risultato:</h1>

        <div class="row justify-content-center">

            <div class="card-body " v-for="apartment in results" :key="apartment.id">
                
                <h3 >{{apartment.title}} </h3>
                <div class="img-cont mb-3">
                    <img :src=" `storage/${apartment.img}`"  :alt="apartment.title">
                </div>
                      
                <h5>
                    {{apartment.n_beds}} camera da letto
                </h5> 
                <h5>
                    {{apartment.n_bathrooms}} bagno
                </h5>
                <h5>
                    {{apartment.square_meters}} mq
                </h5>
                <h5>
                    Indirizzo: {{apartment.address}}
                </h5>  
                <h5>
                Prezzo a notte:
                    <strong>
                        € {{ apartment.price_per_night}}     
                    </strong>      
                </h5>  

                <div class="buttons">
                    <a :href="`/apartment/${apartment.id}`" target="">
                        <button class="btn btn-warning">
                            <i class="bi bi-zoom-in"></i>
                        </button>
                    </a>
                </div>
                
            </div>
        </div>
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
h3{
    height: 90px;
    font-size: 24px;
}
.img-cont{

    img{
        width: 100%;     
    }
}
.card-body{
    max-width: calc(100% / 3 - 10px);
    margin: 5px;
    border: 1px black solid;
}
</style>