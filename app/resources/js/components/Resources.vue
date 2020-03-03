<template>
  <div>
    <div class="container">
      <div class="d-flex justify-content-center" id="villageResources">
        <ul class="list-group list-group-horizontal flex-row">
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="storage/images/wood.gif">
              <span id="currentWood">{{ villageResources[0] }}</span>/<span id="maxWood">{{ maxResources[0] }}</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="storage/images/clay.gif">
              <span id="currentClay">{{ villageResources[1] }}</span>/<span id="maxClay">{{ maxResources[1] }}</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="storage/images/iron.gif">
              <span id="currentIron">{{ villageResources[2] }}</span>/<span id="maxIron">{{ maxResources[2] }}</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="storage/images/crop.gif">
              <span id="currentCrop">{{ villageResources[3] }}</span>/<span id="maxCrop">{{ maxResources[3] }}</span>
          </li>
      </ul>
    </div>
  </div>

  <div class="container" style="min-height:30px"></div>

    <!-- Main Body -->
  <div class="container">
    <div class="row">
        <!-- Resource Fields -->
        <div class="col-md-8 col-sm-12 col-12">
            <div class="h2 text-center mb-4"><strong> VillageName</strong></div>

            <div class="grid">
                <ul id="hexGrid" style="padding-left: 0px;">
                    <li class="hex" v-for="(resFieldColor, index) in resFieldColors" :key="index">
                        <div class="hexIn" v-if="index == 0 || index == 4 || index == 18">
                        </div>

                        <div class="hexIn" v-else>
                            <a class="hexLink" :href="'resourceField?rfid='+ index">
                                <div class='img' v-bind:style="'background-color:'+resFieldColor">
                                    <p style="top:35%;opacity:1;color:black">{{resFieldLevels[index]}}</p>
                                </div>
                                <h1 id="demo1"></h1>
                                <p id="demo2"></p>
                            </a>
                        </div>
                    </li>
                </ul>                
            </div>            
            <div class="h3 pl-5 ml-4 my-3" v-if="villageResFieldUpgrades.length > 0">Buildings:</div>
            <div class="d-flex justify-content-between  pl-5 ml-4" v-if="villageResFieldUpgrades.length > 0">
                <h5><img style="width: 1.0rem;height: 0.9rem;" src="/img/del.gif"> 
                  {{ villageResFieldUpgrades[0].fieldType }} 
                  (Level {{ villageResFieldUpgrades[0].fieldLevel }})</h5>
                <h5>in <span id="upgradeCD1">{{villageResFieldUpgrades[0].timeCompleted}}</span> hours</h5>
                <h5>done at {{villageResFieldUpgrades[0].timeCompleted}} </h5>
            </div>
            <div class="d-flex justify-content-between  pl-5 ml-4" v-if="villageResFieldUpgrades.length == 2">
                <h5><img style="width: 1.0rem;height: 0.9rem;" src="/img/del.gif"> 
                  {{ villageResFieldUpgrades[1].fieldType }} 
                  (Level {{ villageResFieldUpgrades[1].fieldLevel }})</h5>
                <h5>in <span id="upgradeCD1">{{villageResFieldUpgrades[1].timeCompleted}}</span> hours</h5>
                <h5>done at {{villageResFieldUpgrades[1].timeCompleted}} </h5>
            </div>
        </div>

        <!-- Troop Movements and other stuff on the right -->
        <div class="col-md-3 text-center mb-3">
            <!--
            <?php
            if(count($incomingAttacks) || count($outgoingAttacks) || count($incomingReinforcements) || count($outgoingReinforcements)){
                echo('<p class="h3">Troop Movements:</p>');

                if(count($incomingAttacks) == 1){
                    echo('
                    <div class="d-flex justify-content-between">
                        <h5 style="color:Red"><img style="width: 1.2rem;" src="/img/att_inc.gif"><strong> '.count($incomingAttacks).' Attack</strong></h5>
                        <h5>in <span id="incAtt">'.date("H:i:s",(int)$incomingAttacks[0][5]-time()-3600).'</span></h5>
                    </div>
                    ');
                }
                else if(count($incomingAttacks) > 1){
                    echo('
                    <div class="d-flex justify-content-between">
                        <h5 style="color:Red"><img style="width: 1.2rem;" src="/img/att_inc.gif"><strong> '.count($incomingAttacks).' Attacks</strong></h5>
                        <h5>in <span id="incAtt">'.date("H:i:s",(int)$incomingAttacks[0][5]-time()-3600).'</span></h5>
                    </div>
                    ');
                }

                if(count($outgoingAttacks) == 1){
                    echo('
                    <div class="d-flex justify-content-between">
                        <h5 style="color:Orange"><img style="width: 1.2rem;" src="/img/att_out.gif"><strong> '.count($outgoingAttacks).' Attack</strong></h5>
                        <h5>in <span id="outAtt">'.date("H:i:s",(int)$outgoingAttacks[0][5]-time()-3600).'</span></h5>
                    </div>
                    ');
                    }
                else if(count($outgoingAttacks) > 1){
                    echo('
                    <div class="d-flex justify-content-between">
                    <h5 style="color:Orange"><img style="width: 1.2rem;" src="/img/att_out.gif"><strong> '.count($outgoingAttacks).' Attacks</strong></h5>
                        <h5>in <span id="outAtt">'.date("H:i:s",(int)$outgoingAttacks[0][5]-time()-3600).'</span></h5>
                    </div>'
                    );
                }
                
                if(count($incomingReinforcements)){
                    echo('
                    <div class="d-flex justify-content-between">
                    <h5 style="color:Orange"><img style="width: 1.2rem;" src="/img/att_out.gif"><strong> '.count($incomingReinforcements).' Reinf.</strong></h5>
                        <h5>in <span id="outReinf">'.date("H:i:s",(int)$incomingReinforcements[0][5]-time()-3600).'</span></h5>
                    </div>'
                    );
                }

                if(count($outgoingReinforcements)){
                    echo('
                    <div class="d-flex justify-content-between">
                    <h5 style="color:Orange"><img style="width: 1.2rem;" src="/img/def2.gif"><strong> '.count($outgoingReinforcements).' Reinf.</strong></h5>
                        <h5>in <span id="incReinf">'.date("H:i:s",(int)$outgoingReinforcements[0][5]-time()-3600).'</span></h5>
                    </div>'
                    );
                }
            }
            ?>
            -->
            <div class="h3 mt-3">Production:</div>
            <div class="d-flex justify-content-between">
                <h5><img style="width: 1.5rem;height: 1rem;" src="storage/images/wood.gif"> Wood:</h5>
                <h5><strong>{{villageProduction[0]}}</strong> per hour</h5>
            </div>
            <div class="d-flex justify-content-between">
                <h5><img style="width: 1.5rem;height: 1rem;" src="storage/images/clay.gif"> Clay:</h5>
                <h5><strong>{{villageProduction[1]}}</strong> per hour</h5>
            </div>
            <div class="d-flex justify-content-between">
                <h5><img style="width: 1.5rem;height: 1rem;" src="storage/images/iron.gif"> Iron:</h5>
                <h5><strong>{{villageProduction[2]}}</strong> per hour</h5>
            </div>
            <div class="d-flex justify-content-between">
                <h5><img style="width: 1.5rem;height: 1rem;" src="storage/images/crop.gif"> Crop:</h5>
                <h5><strong>{{villageProduction[3]}}</strong> per hour</h5>
            </div>
            <div class="h3 mt-3">Troops:</div>
            <div class="h5" v-if="villageOwnTroops.length > 0">
              <div class="d-flex justify-content-center" v-for="(villageOwnTroop, index) in villageOwnTroops" :key="index">
                    <h5><img src="">  {{villageOwnTroop}} Macemen </h5>
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
      articles: [],
      article: {
        id: '',
        title: '',
        body: ''
      },
      article_id: '',
      pagination: {},
      edit: false,
      villageResources : [],
      maxResources : [],
      resFieldLevels : [],
      resFieldTypes : [],
      resFieldColors : ["","Green","Orange","Silver","","Silver","Gold","Gold","Green","Orange","Gold","White","Gold","Orange","Green","Gold","Gold","Silver","","Silver","Orange","Green"],
      villageProduction : [],
      villageResFieldUpgrades : [],
      villageOwnTroops : [],
      villageReinforcements : [],
      villageTroopMovements : [],
    };
  },

  created() {
    //this.fetchArticles();
    this.fetchvillageResources();
    this.fetchMaxResources();
    this.fetchResFieldLevels();
    this.fetchResFieldTypes();
    this.fetchVillageProduction();
    this.fetchResFieldUpgrades();
    this.fetchVillageOwnTroops();
    this.fetchVillageReinforcements();
    this.fetchVillageTroopMovements();
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
          this.villageTroopMovements = res;
        })
        .catch(err => console.log(err));
    },


    fetchArticles(page_url) {
      let vm = this;
      page_url = page_url || '/api/articles';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.articles = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };

      this.pagination = pagination;
    },
    deleteArticle(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/article/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('Article Removed');
            this.fetchArticles();
          })
          .catch(err => console.log(err));
      }
    },
    addArticle() {
      if (this.edit === false) {
        // Add
        fetch('api/article', {
          method: 'post',
          body: JSON.stringify(this.article),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Article Added');
            this.fetchArticles();
          })
          .catch(err => console.log(err));
      } else {
        // Update
        fetch('api/article', {
          method: 'put',
          body: JSON.stringify(this.article),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Article Updated');
            this.fetchArticles();
          })
          .catch(err => console.log(err));
      }
    },
    editArticle(article) {
      this.edit = true;
      this.article.id = article.id;
      this.article.article_id = article.id;
      this.article.title = article.title;
      this.article.body = article.body;
    },
    clearForm() {
      this.edit = false;
      this.article.id = null;
      this.article.article_id = null;
      this.article.title = '';
      this.article.body = '';
    }
  }
};
</script>
