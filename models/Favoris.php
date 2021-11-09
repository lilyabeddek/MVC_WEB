<?php
class Favoris extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function getFavorisUser($id){

        $sql = "SELECT * FROM User INNER JOIN Favoris ON User.idUser= Favoris.idUser INNER JOIN Recette ON Favoris.idRecette= Recette.idRecette WHERE (idUser.validee=:id)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();    
    }

    
    public function addUserRecetteFavoris($idRecette,$idUser) {
        $sql = "INSERT INTO `Favoris` (`idUser`,`idRecette`) VALUES (:id1,:id2);";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id1', $idUser, PDO::PARAM_INT);
        $query->bindValue(':id2', $idRecette, PDO::PARAM_INT);     
        $query->execute();
        return $this->_connexion->lastInsertId(); 
    }
    
 
}
?>