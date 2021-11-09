<?php
class IngredientInfos extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function addIngredientInfos($idIngred,$idInfo,$quantite,$unite) {
        $sql = "INSERT INTO `IngredientInfos` (`idIngred`,`idInfo`,`quantite`,`unite`) VALUES (:id1,:id2,:quantite,:unite);";
      
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':id1', $idIngred, PDO::PARAM_INT);
        $query->bindValue(':id2', $idInfo, PDO::PARAM_INT);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);
        $query->bindValue(':unite', $unite, PDO::PARAM_STR);
        
        $query->execute();
        return $this->_connexion->lastInsertId(); 
    }
    
    public function editIngredientInfo($idIngred,$idInfo,$quantite,$unite) {
        $sql = "UPDATE `IngredientInfos` SET `idInfo` = :id1, `quantite` = :quantite, `unite` = :unite= WHERE `idIngred` = :id1 AND `idInfo` = :id2 ;";
       
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':id1', $idIngred, PDO::PARAM_INT);
        $query->bindValue(':id2', $idInfo, PDO::PARAM_INT);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);
        $query->bindValue(':unite', $unite, PDO::PARAM_STR);
        
        $query->execute();
        return $query->fetch(); 
    }
    
    public function deleteIngredientInfo($idIngred,$idInfo) {
        $sql = "DELETE FROM ingredientinfos WHERE (idIngred = :id1 AND idInfo=:id2)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id1', $idIngred, PDO::PARAM_INT);
        $query->bindValue(':id2', $idInfo, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }
    public function deleteIngredientInfos($idIngred) {
        $sql = "DELETE FROM ingredientinfos WHERE (idIngred = :id1)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id1', $idIngred, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }


}
?>