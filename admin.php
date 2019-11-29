<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Espace admin</title>
    </head>

    <body>
        <?php
            include 'menu.php';
        ?>
        <div class="container-fluid">

            <?php if (isset($_SESSION['login'])) { ?>
           
            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <h1>Espace admin</h1>
                </div>
            </div>

            <?php
            require 'connexion.php';

            $sql = 'SELECT * FROM contact ORDER BY date DESC';

            $result = $pdo->query($sql);
            ?>
            
            <div class="table-responsive-sm">
                <table class="table table-hover table-sm mt-4">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Email</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($ligne_tab = $result->fetch())    
                        {          
                            $datetime = strtotime($ligne_tab['date']);    
                        ?>
                        <tr>      
                            <td><?php echo date("d/m/y", $datetime); ?></td>
                            <td><?php echo date("H:i", $datetime); ?></td>
                            <td><?php echo $ligne_tab['email']; ?></td>
                            <td><a href="show.php?id=<?php echo $ligne_tab['id']; ?>" class="text-primary">Lire</a></td>
                        </tr>
                        <?php
                        }
                        $result->closeCursor();
                        unset($pdo);
                        ?>
                    </tbody>
                </table>
            </div>
            
            
            <?php
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
