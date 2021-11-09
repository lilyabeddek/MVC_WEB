<?php
class ContactUsController extends Controller{
    /**
     * Cette méthode affiche la liste des articles
     *
     * @return void
     */
    //var_dump($articles);
    
    public function index(){
        
        require_once(ROOT.'views/ContactView.php');
        $contact = new ContactView();
        $contact->afficher_page();

    }
    public function add(){
    
        if(isset($_POST)){
            

            if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['subject']) && !empty($_POST['subject']) && isset($_POST['message']) && !empty($_POST['message'])){
                    
                    $nom = strip_tags($_POST['name']);  
                    $email = strip_tags($_POST['email']);
                    $subject= strip_tags($_POST['subject']);
                    $message = strip_tags($_POST['message']);  
                  
                    $this->chargerModel("Contact");
                    $id =$this->Contact->addContact($nom, $email,$subject,$message);
                    $this->index();
                
                    
                    
                
                       
            }
            else{
                echo("Un des champs est vide");
            }
        }
        //header('Location: /BEDDEK_LILYA_SIL2/gestionUsersController');
    }
   
   
  
}
?>