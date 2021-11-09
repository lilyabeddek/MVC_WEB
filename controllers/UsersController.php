<?php
class UsersController extends Controller{
    
    public function index(){
        
        require_once(ROOT.'adminViews/GestionUsersView.php');
        $users = new GestionUsersView();
        $users->afficher_page();
    }
    public function login(){
        
        require_once(ROOT.'views/login.php');
        $login = new LoginView();
        $login->afficher_page();
    }
    public function signUp(){
        
        require_once(ROOT.'views/signUp.php');
        $signUp = new SignUpView();
        $signUp->afficher_page();
    }
    public function getUsersValides(){
        $this->chargerModel("User");
        $Users = $this->User->getUsersValides();
        return $Users;
    }
    public function getUsersNonValides(){
        $this->chargerModel("User");
        $Users = $this->User->getUsersNonValides();
        return $Users;
    }
    public function valider($id){
        $this->chargerModel("User");
        $this->User->validerUser($id);
        header('Location: /BEDDEK_LILYA_SIL2/UsersController');
    }

    public function inscription(){
        session_start();

        if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['password']) && !empty($_POST['password']))
        {
            $username = $_POST['loginUser']; 
            $password = $_POST['password'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sexe = $_POST['sexe'];
            $date = $_POST['dateNaissance'];
          
                $this->chargerModel("User");
                $userId= $this->User->addUser($nom, $prenom,$sexe,$date,$password,$username);
                echo($userId);
                $user=$this->User->getUserById($userId);
                if(sizeof($user)!=0) // nom d'utilisateur et mot de passe correctes
                {
                    echo($user["idUser"]);
                    require_once("Util.php");
                    $util= new Util();
                    $util->setIdUser($user["idUser"]);

                    $_SESSION['id'] = $user["idUser"];
                    $_SESSION['nom'] = $user["nom"];
                    $_SESSION['prenom'] = $user["prenom"];
                    $_SESSION['sexe'] = $user["sexe"];
                    $_SESSION['dateNaissance'] = $user["dateNaissance"];
                    $_SESSION['login'] = $user["loginUser"];
                    $_SESSION['pswrd'] = $user["pswrd"];

                    require_once("controllers/PageAccueilController.php");
                    $ctrl= new PageAccueilController();
                    $ctrl->index();
                   

                   // $this->render('EspaceEleve',[],false);
                }
                else
                {
                    $this->login(); // utilisateur ou mot de passe incorrect
                }
          
        }
        else
        {
            $this->login();
        }
    }
    public function verification(){
        session_start();

        if(isset($_POST['nomUser']) && isset($_POST['password']))
        {
            $username = $_POST['nomUser']; 
            $password = $_POST['password'];
            
            
            if($username !== "" && $password !== "")
            {
                $this->chargerModel("User");
                $user= $this->User->getUser($username,$password);
                //var_dump($user);
                if(sizeof($user)!=0) // nom d'utilisateur et mot de passe correctes
                {
                    echo($user[0]["idUser"]);
                    require_once("Util.php");

                    $util= new Util();
                    $util->setIdUser($user[0]["idUser"]);

                    $_SESSION['id'] = $user[0]["idUser"];
                    $_SESSION['nom'] = $user[0]["nom"];
                    $_SESSION['prenom'] = $user[0]["prenom"];
                    $_SESSION['sexe'] = $user[0]["sexe"];
                    $_SESSION['dateNaissance'] = $user[0]["dateNaissance"];
                    $_SESSION['login'] = $user[0]["loginUser"];
                    $_SESSION['pswrd'] = $user[0]["pswrd"];

                    require_once("controllers/PageAccueilController.php");
                    $ctrl= new PageAccueilController();
                    $ctrl->index();

                   // $this->render('EspaceEleve',[],false);
                }
                else
                {
                    $this->signUp(); // utilisateur ou mot de passe incorrect
                }
            }
            else
            {
                $this->signUp(); // utilisateur ou mot de passe vide
            }
        }
        else
        {
            $this->signUp();
        }
    
    }
    
   
   
   

}
?>