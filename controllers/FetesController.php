<?php
class FetesController extends Controller{
    /**
     * Cette méthode affiche la liste des articles
     *
     * @return void
     */
    //var_dump($articles);
    
    public function index(){
        
        require_once(ROOT.'views/FetesView.php');
        $fetes = new FetesView();
        $fetes->afficher_page();
    }
    
    public function getRecettesFetes(){
        
        $this->chargerModel("RecetteFete");
        $this->chargerModel("Recette");

        //recuperer toutes les recettes valides
        $recettes = $this->Recette->getRecettesValidees();
        $chainefetes="";
        foreach ($recettes as &$recette) {
            $fetes = $this->RecetteFete->getRecetteFetes($recette["idRecette"]);
            foreach ($fetes as $fete) {
                $chainefetes .= ($fete["nomFete"]." ,");
            }
            $recette['fetes'] = $chainefetes;
   
        }
        //var_dump($recettes);
        return $recettes;


    }
    public function getFetes(){
        
        $this->chargerModel("Fete");
        $fetes = $this->Fete->getFetes();
        //var_dump($fetes);
        return $fetes;
        
    }
    
  
}
?>