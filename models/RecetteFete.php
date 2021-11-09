<?php
class RecetteFete extends Model{

    public function __construct()
    {
        $this->getConnection();
    }

    public function getRecetteFetes($id){

        $sql = "SELECT Fete.idFete,Fete.nomFete FROM RecetteFete INNER JOIN Fete ON RecetteFete.idFete= Fete.idFete INNER JOIN Recette ON RecetteFete.idRecette= Recette.idRecette WHERE (Recette.idRecette=:id AND Recette.validee=1) ORDER BY Recette.dateCreation DESC";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();    
    }

    
}
?>