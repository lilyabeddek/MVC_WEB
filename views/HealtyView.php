<?php
class HealthyView extends View{

    public function corp_page(){
        $this->menu();
        $this->contenu();
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
                    <a class="nav-link active" href="/Beddek_Lilya_Sil2/HealthyRecettesController">Healthy<span class="sr-only">(current)</span></a>
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
    public function contenu(){
        ?>
        <h2 class="h1-responsive font-weight-bold text-center my-4">Recettes healthy</h2>
        <p class="text-center w-responsive mx-auto mb-5">Catalogue de Recettes contenant des ingredients healthy</p>

        <div class="container">
            <div class="col-lg-12">
                <div class="row mt-5">
                    <?php 
                        $ctrl= new HealthyRecettesController();
                        $recettes = $ctrl->getRecettesHealthy();
                        foreach($recettes as $recette): 
                    ?>
                        <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src=<?= $recette['image'] ?> alt=""></a>
                            <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"><?= $recette['titre'] ?></a>
                            </h4>
                            <p class="card-text"><?= $recette['description'] ?></p>
                            <p class="card-text"><small class="text-muted">Paru le: <?= $recette['dateCreation'] ?></small></p>
                            </div>
                            <div class="card-footer">
                            <a href="/Beddek_Lilya_Sil2/GestionRecettesController/afficherRecette/<?= $recette['idRecette'] ?>" class="card-link">Afficher la suite</a>
                            </div>
                        </div>
                        </div>
                    <?php endforeach ?>
                   
                 </div>
            </div>
        </div>
        </div>
        </div>
                 
    


        <?php
        
    }

   
    
}
?>