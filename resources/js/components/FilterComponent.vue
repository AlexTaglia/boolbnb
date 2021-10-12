<template>
    <div class="row">
         
        <input class="col" type="text" name="title" id="title" v-model="title">

        <!-- <select  id="" v-model="sort" @change="sortValue">
            <option value="1" >Active</option>
            <option value="0" >In-Active</option>
        </select> -->

        <div class="col title">{{ title }}</div>

        <div class="col card-body">
            <ul v-for="apartment in results" :key='apartment.id'>
                <li>{{ apartment.title }} </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        props:['apartments'],
        data(){
            return {
                // sort:'',
                title: ''
            }
        },
        computed: {
            results(){
                if(this.title.length > 0) {
                    return this.apartments.filter(el => el.toLowerCase().includes(this.title.toLowerCase()));
                } else {
                    return this.apartments;
                }
            }
        },
        methods:{
        //    loadPost(){
        //        this.post=this.post
        //    },
        //    sortValue(){
        //        axios.post('/filter',{ sort:this.sort })
        //        .then(response => ( this.post=response.data.post ))
        //    }
        //     sort(array, query) {
        //         return array.filter(el => el.toLowerCase().includes(query.toLowerCase()));
        //     }
        },
    }
</script> 

<style lang="scss" scoped>
    .title, .card-body {
        color: white;
    }
</style>