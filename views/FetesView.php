<?php
class FetesView extends View{

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
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/HealthyRecettesController">Healthy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/SaisonController">Saison</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/Beddek_Lilya_Sil2/FetesController">Fêtes<span class="sr-only">(current)</span></a>
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
          
          <h2 class="h1-responsive font-weight-bold text-center my-4">Recettes Speciales Fetes</h2>
          <p class="text-center w-responsive mx-auto mb-5">Cherchez et filtrez les recettes selon les fetes!</p>

            <nav class="navbar navbar-light justify-content-center mt-4">
                <form class="form-inline">
                    <button type="button" class="btn btn-primary btn-lg mr-3" id="btnSort">Ordonner</button>
                    <input class="form-control form-control-lg mr-sm-2" type="search" placeholder="Saisir une fete, suite..." aria-label="Search" id="search">
                    <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                </form>
            </nav>
            <!-- Cards -->
            <div class="container mt-4">
            
                <div class="card-deck">
                    <?php 
                        $ctrl= new FetesController();
                        $recettes = $ctrl->getRecettesFetes();
                        foreach($recettes as $recette): 
                    ?>
                    <div class="col-md-4 py-2">
                        <div class="card card-shadow text-center">
                            <a href="#"><img class="card-img-top" src=<?= $recette['image'] ?> alt=""></a>
                            <div class="card-body">
                                
                                <h4 class="card-title">
                                    <a href="#"><?= $recette['titre'] ?></a>
                                </h4>
                                <p class="card-text"><?= $recette['description'] ?></p>
                                <h5 class="card-text"><?= $recette['fetes'] ?></h5>  
                                <div class="dropdown-divider"></div>
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

            
            <script>
                // this overrides `contains` to make it case insenstive
                jQuery.expr[':'].contains = function(a, i, m) {
                return jQuery(a).text().toUpperCase()
                    .indexOf(m[3].toUpperCase()) >= 0;
                };

                $('#search').keyup(function (){
                    $('.card').removeClass('d-none');   
                    var filter = $(this).val(); 
                    $('.card-deck').find('.card .card-body h5:not(:contains("'+filter+'"))').parent().parent().addClass('d-none');
                })

                $('#btnSort').click(function (){
                    $('.card-deck .card').sort(function(a,b) {
                        return $(a).find(".card-title").text() > $(b).find(".card-title").text() ? 1 : -1;
                    }).appendTo(".card-deck");
                })
                 
            </script>
            <style>
                body {
                background-color: #EEEEEE;
                }
            </style>
        <?php
        
    }

   
    
}
?>