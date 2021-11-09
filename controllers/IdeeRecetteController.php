<?php
require_once('controllers/SaisonController.php');
class IdeeRecetteController extends Controller{
    /**
     * Cette méthode affiche la liste des articles
     *
     * @return void
     */
    //var_dump($articles);
    
    public function index(){
        
        require_once(ROOT.'views/IdeeRecetteView.php');
        $idee = new IdeeRecetteView();
        $idee->afficher_page();

    }
    public function getRecettesIngredients($userIngredients){
        //resultat retourné : tableau des recettes contenant au moins 70% des ingredients 
        $result=[];

        // On instancie les modèles 
        $this->chargerModel("RecetteIngredients");
        $this->chargerModel("Recette");
        $this->chargerModel("Notation");

        //recuperer toutes les recettes valides
        $recettes = $this->Recette->getRecettesValidees();

        //$userIngredients=["tomates","serises","bananes","kiwi"];
        
        foreach ($recettes as &$recette) {
            $ingredients = $this->RecetteIngredients->getRecetteIngredients($recette["idRecette"]);
            $notation = $this->Notation->getRecetteNotation($recette["idRecette"]);
            $recette['ingredients'] = $ingredients;

            if ($notation['note']!=null){
                $recette['notation'] = $notation['note'];
            }else{
                $recette['notation'] = 0;
            }
            

            $intermed=[];
            foreach($ingredients as $ingred){
                $intermed[] = $ingred["nomIngred"];
            } 

            $intermedResult=array_intersect($intermed,$userIngredients);
            if((sizeof($intermedResult)/sizeof($userIngredients))>=0.7){
                $result[]=$recette;
            }       
        }
        //var_dump($result);
        usort($result, function ($a, $b){ if((int)$a['notation'] == (int)$b['notation']) return 0;if((int)$a['notation'] > (int)$b['notation']) return -1;if((int)$a['notation'] < (int)$b['notation']) return 1;});
        return $result;


    }
  
    public function getRecettesSaisonNotation(){

        $this->chargerModel("Notation");
        //recuperer toutes les recettes valides de la saison

        $recettes = (new SaisonController())->getRecettesSaison();
        
        foreach ($recettes as &$recette) {
            $notation = $this->Notation->getRecetteNotation($recette["idRecette"]);
            if ($notation['note']!=null){
                $recette['notation'] = $notation['note'];
            }else{
                $recette['notation'] = 0;
            }
            
    
        }
        usort($recettes, function ($a, $b){ if((int)$a['notation'] == (int)$b['notation']) return 0;if((int)$a['notation'] > (int)$b['notation']) return -1;if((int)$a['notation'] < (int)$b['notation']) return 1;});
        //var_dump($recettes);
        return $recettes;


    }
    public function ideeRecette(){
 
        if(isset($_POST)){
            if(isset($_POST['Search']) && !empty($_POST['Search'])){
                $search = strip_tags($_POST['Search']);  
                //echo($search); 
                $ingreds = explode(",", $search);
                //echo($search); 
                $recettes= $this->getRecettesIngredients($ingreds);
               // var_dump(['search'=>$search,'recettes'=>$recettes]);
                $this->render('IdeeRecetteView2',['search'=>$search,'recettes'=>$recettes],false);

            }            
                       
        }
          
    }
   
   
  
}
?>