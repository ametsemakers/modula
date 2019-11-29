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

        <title>Homepage</title>
    </head>

    <body>
        <?php
            include 'menu.php';
        ?>

        <div class="container-fluid">

            <!-- banner -->
            <div class="row">
                <div class="col-sm-12">
                    <img src="https://picsum.photos/id/1019/1600/180" class="img-fluid mx-auto" alt="Responsive image">
                </div>
            </div>

            <!-- carousel -->
            <div class="row mt-5 justify-content-center">
                <div class="col-sm-8">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/600/400?random=1" class="d-block w-100" alt="image1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/600/400?random=2" class="d-block w-100" alt="image2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/600/400?random=3" class="d-block w-100" alt="image3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- site content -->
            <div class="row mt-5">
                <div class="col-sm-12 text-center">
                    <h1>Bienvenue sur mon site extra-ordinaire!!</h1>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 col-sm-6 mt-3">
                    <img src="https://picsum.photos/800/600?random=4" class="img-fluid rounded" alt="img random4">
                </div>
                <div class="col-12 col-sm-6 mt-3">
                    <img src="https://picsum.photos/800/600?random=5" class="img-fluid rounded" alt="img random5">
                </div>
                <div class="col-12 col-sm-6 mt-3">
                    <img src="https://picsum.photos/800/600?random=6" class="img-fluid rounded" alt="img random6">
                </div>
                <div class="col-12 col-sm-6 mt-3">
                    <img src="https://picsum.photos/800/600?random=7" class="img-fluid rounded" alt="img random7">
                </div>
            </div>
        </div>

        <?php 
            include 'footer.php';
        ?>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>
