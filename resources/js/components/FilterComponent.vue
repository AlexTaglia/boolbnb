<template>
    <div class="container">
        <div class="row justify-content-center">
            
            <input class="col-md-6 mt-4" type="text" name="title" id="title" v-model="title">
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
                    <img :src="apartment.img"  :alt="apartment.title">
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
                
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['apartments', 'services', 'apartmentservices'],
        data(){
            return {
                selectedServices: [],
                title: '',
                filteredApartments: [],
            }
        },
        computed: {
            
            results(){
                if(this.selectedServices.length > 0) {

                    this.filteredApartments = [];

                    this.apartments.forEach(apartment => {

                        let oneApartment = this.apartmentservices.filter(el => el.apartment_id == apartment.id);

                        let onseApartmentServices = [];

                        oneApartment.forEach(el => {
                            
                            onseApartmentServices.push(el.service_id);
                        });

                        if (this.selectedServices.every(el => onseApartmentServices.includes(el)) && !this.filteredApartments.includes(apartment.id)) {
                            this.filteredApartments.push(apartment);
                        }
                        
                    });

                    return this.filteredApartments;
                    
                } else {
                    return this.apartments;
                }
            }
        },
        methods:{
            
        },
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