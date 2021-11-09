<?php
class Fete extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function getFetes(){

        $sql = "SELECT * FROM Fete";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    
}
?>