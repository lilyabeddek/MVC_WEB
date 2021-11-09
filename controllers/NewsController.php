<?php

class NewsController extends Controller{
    
    
    public function index(){
        
        require_once(ROOT.'views/NewsView.php');
        $news = new NewsView();
        $news->afficher_page();

    }
    public function adminNews(){
        
        require_once(ROOT.'adminViews/GestionNewsView.php');
        $news = new GestionNewsView();
        $news->afficher_page();

    }
    public function getNewsParagraphs(){
      
        $this->chargerModel("News");
        $news = $this->News->getNews();
        
        foreach ($news as &$new) {
            $paragraphes = $this->News->getParags($new["idNew"]);
            $new['paragraphes'] = $paragraphes;      
        }
       
        return $news;
       


    }
    public function getNews(){
      
        $this->chargerModel("News");
        $news = $this->News->getNews();
        return $news;
    }
    public function afficherNew($idNew){
        
        $result = str_replace("_", " ",$idNew);
        $idNew=$result;
        $this->chargerModel("News");


        $new2=$this->News->getNew($idNew);
        $new=&$new2;
          
        $paragraphes = $this->News->getParags($new["idNew"]);
        $new['paragraphes'] = $paragraphes;     
        
        require_once(ROOT.'views/NewView.php');
        $newView = new NewView();
        $newView->afficher($new2);


    }

    public function afficherAjouterNew(){
        
        require_once(ROOT.'adminViews/AddNewsView.php');
        $ajouter = new AjouterNewView();
        $ajouter->afficher_page();
    }
    public function afficherEditNew($id){
        $result = str_replace("_"," ",$id);
        $id=$result;

        require_once(ROOT.'adminViews/EditNewView.php');
        $new1 = $this->getNewParags($id);
        $edit = new EditNewView();
        $edit->afficher_page($new1);
    }
   
    

    public function getNewParags($id){
        
        $this->chargerModel("News");
        $new2 = $this->News->getNew($id);
        $new =&$new2;
        $Parags = $this->News->getParags($new["idNew"]);
        $new['paragraphes'] = $Parags;      
    
        return $new2;


    }
    public function  getNewsParags(){
        
        $this->chargerModel("News");
        $News = $this->News->getNews();
        
        foreach ($News as &$New) {
            $Parags = $this->News->getNewParagraphes($New["idNew"]);
            $New['paragraphes'] = $Parags;      
        }
       
        return $New;


    }
    
    public function add(){
    
        if(isset($_POST)){
            

            if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['img']) && !empty($_POST['img'])){
                    
                    $nom = strip_tags($_POST['title']);  
                    $img = strip_tags($_POST['img']);
                   
                   
                    $this->chargerModel("News");
                    $this->News->addNew($nom, $img);
                    $this->afficherEditNew($nom);
                    
                    
                
                       
            }
            else{
                echo("Un des champs est vide");
            }
        }
    }
   
    public function edit(){
    
        if(isset($_POST)){
            

            if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['img']) && !empty($_POST['img'])){
                    
                    $idNew=strip_tags($_POST['id']);
                    $nom = strip_tags($_POST['title']);  
                    $img = strip_tags($_POST['img']);
                   
                   
                    $this->chargerModel("News");
                    $this->chargerModel("Paragraphe");
                    $this->News->editNew($nom, $img,$idNew);
                    $this->Paragraphe->editNewParagraphe($nom,$idNew);
                    $this->afficherEditNew($nom);
                    
                    
                
                       
            }
            else{
                echo("Un des champs est vide");
            }
        }
        //header('Location: /BEDDEK_LILYA_SIL2/gestionUsersController');
    }

    public function deleteNew($id){
    
        $this->chargerModel("News");
        $this->News->deleteNew($id);

        $this->chargerModel("Paragraphe");
        $this->Paragraphe->deleteNewParagraphes($id);

        $this->adminNews();
      
       
    }
    public function addParagNew(){

        if(isset($_POST)){
            

            if(isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['paragraphe']) && !empty($_POST['paragraphe']) && isset($_POST['img']) && !empty($_POST['img']) ){
                    
                 

                    $idNew=strip_tags($_POST['id']); 
                    $contenu=strip_tags($_POST['paragraphe']); 
                    $image=strip_tags($_POST['img']); 
                   
                 
                    
                    $this->chargerModel("Paragraphe");
                    $this->Paragraphe->addNewParagraphe($idNew,$contenu,$image);
                    $this->afficherEditNew($idNew);
                    
                    
                
                       
            }
            else{
                echo("Un des champs est vide");
            }
        }
       
     
       
    }
    
    public function deleteParagNew($param){
        $params = explode("_", $param);
        $idNew=$params[0];$idParag=$params[1];
        
        $this->chargerModel("Paragraphe");
        $this->Paragraphe->deleteNewParagraphe($idNew,$idParag);
        $this->afficherEditNew($idNew);
      
       
    }
   
  

}
?>