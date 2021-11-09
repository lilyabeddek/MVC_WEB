<?php
class PageAccueilController extends Controller{
    /**
     * Cette méthode affiche la liste des articles
     *
     * @return void
     */
    //var_dump($articles);
    
    public function index(){
        
        require_once(ROOT.'views/AccueilUserView.php');
        $accueil = new AccueilUserView();
        $accueil->afficher_page();
    }
    public function admin(){
        
        require_once(ROOT.'adminViews/PageAccueilAdmin.php');
        $accueil = new PageAccueilAdmin();
        $accueil->afficher_page();
    }
    public function getRecettesPourCateg($categ){
        // On instancie le modèle 
        $this->chargerModel("Recette");
    
        // On stocke la liste des recettes dans $recettes
        $recettes = $this->Recette->getCategorieRecettes($categ);
        if(count($recettes)<10){    
            $array_reduit=$recettes;
        }
        else{
            $array= array_slice ($recettes ,0,10);
            $array_reduit=$array;
        }

        return $array_reduit;
    }
  
}
?>