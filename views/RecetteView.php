<?php
class RecetteView extends View{

    public function afficher($recette){
        $this->header();
        $this->entete();
        $this->corp($recette);
        $this->footer();
    }
    public function corp_page(){}
    public function corp($recette){
        $this->menu();
        $this->contenu($recette);
    }
   
    public function menu(){
    ?>
        <!-- Navigation -->
        <div class="container">
        <div class="col-lg-12">
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/PageAccueilController">Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/NewsController">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/IdeeRecetteController">Idées de recettes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/HealthyRecettesController">Healthy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/SaisonController">Saison</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/FetesController">Fêtes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/IngredientsController">Nutrition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/ContactUsController">Contact</a>
                </li>
            </ul>
        </nav>
    <?php   
    }
    public function contenu($recette){

        ?>      
            <div class="card mb-3">
                <a href="#"><img class="card-img-top" src=<?= $recette['image'] ?> alt=""></a>
                <div class="card-body">
                    <p class="card-text"><?= $recette['titre'] ?></p>
                    <?php 
                    if($recette['video']!= ""){
                    ?>
                        <video width="320" height="240" controls>
                            <source src=<? echo($recette['video']); ?> type="video/mp4">
                            Votre navigateur ne supporte pas extention de la video.
                        </video>

                    <?php 
                    }
                    require_once("Util.php");
                    $util= new Util();
                    echo($util::$idUser);
                    if ($util::$idUser){
                    ?>
                        <form action="/Beddek_Lilya_Sil2/GestionRecettesController/noter" name="form" id="form" method="post">    
                            <legend><h4>Noter la recette</h4></legend><br>

                            <input type="hidden" class="form-control" id="idUser" name="idUser">

                            <div class="form-group row">
                                <label for="proportion"  id="textInput" class="col-sm-2 col-form-label">Note : (5/10) </label>
                                <div class="col-sm-10">
                                    <input type="range" class="form-control" id="proportion" name="proportion" min="0" max="10" value="5" oninput="updateTextInput(this.value);">
                                
                                </div>
                            </div>
                        
                            <div class="row">
                                <input type="submit" value="Noter" class="btn btn-primary ">
                            </div>

                            
                        </form>
                        <form action="/Beddek_Lilya_Sil2/GestionRecettesController/noter" name="form" id="form" method="post"> 

                            <legend><h4>Ajouter la recette aux favoris</h4></legend>
                            <div class="row">
                                <input type="hidden" class="form-control" id="idUser" name="idUser" value=<?=Util::$idUser ?>>
                                <input type="hidden" class="form-control" id="idRecette" name="idRecette" value=<?=$recette['idRecette']?>>
                                <a type="submit" href="/Beddek_Lilya_Sil2/GestionRecettesController/favoris" class="btn btn-primary ">+Ajouter aux favoris</a>

                            </div>

                            
                        </form>

                    <?php 
                    }
                    ?>
                    
                   
                    <p class="card-text">Categorie : <?= $recette['categorie'] ?></p>
                    <p class="card-text">Saison : <?= $recette['saison'] ?></p>
                    <p class="card-text">Nombre de Calories : <?= $recette['nbCalories'] ?></p>
                    <p class="card-text">Difficulté : <?= $recette['difficulte'] ?></p>
                    <p class="card-text">Temps de preparation : <?= $recette['tempsPrep'] ?></p>
                    <p class="card-text">Temps de repos : <?= $recette['tempsRepo'] ?></p>
                    <p class="card-text">Temps de cuissons : <?= $recette['tempsCuisson'] ?></p>
                    <p class="card-text">Moyenne des notations : <?= $recette['notation'] ?></p>
                    <p class="card-text">Ingredients </p>
                    <?php 
                    foreach($recette['ingredients'] as $ingred){
                    ?>
                        <p class="card-text"><?= $ingred['quantite'] ?> <?= $ingred['unite'] ?> <?= $ingred['nomIngred'] ?></p>

                    <?php 
                    }
                    ?>
                    <p class="card-text">Etapes : <?= $recette['etapes'] ?></p>
                </div>
            </div>
            
        </div>
        </div>
        <script>
                function updateTextInput(val) {
                    document.getElementById('textInput').innerHTML="Note : ("+val+"/10)"; 
                }
        </script>
        <?php
        
    }

   
    
}
?>