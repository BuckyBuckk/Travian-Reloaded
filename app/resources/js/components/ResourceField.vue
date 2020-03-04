<template>
    <div class="container">
        <div class="justify-content-center text-center">
            <h1 class="my-4" v-if="resFieldTypeLong">{{ resFieldTypeLong + " Level " + resFieldLevel }}</h1>
            <h6 class="my-4">Wood is produced here. By increasing its level you increase the production of wood.</h6>
            <h5>
                <div>Current production:        10 per hour</div>
            </h5>
            <h5>
                <div>Production at Level {{ resFieldLevel+1 }}:        20 per hour</div>
            </h5>
            <br />
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
      villageResources : [0,0,0,0],
      maxResources : [0,0,0,0],
      resFieldLevel : "",
      resFieldType : "",
      resFieldTypeLong : "",
    };
  },

  created() {
    this.fetchvillageResources();
    this.fetchMaxResources();
    this.fetchResFieldTypes();
    this.fetchResFieldLevels();
  },

  methods: {
    fetchvillageResources(){
        fetch('/api/villageResources/1')
        .then(res => res.json())
        .then(res => {
            this.villageResources = [res.currentWood,res.currentClay,res.currentIron,res.currentCrop];
        })
        .catch(err => console.log(err));
    },
    fetchMaxResources(){
        fetch('/api/villageMaxResources/1')
        .then(res => res.json())
        .then(res => {
            this.maxResources = [res.maxWood,res.maxClay,res.maxIron,res.maxCrop];
        })
        .catch(err => console.log(err));
    },
    fetchResFieldLevels(){
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
    fetchResFieldTypes(){
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