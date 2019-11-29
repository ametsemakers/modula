<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Show message</title>
    </head>

    <body>
        <?php
            include 'menu.php';
        ?>

        <div class="container-fluid">
            
            <?php if (isset($_SESSION['login'])) { 

                require 'connexion.php';

                $id = $_GET['id'];

                $request = $pdo->prepare('SELECT * FROM contact WHERE id = :id');
                $request->execute(['id' => $id]);

                $message = $request->fetch();
                $datetime = strtotime($message['date']);
            ?>
           
            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <h1>Espace admin</h1>
                    <br />
                    <h5>Message - <?php echo $message['id']; ?></h5>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-12">
                    <div class="card">
                        <h6 class="card-header">
                            <span>Expediteur:</span>
                            <br /><br />
                            <?php echo $message['firstname'] . " " . $message['lastname']; ?>
                        </h6>
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $message['email']; ?></h6>
                            <hr>
                            <span>Contenu :</span>
                            <br />
                            <br />
                            <p class="card-text"><?php echo $message['message']; ?></p>
                            <hr>
                            <h6>Envoyé le :<?php echo date("d/m/y, H:i", $datetime); ?></h6>
                            <hr>
                            <a href="admin.php" class="btn btn-warning">Retour</a>
                        </div>
                    </div>
                </div>
            </div>   

            <?php
                $request->closeCursor();
                unset($request);
        
            } else { 
            ?>

            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <h3>Vous n'avez pas l'autorisation de visiter cette page...</h3>
                </div>
            </div>
        </div>

        <?php
        }
            include 'footer.php';
        ?>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>
