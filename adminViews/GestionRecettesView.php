

<?php
class GestionRecettesView {

    public function afficher_page(){
        $this->header();
        $this->entete();
        $this->corp_page();
 
    }
    public function header(){ ?>
       
       <!DOCTYPE html>
        <html lang="en" >
            <head>
            <meta charset="UTF-8">
            <title>Gestion des recettes</title>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
            <link rel='stylesheet' href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity= "sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"> </script>
	
		
            </head>
          
    <?php
    }

    public function entete(){
    ?>
        <nav class="mb-5 navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
            <div class="container">
                <a class="navbar-brand" href="#">Aux fourneaux -Administration-</a>
            </div>
        </nav>
    <?php
    }
    
   
    public function corp_page(){
        $this->recettes();
    }

    public function recettes(){
        ?>
            <body>
                
                <div class="container">
                <h1>Recettes</h1>
                
                <div id="toolbar">
                    <a href="/Beddek_Lilya_Sil2/GestionRecettesController/afficherAjouterRecette" type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Ajouter Recette</a>
                </div>
                <table id="table" 
                            data-toggle="table"
                            data-search="true"
                            data-filter-control="true" 
                            data-click-to-select="true"
                            data-toolbar="#toolbar"
                            class="table-responsive">
                    <thead>
                        <tr>
                            <th data-field="select" data-filter-control="input" data-sortable="true">ID</th>
                            <th data-field="titre" data-filter-control="input" data-sortable="true">Titre</th>
                            <th data-field="categorie" data-filter-control="input" data-sortable="true">Categorie</th>
                            <th data-field="saison" data-filter-control="input" data-sortable="true">Saison</th>
                            <th data-field="nbCalories" data-filter-control="input" data-sortable="true">Calories</th>
                            <th data-field="tempsPrep" data-filter-control="input" data-sortable="true">Preparation (min)</th>
                            <th data-field="tempsCuisson" data-filter-control="input" data-sortable="true">Cuisson (min)</th>
                            <th data-field="tempsTotal" data-filter-control="input" data-sortable="true">Total (min)</th>
                            <th data-field="note" data-filter-control="input" data-sortable="true">Note</th> 
                            <th data-field="validee" data-filter-control="input" data-sortable="true">Valide</th>
 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $controller = new GestionRecettesController();
                            $recettes= $controller->getRecettes();
                           
                            foreach($recettes as $recette){
                        ?>
                                <tr data-toggle="modal" class="selectedRow" data-target="#myModal">
                                    <td class ='idRecette' scope="row"><?= $recette['idRecette'] ?></td>
                                    <td class ='titre'><?= $recette['titre'] ?></td>
                                    <td class ='categorie'><?= $recette['categorie'] ?></td>
                                    <td class ='saison'><?= $recette['saison'] ?></td>
                                    <td class ='nbCalories'><?= $recette['nbCalories'] ?></td>
                                    <td class ='tempsPrep'><?= $recette['tempsPrep'] ?></td>
                                    <td class ='tempsCuisson'><?= $recette['tempsCuisson'] ?></td>
                                    <td class ='tempsTotal'><?= $recette['tempsPrep']+$recette['tempsCuisson']+$recette['tempsRepo'] ?></td>
                                    <td class ='notation'><?= $recette['notation'] ?></td>
                                    <td class ='validee'><?= $recette['validee']==1?"Oui":"Non" ?></td>


                                    
                                    
                                </tr>
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
                </div>
                 <!-- CREATING BOOTSTRAP MODEL -->
                 <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Visualiser un utilisateur</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="GFGclass" id="divGFG"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a id="modifier " class="btn btn-primary">Valider</a> 

                                    </div>
                            </div>
                        </div>
                    </div>
                <script>
                        $(function () {
                
                            $(".selectedRow").click(function () {

                                var a =$(this).find(".idRecette").text();
                                var c =$(this).find(".titre").text();
                                var d =$(this).find(".saison").text();
                                var e =$(this).find(".categorie").text();
                                var f =$(this).find(".nbCalories").text();
                                var g =$(this).find(".tempsPrep").text();
                                var h =$(this).find(".tempsCuisson").text();
                                var i =$(this).find(".tempsTotal").text();

                                var j =$(this).find(".validee").text();
                                //var k =$(this).find(".etapes").text();
                                var p = "";

                                if(j=="Oui"){
                                    $("a").remove();
                                    var lien='<a href='+"/Beddek_Lilya_Sil2/GestionRecettesController/afficherEditRecette/"+a+' class="btn btn-primary">Modifier</a>'; 
                                    $(".modal-footer").append(lien);
                                    lien='<a href='+"/Beddek_Lilya_Sil2/GestionRecettesController/deleteRecette/"+a+' class="btn btn-danger">Supprimer</a>'; 
                                    $(".modal-footer").append(lien);
                                }
                                else{
                                    $("a").remove();
                                    var lien='<a href='+"/Beddek_Lilya_Sil2/GestionRecettesController/validerRecette/"+a+' class="btn btn-primary">Valider</a>'; 
                                    $(".modal-footer").append(lien);
                            
                                }
                                
                                
                                p +="<p id='a' name='idIngred' >ID Recette: "+ a + " </p>"; 
                                p +="<p id='c' name='nomIngred'>Titre : "+ c + "</p>";
                                p +="<p id='d' name='saisonIngred' >Saison : "+ d + " </p>";
                                p +="<p id='e' name='healthy' >Categorie : "+ e + " </p>";
                                p +="<p id='f' name='proportion' >Nb Calories : "+ f + " </p>";
                                p +="<p id='g' name='infos' >Temps de preparation: "+ g + " </p>";
                                p +="<p id='g' name='infos' >Temps de Cuisson: "+ h + " </p>";
                                p +="<p id='g' name='infos' >Temps Total: "+ i + " </p>";
                               // p +="<p id='g' name='infos' >Ingredients: "+ j + " </p>";
                               // p +="<p id='g' name='infos' >Etapes: "+ k + " </p>";
                                //CLEARING THE PREFILLED DATA
                                $("#divGFG").empty();
                                //WRITING THE DATA ON MODEL
                                $("#divGFG").append(p);
                            
                            });
                        });
                       
                </script>
                



                        <!-- partial -->
                 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
                <script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script><script  src="./script.js"></script>



            </body>
            </html>
                

        <?php
    }

 
}
?>





