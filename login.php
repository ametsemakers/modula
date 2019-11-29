<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        
        <title>Login</title>
    </head>

    <body>
        <?php
            include 'menu.php';
        ?>

        <div class="container-fluid">
            
            <?php if(isset($_SESSION['login_error_msg'])) { ?>
                
                <div class="row mt-5">
                    <div class="col-sm-12 text-center text-danger">
                        <p><?php echo $_SESSION['login_error_msg']; ?> </p>
                    </div>
                </div>

                <?php unset($_SESSION['login_error_msg']);
            } 
            ?>

            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <h1>Login</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <form action="login_action.php" method="post">
                        <div class="form-group row">  
                            <label for="login" class="col-sm-2 col-form-label">Login</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="login" id="login">
                            </div>
                        </div>
                        <div class="form-group row">  
                            <label for="mdp" class="col-sm-2 col-form-label">Mot de passe</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="mdp" id="mdp">
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
            <div class="filler"></div>
        </div>

        <?php 
            include 'footer.php';
        ?>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>
