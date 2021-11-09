<?php
class loginView{

    public function afficher_page(){
        $this->header();
        $this->contenu();
    }
   
    public function header(){
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Se Connecter</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <style>
                .login-form {
                    width: 340px;
                    margin: 50px auto;
                    font-size: 15px;
                }
                .login-form form {
                    margin-bottom: 15px;
                    background: #f7f7f7;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }
                .login-form h2 {
                    margin: 0 0 15px;
                }
                .form-control, .btn {
                    min-height: 38px;
                    border-radius: 2px;
                }
                .btn {        
                    font-size: 15px;
                    font-weight: bold;
                }
            </style>
        </head>
    <?php   
    }
    public function contenu(){
        ?>
                <body>
                    <div class="login-form">
                        <form action="/Beddek_Lilya_Sil2/UsersController/verification" method="post">
                            <h2 class="text-center">Se connecter</h2>       
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="nomUser" name="nomUser" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" required="required">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                            </div>
                                   
                        </form>
                        <p class="text-center"><a href="/Beddek_Lilya_Sil2/UsersController/signUp">Créer un compte</a></p>
                    </div>
                </body>
            </html>
        <?php
    }

   
    
}
?>