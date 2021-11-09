<?php
abstract class Model{
    // Informations de la base de données
    private $host = "localhost";
    private $db_name = "tdw";
    private $username = "root";
    private $password = "";

    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;

    //Fonction d'initialisation de la base de données
    
    public function getConnection(){
        // On supprime la connexion précédente
        $this->_connexion = null;

        // On essaie de se connecter à la base
        try{
            $this->_connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->_connexion->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }   
}
?>