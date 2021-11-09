<?php
abstract class Controller{
    public function chargerModel($model){
       // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT.'models/'.$model.'.php');
    
        // On crée une instance de ce modèle
        $this->$model = new $model();
    }
    public function render($fichier, array $data = [],$isAdmin){
        extract($data);
        if ($isAdmin){
             require_once(ROOT.'adminViews/'.$fichier.'.php');
        }
        else{
            require_once(ROOT.'views/'.$fichier.'.php');
            
        }
        //$view->afficher_page();
        
    }
   
}
?>