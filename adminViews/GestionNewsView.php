
<?php
class GestionNewsView {

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
            <title>Gestion News</title>
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
        ?>
            <body>
                
                <div class="container">
                <h1>Gestion des News</h1>
                
                <div id="toolbar">
                    <a href="/Beddek_Lilya_Sil2/NewsController/afficherAjouterNew" type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Ajouter une new</a>
                </div>
                <table id="table" 
                            data-toggle="table"
                            data-search="true"
                            data-filter-control="true" 
                            data-click-to-select="true"
                            data-toolbar="#toolbar"
                            class="table-responsive">
                    <thead>
                        <tr>
                            <th data-field="idNew" data-filter-control="input" data-sortable="true">ID</th>
                            <th data-field="dateCreation" data-filter-control="input" data-sortable="true">Titre</th>

                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $controller = new NewsController();
                            $news= $controller->getNews();
                            foreach($news as $new){
                        ?>
                                <tr data-toggle="modal" class="selectedRow" data-target="#myModal">
                                    <td class="idNew"><?= $new['idNew'] ?></td>
                                    <td class="dateCreation"><?= $new['dateCreation'] ?></td> 
                                </tr>
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
                </div>
                <!-- CREATING BOOTSTRAP MODEL -->
                <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Visualiser</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="GFGclass" id="divGFG"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a id="modifier " class="btn btn-danger">Supprimer</a>
                                        <a id="modifier " class="btn btn-primary">Valider</a> 

                                    </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(function () {
                
                            $(".selectedRow").click(function () {

                                var a =$(this).find(".idNew").text();
                                var c =$(this).find(".dateCreation").text();
                               
                                var p = "";

                                $("a").remove();
                                var lien='<a href='+"/Beddek_Lilya_Sil2/NewsController/afficherEditNew/"+a.replaceAll(" ", "_")+' class="btn btn-primary">Modifier</a>'; 
                                $(".modal-footer").append(lien);
                                lien='<a href='+"/Beddek_Lilya_Sil2/NewsController/deleteNew/"+a+' class="btn btn-danger">Supprimer</a>'; 
                                $(".modal-footer").append(lien);
                                
                                p +="<p id='a' name='idIngred' >Titre: "+ a + " </p>"; 
                                p +="<p id='c' name='nomIngred'>Date de creation : "+ c + "</p>";
                              
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

                

        <?php
    }

   
}
?>