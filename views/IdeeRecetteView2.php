<!DOCTYPE html>
<html lang="en" >
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
<body>
<!-- partial:index.partial.html -->
    <nav class="mb-5 navbar navbar-expand-lg navbar-dark bg-dark fixed-top " >
            <div class="container">
                <a class="navbar-brand" href="#">Najah Academy</a>
            </div>
    </nav>

    <div class="container">
    <div class="col-lg-12">
    <!-- Navigation -->
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
                    <a class="nav-link active" href="/Beddek_Lilya_Sil2/IdeeRecetteController">Idées de recettes<span class="sr-only">(current)</span></a>
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
    <h2 class="h1-responsive font-weight-bold text-center my-4">Idees de recettes</h2>
    <p class="text-center w-responsive mx-auto mb-5">Filtrez et choisissez vos recettes selon les ingredients que vous avez( ingred1,ingred2...)</p>

    <form method="POST" action="/Beddek_Lilya_Sil2/IdeeRecetteController/ideeRecette"> 
			<div class="row">
				<div class="col-xs-6 col-md-4">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" id="Search" name="Search" value=<?php echo($search); ?>>
					<div class="input-group-btn">
						<button class="btn btn-primary" type="submit" id="btn">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</div>
				</div>
				</div>
			</div>
	</form>
    <div class="container">
                <table id="table" 
                            data-toggle="table"
                            data-filter-control="true" 
                            data-click-to-select="true"
                            class="table-responsive">
                    <thead>
                        <tr>
                            <th data-field="idRecette" data-checkbox="true">Select</th>
                            <th data-field="select" data-filter-control="input" data-sortable="true">ID</th>
                            <th data-field="titre" data-filter-control="input" data-sortable="true">Titre</th>
                            <th data-field="categorie" data-filter-control="select" data-sortable="true">Categorie</th>
                            <th data-field="saison" data-filter-control="select" data-sortable="true">Saison</th>
                            <th data-field="nbCalories" data-filter-control="select" data-sortable="true">Calories</th>
                            <th data-field="tempsPrep" data-filter-control="select" data-sortable="true">Preparation (min)</th>
                            <th data-field="tempsCuisson" data-filter-control="select" data-sortable="true">Cuisson (min)</th>
                            <th data-field="tempsTotal" data-filter-control="select" data-sortable="true">Total (min)</th>
							<th data-field="note" data-filter-control="select" data-sortable="true">Note</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($recettes as $recette){
                        ?>
                                <tr>
                                    <td class="bs-checkbox "><input data-index="<?= $recette['idRecette'] ?>" name="btSelectItem" type="checkbox"></td>
                                    <td scope="row"><?= $recette['idRecette'] ?></td>
                                    <td><?= $recette['titre'] ?></td>
                                    <td><?= $recette['categorie'] ?></td>
                                    <td><?= $recette['saison'] ?></td>
                                    <td><?= $recette['nbCalories'] ?></td>
                                    <td><?= $recette['tempsPrep'] ?></td>
                                    <td><?= $recette['tempsCuisson'] ?></td>
                                    <td><?= $recette['tempsPrep']+$recette['tempsCuisson']+$recette['tempsRepo'] ?></td>
									<td><?= $recette['notation'] ?></td>

                                   
                                </tr>
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
                
        </div>
        </div>
                <!-- partial -->
                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
                <script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script><script  src="./script.js"></script>
			
    </body>	
     <!-- Footer -->
     <footer class="py-5 bg-dark mt-5">
            <div class="container">
            <nav>
            <ul>
                <li>
                    <a href="#">Accueil</a>
                </li>
                <li>
                    <a href="presentationController">News</a>
                </li>
                <li>
                    <a  href="#">Idées de recettes</a>
                </li>
                <li >
                    <a href="#">Healthy</a>
                </li>
                <li >
                    <a  href="#">Saison</a>
                </li>
                <li >
                    <a  href="#">Fêtes</a>
                </li>
                <li >
                    <a  href="#">Nutrution</a>
                </li>
                <li>
                    <a  href="#">Contact</a>
                </li>
            </ul>
            </nav>
            </div>
            <!-- /.container -->
    </footer>
    	
</html>

