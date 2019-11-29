<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <title>Contact</title>
    </head>

    <body>
        <?php
            include 'menu.php';
        ?>
        <div class="container-fluid">
            
            <?php if(isset($_SESSION['contact_error_msg'])) { ?>
                
                <div class="row mt-5">
                    <div class="col-sm-12 text-center text-danger">
                        <p><?php echo $_SESSION['contact_error_msg']; ?> </p>
                    </div>
                </div>

                <?php unset($_SESSION['contact_error_msg']);

            } elseif (isset($_SESSION['contact_success_msg'])) { ?>

                <div class="row mt-5">
                    <div class="col-sm-12 text-center text-success">
                        <p><?php echo $_SESSION['contact_success_msg']; ?> </p>
                    </div>
                </div>

                <?php unset($_SESSION['contact_success_msg']);
            }
            ?>

            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <h1>Contact</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <form id="form" action="contact_action.php" method="post">
                        <div class="messages"></div>
                        <div class="form-group row">  
                            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nom" id="nom" required>
                            </div>
                        </div>
                        <div class="form-group row">  
                            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="prenom" id="prenom" required>
                            </div>
                        </div>
                        <div class="form-group row">  
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group row">  
                            <label for="message" class="col-sm-2 col-form-label">Message</label>
                            <div class="col-sm-10">
                                <textarea type="text-area" class="form-control" name="message" id="message" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rgpd" name="rgpd" required>
                                    <label class="form-check-label" for="rgpd">
                                        Acceptation RGPD concernant les données personnelles qui ne seront ni revendus,
                                        ni utilisées à des fins commerciales.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="g-recaptcha" data-sitekey="6LfH_sQUAAAAABLwFaFDvgq-CGC4n6BaMpdQhi-w"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php 
            include 'footer.php';
        ?>


        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
        <script type="text/javascript">

            $(document).ready(function() {
                
                var contactForm = $("#contactForm");
                
                contactForm.on("submit", function(e) {
    
                    e.preventDefault();
            
                    var nom = $("#nom").val();
                    var prenom = $("#prenom").val();
                    var email = $("#email").val();
                    var message = $("#message").val();
                    var rgpd = $("#rgpd").val();
                
                    $.ajax({
                        type: "POST"
                        url: "contact_action.php",
                        data: {
                            nom: nom,
                            prenom: prenom,
                            email: email,
                            message: message,
                            rgpd: rgpd,
                            
                            captcha: grecaptcha.getResponse()
                    },
                        success: function() {

                        console.log("OUR FORM SUBMITTED CORRECTLY");
                        }
                    })
                });
            });

        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
        </script>
    </body>
</html>
