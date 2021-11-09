<?php
class GestionRecettesController extends Controller{
    
    public function index(){
        
        require_once(ROOT.'adminViews/GestionRecettesView.php');
        $gestionRecettes = new GestionRecettesView();
        $gestionRecettes->afficher_page();
    }
    public function favoris(){
      
        if(isset($_POST['idUser']) && isset($_POST['idRecette']))
        {
            $idUser = $_POST['idUser']; 
            $idRecette = $_POST['idRecette'];
            
            $this->chargerModel("Favoris");
            $this->Favoris->addUserRecetteFavoris($idRecette,$idUser);
            $this->afficherRecette($idRecette);
     
        }
        else{
            $this->afficherRecette($_POST['idRecette']);
        }
    
    }

    public function noter(){
        if(isset($_POST['idUser']) && isset($_POST['idRecette']) && isset($_POST['note']))
        {
            $idUser = $_POST['idUser']; 
            $idRecette = $_POST['idRecette'];
            $note = $_POST['note'];
            
            $this->chargerModel("Notation");
            $this->Notation->addUserRecetteNotation($idRecette,$idUser,$note);
     
        }
        else{
            $this->afficherRecette($_POST['idRecette']);
        }
    
    }

    public function validerRecette($idRecette){
        $this->chargerModel("Recette");
        $this->Recette->valider($idRecette);
        header('Location: /BEDDEK_LILYA_SIL2/GestionRecettesController');
        

    }
    public function getRecettesValides(){
        
        // On instancie les modèles 
        $this->chargerModel("Notation");
        $this->chargerModel("Recette");
        $this->chargerModel("RecetteIngredients");

        //recuperer toutes les recettes valides
        $recettes = $this->Recette->getRecettesValides();
        
        foreach ($recettes as &$recette) {
            $ingredients = $this->RecetteIngredients->getRecetteIngredients($recette["idRecette"]);
            $recette['ingredients'] = $ingredients;
            $notation = $this->Notation->getRecetteNotation($recette["idRecette"]);
            if ($notation['note']!=null){
                $recette['notation'] = $notation['note'];
            }else{
                $recette['notation'] = 0;
            }
            
    
        }
        //var_dump($recettes);
        return $recettes;
    }

    public function getRecettes(){
        
        // On instancie les modèles 
        $this->chargerModel("Notation");
        $this->chargerModel("Recette");
        $this->chargerModel("RecetteIngredients");

        //recuperer toutes les recettes valides
        $recettes = $this->Recette->getRecettes();
        
        foreach ($recettes as &$recette) {
            $ingredients = $this->RecetteIngredients->getRecetteIngredients($recette["idRecette"]);
            $recette['ingredients'] = $ingredients;
            $notation = $this->Notation->getRecetteNotation($recette["idRecette"]);
            if ($notation['note']!=null){
                $recette['notation'] = $notation['note'];
            }else{
                $recette['notation'] = 0;
            }
            
    
        }
        //var_dump($recettes);
        return $recettes;
    }

    public function getRecettesNonValides(){
        $this->chargerModel("Recette");
        $this->chargerModel("RecetteIngredients");

        $recettes = $this->Recette->getRecettesNonValidees();
        foreach ($recettes as &$recette) {
            $ingredients = $this->RecetteIngredients->getRecetteIngredients($recette["idRecette"]);
            $recette['ingredients'] = $ingredients;
            $recette['notation'] = 0;
        }
        return $recettes;
    }

    public function afficherRecette($idRecette){
       
        require_once(ROOT.'views/RecetteView.php');
        $recetteView = new RecetteView();
        $recetteView->afficher($this->getIngredsNotationRecette($idRecette));


    }

    public function getIngredsNotationRecette($idRecette){
       
        // On instancie les modèles 
        $this->chargerModel("RecetteIngredients");
        $this->chargerModel("Recette");
        $this->chargerModel("Notation");

        $recette2=$this->Recette->getRecette($idRecette);
        $recette=&$recette2;
        
        
            $ingredients = $this->RecetteIngredients->getRecetteIngredients($recette["idRecette"]);
            $notation = $this->Notation->getRecetteNotation($recette["idRecette"]);
            $recette['ingredients'] = $ingredients;

            if ($notation['note']!=null){
                $recette['notation'] = $notation['note'];
            }else{
                $recette['notation'] = 0;
            }     
        
        
        return $recette2;



    }
    
