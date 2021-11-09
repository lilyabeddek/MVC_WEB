<?php
class IngredientsController extends Controller{

    public function index(){

        require_once(ROOT.'views/NutritionView.php');
        $ingredients = new NutritionView();
        $ingredients->afficher_page();
    }
    public function adminNutrition(){

        require_once(ROOT.'adminViews/GestionNutritionView.php');
        $ingredients = new GestionNutritionView();
        $ingredients->afficher_page();
    }

    public function afficherAjouterIngred(){
        
        require_once(ROOT.'adminViews/AddIngredientView.php');
        $ajouter = new AddIngredientView();
        $ajouter->afficher_page();
    }
    public function afficherEditIngred($id){
        
        require_once(ROOT.'adminViews/EditIngredientView.php');
        $ingred = $this->getIngredientInfos($id);
        $edit = new EditIngredientView();
        $edit->afficher_page($ingred);
    }
    
    public function getIngredients(){

        $this->chargerModel("Ingredient");
        $ingreds = $this->Ingredient->getIngredients();
       // var_dump($ingreds);
        return $ingreds;
    }
    public function getIngredientInfos($id){
        
        $this->chargerModel("Ingredient");
        $Ingredient2 = $this->Ingredient->getIngredient($id);
        $Ingredient =&$Ingredient2;
        $infos = $this->Ingredient->getIngredientInfos($Ingredient["idIngred"]);
        $Ingredient['infos'] = $infos;      
    
        //var_dump($Ingredient2);
        return $Ingredient2;


    }
    public function  getIngredientsInfos(){
        
        $this->chargerModel("Ingredient");
        $Ingredients = $this->Ingredient->getIngredients();

        
        foreach ($Ingredients as &$Ingredient) {
            $infos = $this->Ingredient->getIngredientInfos($Ingredient["idIngred"]);
            $Ingredient['infos'] = $infos;      
        }
        //var_dump($result);
        return $Ingredients;


    }
    public function getInfos(){
        $this->chargerModel("InfoNutritionnelle");
        $infos = $this->InfoNutritionnelle->getInfos();
        //var_dump($infos);
        return $infos;

    }
    
    public function add(){
    
        if(isset($_POST)){
            

            if(isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['saison']) && !empty($_POST['saison']) && isset($_POST['healthy']) && !empty($_POST['healthy']) && isset($_POST['proportion']) && !empty($_POST['proportion'])){
                    
                    $nom = strip_tags($_POST['titre']);  
                    $saison = strip_tags($_POST['saison']);
                    $proportion= strip_tags($_POST['proportion']);
                    $healthy = strip_tags($_POST['healthy']);  
                   
                    echo($nom);
                    echo($saison);
                    echo($proportion);
                    echo($healthy);
                    $this->chargerModel("Ingredient");
                    if($healthy=='Oui'){
                        $id =$this->Ingredient->addIngredient($nom, $saison,1,$proportion);
                        $this->afficherEditIngred($id);
                        echo($id);
                    }
                    else{
                        $id=$this->Ingredient->addIngredient($nom, $saison,0,$proportion);
                        $this->afficherEditIngred($id);
                        echo($id);
                    }
                    
                    
                
                       
            }
            else{
                echo("Un des champs est vide");
            }
        }
        //header('Location: /BEDDEK_LILYA_SIL2/gestionUsersController');
    }
    public function edit(){
    
        if(isset($_POST)){
            

            if(isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['saison']) && !empty($_POST['saison']) && isset($_POST['healthy']) && !empty($_POST['healthy']) && isset($_POST['proportion']) && !empty($_POST['proportion'])){
                    
                    $idIngred=strip_tags($_POST['id']);
                    $nom = strip_tags($_POST['titre']);  
                    $saison = strip_tags($_POST['saison']);
                    $proportion= strip_tags($_POST['proportion']);
                    $healthy = strip_tags($_POST['healthy']);  
                   
                    echo($nom);
                    echo($saison);
                    echo($proportion);
                    echo($healthy);
                    $this->chargerModel("Ingredient");
                    if($healthy=='Oui'){
                        $this->Ingredient->editIngredient($nom, $saison,1,$proportion,$idIngred);
                        $this->afficherEditIngred($idIngred);
                    }
                    else{
                        $this->Ingredient->editIngredient($nom, $saison,0,$proportion,$idIngred);
                        $this->afficherEditIngred($idIngred);
                    }
                    
                    
                
                       
            }
            else{
                echo("Un des champs est vide");
            }
        }
        //header('Location: /BEDDEK_LILYA_SIL2/gestionUsersController');
    }

    public function deleteIngred($id){
    
        $this->chargerModel("Ingredient");
        $this->Ingredient->deleteIngredient($id);

        $this->chargerModel("IngredientInfos");
        $this->IngredientInfos->deleteIngredientInfos($id);

        $this->adminNutrition();
      
       
    }
    public function addInfoIngred(){

        if(isset($_POST)){
            

            if(isset($_POST['infos']) && !empty($_POST['infos']) && isset($_POST['quantite']) && !empty($_POST['quantite']) && isset($_POST['unite']) && !empty($_POST['unite']) ){
                    
                 

                    $idIngred=strip_tags($_POST['id']); 
                    $idInfo=strip_tags($_POST['infos']); 
                    $quantite=strip_tags($_POST['quantite']); 
                    $unite=strip_tags($_POST['unite']); 
                   
                    echo($idIngred);
                    echo($idInfo);
                    echo($quantite);
                    echo($unite);
                    
                    $this->chargerModel("IngredientInfos");
                    $this->IngredientInfos->addIngredientInfos($idIngred,$idInfo,$quantite,$unite);
                    $this->afficherEditIngred($idIngred);
                    
                    
                
                       
            }
            else{
                echo("Un des champs est vide");
            }
        }
       
     
       
    }
    public function editInfoIngred(){

        if(isset($_POST)){
            

            if(isset($_POST['infos']) && !empty($_POST['infos']) && isset($_POST['quantite']) && !empty($_POST['quantite']) && isset($_POST['unite']) && !empty($_POST['unite']) ){
                    
                 

                    $idIngred=strip_tags($_POST['id']); 
                    $idInfo=strip_tags($_POST['infos']); 
                    $quantite=strip_tags($_POST['quantite']); 
                    $unite=strip_tags($_POST['unite']); 
                   
                    echo($idIngred);
                    echo($idInfo);
                    echo($quantite);
                    echo($unite);
                    
                    $this->chargerModel("IngredientInfos");
                    $this->IngredientInfos->editIngredientInfos($idIngred,$idInfo,$quantite,$unite);
                    $this->afficherEditIngred($idIngred);
                
            }
            else{
                echo("Un des champs est vide");
            }
        }
       
    }
    public function deleteInfoIngred($param){
        $params = explode("_", $param);
        $idIngred=$params[0];$idInfo=$params[1];
        
        $this->chargerModel("IngredientInfos");
        $this->IngredientInfos->deleteIngredientInfo($idIngred,$idInfo);
        $this->afficherEditIngred($idIngred);
      
       
    }
   
  
}
?>