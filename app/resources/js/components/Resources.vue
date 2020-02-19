<template>
<div>
  <div class="container">
    <div class="d-flex justify-content-center" id="currentResources">
      <ul class="list-group list-group-horizontal flex-row">
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="storage/images/wood.gif">
              <span id="currentWood">100</span>/<span id="maxWood">1000</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="storage/images/clay.gif">
              <span id="currentClay">100</span>/<span id="maxClay">1000</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="storage/images/iron.gif">
              <span id="currentIron">100</span>/<span id="maxIron">1000</span>
          </li>
          <li class="list-group-item">
              <img style="width: 1.2rem;height: 0.9rem;" src="storage/images/crop.gif">
              <span id="currentCrop">100</span>/<span id="maxCrop">1000</span>
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
            <p class="h2 text-center mb-3"><strong> </strong></p>

            <div class="grid">
                <ul id="hexGrid" style="padding-left: 0px;">
                    <!-- Row 1 -->
                    <li class="hex">
                        <div class="hexIn">
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=1">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=2">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=3">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        </div>
                    </li>
                    <!-- Row 2 -->
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=4">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=5">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=6">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=7">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <!-- Row 3 -->
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=8">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=9">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="/village">
                            <div class='img' style='background-color:greenWhite'>
                                <p style="top:35%;opacity:1;color:black;">Village</p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=10">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=11">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <!-- Row 4 -->
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=12">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=13">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=14">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=15">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <!-- Row 5 -->
                    <li class="hex">
                        <div class="hexIn">
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=16">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=17">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                    <li class="hex">
                        <div class="hexIn">
                        <a class="hexLink" href="resourceField?rfid=18">
                            <div class='img' style='background-color:green'>
                                <p style="top:35%;opacity:1;color:black"></p>
                            </div>
                            <h1 id="demo1"></h1>
                            <p id="demo2"></p>
                        </a>
                        </div>
                    </li>
                </ul>                
            </div>
            <!--
            <?php
            if(count($currentUpgrades)>0){
                echo '
                <p class="h3 pl-5 ml-4 mt-3">Buildings:</p>
                <div class="d-flex justify-content-between  pl-5 ml-4">
                    <h5><img style="width: 1.0rem;height: 0.9rem;" src="/img/del.gif"> '.$currentUpgrades[0][2].' (Level '.$currentUpgrades[0][3].')</h5>
                    <h5>in <span id="upgradeCD1">'.date("H:i:s",(int)$currentUpgrades[0][5]-time()-3600).'</span> hours</h5>
                    <h5>done at '.date("H:i:s",(int)$currentUpgrades[0][5]).' </h5>
                </div>
                ';                    
                if(count($currentUpgrades)==2){
                    echo '
                    <div class="d-flex justify-content-between  pl-5 ml-4">
                        <h5><img style="width: 1.0rem;height: 0.9rem;" src="/img/del.gif"> '.$currentUpgrades[1][2].' (Level '.$currentUpgrades[1][3].')</h5>
                        <h5>in <span id="upgradeCD2">'.date("H:i:s",(int)$currentUpgrades[1][5]-time()-3600).'</span> hours</h5>
                        <h5>done at '.date("H:i:s",(int)$currentUpgrades[1][5]).' </h5>
                    </div>
                    ';
                }
            }
            ?>
            -->
        </div>

        <!-- Troop Movements and other stuff on the right -->
        <div class="col-md-3 text-center">
            <p></p>
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
            <p></p>
            <p class="h3">Production:</p>
            <div class="d-flex justify-content-between">
                <h5><img style="width: 1.5rem;height: 1rem;" src="storage/images/wood.gif"> Wood:</h5>
                <h5><strong></strong> per hour</h5>
            </div>
            <div class="d-flex justify-content-between">
                <h5><img style="width: 1.5rem;height: 1rem;" src="storage/images/clay.gif"> Clay:</h5>
                <h5><strong></strong> per hour</h5>
            </div>
            <div class="d-flex justify-content-between">
                <h5><img style="width: 1.5rem;height: 1rem;" src="storage/images/iron.gif"> Iron:</h5>
                <h5><strong></strong> per hour</h5>
            </div>
            <div class="d-flex justify-content-between">
                <h5><img style="width: 1.5rem;height: 1rem;" src="storage/images/crop.gif"> Crop:</h5>
                <h5><strong></strong> per hour</h5>
            </div>
            <p></p>
            <p class="h3">Troops:</p>
            <p class="h5">
              <!--
            <?php if($currentTroops){
                foreach ($currentTroopsHtml as $currentTroopsHtml) {
                    echo $currentTroopsHtml;
                };
            }
            else{
                echo '
                <div class="text-center">
                <h5>None</h5>
                </div>
                ';
            }
            ?>
            -->
            </p>
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
      edit: false
    };
  },

  created() {
    this.fetchArticles();
  },

  methods: {
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
