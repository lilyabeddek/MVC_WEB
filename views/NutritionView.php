<?php
class NutritionView extends View {

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
                    <a class="nav-link active" href="/Beddek_Lilya_Sil2/IngredientsController">Nutrition<span class="sr-only">(current)</span></a>
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
        $this->table();
    }
	
    public function table(){
        ?>
            <h2 class="h1-responsive font-weight-bold text-center my-4">Nutrition</h2>
            <p class="text-center w-responsive mx-auto mb-5">Liste des ingredients avec lequels sont faites dles recettes du site</p>

            <div class="container">
                <table id="table" 
                            data-toggle="table"
                            data-search="true"
                            data-filter-control="true" 
                            data-click-to-select="true"
                            class="table-responsive">
                    <thead>
                        <tr>
                            <th data-field="idIngred" data-checkbox="true">Select</th>
                            <th data-field="select" data-filter-control="input" data-sortable="true">ID</th>
                            <th data-field="nomIngred" data-filter-control="input" data-sortable="true">Nom</th>
                            <th data-field="saisonIngred" data-filter-control="select" data-sortable="true">Saison</th>
                            <th data-field="healthy" data-filter-control="select" data-sortable="true">Healthy</th>
                            <th data-field="proportion" data-filter-control="select" data-sortable="true">Proportion</th>
                            <th data-field="infos" data-filter-control="select" data-sortable="true">Infos</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $controller = new IngredientsController();
                            $ingredients= $controller->getIngredientsInfos();
                            foreach($ingredients as $ingredient){
                        ?>
                                <tr>
                                    <td class="bs-checkbox "><input data-index="<?= $ingredient['idIngred'] ?>" name="btSelectItem" type="checkbox"></td>
                                    <td scope="row"><?= $ingredient['idIngred'] ?></td>
                                    <td><?= $ingredient['nomIngred'] ?></td>
                                    <td><?= $ingredient['saisonIngred'] ?></td>
                                    <td><?= $ingredient['healthy']==1?"Oui":"Non" ?></td>
                                    <td><?= $ingredient['proportion']."%" ?></td>
                                    <td>
                                        <?php
                                            $infos="";
                                            foreach($ingredient['infos'] as $info){
                                                $infos.= $info["nomInfo"]." = ".$info["quantite"].$info["unite"]."\r\n";
                                                
                                            }
                                        ?>
                                        <?= nl2br($infos); ?>
                                    </td>
                                    

                                   
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
