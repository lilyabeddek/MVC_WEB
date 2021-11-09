<?php
class HealthyRecettesController extends Controller{
    
    public function index(){
        
        require_once(ROOT.'views/HealtyView.php');
        $healthy = new HealthyView();
        $healthy->afficher_page();
    }
    public function getRecettesHealthy(){
        //resultat retourné : tableau des recettes contenant au moins 70% des ingredients 
        $result=[];

        // On instancie les modèles 
        $this->chargerModel("RecetteIngredients");
        $this->chargerModel("Recette");

        //recuperer toutes les recettes valides avec un sieul de calories
        $recettes = $this->Recette->getRecettesNbCalories(50);
        
        foreach ($recettes as &$recette) {
            $ingredients = $this->RecetteIngredients->getRecetteIngredients($recette["idRecette"]);
            $recette['ingredients'] = $ingredients;

            $continue =1;
            foreach($ingredients as $ingred){
                if($ingred["healthy"]==0){
                    $continue=0;
                    break;
                }

            } 
            if ($continue==1){
                $result[] = $recette; 
            }
       
        }
        //var_dump($result);
        return $result;


    }
   

  
}
?>