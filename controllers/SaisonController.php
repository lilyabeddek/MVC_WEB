<?php
class SaisonController extends Controller{
    /**
     * Cette méthode affiche la liste des articles
     *
     * @return void
     */
    //var_dump($articles);
    
    public function index(){
        
       require_once(ROOT.'views/SaisonView.php');
       $saison = new SaisonView();
       $saison->afficher_page();
    }
    public function getRecettesSaison(){

        $this->chargerModel("Recette");
        $recettes= $this->Recette->getRecettesSaison($this->getSaisonActuelle());
        return $recettes;
     }
    
    
    private function getSaisonActuelle(){
        $dateTime = new DateTime();
        $dayOfTheYear = $dateTime->format('z');
        if($dayOfTheYear < 80 || $dayOfTheYear > 356){
            return 'Hiver';
        }
        if($dayOfTheYear < 173){
            return 'Printemps';
        }
        if($dayOfTheYear < 266){
            return 'Ete';
        }
        return 'Erreur';
    }
  
}
?>