<?php
class User extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function getUserById($id){
        $sql = "SELECT * FROM User WHERE idUser=".$id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }
    
    public function getUser($loginUser,$pswrd){
        $sql = "SELECT * FROM User WHERE (loginUser='{$loginUser}' AND pswrd='{$pswrd}')";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getUsers(){
        $sql = "SELECT * FROM User ORDER BY idUser ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getUsersValides(){
        $sql = "SELECT * FROM User WHERE validee = 1 ORDER BY idUser ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    public function getUsersNonValides(){
        $sql = "SELECT * FROM User WHERE validee = 0 ORDER BY idUser  ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }
    public function validerUser($id){
        $sql = "UPDATE `User` SET `validee` = 1 WHERE `idUser` = :id;";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }


   

    public function addUser($nom, $prenom,$sexe,$date,$pswrd,$loginUser) {
        $sql = "INSERT INTO `User` (`nom`,`prenom`,`sexe`,`dateNaissance`,`pswrd`,`loginUser`,`validee`) VALUES (:nom,:prenom,:sexe,:dateNaissance,:pswrd,:username,0);";
      
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':sexe', $sexe, PDO::PARAM_STR);
        $query->bindValue(':dateNaissance', $date, PDO::PARAM_STR);
        $query->bindValue(':pswrd', $pswrd, PDO::PARAM_STR);
        $query->bindValue(':username', $loginUser, PDO::PARAM_STR);
        $query->execute();
        return $this->_connexion->lastInsertId();
    }
 
    
    public function deleteUser($id) {
        $sql = "DELETE FROM Article WHERE idArticle = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); 
    }
    
}
?>