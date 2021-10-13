<template>
        <div id='map-div' class='map'></div>
</template>

<script>
export default {

  props:['apartment'],

  data(){
    return{
      tt: window.tt,
      long: this.apartment.long,
      lat: this.apartment.lat,
      key: 'K35TCsKGW4huvzCAhYmRLYjgHewqTyhe',
    }
  },

  mounted() {
    this.getMap();
  },

  methods:{

    // recuperare mappa con tom tom api
    getMap(){
      console.log('getmap')
      var map = this.tt.map({
          key: this.key,
          container: 'map-div',
          center: [this.long, this.lat],
          zoom: 16,
      });
      
        map.addControl(new this.tt.FullscreenControl());
        map.addControl(new this.tt.NavigationControl());
        this.addMarker(map);
    },
        
    // Aggiunge segna posto sulle coordinata
    addMarker(map){
      var location = [this.long, this.lat];
      var popupOffsets = 25;

      var marker = new this.tt.Marker().setLngLat(location).addTo(map);
      var popup = new this.tt.Popup({offset: popupOffsets});
      this.reverseGeocoding(marker, popup);
      marker.setPopup(popup).togglePopup();
    },
    
    
    // Trasforma  longitudine e latitudine in indirizzo
    reverseGeocoding(marker, popup) { 
      this.tt.services.reverseGeocode({ 
          key: this.key, 
          position: marker.getLngLat() 
      }).then( function( result ){ 
          popup.setHTML(result.addresses[0].address.freeformAddress); 

          // Aggiunge in un div l'indirizzo
          var myDiv = document.getElementById("adress");
          myDiv.innerHTML = result.addresses[0].address.freeformAddress;
      }) 
    },
  }
}
</script>

<style lang="scss">

#map-div {
    height: 100%;
    width: 100%;
    border: 1px solid #d3d1d1;
    border-radius: 20px;
}

</style>