<?php
class NewView extends View{

    public function afficher($new){
        $this->header();
        $this->entete();
        $this->corp($new);
        $this->footer();
    }
    public function corp_page(){}
    public function corp($new){
        $this->menu();
        $this->contenu($new);
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
                    <a class="nav-link active" href="/Beddek_Lilya_Sil2/NewsController">News<span class="sr-only">(current)</span></a>
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
    public function contenu($new){

        ?>      
            <h3><?= $new['idNew'] ?></h3>
            <?php foreach($new["paragraphes"] as $paragraphe): ?>
                    
                    <div class="card mb-3">
                    <a href="#"><img class="card-img-top" src=<?= $paragraphe['imageParag'] ?> alt=""></a>
                    <div class="card-body">
                        <p class="card-text"><?= $paragraphe['contenu'] ?></p>
                    </div>
                    </div>
            <?php endforeach ?>

           
            
        </div>
        </div>
        <?php
        
    }

   
    
}
?>