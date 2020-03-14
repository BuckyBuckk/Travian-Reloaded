<template>
    <div class="container">
        <div class="justify-content-center text-center">
            <h1 class="my-4" v-if="resFieldTypeLong">{{ resFieldTypeLong + " Level " + resFieldLevel }}</h1>
            <h6 class="my-4" v-if="resourceInfoLookup && resFieldTypeLong">{{resourceInfoLookup[resFieldTypeLong].description}}</h6>
            <h5>
                <div v-if="resourceInfoLookup && resFieldTypeLong">Current production:        {{resourceInfoLookup[resFieldTypeLong].production[resFieldLevel]}} per hour</div>
            </h5>
            <h5 class="mb-3">
                <div v-if="resourceInfoLookup && resFieldTypeLong">Production at Level {{ resFieldLevel+1 }}:        {{resourceInfoLookup[resFieldTypeLong].production[resFieldLevel+1]}} per hour</div>
            </h5>
            <h4> 
                <div class="mb-2">Cost for upgrading to Level {{ resFieldLevel+1 }}:</div>
            </h4>
            <h5 class="mb-3"> 
                <div>
                    <img style="width: 1.5rem;height: 1rem;" src="/storage/images/wood.gif"> 10 |
                    <img style="width: 1.5rem;height: 1rem;" src="/storage/images/clay.gif"> 10 |
                    <img style="width: 1.5rem;height: 1rem;" src="/storage/images/iron.gif"> 10 |
                    <img style="width: 1.5rem;height: 1rem;" src="/storage/images/crop.gif"> 10 |
                    <img style="width: 1.5rem;height: 1rem;" src="/storage/images/consum.gif"> 10 |
                    <img style="width: 1.5rem;height: 1rem;" src="/storage/images/clock.gif"> 15
                </div>
            </h5>
            <h5 class="mt-4"> 
                <a>Upgrade to Level {{ resFieldLevel+1 }}</a> 
            </h5>
        </div>
    </div>
</template>


<script>

export default {
  data() {
    return {
      resourceInfoLookup: undefined,
      villageResources : [],
      maxResources : [0,0,0,0],
      resFieldLevel : 0,
      resFieldType : undefined,
      resFieldTypeLong : undefined,
    };
  },

  created() {
    this.fetchVillageResources();
    this.fetchVillageMaxResources();
    this.fetchVillageResFieldTypes();
    this.fetchVillageResFieldLevels();
    this.fetchResourceInfoLookup();
  },

  methods: {
    fetchResourceInfoLookup(){
        fetch('/storage/infoTables/resourceInfoLookup.json')
        .then(res => res.json())
        .then(res => this.resourceInfoLookup = res)        
        .catch(err => console.log(err));
    },
    fetchVillageResources(){
      this.villageResources = this.$store.getters.getVillageResources;

      this.$store.dispatch('fetchVillageResources')
      .then( () => {
        this.villageResources = this.$store.getters.getVillageResources;
      });
    },
    fetchVillageMaxResources(){
      this.villageMaxResources = this.$store.getters.getVillageMaxResources;

      this.$store.dispatch('fetchVillageMaxResources')
      .then( () => {
        this.villageMaxResources = this.$store.getters.getVillageMaxResources;
      });
    },
    fetchVillageResFieldLevels(){
        fetch('/api/villageFieldLevels/1')
        .then(res => res.json())
        .then(res => {
            let rfid = this.$route.params.rfid;
            if (rfid > 4) rfid--;
            if (rfid > 11) rfid--;
            if (rfid > 18) rfid--;
            let key = "resField"+rfid+"Level";
            this.resFieldLevel = res[key];
        })
        .catch(err => console.log(err));
    },
    fetchVillageResFieldTypes(){
        fetch('/api/villageFieldTypes/1')
        .then(res => res.json())
        .then(res => {
            let rfid = this.$route.params.rfid;
            
            if (rfid > 4) rfid--;
            if (rfid > 11) rfid--;
            if (rfid > 18) rfid--;

            let key = "resField"+rfid+"Type";
            this.resFieldType = res[key];

            if(this.resFieldType == "wood"){
                this.resFieldTypeLong = "Woodcutter";
            }
            else if(this.resFieldType == "clay"){
                this.resFieldTypeLong = "Claypit";
            }
            else if(this.resFieldType == "iron"){
                this.resFieldTypeLong = "Ironmine";
            }
            else if(this.resFieldType == "crop"){
                this.resFieldTypeLong = "Cropland";
            }
        })
        .catch(err => console.log(err));
    },
  }
}
</script>