<template>
    <div class="row">
         
        <input class="col" type="text" name="title" id="title" v-model="title">

        <div class="col-3" v-for="service in services" :key="service.id">
            <label :for="service.name">{{ service.name }}</label>
            <input type="checkbox" :name="service.name" :id="service.name" :value="service.id" v-model="selectedServices">
        </div>

        {{ selectedServices }}

        <!-- <select  id="" v-model="sort" @change="sortValue">
            <option value="1" >Active</option>
            <option value="0" >In-Active</option>
        </select> -->

        <div class="col title">{{ title }}</div>

        <div class="col card-body">
            <ul>
                <li v-for="apartment in results" :key="apartment.id">{{ apartment.title }} </li>
            </ul>
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
    * {
        color: white;
    }
</style>