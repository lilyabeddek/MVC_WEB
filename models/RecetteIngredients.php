<?php
class RecetteIngredients extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function getRecettesIngredients(){

        $sql = "SELECT * FROM Recette INNER JOIN RecetteIngredients ON Recette.idRecette= RecetteIngredients.idRecette INNER JOIN Ingredient ON Ingredient.idIngred= RecetteIngredients.idIngred WHERE (Recette.validee=1)";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getRecetteIngredients($id){

        //$sql = "SELECT Ingredient.idIngred,Ingredient.nomIngred,Ingredient.saisonIngred,Ingredient.healthy,Ingredient.propostion,RecetteIngredient.quantite,RecetteIngredient.unite FROM RecetteIngredients INNER JOIN Ingredient ON Ingredient.idIngred= RecetteIngredients.idIngred WHERE (RecetteIngredients.idRecette= :id)";
        $sql = "SELECT * FROM RecetteIngredients INNER JOIN Ingredient ON Ingredient.idIngred= RecetteIngredients.idIngred WHERE (RecetteIngredients.idRecette= :id)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();    
    }

    public function addRecetteIngredients($idRecette,$idIngred,$quantite,$unite) {
        $sql = "INSERT INTO `RecetteIngredients` (`idRecette`,`idIngred`,`quantite`,`unite`) VALUES (:id1,:id2,:quantite,:unite);";
      
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':id1', $idRecette, PDO::PARAM_INT);
        $query->bindValue(':id2', $idIngred, PDO::PARAM_INT);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);
        $query->bindValue(':unite', $unite, PDO::PARAM_STR);
        
        $query->execute();
        return $this->_connexion->lastInsertId(); 
    }
    
    public function editRecetteIngredient($idRecette,$idIngred,$quantite,$unite) {
        $sql = "UPDATE `RecetteIngredients` SET `idIngred` = :id1, `quantite` = :quantite, `unite` = :unite= WHERE `idRecette` = :id1 AND `idIngred` = :id2 ;";
       
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':id1', $idRecette, PDO::PARAM_INT);
        $query->bindValue(':id2', $idIngred, PDO::PARAM_INT);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);
        $query->bindValue(':unite', $unite, PDO::PARAM_STR);
        
        $query->execute();
        return $query->fetch(); 
    }

    public function deleteRecetteIngredient($idRecette,$idIngred) {
        $sql = "DELETE FROM RecetteIngredients WHERE (idRecette = :id1 AND idIngred=:id2)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id1', $idRecette, PDO::PARAM_INT);
        $query->bindValue(':id2', $idIngred, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }
    public function deleteRecetteIngredients($idRecette) {
        $sql = "DELETE FROM RecetteIngredients WHERE (idRecette = :id1)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id1', $idRecette, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }
 
}
?>