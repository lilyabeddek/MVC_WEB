
<?php
class EditIngredientView {

    public function afficher_page($ingred){
        $this->header();
        $this->entete();
        $this->corp_page($ingred);
 
    }
    public function header(){ ?>
       
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <!-- Required meta tags-->
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Title Page-->
            <title>Modifier un ingredient</title>

            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script>
                function updateTextInput(val) {
                document.getElementById('textInput').innerHTML="Proportion ("+val+"%)"; 
                }
            </script>
            
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
    
   
    public function corp_page($ingred){
        ?>
        <body>
        <div class="container">
        <div class="col-lg-12"> 

        <form action="/Beddek_Lilya_Sil2/IngredientsController/edit" name="form" id="form" method="post">    
            <legend><h2><b>Modifier Un ingredient</b></h2></legend><br>
            <legend><h4>Informations generales</h4></legend><br>

            <input type="hidden" class="form-control" id="id" name="id"  value=<?= $ingred['idIngred'] ?> required>
            <div class="form-group row">
                <label for="info" class="col-sm-2 col-form-label">Info nutritionnelle</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="info" name="info" placeholder="Non de l'information" value=<?= $ingred['nomIngred'] ?> required>
                </div>
            </div>


            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Saison</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="saison" name="saison" value =<?= $ingred['saisonIngred'] ?> required>
                        <option value="Automne">Automne</option>
                        <option value="Hiver">Hiver</option>
                        <option value="Printemps">Printemps</option>
                        <option value="Ete">Ete</option>
                    </select>
                </div>  
                </div>
            </fieldset>

            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Healthy</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="healthy" name="healthy" value=<?= $ingred['healthy']==1?"Oui":"Non" ?> required>
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                </div>  
                </div>
            </fieldset>

            <div class="form-group row">
                <label for="proportion"  id="textInput" class="col-sm-2 col-form-label">Proportion (<?= $ingred['proportion'] ?>%) </label>
                <div class="col-sm-10">
                    <input type="range" class="form-control" id="proportion" name="proportion" min="0" max="100" value=<?= $ingred['proportion'] ?> oninput="updateTextInput(this.value);">
                
                </div>
            </div>
          
            <div class="row">
                <input type="submit" value="Modifier" class="btn btn-primary ml-auto">
            </div>

            
        </form>

        <form action="/Beddek_Lilya_Sil2/IngredientsController/addInfoIngred" name="form" id="form" method="post">    
            <legend><h4>Ajouter un une information nutritionnelle</h4></legend><br>

            <input type="hidden" class="form-control" id="id" name="id"  value=<?= $ingred['idIngred'] ?> required>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                <input class="form-control" list="list" name="infos" id="infos" required>
                <datalist id="list">
                    <?php
                     $ctrl = new IngredientsController();
                     $infos= $ctrl->getInfos();
                     foreach ($infos as $info){
                    ?>
                         <option value=<?=$info["idInfo"]?> ><?=$info["nomInfo"]?></option>";
                    
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
        <h5 class="mt-5"><b>Informations nutritionelles</b></h5>
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
                    foreach($ingred['infos'] as $info){
                ?>
                    <tr>
                        <td scope="row"><?= $info['idInfo'] ?></td>
                        <td><?= $info['nomInfo'] ?></td>
                        <td><?= $info['quantite'] ?></td>
                        <td><?=$info['unite'] ?></td>
                        <td><a href=<?php $str= strval($ingred['idIngred'])."_".strval($info['idInfo']); echo("/Beddek_Lilya_Sil2/IngredientsController/deleteInfoIngred/".$str); ?> class="btn btn-danger">Supprimer</a></td>
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
