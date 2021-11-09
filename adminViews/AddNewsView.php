
<?php
class AjouterNewView {

    public function afficher_page(){
        $this->header();
        $this->entete();
        $this->corp_page();
 
    }
    public function header(){ ?>
       
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <!-- Required meta tags-->
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Title Page-->
            <title>Ajouter une New</title>

            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            

           
        </head>
          
    <?php
    }

    public function entete(){
    ?>
        <!--<nav class="mb-5 navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
            <div class="container">
                <a class="navbar-brand" href="#">Aux fourneaux -Administration-</a>
            </div>
        </nav>-->
    <?php
    }
    
   
    public function corp_page(){
        ?>
        <body>
        <div class="container">
        <div class="col-lg-12"> 

        
        <form action="/Beddek_Lilya_Sil2/NewsController/add" name="form" id="form" method="post">    
            <legend><h4> Ajouter New</h4></legend><br>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Titre</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Titre de la new"  required>
                </div>
            </div>

            <div class="form-group row">
                <label for="img" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="img" name="img" required>
                </div>
            </div>
        
            <div class="row">
                <input type="submit" value="Ajouter" class="btn btn-primary btn-block">
            </div>
        </form>
        </div>
        </div> 
        </body>

        </html>
        <?php
    }

    

    
    
}
?>

