<?php
class Paragraphe extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function getNewsParagraphes(){

        $sql = "SELECT * FROM New INNER JOIN Paragraphe ON New.idNew= Paragraphe.idNew";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getNewParagraphes($id){

        $sql = "SELECT * FROM New INNER JOIN Paragraphe ON Paragraphe.idNew= New.idNew WHERE (New.idNew= :id)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();    
    }

    public function addNewParagraphe($idNew,$contenu,$image) {
        $sql = "INSERT INTO `Paragraphe` (`contenu`,`imageParag`,`idNew`) VALUES (:contenu,:imageParag,:id1);";
      
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':id1', $idNew, PDO::PARAM_STR);
        $query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $query->bindValue(':imageParag', $image, PDO::PARAM_STR);
        
        $query->execute();
        return $this->_connexion->lastInsertId(); 
    }
    public function editNewParagraphe($titre,$id) {
        $sql = "UPDATE `Paragraphe` SET `idNew` = :titre WHERE `idNew` = :id;";
       
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        
        $query->execute();
        return $query->fetch(); 
    }
    
    public function deleteNewParagraphe($idNew,$idParag) {
        $sql = "DELETE FROM Paragraphe WHERE (idNew = :id1 AND idParag=:id2)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id1', $idNew, PDO::PARAM_STR);
        $query->bindValue(':id2', $idParag, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }
    public function deleteNewParagraphes($idNew) {
        $sql = "DELETE FROM Paragraphe WHERE (idNew = :id1)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id1', $idNew, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(); 
    }
 
}
?>