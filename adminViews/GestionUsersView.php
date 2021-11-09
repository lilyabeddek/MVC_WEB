
<?php
class GestionUsersView {

    public function afficher_page(){
        $this->header();
        $this->entete();
        $this->corp_page();
 
    }
    public function header(){ ?>
       
       <!DOCTYPE html>
        <html lang="en" >
            <head>
            <meta charset="UTF-8">
            <title>Gestion Users</title>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
            <link rel='stylesheet' href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity= "sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"> </script>
	
		
            </head>
          
    <?php
    }

    public function entete(){
    ?>
        <nav class="mb-5 navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
            <div class="container">
                <a class="navbar-brand" href="#">Aux fourneaux -Administration-</a>
            </div>
        </nav>
    <?php
    }
    
   
    public function corp_page(){
        $this->usersValides();
        $this->usersNonValides();
    }

    public function usersValides(){
        ?>
            <body>
                
                <div class="container">
                <h1>users Valides</h1>
                
               
                <table id="table" 
                            data-toggle="table"
                            data-search="true"
                            data-filter-control="true" 
                            data-click-to-select="true"
                            data-toolbar="#toolbar"
                            class="table-responsive">
                    <thead>
                        <tr>
                            <th data-field="select" data-checkbox="true">Select</th>
                            <th data-field="idUser" data-filter-control="input" data-sortable="true">ID</th>
                            <th data-field="login" data-filter-control="input" data-sortable="true">Login</th>
                            <th data-field="nom" data-filter-control="input" data-sortable="true">Nom</th>
                            <th data-field="prenom" data-filter-control="input" data-sortable="true">Prenom</th>
                            <th data-field="sexe" data-filter-control="input" data-sortable="true">Sexe</th>
                            <th data-field="dateNaissance" data-filter-control="input" data-sortable="true">Date de Naissance</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $controller = new UsersController();
                            $users= $controller->getUsersValides();
                            foreach($users as $user){
                        ?>
                                <tr data-toggle="modal" class="selectedRowValide" data-target="#myModal">
                                    <td class="bs-checkbox "><input data-index="<?= $user['idUser'] ?>" name="btSelectItem" type="checkbox"></td>
                                    <td class="idUser"><?= $user['idUser'] ?></td>
                                    <td class="loginUser"><?= $user['loginUser'] ?></td>
                                    <td class="nomUser"><?= $user['nom'] ?></td>
                                    <td class="prenomUser"><?= $user['prenom'] ?></td>
                                    <td class="sexeUser"><?= $user['sexe'] ?></td>
                                    <td class="dateNaissanceUser"><?= $user['dateNaissance'] ?></td>
                                            
                                </tr>
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
                </div>
                

        <?php
    }

    public function usersNonValides(){
        ?>
                            <div class="container">
                            <h1>users Non encore Validées</h1>
                            
                        
                            <table id="table" 
                                        data-toggle="table"
                                        data-search="true"
                                        data-filter-control="true" 
                                        data-click-to-select="true"
                                        class="table-responsive">
                                <thead>
                                    <tr>
                                        <th data-field="select" data-checkbox="true">Select</th>
                                        <th data-field="idUser" data-filter-control="input" data-sortable="true">ID</th>
                                        <th data-field="login" data-filter-control="input" data-sortable="true">Login</th>
                                        <th data-field="nom" data-filter-control="input" data-sortable="true">Nom</th>
                                        <th data-field="prenom" data-filter-control="input" data-sortable="true">Prenom</th>
                                        <th data-field="sexe" data-filter-control="select" data-sortable="true">Sexe</th>
                                        <th data-field="dateNaissance" data-filter-control="select" data-sortable="true">Date de Naissance</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $controller = new UsersController();
                                        $users= $controller->getUsersNonValides();
                                        foreach($users as $user){
                                    ?>
                                            <tr data-toggle="modal" class="selectedRowNonValide" data-target="#myModal">
                                                <td class="bs-checkbox "><input data-index="<?= $user['idUser'] ?>" name="btSelectItem" type="checkbox"></td>
                                                <td class="idUser"><?= $user['idUser'] ?></td>
                                                <td class="loginUser"><?= $user['loginUser'] ?></td>
                                                <td class="nomUser"><?= $user['nom'] ?></td>
                                                <td class="prenomUser"><?= $user['prenom'] ?></td>
                                                <td class="sexeUser"><?= $user['sexe'] ?></td>
                                                <td class="dateNaissanceUser"><?= $user['dateNaissance'] ?></td>
                                            
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                            </div>
                    </section>
                    <!-- CREATING BOOTSTRAP MODEL -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Visualiser un utilisateur</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="GFGclass" id="divGFG"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a id="modifier " class="btn btn-primary">Valider</a> 

                                    </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(function () {
                
                        $(".selectedRowNonValide").click(function () {

                            var a =$(this).find(".idUser").text();
                            var c =$(this).find(".loginUser").text();
                            var d =$(this).find(".nomUser").text();
                            var e =$(this).find(".prenomUser").text();
                            var f =$(this).find(".sexeUser").text();
                            var g =$(this).find(".dateNaissanceUser").text();
                            var p = "";

                            $("a").remove();
                            var lien='<a href='+"UsersController/valider/"+a+' class="btn btn-primary">Valider</a>'; 
                            $(".modal-footer").append(lien);
                            
                            p +="<p id='a' name='idUser' >ID Utilisateur: "+ a + " </p>"; 
                            p +="<p id='c' name='loginUser'>Nom d'utilisateur: "+ c + "</p>";
                            p +="<p id='d' name='nomUser' >Nom : "+ d + " </p>";
                            p +="<p id='e' name='prenomUser' >Prenom: "+ e + " </p>";
                            p +="<p id='f' name='sexeUser' >Sexe: "+ f + " </p>";
                            p +="<p id='g' name='dateNaissanceUser' >Date de Naissance: "+ g + " </p>";
                            //CLEARING THE PREFILLED DATA
                            $("#divGFG").empty();
                            //WRITING THE DATA ON MODEL
                            $("#divGFG").append(p);
                           
                        });
                    });
                    $(function () {
                
                        $(".selectedRowValide").click(function () {

                            var a =$(this).find(".idUser").text();
                            var c =$(this).find(".loginUser").text();
                            var d =$(this).find(".nomUser").text();
                            var e =$(this).find(".prenomUser").text();
                            var f =$(this).find(".sexeUser").text();
                            var g =$(this).find(".dateNaissanceUser").text();
                            var p = "";
                            // CREATING DATA TO SHOW ON MODEL
                            $("a").remove();
                            p +="<p id='a' name='idUser' >ID Utilisateur: "+ a + " </p>";
                            
                            p +="<p id='c' name='loginUser'>Nom d'utilisateur: "+ c + "</p>";
                            p +="<p id='d' name='nomUser' >Nom : "+ d + " </p>";
                            p +="<p id='e' name='prenomUser' >Prenom: "+ e + " </p>";
                            p +="<p id='f' name='sexeUser' >Sexe: "+ f + " </p>";
                            p +="<p id='g' name='dateNaissanceUser' >Date de Naissance: "+ g + " </p>";
                            //CLEARING THE PREFILLED DATA
                            $("#divGFG").empty();
                            //WRITING THE DATA ON MODEL
                            $("#divGFG").append(p);
                        
                        });
                    });
                </script>
                



                        <!-- partial -->
                 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
                <script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script><script  src="./script.js"></script>



            </body>
            </html>

        <?php
    }
    
}
?>
