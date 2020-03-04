<template>
  <div>
    <div class="container">
      <div class="d-flex justify-content-center" id="villageResources">
        <ul class="list-group list-group-horizontal flex-row">
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="/storage/images/wood.gif">
              <span id="currentWood">{{ villageResources[0] }}</span>/<span id="maxWood">{{ maxResources[0] }}</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="/storage/images/clay.gif">
              <span id="currentClay">{{ villageResources[1] }}</span>/<span id="maxClay">{{ maxResources[1] }}</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="/storage/images/iron.gif">
              <span id="currentIron">{{ villageResources[2] }}</span>/<span id="maxIron">{{ maxResources[2] }}</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="/storage/images/crop.gif">
              <span id="currentCrop">{{ villageResources[3] }}</span>/<span id="maxCrop">{{ maxResources[3] }}</span>
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
                  <li class="hex" v-for="(resFieldColor, index) in resFieldColors" :key="index">
                      <div class="hexIn" v-if="index == 0 || index == 4 || index == 18">
                      </div>
                      
                      <div class="hexIn" v-else>
                        <router-link class="hexLink" :to="{ path: '/resourceField/' + index }">
                          <div class='img' v-bind:style="'background-color:'+resFieldColor">
                              <p style="top:35%;opacity:1;color:black">{{resFieldLevels[index]}}</p>
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
                    <h5><img src="/storage/images/maceman.gif">  {{villageOwnTroop}} Macemen </h5>
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
      villageResources : [0,0,0,0],
      maxResources : [0,0,0,0],
      resFieldLevels : [],
      resFieldTypes : [],
      resFieldColors : ["","Green","Orange","Silver","","Silver","Gold","Gold","Green","Orange","Gold","White","Gold","Orange","Green","Gold","Gold","Silver","","Silver","Orange","Green"],
      villageProduction : [0,0,0,0],
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
    //this.fetchArticles();
    this.fetchvillageResources();
    this.fetchMaxResources();
    this.fetchResFieldTypes();
    this.fetchResFieldLevels();
    this.fetchVillageTroopMovements();
    this.fetchVillageProduction();
    this.fetchVillageOwnTroops();
    this.fetchVillageReinforcements();
    this.fetchResFieldUpgrades();
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
          this.resFieldLevels = ["",res.resField1Level,res.resField2Level,res.resField3Level,"",
          res.resField4Level,res.resField5Level,res.resField6Level,res.resField7Level,
          res.resField8Level,res.resField9Level,"Village",res.resField10Level,res.resField11Level,
          res.resField12Level,res.resField13Level,res.resField14Level,res.resField15Level,
          "",res.resField16Level,res.resField17Level,res.resField18Level];
        })
        .catch(err => console.log(err));
    },
    fetchResFieldTypes(){
        fetch('/api/villageFieldTypes/1')
        .then(res => res.json())
        .then(res => {
          this.resFieldTypes = ["",res.resField1Type,res.resField2Type,res.resField3Type,"",
          res.resField4Type,res.resField5Type,res.resField6Type,res.resField7Type,
          res.resField8Type,res.resField9Type,"village",res.resField10Type,res.resField11Type,
          res.resField12Type,res.resField13Type,res.resField14Type,res.resField15Type,
          "",res.resField16Type,res.resField17Type,res.resField18Type];
          
          this.resFieldColors = this.resFieldTypes.map(type => {
              if(type == "wood"){ return "Green"}
              else if(type == "clay"){ return "Orange"}
              else if(type == "iron"){ return "Silver"}
              else if(type == "crop"){ return "Gold"}
              else if(type == "village"){ return "White"}
              else {return ""}
          });
        })
        .catch(err => console.log(err));
    },
    fetchVillageProduction(){
        fetch('/api/villageProductions/1')
        .then(res => res.json())
        .then(res => {
          this.villageProduction = [res.productionWood,res.productionClay,res.productionIron,res.productionCrop];
        })
        .catch(err => console.log(err));
    },
    fetchResFieldUpgrades(){
        fetch('/api/resFieldUpgrades/1')
        .then(res => res.json())
        .then(res => {
          this.villageResFieldUpgrades = res;
        })
        .catch(err => console.log(err));
    },
    fetchVillageOwnTroops(){
        fetch('/api/villageOwnTroops/1')
        .then(res => res.json())
        .then(res => {        
          this.villageOwnTroops = [res.troop1,res.troop2,res.troop3,res.troop4,res.troop5,
          res.troop6,res.troop7,res.troop8,res.troop9,res.troop10];
        })
        .catch(err => console.log(err));
    },
    fetchVillageReinforcements(){
        fetch('/api/villageReinforcements/1')
        .then(res => res.json())
        .then(res => {
          this.villageReinforcements = res;
        })
        .catch(err => console.log(err));
    },
    fetchVillageTroopMovements(){
        fetch('/api/sendTroops/1')
        .then(res => res.json())
        .then(res => {

          for(let troopMovement of res){
            if(troopMovement.idVillageFrom == 1){
              if(troopMovement.sendType == "full" || troopMovement.sendType == "raid"){
                this.villageOutgoingAttacks.push(troopMovement);
              }
              else if(troopMovement.sendType == "reinforcement"){
                this.villageOutgoingReinforcements.push(troopMovement);
              }
            }
            else if(troopMovement.idVillageTo == 1){
              if(troopMovement.sendType == "full" || troopMovement.sendType == "raid"){
                this.villageIncomingAttacks.push(troopMovement);
              }
              else if(troopMovement.sendType == "reinforcement"){
                this.villageIncomingReinforcements.push(troopMovement);
              }
            }
          }

        })
        .catch(err => console.log(err));
    }
  }
}
</script>
