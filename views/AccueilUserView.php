<?php
class AccueilUserView extends View{

    public function corp_page(){
        $this->diaporama();
        $this->menu();
        $this->contenu();
    }
    public function diaporama(){
    ?>
        <div class="container">
            <div class="col-lg-12">
                <!-- Diaporama -->
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner v-20" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid d-flex align-items-center justify-content-center" src="http://placehold.it/900x350" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid d-flex align-items-center justify-content-center" src="http://placehold.it/900x350" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid d-flex align-items-center justify-content-center" src="http://placehold.it/900x350" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
    <?php
    }
    public function menu(){
    ?>
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
                <div class="col-xs-6">
                  <h4>Entrées</h4>
                </div>
                <div class="col-xs-6">
                <h4><a href="/Beddek_Lilya_Sil2/CategorieController/entrees">Voir plus</a></h4>
                
                </div>
            </div>
        </div>
        <?php
        $this->scrollHoziontalCatergorie("Entree");
        ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                  <h4>Plats</h4>
                </div>
                <div class="col-xs-6">
                <h4><a href="/Beddek_Lilya_Sil2/CategorieController/plats">Voir plus</a></h4>
                
                </div>
            </div>
        </div>

      
        <?php
        $this->scrollHoziontalCatergorie("Plat");
        ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                  <h4>Desserts</h4>
                </div>
                <div class="col-xs-6">
                <h4><a href="/Beddek_Lilya_Sil2/CategorieController/desserts">Voir plus</a></h4>
                
                </div>
            </div>
        </div>
       
        <?php
        $this->scrollHoziontalCatergorie("Dessert");
        ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                  <h4>Boissons</h4>
                </div>
                <div class="col-xs-6">
                <h4><a href="/Beddek_Lilya_Sil2/CategorieController/boissons">Voir plus</a></h4>
                
                </div>
            </div>
        </div>
        
        <?php
        $this->scrollHoziontalCatergorie("Boisson");   
        ?>
        </div>
        <!-- /.col-lg-12 -->
        </div>
        <!-- /.container -->
        <?php  
    }

   
    public function scrollHoziontalCatergorie($categorie){
    ?>
        
        <div class="list-group list-group-horizontal overflow-auto">
                
                    <?php
                     
                        $ctr= new PageAccueilController();
                        $recettes= $ctr->getRecettesPourCateg($categorie);
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
        <!-- /.row -->
    
    <?php
    }
}
?>