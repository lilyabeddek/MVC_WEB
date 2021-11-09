
<?php
class EditRecetteView {

    public function afficher_page($recette){
        $this->header();
        $this->entete();
        $this->corp_page($recette);
 
    }
    public function header(){ ?>
       
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <!-- Required meta tags-->
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Title Page-->
            <title>Modifier une Recette</title>

            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
        </head>
          
    <?php
    }

    public function entete(){
    ?>
        <!--<nav class="mb-5 navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
            <div class="container">
                <a class="navbar-brand" href="#">Aux fourneaux -Administration-</a>
            </div>
        </nav>-->
    <?php
    }
    
   
    public function corp_page($recette){
        ?>
        <body>
        <div class="container">
        <div class="col-lg-12"> 

        <form method="POST" action='/Beddek_Lilya_Sil2/GestionRecettesController/edit' enctype="multipart/form-data" name="form" id="form">    
            <legend><center><h2><b>Ajouter une recette</b></h2></center></legend><br>

            <input type="hidden" class="form-control" id="id" name="id"  value=<?= $recette['idRecette'] ?> required>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Titre</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Titre de la recette" value=<?= $recette['titre'] ?> required>
                </div>
            </div>

            <div class="form-group row">
                <label for="img" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="img" name="img" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="video" class="col-sm-2 col-form-label">Video</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="video" name="video" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"><label for="descript">Description</label></div>
                <div class="col-sm-10">
                     <textarea class="form-control" id="descript" name="descript" rows="5"  required><?= $recette['description'] ?></textarea>
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0" for="categorie">Catégories</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="categorie" name="categorie" value=<?= $recette['categorie'] ?> required>
                        <option value="Entrée">Entrée</option>
                        <option value="Plat">Plat</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Boisson">Boisson</option>
                    </select>
                </div>
                </div>
            </fieldset>

            <div class="form-group row">
                <label for="tempsPrep" class="col-sm-2 col-form-label">Temps de preparation</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control-file" id="tempsPrep" name="tempsPrep" value=<?= $recette['tempsPrep'] ?> required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tempsRepo" class="col-sm-2 col-form-label">Temps de repos</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control-file" id="tempsRepo" name="tempsRepo" value=<?= $recette['tempsRepo'] ?> required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tempsCuisson" class="col-sm-2 col-form-label">Temps de Cuisson</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control-file" id="tempsCuisson" name="tempsCuisson" value=<?= $recette['tempsCuisson'] ?> required>
                </div>
            </div>

            <div class="form-group row">
                <label for="nbCalories" class="col-sm-2 col-form-label">Nombre de calories</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control-file" id="nbCalories" name="nbCalories" value=<?= $recette['nbCalories'] ?> required>
                </div>
            </div>
            <div class="form-group row">
                <label for="difficulte" class="col-sm-2 col-form-label">Difficulté</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control-file" id="difficulte" name="difficulte" value=<?= $recette['difficulte'] ?> required>
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Saison</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="saison" name="saison" value=<?= $recette['saison'] ?> required>
                        <option value="Automne">Automne</option>
                        <option value="Hiver">Hiver</option>
                        <option value="Printemps">Printemps</option>
                        <option value="Ete">Ete</option>
                    </select>
                </div>  
                </div>
            </fieldset>

            <fieldset class="form-group row">      
                <label for="fete" class="col-sm-2 col-form-label">Fetes</label>
                <div class="col-sm-10">
                    <select class="select form-control" id="fete" name="fete" multiple data-mdb-filter="true" data-mdb-clear-button="true" data-mdb-placeholder="Fetes">
                        <?php
                            require_once("controllers/FetesController.php");
                            $controller = new FetesController();
                            $fetes= $controller->getFetes();
                            foreach($fetes as $fete) :
                        ?>
                        <option value=<?php $fete['idFete']?>><?php echo($fete['nomFete'])?></option>
                        <?php endforeach ?>
                    
                    </select>
                    
                </div>   
            </fieldset>

            <div class="form-group row">
                <div class="col-sm-2"><label for="etapes">Etapes</label></div>
                <div class="col-sm-10">
                <textarea class="form-control" id="descript" name="etapes" rows="5" required><?= $recette['etapes'] ?></textarea>
                </div>
            </div>
          
            <div class="row">
                <input type="submit" value="Modifier" class="btn btn-primary ml-auto">
            </div>
        </form>

        <form action="/Beddek_Lilya_Sil2/GestionRecettesController/addIngredRecette" name="form" id="form" method="post">    
            <legend><h4>Ajouter un ingredient</h4></legend><br>

            <input type="hidden" class="form-control" id="id" name="id"  value=<?= $recette['idRecette'] ?> required>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                <input class="form-control" list="list" name="infos" id="infos" required>

                <datalist id="list">
                    <?php
                     require_once("controllers/IngredientsController.php");
                     $ctrl = new IngredientsController();
                     $ingreds= $ctrl->getIngredients();
                     foreach ($ingreds as $ingred){
                    ?>
                         <option value=<?=$ingred["idIngred"]?> ><?=$ingred["nomIngred"]?></option>";
                    
                    <?php
                     }
                    ?>

                </datalist>
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Quantite</legend>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="quantite" id="quantite" required>          
                </div>  
                </div>
            </fieldset>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Unite</legend>
                    <div class="col-sm-10">
                        <select class="form-control" id="unite" name="unite"  required>
                            <option value="g">g</option>
                            <option value="l">l</option>
                        </select>
                    </div>  
                </div>
            </fieldset>
        
            <div class="row">
                <input type="submit" value="Ajouter" class="btn btn-primary ml-auto">
            </div>
        </form>
        <h5 class="mt-5"><b>Ingredients</b></h5>
        <table class="table">
            <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Quantite</th>
                        <th scope="col">Unite</th>
                        <th>Action</th>
                        </tr>
            </thead>
            <tbody>
                <?php
                    foreach($recette['ingredients'] as $ingred){
                ?>
                    <tr>
                        <td scope="row"><?= $ingred['idIngred'] ?></td>
                        <td><?= $ingred['nomIngred'] ?></td>
                        <td><?= $ingred['quantite'] ?></td>
                        <td><?=$ingred['unite'] ?></td>
                        <td><a href=<?php $str= strval($recette['idRecette'])."_".strval($ingred['idIngred']); echo("/Beddek_Lilya_Sil2/GestionRecettesController/deleteIngredRecette/".$str); ?> class="btn btn-danger">Supprimer</a></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        </div>
        </div> 
        </body>

        </html>
        <?php
    }

    

    
    
}
?>
