<?php
class Recette extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function getRecette($id){
        $sql = "SELECT * FROM Recette WHERE idRecette=".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }
    
    public function getRecettes(){
        $sql = "SELECT * FROM Recette ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getRecettesValidees(){
        $sql = "SELECT * FROM Recette WHERE validee = 1 ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getRecettesNonValidees(){
        $sql = "SELECT * FROM Recette WHERE validee = 0 ORDER BY dateCreation ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }


    public function getCategorieRecettes($categorie){
        $sql = "SELECT * FROM Recette WHERE categorie = :categorie AND validee = 1 ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getRecettesSaison($saison){
        $sql = "SELECT * FROM Recette WHERE saison = :saison AND validee = 1 ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':saison', $saison, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getRecettesNbCalories($nbCalories){
        $sql = "SELECT * FROM Recette WHERE nbCalories <= :nbCalories AND validee = 1 ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':nbCalories', $nbCalories, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();    
    }
    

    public function addRecette($titre, $image,$description,$categorie,$tempsPrep,$tempsRepo,$tempsCuisson,$saison,$nbCalories,$difficulte,$video,$etapes,$idUser,$validee) {
        $sql = "INSERT INTO `Recette` (`titre`,`image`,`description`,`categorie`,`tempsPrep`,`tempsRepo`,`tempsCuisson`,`saison`,`nbCalories`,`difficulte`,`video`,`etapes`,`idUser`,`validee`) VALUES (:titre,:img,:descript,:categorie,:tempsPrep,:tempsRepo,:tempsCuisson,:saison,:nbCalories,:difficulte,:video,:etapes,:idUser,:validee);";
      
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':img', $image, PDO::PARAM_STR);
        $query->bindValue(':descript', $description, PDO::PARAM_STR);
        $query->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $query->bindValue(':tempsPrep', $tempsPrep, PDO::PARAM_INT);
        $query->bindValue(':tempsRepo', $tempsRepo, PDO::PARAM_INT);
        $query->bindValue(':tempsCuisson', $tempsCuisson, PDO::PARAM_INT);
        $query->bindValue(':saison', $saison, PDO::PARAM_STR);
        $query->bindValue(':nbCalories', $nbCalories, PDO::PARAM_INT);
        $query->bindValue(':difficulte', $difficulte, PDO::PARAM_INT);
        $query->bindValue(':video', $video, PDO::PARAM_STR);
        $query->bindValue(':etapes', $etapes, PDO::PARAM_STR);
        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $query->bindValue(':validee', $validee, PDO::PARAM_INT);
        
        $query->execute();
        return $this->_connexion->lastInsertId();  
    }
    
    public function editRecette($titre, $image,$description,$categorie,$tempsPrep,$tempsRepo,$tempsCuisson,$saison,$nbCalories,$difficulte,$video,$etapes, $id) {
        if($image==""){
            if($video==""){
                $sql = "UPDATE `Recette` SET `titre` = :titre, `description` = :descript, `categorie` = :categorie, `tempsPrep` = :tempsPrep, `tempsRepo`=:tempsRepo , `tempsCuisson` = :tempsCuisson, `saison` = :saison, `nbCalories` = :nbCalories,`difficulite` = :difficulte,`etapes` = :etapes WHERE (`idRecette` = :id);";
                $query = $this->_connexion->prepare($sql);

            }
            else{
                $sql = "UPDATE `Recette` SET `titre` = :titre, `description` = :descript, `categorie` = :categorie, `tempsPrep` = :tempsPrep, `tempsRepo`=:tempsRepo , `tempsCuisson` = :tempsCuisson, `saison` = :saison, `nbCalories` = :nbCalories,`difficulite` = :difficulte,`video` = :video,`etapes` = :etapes WHERE (`idRecette` = :id);";
                $query = $this->_connexion->prepare($sql);
                $query->bindValue(':video', $video, PDO::PARAM_STR);


            }

        }
        else{
            if($video==""){
                $sql = "UPDATE `Recette` SET `titre` = :titre, `image` = :img, `description` = :descript, `categorie` = :categorie, `tempsPrep` = :tempsPrep, `tempsRepo`=:tempsRepo , `tempsCuisson` = :tempsCuisson, `saison` = :saison, `nbCalories` = :nbCalories,`difficulite` = :difficulte,`etapes` = :etapes WHERE (`idRecette` = :id);";
                $query = $this->_connexion->prepare($sql);
                $query->bindValue(':img', $image, PDO::PARAM_STR);
            }
            else{
                $sql = "UPDATE `Recette` SET `titre` = :titre, `image` = :img, `description` = :descript, `categorie` = :categorie, `tempsPrep` = :tempsPrep, `tempsRepo`=:tempsRepo , `tempsCuisson` = :tempsCuisson, `saison` = :saison, `nbCalories` = :nbCalories,`difficulite` = :difficulte,`video` = :video,`etapes` = :etapes WHERE `(idRecette` = :id);";
                $query = $this->_connexion->prepare($sql);
                $query->bindValue(':img', $image, PDO::PARAM_STR);
                $query->bindValue(':video', $video, PDO::PARAM_STR);


            }
        }
       
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':descript', $description, PDO::PARAM_STR);
        $query->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $query->bindValue(':tempsPrep', $tempsPrep, PDO::PARAM_INT);
        $query->bindValue(':tempsRepo', $tempsRepo, PDO::PARAM_INT);
        $query->bindValue(':tempsCuisson', $tempsCuisson, PDO::PARAM_INT);
        $query->bindValue(':saison', $saison, PDO::PARAM_STR);
        $query->bindValue(':nbCalories', $nbCalories, PDO::PARAM_INT);
        $query->bindValue(':difficulte', $difficulte, PDO::PARAM_INT);
        $query->bindValue(':etapes', $etapes, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        
        $query->execute();
        return $query->fetch(); 
    }
    public function valider($id) {
        $sql = "UPDATE `Recette` SET `validee` = 1 WHERE `idRecette` = :id;";
       
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        
        $query->execute();
        return $query->fetch(); 
    }
    
    public function deleteRecette($id) {
        $sql = "DELETE FROM Recette WHERE idRecette = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }
    
}
?>