<?php
class PageAccueilAdmin {

    public function afficher_page(){
        $this->header();
        $this->entete();
        $this->corp_page();
 
    }
    public function header(){ ?>
       
       <!DOCTYPE html>
        <html lang="fr">

        <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Page d'accueil Administrateur</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="css/shop-homepage.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        </head>
          
    <?php
    }

    public function entete(){
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5 ">
            <div class="container">
                <a class="navbar-brand" href="#">Aux fourneaux -Administration-</a>
            </div>
        </nav>
    <?php
    }
    
   
    public function corp_page(){
        ?>
            <body>
                <div class="container mt-5">
                    <div class="col-lg-12">   
                        <div class="row mt-5">
                            
                            <div class="col-lg-3 col-md-6 mb-4 mt-5">
                                <div class="card h-100">
                                    <a href="/Beddek_Lilya_Sil2/GestionArticlesController"><img class="card-img-top" src="images/temp.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="/Beddek_Lilya_Sil2/GestionRecettesController">Gestion des recettes</a>
                                        </h4>
                            
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mt-5">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="images/temp.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="/Beddek_Lilya_Sil2/NewsController/adminNews">Gestion des News</a>
                                        </h4>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mt-5">
                                <div class="card h-100">
                                    <a href="/Beddek_Lilya_Sil2/edtController/edts"><img class="card-img-top" src="images/temp.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="/Beddek_Lilya_Sil2/UsersController">Gestion des utilisateurs</a>
                                        </h4>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mt-5">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="images/temp.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="/Beddek_Lilya_Sil2/IngredientsController/adminNutrition">Gestion de la nutrition</a>
                                        </h4>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mt-5">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="images/temp.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="#">Paramètres</a>
                                        </h4>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.container -->
            </body>

            </html>

        <?php
    }

   
}
?>