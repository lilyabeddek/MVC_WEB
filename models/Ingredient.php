<?php
class Ingredient extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

  
    public function getIngredients(){
        $sql = "SELECT * FROM Ingredient Order By nomIngred";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }
    public function getIngredient($id){
        $sql = "SELECT * FROM Ingredient WHERE idIngred=:id";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();    
    }

    public function getIngredientsInfos(){

        $sql = "SELECT * FROM Ingredient INNER JOIN IngredientInfos ON Ingredient.idIngred= IngredientInfos.idIngred INNER JOIN InfoNutritionnelle ON IngredientInfos.idInfo= InfoNutritionnelle.idInfo";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getIngredientInfos($id){

        $sql = "SELECT * FROM Ingredient INNER JOIN IngredientInfos ON Ingredient.idIngred= IngredientInfos.idIngred INNER JOIN InfoNutritionnelle ON IngredientInfos.idInfo= InfoNutritionnelle.idInfo WHERE (Ingredient.idIngred= :id)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();    
    }

    public function addIngredient($titre,$saison,$healthy,$proportion) {
        $sql = "INSERT INTO `Ingredient` (`nomIngred`,`saisonIngred`,`healthy`,`proportion`) VALUES (:titre,:saison,:healthy,:proportion);";
      
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':saison', $saison, PDO::PARAM_STR);
        $query->bindValue(':healthy', $healthy, PDO::PARAM_INT);
        $query->bindValue(':proportion', $proportion, PDO::PARAM_INT);
        
        $query->execute();
        return $this->_connexion->lastInsertId(); 
    }
    
    public function editIngredient($titre,$saison,$healthy,$proportion,$id) {
        $sql = "UPDATE `Ingredient` SET `nomIngred` = :titre, `saison` = :saison, `healthy` = :healthy, `proportion` = :proportion WHERE `idIngred` = :id;";
       
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':saison', $saison, PDO::PARAM_STR);
        $query->bindValue(':healthy', $healthy, PDO::PARAM_INT);
        $query->bindValue(':proportion', $proportion, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        
        $query->execute();
        return $query->fetch(); 
    }
    
    public function deleteIngredient($id) {
        $sql = "DELETE FROM Ingredient WHERE idIngred = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }


}
?>