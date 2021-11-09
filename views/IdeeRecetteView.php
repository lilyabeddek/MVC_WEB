<?php
class IdeeRecetteView extends View {

    public function menu(){
		?>
			<body>
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
	
			
		<?php   
	}
   
    public function corp_page(){
		$this->menu();
        $this->barreRecherche();
        $this->table();
    }
	public function barreRecherche(){
		?>
    
        <h2 class="h1-responsive font-weight-bold text-center my-4">Idees de recettes</h2>
        <p class="text-center w-responsive mx-auto mb-5">Filtrez et choisissez vos recettes selon les ingredients que vous avez( ingred1,ingred2...)</p>

		<form method="POST" action="/Beddek_Lilya_Sil2/IdeeRecetteController/ideeRecette"> 
			<div class="row">
				<div class="col-xs-6 col-md-4">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" id="Search" name="Search"/>
					<div class="input-group-btn">
						<button class="btn btn-primary" type="submit" id="btn">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</div>
				</div>
				</div>
			</div>
		</form>
		
		<?php
    }

   
    public function table(){
        ?>
           
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
                            $controller = new IdeeRecetteController();
                            $recettes= $controller->getRecettesSaisonNotation();
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
            </html>

        <?php
    }
    
}
?>
