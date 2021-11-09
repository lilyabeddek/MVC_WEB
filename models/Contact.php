<?php
class Contact extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    
    public function addContact($nom, $email,$sujet,$message) {
        $sql = "INSERT INTO `Contact` (`nomContact`,`emailContact`,`sujet`,`message`) VALUES (:nom,:mail,:sujet,:msg);";
      
        $query = $this->_connexion->prepare($sql);

        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':mail', $email, PDO::PARAM_STR);
        $query->bindValue(':sujet', $sujet, PDO::PARAM_STR);
        $query->bindValue(':msg', $message, PDO::PARAM_STR);
       
        $query->execute();
        return $this->_connexion->lastInsertId(); 
    }   
    
  
}
?>