    public function afficherAjouterRecette(){
        
        require_once(ROOT.'adminViews/AddRecetteView.php');
        $ajouterRecette = new AjouterRecetteView();
        $ajouterRecette->afficher_page();
    }

   
    public function add(){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $target_file2 = $target_dir . basename($_FILES["video"]["name"]);
        
        //echo($target_file2);

        $exist =0;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
        //echo($imageFileType2);
        if(isset($_POST)){
                 if(isset($_POST['title']) && !empty($_POST['title'])){
                    $titre = strip_tags($_POST['title']);  
                    $descript = strip_tags($_POST['descript']);
                    $saison = strip_tags($_POST['saison']);
                    $categorie = strip_tags($_POST['categorie']);
                    $difficulte= strip_tags($_POST['difficulte']);
                    $tempsPrep= strip_tags($_POST['tempsPrep']);
                    $tempsRepo= strip_tags($_POST['tempsRepo']);
                    $tempsCuisson = strip_tags($_POST['tempsCuisson']);
                    $nbCalories = strip_tags($_POST['nbCalories']);
                    $fetes= strip_tags($_POST['fete']);
                    $etapes= strip_tags($_POST['etapes']);
                    echo($titre);
                    echo($descript);
                    echo($categorie);
                    echo($difficulte);
                    echo($tempsRepo);
                    echo($tempsPrep);
                    echo($tempsCuisson);
                    echo($etapes);
                    echo($fetes);
                    echo($nbCalories);
                    echo($saison);
                    echo($target_file);
                    echo($target_file2);

                    
                    // permettre que les images
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        echo "Seuls les extensions JPG, JPEG, PNG & GIF sont permises";
                    }
                    else{
                        $check = getimagesize($_FILES["img"]["tmp_name"]);
                        if($check !== false) {
                            echo "Le fichier est une image - " . $check["mime"] . ".";
                            
                            if (file_exists($target_file) || file_exists($target_file2)) {
                                echo "Le fichier existe deja.";
                                $exist =1;
                            }

                            if($exist==0){
                                if(move_uploaded_file($_FILES["video"]["tmp_name"], $target_file2)){
                                    echo "The fichier ". htmlspecialchars( basename( $_FILES["video"]["name"])). " a été uploadé.";
                                }
                                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                                    echo "The fichier ". htmlspecialchars( basename( $_FILES["img"]["name"])). " a été uploadé.";

                                    $this->chargerModel("Recette");
                                    $id=$this->Recette->addRecette($titre, $target_file,$descript,$categorie,$tempsPrep,$tempsRepo,$tempsCuisson,$saison,$nbCalories,$difficulte,$target_file2,$etapes,-1,1);
                                    $this->afficherEditRecette($id);
                                    echo($id);
                                }
                                else {
                                    echo "Il y a eu une erreur en uploadant votre fichier";
                                }
                            }
                            else{
                                $this->chargerModel("Recette");
                                $id=$this->Recette->addRecette($titre, $target_file,$descript,$categorie,$tempsPrep,$tempsRepo,$tempsCuisson,$saison,$nbCalories,$difficulte,"video",$etapes,-1,1);
                                $this->afficherEditRecette($id);
                                echo($id);
                            }
                             

                        } else {
                            echo "Le fichier n'est pas une image.";
                        }
                    }

                 }
        }
       
    }

    public function edit(){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $target_file2 = $target_dir . basename($_FILES["video"]["name"]);
        
        //echo($target_file2);

        $exist =0;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
        //echo($imageFileType2);
        if(isset($_POST)){
                 if(isset($_POST['title']) && !empty($_POST['title'])){
                    $idRecette=strip_tags($_POST['id']);
                    $titre = strip_tags($_POST['title']);  
                    $descript = strip_tags($_POST['descript']);
                    $saison = strip_tags($_POST['saison']);
                    $categorie = strip_tags($_POST['categorie']);
                    $difficulte= strip_tags($_POST['difficulte']);
                    $tempsPrep= strip_tags($_POST['tempsPrep']);
                    $tempsRepo= strip_tags($_POST['tempsRepo']);
                    $tempsCuisson = strip_tags($_POST['tempsCuisson']);
                    $nbCalories = strip_tags($_POST['nbCalories']);
                    $fetes= strip_tags($_POST['fete']);
                    $etapes= strip_tags($_POST['etapes']);
                    
                    echo($target_file);
                    echo($target_file2);

                    
                    // permettre que les images
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        echo "Seuls les extensions JPG, JPEG, PNG & GIF sont permises";
                    }
                    else{
                        $check = getimagesize($_FILES["img"]["tmp_name"]);
                        if($check !== false) {
                            echo "Le fichier est une image - " . $check["mime"] . ".";
                            
                            if (file_exists($target_file) || file_exists($target_file2)) {
                                echo "Le fichier existe deja.";
                                $exist =1;
                            }

                            if($exist==0){
                                if(move_uploaded_file($_FILES["video"]["tmp_name"], $target_file2)){
                                    echo "The fichier ". htmlspecialchars( basename( $_FILES["video"]["name"])). " a été uploadé.";
                                }
                                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                                    echo "The fichier ". htmlspecialchars( basename( $_FILES["img"]["name"])). " a été uploadé.";

                                    $this->chargerModel("Recette");
                                    $this->Recette->editRecette($titre, $target_file,$descript,$categorie,$tempsPrep,$tempsRepo,$tempsCuisson,$saison,$nbCalories,$difficulte,$target_file2,$etapes,$idRecette);
                                    $this->afficherEditRecette($idRecette);
                                  
                                }
                                else {
                                    echo "Il y a eu une erreur en uploadant votre fichier";
                                }
                            }
                            else{
                                $this->chargerModel("Recette");
                                $this->Recette->editRecette($titre, $target_file,$descript,$categorie,$tempsPrep,$tempsRepo,$tempsCuisson,$saison,$nbCalories,$difficulte,$target_file2,$etapes,$idRecette);
                                $this->afficherEditRecette($idRecette);
                           
                            }
                             

                        } else {
                            echo "Le fichier n'est pas une image.";
                        }
                    }

                 }
        }
       
    }

    public function afficherEditRecette($id){
        
        require_once(ROOT.'adminViews/EditRecetteView.php');
        $recette = $this->getIngredsNotationRecette($id);
        $edit = new EditRecetteView();
        $edit->afficher_page($recette);
    }


   

    public function deleteRecette($id){
    
        $this->chargerModel("Recette");
        $this->Recette->deleteRecette($id);

        $this->chargerModel("RecetteIngredients");
        $this->RecetteIngredients->deleteRecetteIngredients($id);
        header('Location: /BEDDEK_LILYA_SIL2/GestionRecettesController');

      
       
    }
    public function addIngredRecette(){

        if(isset($_POST)){
            

            if(isset($_POST['infos']) && !empty($_POST['infos']) && isset($_POST['quantite']) && !empty($_POST['quantite']) && isset($_POST['unite']) && !empty($_POST['unite']) ){
                    
                 

                    $idRecette=strip_tags($_POST['id']); 
                    $idIngred=strip_tags($_POST['infos']); 
                    $quantite=strip_tags($_POST['quantite']); 
                    $unite=strip_tags($_POST['unite']); 
                   
                    echo($idRecette);
                    echo($idIngred);
                    echo($quantite);
                    echo($unite);
                    
                    $this->chargerModel("RecetteIngredients");
                    $this->RecetteIngredients->addRecetteIngredients($idRecette,$idIngred,$quantite,$unite);
                    $this->afficherEditRecette($idRecette);
                    
                    
                
                       
            }
            else{
                echo("Un des champs est vide");
            }
        }
       
     
       
    }
    public function editIngredRecette(){

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
                    
                    $this->chargerModel("RecetteIngredients");
                    $this->RecetteIngredients->editRecetteIngredients($idRecette,$idIngred,$quantite,$unite);
                    $this->afficherEditRecette($idRecette);
                
            }
            else{
                echo("Un des champs est vide");
            }
        }
       
    }
    public function deleteIngredRecette($param){
        $params = explode("_", $param);
        $idRecette=$params[0];$idIngred=$params[1];
        
        $this->chargerModel("RecetteIngredients");
        $this->RecetteIngredients->deleteRecetteIngredient($idRecette,$idIngred);
        $this->afficherEditRecette($idRecette);
      
       
    }

  
}
?>