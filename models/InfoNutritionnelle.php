<?php
class InfoNutritionnelle extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

  
    public function getInfos(){
        $sql = "SELECT * FROM infonutritionnelle Order By nomInfo";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }


}
?>