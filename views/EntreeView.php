<?php
class EntreeView extends View{

    public function corp_page(){
        $this->menu();
        $this->contenu();
    }
   
    public function menu(){
    ?>
        <!-- Navigation -->
        <div class="container">
        <div class="col-lg-12"> 
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="/Beddek_Lilya_Sil2/PageAccueilController">Accueil
                        <span class="sr-only">(current)</span>
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
    public function contenu(){
        ?>
            <div class="container">
            <div class="row">
            <!-- BEGIN SEARCH RESULT -->
            <div class="col-md-12">
                <div class="grid search">
                <div class="grid-body">
                    <div class="row">
                    <!-- FILTERS -->
                    <div class="col-md-3">
                        <h2 class="grid-title"><i class="fa fa-filter"></i> Filters</h2>
                        <hr>
                        
                        <!-- Filtrer par saison -->
                        <h5>Par Saison :</h5>
                        <select class="form-control" id="saison" name="saison" required>
                            <option value="Automne">Automne</option>
                            <option value="Hiver">Hiver</option>
                            <option value="Printemps">Printemps</option>
                            <option value="Ete">Ete</option>
                        </select>
                        
                        <div class="padding"></div>
                        
                        <!-- Filtrer par TempsCuisson -->
                        <h5>Par temps de Nombre de calories : (< à)</h5>
                        <input type="number" class="form-control nbCalories" id="nbCalories">
                        
                        <div class="padding"></div>
                        
                        <!-- Filtrer par TempsCuisson -->
                        <h5>Par temps de Cuisson :</h5>
                        <input type="number" class="form-control tempsCuisson" id="tempsCuisson">

                        <div class="padding"></div>
                        
                        <!-- Filtrer par TempsPreparation -->
                        <h5>Par temps de Preparation :</h5>
                        <input type="number" class="form-control tempsPrep" id="tempsPrep">

                        <div class="padding"></div>
                        
                        <!-- Filtrer par TempsTotal -->
                        <h5>Par temps de Total :</h5>
                        <input type="number" class="form-control tempsTotal" id="tempsTotal">
                        
                        <div class="padding"></div>
                        
                        <!-- BEGIN FILTER BY PRICE -->
                        <h5>Par Notation :  /10 </h5>
                        <input type="number" class="form-control notation" id="notation">
                        
                      
                    </div>
                    <!-- fin des filtres -->

                    <!-- Resultat -->
                    <div class="col-md-9">
                        <h2>Entrees</h2>
                        <div class="padding"></div>
                        <p>Ordonner par :</p>
                        
                        <div class="row mr-5">
                            <!-- BEGIN ORDER RESULT -->
                            <div class="col-sm-6 ">
                                <select class="form-control" id="ordre" name="ordre">
                                    <option value="Automne">Saison</option>
                                    <option value="Automne">Temps de Cuisson</option>
                                    <option value="Hiver">Temps de Preparation</option>
                                    <option value="Printemps">Temps Total</option>
                                    <option value="Ete">Nombre de calories</option>
                                    <option value="Ete">Notation</option>
                                </select>
                            </div>
                            <!-- END ORDER RESULT -->
                        
                        </div>
                        
                        <div class="container col">
            
                            <div class="card-deck">
                                <?php 
                                    $ctrl= new CategorieController();
                                    $recettes= $ctrl->getRecettesPourCateg("Entree");
                                    foreach($recettes as $recette): 
                                ?>
                                <div class="col-md-4 py-2">
                                    <div class="card card-shadow text-center">
                                        <a href="#"><img class="card-img-top" src=<?= $recette['image'] ?> alt=""></a>
                                        <div class="card-body">
                                            
                                            <h4 class="card-title">
                                                <a href="#"><?= $recette['titre'] ?></a>
                                            </h4>
                                            <h5 hidden><?= $recette['tempsPrep'] ?></h5>
                                            <p class="card-text"><?= $recette['description'] ?></p>
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
                        <script>
                            // this overrides `contains` to make it case insenstive
                            jQuery.expr[':'].contains = function(a, i, m) {
                            return jQuery(a).text().toUpperCase()
                                .indexOf(m[3].toUpperCase()) >= 0;
                            };

                            $('#search').keyup(function (){
                                $('.card').removeClass('d-none');   
                                var filter = $(this).val(); 
                                $('.card-deck').find('.card .card-body h4:not(:contains("'+filter+'"))').parent().parent().addClass('d-none');
                            })
                            $('#saison').change(function (){
                                $('.card').removeClass('d-none');   
                                var filter = $(this).val(); 
                                $('.card-deck').find('.card .card-body h4:not(:contains("'+filter+'"))').parent().parent().addClass('d-none');
                            })
                            $('#nbCalories').keyup(function (){
                                $('.card').removeClass('d-none');   
                                var filter = $(this).val(); 
                                $('.card-deck').find('.card .card-body h4:not(:contains("'+filter+'"))').parent().parent().addClass('d-none');
                            })
                            $('#notation').keyup(function (){
                                $('.card').removeClass('d-none');   
                                var filter = $(this).val(); 
                                $('.card-deck').find('.card .card-body h4:not(:contains("'+filter+'"))').parent().parent().addClass('d-none');
                            })
                            $('#tempsCuisson').keyup(function (){
                                $('.card').removeClass('d-none');   
                                var filter = $(this).val(); 
                                $('.card-deck').find('.card .card-body h4:not(:contains("'+filter+'"))').parent().parent().addClass('d-none');
                            })
                            $('#tempsPrep').keyup(function (){
                                $(this).val();
                                $('.card').removeClass('d-none');   
                                var filter = $(this).val(); 
                                $('.card-deck').find('.card .card-body h5:not(:contains("'+filter+'"))').parent().parent().addClass('d-none');
                            })
                            $('#tempsTotal').keyup(function (){
                                $('.card').removeClass('d-none');   
                                var filter = $(this).val(); 
                                $('.card-deck').find('.card .card-body h4:not(:contains("'+filter+'"))').parent().parent().addClass('d-none');
                            })

                            $('#btnSort').click(function (){
                                $('.card-deck .card').sort(function(a,b) {
                                    return $(a).find(".card-title").text() > $(b).find(".card-title").text() ? 1 : -1;
                                }).appendTo(".card-deck");
                            })
                            
                        </script>
                        
                        
                    </div>
                    <!-- END RESULT -->
                    </div>
                </div>
                </div>
            </div>
            <!-- END SEARCH RESULT -->
            </div>
            </div>
            </div>
            </div>

            
            
            <style>
                body {
                background-color: #EEEEEE;
                }
            </style>
        <?php
        
    }

   
    
}
?>