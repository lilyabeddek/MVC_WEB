<?php
class CategorieController extends Controller{
    
    public function entree(){
        
        require_once(ROOT.'views/EntreeView.php');
        $view = new EntreeView();
        $view->afficher_page();
    }
    public function plats(){
        
        require_once(ROOT.'views/PlatsView.php');
        $view = new PlatsView();
        $view->afficher_page();
    }
    public function desserts(){
        
        require_once(ROOT.'views/DessertView.php');
        $view = new DessertView();
        $view->afficher_page();
    }
    public function boissons(){
        
        require_once(ROOT.'views/BoissonView.php');
        $view = new BoissonView();
        $view->afficher_page();
    }
    public function getRecettesPourCateg($categ){
        // On instancie le modèle 
        $this->chargerModel("Recette");
        // On stocke la liste des recettes dans $recettes
        $recettes = $this->Recette->getCategorieRecettes($categ);
        return $recettes;
    }
  
}
?>