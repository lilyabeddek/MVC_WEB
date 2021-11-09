<?php
abstract class View{

    public function afficher_page(){
        $this->header();
        $this->entete();
        $this->corp_page();
        $this->footer();
    }
    public function header(){ ?>
       
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
        
            <title><?= $title ?></title>
        
         
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
            

            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
            <link rel='stylesheet' href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
         
            <link href="css/style.css" rel="stylesheet">

            
        </head>
          
    <?php
    }

    public function entete(){
    ?>
        <nav class="mb-5 navbar navbar-expand-lg navbar-dark bg-dark fixed-top " >
            <div class="container">
                <a class="navbar-brand" href="#"><b>Aux Fournaux</b></a>
                <a class="" href="#">gmail : contact@gmail.com</a>
                <a class="" href="#">facebook : fb/AuxFournaux</a>
                <a class="" href="#">Numéro : 021122222</a>
            </div>
        </nav>
    <?php
    }
    
    abstract public function corp_page();
    public function footer(){
    ?>
        <!-- Footer -->
        <footer class="py-5 bg-dark mt-5">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="/Beddek_Lilya_Sil2/PageAccueilController">Accueil</a>
                        </li>
                        <li>
                            <a href="/Beddek_Lilya_Sil2/NewsController">News</a>
                        </li>
                        <li>
                            <a  href="/Beddek_Lilya_Sil2/IdeeRecetteController">Idées de recettes</a>
                        </li>
                        <li >
                            <a href="/Beddek_Lilya_Sil2/HealthyRecettesController">Healthy</a>
                        </li>
                        <li >
                            <a  href="/Beddek_Lilya_Sil2/SaisonController">Saison</a>
                        </li>
                        <li >
                            <a  href="/Beddek_Lilya_Sil2/FetesController">Fêtes</a>
                        </li>
                        <li >
                            <a  href="/Beddek_Lilya_Sil2/IngredientsController">Nutrution</a>
                        </li>
                        <li>
                            <a  href="/Beddek_Lilya_Sil2/ContactUsController">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /.container -->
        </footer>
    <?php 
    }
}
?>