/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueRouter from 'vue-router';
import Vuex from 'vuex';


import Resources from './components/Resources.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import Login from './components/Login.vue';
import ResourceField from './components/ResourceField.vue';
import Village from './components/Village.vue';
import VillageBuilding from './components/VillageBuilding.vue';
import App from './components/app.vue';


require('./bootstrap');
window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('articles', require('./components/Articles.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('resources', require('./components/Resources.vue').default);
Vue.component('resourceField', require('./components/ResourceField.vue').default);
Vue.component('village', require('./components/Village.vue').default);
Vue.component('app', require('./components/app.vue').default);

Vue.use(VueRouter);
Vue.use(Vuex);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/home', name: 'home', component: ExampleComponent},
        {path: '/login', name: 'login', component: Login},
        {path: '/resources', name: 'resources', component: Resources},
        {path: '/resourceField/:rfid', name: 'resourceField', component: ResourceField},
        {path: '/village', name: 'village', component: Village},
        {path: '/villageBuilding/:vbid', name: 'villageBuilding', component: VillageBuilding},
    ],
});

const store = new Vuex.Store({
    state: {
      count: 0,
      villageResources: [0,0,0,0],
      villageMaxResources : [0,0,0,0],
      villageResFieldLevels : [],
      villageResFieldTypes : [],
      villageResFieldColors : ["","Green","Orange","Silver","","Silver","Gold","Gold","Green","Orange","Gold","White","Gold","Orange","Green","Gold","Gold","Silver","","Silver","Orange","Green"],
      villageProduction : [0,0,0,0],
      villageResFieldUpgrades : [],
      villageOwnTroops : [],
      villageReinforcements : [],
      villageIncomingAttacks : [],
      villageIncomingReinforcements : [],
      villageOutgoingAttacks : [],
      villageOutgoingReinforcements : [],
    },
    mutations: {
      increment (state, payload) {
        state.count += payload;
      },
      setVillageResources(state, resources){
        state.villageResources = resources;
      },
      setVillageMaxResources(state, villageMaxResources){
        state.villageMaxResources = villageMaxResources;
      },
      setVillageResFieldLevels(state, villageResFieldLevels){
        state.villageResFieldLevels = villageResFieldLevels;
      },
      setVillageResFieldTypes(state, villageResFieldTypes){
        state.villageResFieldTypes = villageResFieldTypes;
      },
      setVillageResFieldColors(state, villageResFieldColors){
        state.villageResFieldColors = villageResFieldColors;
      },
      setVillageProduction(state, villageProduction){
        state.villageProduction = villageProduction;
      },
      setVillageResFieldUpgrades(state, villageResFieldUpgrades){
        state.villageResFieldUpgrades = villageResFieldUpgrades;
      },
      setVillageOwnTroops(state, villageOwnTroops){
        state.villageOwnTroops = villageOwnTroops;
      },
      setVillageReinforcements(state, villageReinforcements){
        state.villageReinforcements = villageReinforcements;
      },
      setVillageOutgoingAttacks(state, villageOutgoingAttacks){
        state.villageOutgoingAttacks = villageOutgoingAttacks;
      },
      setVillageOutgoingReinforcements(state, villageOutgoingReinforcements){
        state.villageOutgoingReinforcements = villageOutgoingReinforcements;
      },
      setVillageIncomingAttacks(state, villageIncomingAttacks){
        state.villageIncomingAttacks = villageIncomingAttacks;
      },
      setVillageIncomingReinforcements(state, villageIncomingReinforcements){
        state.villageIncomingReinforcements = villageIncomingReinforcements;
      }
    },
    actions: {
        increment (context,payload) {
            context.commit('increment',payload)
        },
        async fetchVillageResources(context){
            await fetch('/api/villageResources/1')
            .then(res => res.json())
            .then(res => {
                let villageResources = [res.currentWood,res.currentClay,res.currentIron,res.currentCrop];
                context.commit('setVillageResources', villageResources);
            })
            .catch(err => console.log(err));
        },
        async fetchVillageMaxResources(context){
            await fetch('/api/villageMaxResources/1')
            .then(res => res.json())
            .then(res => {
                let villageMaxResources = [res.maxWood,res.maxClay,res.maxIron,res.maxCrop];
                context.commit('setVillageMaxResources', villageMaxResources);
            })
            .catch(err => console.log(err));
        },
        async fetchVillageResFieldLevels(context){
            await fetch('/api/villageFieldLevels/1')
            .then(res => res.json())
            .then(res => {
                let villageResFieldLevels = ["",res.resField1Level,res.resField2Level,res.resField3Level,"",
                res.resField4Level,res.resField5Level,res.resField6Level,res.resField7Level,
                res.resField8Level,res.resField9Level,"Village",res.resField10Level,res.resField11Level,
                res.resField12Level,res.resField13Level,res.resField14Level,res.resField15Level,
                "",res.resField16Level,res.resField17Level,res.resField18Level];

                context.commit('setVillageResFieldLevels', villageResFieldLevels);
            })
            .catch(err => console.log(err));
        },
        async fetchVillageResFieldTypes(context){
            await fetch('/api/villageFieldTypes/1')
            .then(res => res.json())
            .then(res => {
                let villageResFieldTypes = ["",res.resField1Type,res.resField2Type,res.resField3Type,"",
                res.resField4Type,res.resField5Type,res.resField6Type,res.resField7Type,
                res.resField8Type,res.resField9Type,"village",res.resField10Type,res.resField11Type,
                res.resField12Type,res.resField13Type,res.resField14Type,res.resField15Type,
                "",res.resField16Type,res.resField17Type,res.resField18Type];
                
                let villageResFieldColors = villageResFieldTypes.map(type => {
                    if(type == "wood"){ return "Green"}
                    else if(type == "clay"){ return "Orange"}
                    else if(type == "iron"){ return "Silver"}
                    else if(type == "crop"){ return "Gold"}
                    else if(type == "village"){ return "White"}
                    else {return ""}
                });

                context.commit('setVillageResFieldTypes', villageResFieldTypes);
                context.commit('setVillageResFieldColors', villageResFieldColors);
            })
            .catch(err => console.log(err));
        },
        async fetchVillageProduction(context){
            await fetch('/api/villageProductions/1')
            .then(res => res.json())
            .then(res => {
                let villageProduction = [res.productionWood,res.productionClay,res.productionIron,res.productionCrop];
                context.commit('setVillageProduction', villageProduction);
            })
            .catch(err => console.log(err));
        },
        async fetchVillageResFieldUpgrades(context){
            await fetch('/api/resFieldUpgrades/1')
            .then(res => res.json())
            .then(res => {
                let villageResFieldUpgrades = res;
                context.commit('setVillageResFieldUpgrades', villageResFieldUpgrades);
            })
            .catch(err => console.log(err));
        },
        async fetchVillageOwnTroops(context){
            await fetch('/api/villageOwnTroops/1')
            .then(res => res.json())
            .then(res => {        
                let villageOwnTroops = [res.troop1,res.troop2,res.troop3,res.troop4,res.troop5,
                res.troop6,res.troop7,res.troop8,res.troop9,res.troop10];
                context.commit('setVillageOwnTroops', villageOwnTroops);
            })
            .catch(err => console.log(err));
        },
        async fetchVillageReinforcements(context){
            await fetch('/api/villageReinforcements/1')
            .then(res => res.json())
            .then(res => {
              let villageReinforcements = res;
              context.commit('setVillageReinforcements', villageReinforcements);
            })
            .catch(err => console.log(err));
        },
        async fetchVillageTroopMovements(context){
            await fetch('/api/sendTroops/1')
            .then(res => res.json())
            .then(res => {
                
                let villageOutgoingAttacks = [];
                let villageOutgoingReinforcements = [];
                let villageIncomingAttacks = [];
                let villageIncomingReinforcements = [];

                for(let troopMovement of res){
                    if(troopMovement.idVillageFrom == 1){
                        if(troopMovement.sendType == "full" || troopMovement.sendType == "raid"){
                            villageOutgoingAttacks.push(troopMovement);
                        }
                        else if(troopMovement.sendType == "reinforcement"){
                            villageOutgoingReinforcements.push(troopMovement);
                        }
                    }
                    else if(troopMovement.idVillageTo == 1){
                        if(troopMovement.sendType == "full" || troopMovement.sendType == "raid"){
                            villageIncomingAttacks.push(troopMovement);
                        }
                        else if(troopMovement.sendType == "reinforcement"){
                            villageIncomingReinforcements.push(troopMovement);
                        }
                    }
                }

                context.commit('setVillageOutgoingAttacks', villageOutgoingAttacks);
                context.commit('setVillageOutgoingReinforcements', villageOutgoingReinforcements);
                context.commit('setVillageIncomingAttacks', villageIncomingAttacks);
                context.commit('setVillageIncomingReinforcements', villageIncomingReinforcements);
    
            })
            .catch(err => console.log(err));
        }
        
    },
    getters: {
        incrementGetter: state => {
            return state.count;
        },
        getVillageResources: state => {
            return state.villageResources;
        },
        getVillageMaxResources: state => {
            return state.villageMaxResources;
        },
        getVillageResFieldLevels: state => {
            return state.villageResFieldLevels;
        },
        getVillageResFieldTypes: state => {
            return state.villageResFieldTypes;
        },
        getVillageResFieldColors: state => {
            return state.villageResFieldColors;
        },
        getVillageProduction: state => {
            return state.villageProduction;
        },
        getVillageResFieldUpgrades: state => {
            return state.villageResFieldUpgrades;
        },
        getVillageOwnTroops: state => {
            return state.villageOwnTroops;
        },
        getVillageReinforcements: state => {
            return state.villageReinforcements;
        },
        getVillageOutgoingAttacks: state => {
            return state.villageOutgoingAttacks;
        },
        getVillageOutgoingReinforcements: state => {
            return state.villageOutgoingReinforcements;
        },
        getVillageIncomingAttacks: state => {
            return state.villageIncomingAttacks;
        },
        getVillageIncomingReinforcements: state => {
            return state.villageIncomingReinforcements;
        }
    }
  })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
});
