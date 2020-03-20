<template>
    <div class="container">
        <div class="justify-content-center text-center">
            <h1 class="my-4"> Barracks Level 1</h1>
            <h6 class="my-4">All foot soldier are trained in the barracks. The higher the level of the barracks, the faster the troops are trained.</h6>
            <table class="table table-bordered w-75 m-auto">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col" style="max-width:150px">Quantity</th>
                    <th scope="col">Max</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="align-middle">
                            <img style="width: 1.2rem;height: 1rem;" src="/storage/images/maceman.gif">Maceman (Available: {{villageOwnTroops[0]}})
                            
                            <img style="width: 1.2rem;height: 1rem;" src="/storage/images/wood.gif"> 95 |
                            <img style="width: 1.2rem;height: 1rem;" src="/storage/images/clay.gif"> 75 |
                            <img style="width: 1.2rem;height: 1rem;" src="/storage/images/iron.gif"> 40 |
                            <img style="width: 1.2rem;height: 1rem;" src="/storage/images/crop.gif"> 40 |
                            <img style="width: 1.2rem;height: 1rem;" src="/storage/images/consum.gif"> 1 |
                            <img style="width: 1.2rem;height: 1rem;" src="/storage/images/clock.gif"> 0:00:10
                        </th>
                        <td class="align-middle">
                            <div class="input-group input-group-sm mb-3 align-middle">
                                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="unit1">
                            </div>
                        </td>
                        <td class="align-middle">
                            <a onclick="insertTroops(1);" href="#" style="color:green" v-if="maxTroopsToTrain"><strong>(<span id="maxTroops1">{{maxTroopsToTrain[0]}}</span>)</strong></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="btn-group my-4 w-75" role="group" aria-label="Train">
                <button type="button" class="btn btn-success w-75 m-auto mt-3" onclick="train();">Train</button>
            </div>
            <!--
            <?php
            if($allTroopProduction){
                echo
                '<table class="table table-bordered w-75 m-auto">
                    <thead >
                        <tr>
                        <th scope="col">Training</th>
                        <th scope="col" style="max-width:150px">Duration</th>
                        <th scope="col">Finished</th>
                        </tr>
                    </thead>
                    <tbody>
                        ';
                            foreach ($troopProdHtml as $troopProdHtml) {
                                echo $troopProdHtml;
                            };
                        echo '
                    </tbody>
                </table>';
            };
            ?>
            -->
            <h5 class="mt-5"> <p>Current training time:        100 percent</p></h5>
            <h5> <p>Training time at level 2:        96 percent</p></h5>
            <h4> <p>Cost for upgrading to Level 2:</p></h4>
            <h5> <p>
                <img style="width: 1.5rem;height: 1rem;" src="/storage/images/wood.gif"> 40 |
                <img style="width: 1.5rem;height: 1rem;" src="/storage/images/clay.gif"> 100 |
                <img style="width: 1.5rem;height: 1rem;" src="/storage/images/iron.gif"> 50 |
                <img style="width: 1.5rem;height: 1rem;" src="/storage/images/crop.gif"> 60 |
                <img style="width: 1.5rem;height: 1rem;" src="/storage/images/consum.gif"> 2 |
                <img style="width: 1.5rem;height: 1rem;" src="/storage/images/clock.gif"> 0:00:03</p>
            </h5>
            <h6> <a>Upgrade to Level 2</a> </h6>
        </div>
    </div>
</template>


<script>

export default {
  data() {
    return {
      troopInfoLookup: [],
      villageResources : undefined,
      maxResources : undefined,
      villageBuildingLevel : undefined,
      villageBuildingName : undefined,
      villageOwnTroops: undefined,
      villageBarracksProduction : undefined,
      maxTroopsToTrain : undefined,
    };
  },

  created() {
    this.fetchvillageResources();
    this.fetchMaxResources();
    this.fetchVillageOwnTroops();
    //this.fetchResFieldTypes();
    //this.fetchResFieldLevels();
    this.fetchVillageBarracksProduction();
    //this.calculateMaxTroopsToTrain();
    //this.fetchTroopInfoLookup();
  },

  methods: {
    fetchResourceInfoLookup(){
        fetch('/storage/infoTables/troopInfoLookup.json')
        .then(res => res.json())
        .then(res => this.troopInfoLookup = res)        
        .catch(err => console.log(err));
    },
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
    fetchVillageOwnTroops(){
      this.villageOwnTroops = this.$store.getters.getVillageOwnTroops;

      this.$store.dispatch('fetchVillageOwnTroops')
      .then( () => {
        this.villageOwnTroops = this.$store.getters.getVillageOwnTroops;
      });
    },
    fetchVillageBarracksProduction(){
        this.villageBarracksProduction = this.$store.getters.getVillageBarracksProduction;

        this.$store.dispatch('fetchVillageBarracksProduction')
        .then( () => {
            this.villageBarracksProduction = this.$store.getters.getVillageBarracksProduction;
        });
    },
    /*
    async calculateMaxTroopsToTrain(){
        let test = await fetchvillageResources()
        .then(() => {
            console.log("this");
        });
        //let troopInfo = await this.troopInfoLookup;
        let troopInfo = [];
        troopInfo[0] = [95,75,40,40];

        this.maxTroopsToTrain = [];
        this.maxTroopsToTrain[0] = Math.floor(Math.min(currentResources[0]/troopInfo[0][0],currentResources[1]/troopInfo[0][1],currentResources[2]/troopInfo[0][2],currentResources[3]/troopInfo[0][3]));

    },
    */
  },

  watch : {
    villageResources : function(villageResources){
        if(this.troopInfoLookup){
            this.troopInfoLookup[0] = [95,75,40,40];
            this.maxTroopsToTrain = [];
            this.maxTroopsToTrain[0] = Math.floor(Math.min(villageResources[0]/this.troopInfoLookup[0][0],villageResources[1]/this.troopInfoLookup[0][1],villageResources[2]/this.troopInfoLookup[0][2],villageResources[3]/this.troopInfoLookup[0][3]));
        }
    }
  }
}
</script>