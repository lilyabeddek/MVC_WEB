<?php
class ListeRecetteView extends View{

    public function corp_page(){
        $this->menu();
        $this->contenu();
    }
   
    public function menu(){
    ?>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="presentationController">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Idées de recettes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/EspaceEleveController/login">Healthy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/EspaceParentsController/login">Saison</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/EspaceParentsController/login">Fêtes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/EspaceParentsController/login">Nutrition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </nav>
    <?php   
    }
    public function contenu(){
        
    }

   
    
}
?>