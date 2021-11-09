<?php
class Notation extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function getRecetteNotation($id){
        $sql = "SELECT AVG(note) as note FROM Notation WHERE idRecette=".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }
    
    public function addUserRecetteNotation($idRecette,$idUser,$note) {
        $sql = "INSERT INTO `Favoris` (`idUser`,`idRecette`,`note`) VALUES (:id1,:id2,:note);";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id1', $idUser, PDO::PARAM_INT);
        $query->bindValue(':id2', $idRecette, PDO::PARAM_INT);  
        $query->bindValue(':note', $note, PDO::PARAM_INT);    
        $query->execute();
        return $this->_connexion->lastInsertId(); 
    }
}
?>