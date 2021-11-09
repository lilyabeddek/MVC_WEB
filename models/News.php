<?php
class News extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function getNew($id){
        $sql = "SELECT * FROM New WHERE idNew='{$id}'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }
    public function getParags($id){
        $sql = "SELECT * FROM paragraphe WHERE idNew='{$id}'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }
    
    public function getNews(){
        $sql = "SELECT * FROM New ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function addNew($titre, $image) {
        $sql = "INSERT INTO `New` (`idNew`,`imageNew`) VALUES (:titre,:img);";
      
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':img', $image, PDO::PARAM_STR);
       
        $query->execute();
        return $this->_connexion->lastInsertId(); 
    }   
    
    public function editNew($titre, $imgNew,$id) {
        $sql = "UPDATE `New` SET `idNew` = :titre, `imageNew` = :img,`dateCreation` = DATE(NOW()) WHERE `idNew` = :id;";
       
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':img', $imgNew, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        
        $query->execute();
        return $query->fetch(); 
    }
    
    public function deleteNew($id) {
        $sql = "DELETE FROM New WHERE idNew = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }
    
}
?>