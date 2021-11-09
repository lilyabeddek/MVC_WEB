<?php
class ContactView extends View{

    public function corp_page(){
        $this->menu();
        $this->contenu();
    }
   
    public function menu(){
    ?>
    <div class="container">
        <div class="col-lg-12">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/PageAccueilController">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/NewsController">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/IdeeRecetteController">Idées de recettes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/HealthyRecettesController">Healthy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/SaisonController">Saison</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/FetesController">Fêtes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Beddek_Lilya_Sil2/IngredientsController">Nutrition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/Beddek_Lilya_Sil2/ContactUsController">Contact
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php   
    }
    public function contenu(){
    ?>
 
        <section class="mb-4">


        <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez Nous</h2>
        <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions? N'hésitez pas à nous contacter directement. Notre équipe reviendra vers vous dans les plus brefs délais pour vous aider.</p>

        <div class="row">

           
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="/Beddek_Lilya_Sil2/ContactUsController/add" method="POST">

                   
                    <div class="row">

                       
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Votre nom</label>
                                <input type="text" id="name" name="name" class="form-control">     
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="">Votre email</label>
                                <input type="Email" id="email" name="email" class="form-control">       
                            </div>
                        </div>
                   

                    </div>
                

              
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Sujet</label>
                                <input type="text" id="subject" name="subject" class="form-control">   
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">

               
                        <div class="col-md-12">

                            <div class="md-form">
                                <label for="message">Message</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            </div>

                        </div>
                    </div>
              

                </form>

                <div class="text-center text-md-left">
                    <a class="btn btn-primary" onclick="validateForm()">Envoyer</a>
                </div>
                <div class="status"></div>
            </div>
           
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>Rue Didouch Mourad Alger</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 213 55555555</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>contact@gmail.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>

        </section>
        <!--Section: Contact v.2-->
        </div>
        </div>
        <script>
            function validateForm() {
                var name =  document.getElementById('name').value;
                if (name == "") {
                    document.querySelector('.status').innerHTML = "Le nom ne peut pas être vide";
                    return false;
                }
                var email =  document.getElementById('email').value;
                if (email == "") {
                    document.querySelector('.status').innerHTML = "L'email ne peut pas être vide";
                    return false;
                } else {
                    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if(!re.test(email)){
                        document.querySelector('.status').innerHTML = "Format de l'email invalid";
                        return false;
                    }
                }
                var subject =  document.getElementById('subject').value;
                if (subject == "") {
                    document.querySelector('.status').innerHTML = "Le sujet ne peut pas être vide";
                    return false;
                }
                var message =  document.getElementById('message').value;
                if (message == "") {
                    document.querySelector('.status').innerHTML = "Le message ne peut pas être vide";
                    return false;
                }
                document.querySelector('.status').innerHTML = "Sending...";
                document.getElementById('contact-form').submit();
            }
        </script>
    <?php
        
    }

   
    
}
?>