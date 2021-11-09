<?php
class Article extends Model{

    public function __construct()
    {
        // Ouvrir la connexion à la base de données
        $this->getConnection();
    }

    // get un article par id
    public function getArticle($id){
        $sql = "SELECT * FROM Article WHERE idArticle=".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }
    
    // get tous les articles
    public function getArticles(){
        $sql = "SELECT * FROM Article ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    // get tous les articles
    public function getArticlesPrimaire(){
        $sql = "SELECT * FROM Article WHERE pourPrimaire = 1 ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }
    public function getArticlesMoyen(){
        $sql = "SELECT * FROM Article WHERE pourMoyen = 1 ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }
    public function getArticlesSecondaire(){
        $sql = "SELECT * FROM Article WHERE pourSecondaire = 1 ORDER BY dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function addArticle($titre, $imgArticle, $description,$pourEns,$pourPrim,$pourMoy,$pourSec,$pourPar) {
        $sql = "INSERT INTO `Article` (`titre`,`imgArticle`,`description`,`pourEns`,`pourPrimaire`,`pourMoyen`,`pourSecondaire`,`pourParents`) VALUES (:titre,:img,:descript,:pEns,:pPri,:pMoy,:pSec,:pPar);";
      
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':img', $imgArticle, PDO::PARAM_STR);
        $query->bindValue(':descript', $description, PDO::PARAM_STR);
        $query->bindValue(':pEns', $pourEns, PDO::PARAM_BOOL);
        $query->bindValue(':pPri', $pourPrim, PDO::PARAM_BOOL);
        $query->bindValue(':pMoy', $pourMoy, PDO::PARAM_BOOL);
        $query->bindValue(':pSec', $pourSec, PDO::PARAM_BOOL);
        $query->bindValue(':pPar', $pourPar, PDO::PARAM_BOOL);
        
        $query->execute();
        return $query->fetch(); 
    }
    
    public function editArticle($titre, $imgArticle, $description, $pourEns,$pourPrim,$pourMoy,$pourSec,$pourPar, $id) {
        $sql = "UPDATE `Article` SET `titre` = :titre, `imgArticle` = 'ooo', `description` = :descript, `pourEns` = :pEns, `pourPrimaire` = :pPrim, `pourMoyen`=:pMoy , `pourSecondaire` = :pSec, `pourParents` = :pPar, `dateCreation` = DATE(NOW()) WHERE `idArticle` = :id;";
       
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        //$query->bindValue(':img', $imgArticle, PDO::PARAM_STR);
        $query->bindValue(':descript', $description, PDO::PARAM_STR);
        $query->bindValue(':pEns', $pourEns, PDO::PARAM_BOOL);
        $query->bindValue(':pPrim', $pourPrim, PDO::PARAM_BOOL);
        $query->bindValue(':pMoy', $pourMoy, PDO::PARAM_BOOL);
        $query->bindValue(':pSec', $pourSec, PDO::PARAM_BOOL);
        $query->bindValue(':pPar', $pourPar, PDO::PARAM_BOOL);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        
        $query->execute();
        return $query->fetch(); 
    }
    
    public function deleteArticle($id) {
        $sql = "DELETE FROM Article WHERE idArticle = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }
    
}
?>