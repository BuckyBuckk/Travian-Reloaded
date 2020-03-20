<template>
  <div>
    <div class="container">
      <div class="d-flex justify-content-center" id="villageResources">
        <ul class="list-group list-group-horizontal flex-row">
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="/storage/images/wood.gif">
              <span id="currentWood">{{ villageResources[0] }}</span>/<span id="maxWood">{{ villageMaxResources[0] }}</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="/storage/images/clay.gif">
              <span id="currentClay">{{ villageResources[1] }}</span>/<span id="maxClay">{{ villageMaxResources[1] }}</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="/storage/images/iron.gif">
              <span id="currentIron">{{ villageResources[2] }}</span>/<span id="maxIron">{{ villageMaxResources[2] }}</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="/storage/images/crop.gif">
              <span id="currentCrop">{{ villageResources[3] }}</span>/<span id="maxCrop">{{ villageMaxResources[3] }}</span>
          </li>
      </ul>
    </div>
  </div>

  <!-- Main Body -->
  <div class="container mt-4">
    <div class="row">
        <!-- Resource Fields -->
        <div class="col-md-8 col-sm-12 col-12">
          <div class="h2 text-center mb-4"><strong>VillageName</strong></div>

          <div class="grid">
              <ul id="hexGrid" style="padding-left: 0px;">
                  <li class="hex" v-for="(villageResFieldColor, index) in villageResFieldColors" :key="index">
                      <div class="hexIn" v-if="index == 0 || index == 4 || index == 18">
                      </div>

                      <div class="hexIn" v-else-if="index == 11">
                        <router-link class="hexLink" :to="{ name: 'village' }">
                          <div class='img' v-bind:style="'background-color:'+villageResFieldColor">
                              <p style="top:35%;opacity:1;color:black">{{villageResFieldLevels[index]}}</p>
                          </div>
                          <h1 id="demo1"></h1>
                          <p id="demo2"></p>
                        </router-link>
                      </div>
                      
                      <div class="hexIn" v-else>
                        <router-link class="hexLink" :to="{ path: '/resourceField/' + index }">
                          <div class='img' v-bind:style="'background-color:'+villageResFieldColor">
                              <p style="top:35%;opacity:1;color:black">{{villageResFieldLevels[index]}}</p>
                          </div>
                          <h1 id="demo1"></h1>
                          <p id="demo2"></p>
                        </router-link>
                      </div>
                  </li>
              </ul>                
          </div>          
            
          <div class="h3 pl-5 ml-4 my-3" v-if="villageResFieldUpgrades.length > 0">Buildings:</div>
          <div class="d-flex justify-content-between  pl-5 ml-4" v-if="villageResFieldUpgrades.length > 0">
              <h5><img style="width: 1.0rem;height: 0.9rem;" src="/storage/images/del.gif"> 
                {{ villageResFieldUpgrades[0].fieldType }} 
                (Level {{ villageResFieldUpgrades[0].fieldLevel }})</h5>
              <h5>in <span id="upgradeCD1">{{villageResFieldUpgrades[0].timeCompleted}}</span> hours</h5>
              <h5>done at {{villageResFieldUpgrades[0].timeCompleted}} </h5>
          </div>
          <div class="d-flex justify-content-between  pl-5 ml-4" v-if="villageResFieldUpgrades.length == 2">
              <h5><img style="width: 1.0rem;height: 0.9rem;" src="/storage/images/del.gif"> 
                {{ villageResFieldUpgrades[1].fieldType }} 
                (Level {{ villageResFieldUpgrades[1].fieldLevel }})</h5>
              <h5>in <span id="upgradeCD1">{{villageResFieldUpgrades[1].timeCompleted}}</span> hours</h5>
              <h5>done at {{villageResFieldUpgrades[1].timeCompleted}} </h5>
          </div>
        </div>

        <!-- Troop Movements and other stuff on the right -->
        <div class="col-md-4 text-center mb-3">

          <div class="h3">Troop Movements:</div>
          <div  v-if="villageIncomingAttacks.length > 0 || villageOutgoingAttacks.length > 0 || 
                      villageIncomingReinforcements.length > 0 || villageOutgoingReinforcements.length > 0">
            <div class="d-flex justify-content-between">
              <h5 style="color:Red"><img style="width: 1.2rem;" src="/storage/images/att_inc.gif"><strong> {{villageIncomingAttacks.length}} Attacks</strong></h5>
              <h5>in <span id="incAtt">{{villageIncomingAttacks[0].timeArrived}}</span></h5>
            </div>
            <div class="d-flex justify-content-between">
              <h5 style="color:Orange"><img style="width: 1.2rem;" src="/storage/images/att_out.gif"><strong> {{villageOutgoingAttacks.length}} Attacks</strong></h5>
              <h5>in <span id="outAtt">{{villageOutgoingAttacks[0].timeArrived}}</span></h5>
            </div>
            <div class="d-flex justify-content-between">
              <h5 style="color:Orange"><img style="width: 1.2rem;" src="/storage/images/reinf_inc.gif"><strong> {{villageIncomingReinforcements.length}} Reinf.</strong></h5>
              <h5>in <span id="incAtt">{{villageIncomingReinforcements[0].timeArrived}}</span></h5>
            </div>
            <div class="d-flex justify-content-between">
              <h5 style="color:Green"><img style="width: 1.2rem;" src="/storage/images/reinf_out.gif"><strong> {{villageOutgoingReinforcements.length}} Reinf.</strong></h5>
              <h5>in <span id="incAtt">{{villageOutgoingReinforcements[0].timeArrived}}</span></h5>
            </div>
          </div>
          <div class="h5" v-else>
            <div class="text-center">
              <h5>None</h5>
            </div>
          </div>

          <div class="h3 mt-3">Production:</div>
          <div class="d-flex justify-content-between">
              <h5><img style="width: 1.5rem;height: 1rem;" src="/storage/images/wood.gif"> Wood:</h5>
              <h5><strong>{{villageProduction[0]}}</strong> per hour</h5>
          </div>
          <div class="d-flex justify-content-between">
              <h5><img style="width: 1.5rem;height: 1rem;" src="/storage/images/clay.gif"> Clay:</h5>
              <h5><strong>{{villageProduction[1]}}</strong> per hour</h5>
          </div>
          <div class="d-flex justify-content-between">
              <h5><img style="width: 1.5rem;height: 1rem;" src="/storage/images/iron.gif"> Iron:</h5>
              <h5><strong>{{villageProduction[2]}}</strong> per hour</h5>
          </div>
          <div class="d-flex justify-content-between">
              <h5><img style="width: 1.5rem;height: 1rem;" src="/storage/images/crop.gif"> Crop:</h5>
              <h5><strong>{{villageProduction[3]}}</strong> per hour</h5>
          </div>

          <div class="h3 mt-3">Troops:</div>
          <div class="h5" v-if="villageOwnTroops.length > 0">
            <div class="d-flex justify-content-center" v-for="(villageOwnTroop, index) in villageOwnTroops" :key="index">
                  <h5 v-if="villageOwnTroop"><img src="/storage/images/maceman.gif">  {{villageOwnTroop}} Macemen </h5>
                  <!-- TODO needs troopInfoLookup -->
            </div>
          </div>
          <div class="h5" v-else>
            <div class="text-center">
              <h5>None</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</template>

<script>

export default {
  data() {
    return {
      villageResources : [],
      villageMaxResources : [],
      villageResFieldLevels : [],
      villageResFieldTypes : [],
      villageResFieldColors : [],
      villageProduction : [],
      villageResFieldUpgrades : [],
      villageOwnTroops : [],
      villageReinforcements : [],
      villageIncomingAttacks : [],
      villageIncomingReinforcements : [],
      villageOutgoingAttacks : [],
      villageOutgoingReinforcements : [],
    };
  },

  created() {
    this.fetchVillageResources();
    this.fetchVillageMaxResources();
    this.fetchVillageResFieldTypes();
    this.fetchVillageResFieldLevels();
    this.fetchVillageTroopMovements();
    this.fetchVillageProduction();
    this.fetchVillageOwnTroops();
    this.fetchVillageReinforcements();
    this.fetchVillageResFieldUpgrades();
    this.calculateProduction();
    //this.startIntervals();
  },

  methods: {
    calculateProduction(){
      fetch('/api/calculateProduction/1')
      .then( () => {
        this.fetchVillageProduction();
      })
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
      this.villageResFieldLevels = this.$store.getters.getVillageResFieldLevels;

      this.$store.dispatch('fetchVillageResFieldLevels')
      .then( () => {
        this.villageResFieldLevels = this.$store.getters.getVillageResFieldLevels;
      });
    },
    fetchVillageResFieldTypes(){
      this.villageResFieldTypes = this.$store.getters.getVillageResFieldTypes;
      this.villageResFieldColors = this.$store.getters.getVillageResFieldColors;

      this.$store.dispatch('fetchVillageResFieldTypes')
      .then( () => {
        this.villageResFieldTypes = this.$store.getters.getVillageResFieldTypes;
        this.villageResFieldColors = this.$store.getters.getVillageResFieldColors;
      });
    },
    fetchVillageProduction(){
      this.villageProduction = this.$store.getters.getVillageProduction;

      this.$store.dispatch('fetchVillageProduction')
      .then( () => {
        this.villageProduction = this.$store.getters.getVillageProduction;
      })
      .then( () => {
        this.startIntervals();
      });
    },
    fetchVillageResFieldUpgrades(){
      this.villageResFieldUpgrades = this.$store.getters.getVillageResFieldUpgrades;

      this.$store.dispatch('fetchVillageResFieldUpgrades')
      .then( () => {
        this.villageResFieldUpgrades = this.$store.getters.getVillageResFieldUpgrades;
      });
    },
    fetchVillageOwnTroops(){
      this.villageOwnTroops = this.$store.getters.getVillageOwnTroops;

      this.$store.dispatch('fetchVillageOwnTroops')
      .then( () => {
        this.villageOwnTroops = this.$store.getters.getVillageOwnTroops;
      });
    },
    fetchVillageReinforcements(){
      this.villageReinforcements = this.$store.getters.getVillageReinforcements;

      this.$store.dispatch('fetchVillageReinforcements')
      .then( () => {
        this.villageReinforcements = this.$store.getters.getVillageReinforcements;
      });
    },
    fetchVillageTroopMovements(){
      this.villageOutgoingAttacks = this.$store.getters.getVillageOutgoingAttacks;
      this.villageOutgoingReinforcements = this.$store.getters.getVillageOutgoingReinforcements;
      this.villageIncomingAttacks = this.$store.getters.getVillageIncomingAttacks;
      this.villageIncomingReinforcements = this.$store.getters.getVillageIncomingReinforcements;

      this.$store.dispatch('fetchVillageTroopMovements')
      .then( () => {
        this.villageOutgoingAttacks = this.$store.getters.getVillageOutgoingAttacks;
        this.villageOutgoingReinforcements = this.$store.getters.getVillageOutgoingReinforcements;
        this.villageIncomingAttacks = this.$store.getters.getVillageIncomingAttacks;
        this.villageIncomingReinforcements = this.$store.getters.getVillageIncomingReinforcements;
      });
    },
    startIntervals(){
      let woodInterval = setInterval( ()=> {
        let curWood = document.getElementById("currentWood").innerHTML;
        let maxWood = document.getElementById("maxWood").innerHTML;
        if(parseInt(curWood) < parseInt(maxWood)){
            document.getElementById("currentWood").innerHTML=parseInt(curWood)+1;
        }
        else if(document.getElementById("currentWood").innerHTML && document.getElementById("maxWood").innerHTML){
            clearInterval(woodInterval);
        }
      }, 1000*3600 / this.villageProduction[0]);

      let clayInterval = setInterval( ()=> {
        let curClay = document.getElementById("currentClay").innerHTML;
        let maxClay = document.getElementById("maxClay").innerHTML;
        if(parseInt(curClay) < parseInt(maxClay)){
            document.getElementById("currentClay").innerHTML=parseInt(curClay)+1;
        }
        else if(document.getElementById("currentClay").innerHTML && document.getElementById("maxClay").innerHTML){
            clearInterval(clayInterval);
        }
      }, 1000*3600 / this.villageProduction[1]);

      let ironInterval = setInterval( ()=> {
        let curIron = document.getElementById("currentIron").innerHTML;
        let maxIron = document.getElementById("maxIron").innerHTML;
        if(parseInt(curIron) < parseInt(maxIron)){
            document.getElementById("currentIron").innerHTML=parseInt(curIron)+1;
        }
        else if(document.getElementById("currentIron").innerHTML && document.getElementById("maxIron").innerHTML){
            clearInterval(ironInterval);
        }
      }, 1000*3600 / this.villageProduction[2]);
        
      let cropInterval = setInterval( ()=> {
        let curCrop = document.getElementById("currentCrop").innerHTML;
        let maxCrop = document.getElementById("maxCrop").innerHTML;
        if(parseInt(curCrop) < parseInt(maxCrop)){
            document.getElementById("currentCrop").innerHTML=parseInt(curCrop)+1;
        }
        else if(document.getElementById("currentCrop").innerHTML && document.getElementById("maxCrop").innerHTML){
            clearInterval(cropInterval);
        }
      }, 1000*3600 / this.villageProduction[3]);
    }
  }
}
</script>
