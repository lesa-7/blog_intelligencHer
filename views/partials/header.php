<?php session_start();
//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intelligencHer</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar & menu burger -->
    <nav class="navbar navbar-dark bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">intelligenc<span style="color:#ff008c">H</span>er</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <!-- Lien page d'acceuil  -->
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                        </li>

                        <!-- Lien page Auteur  -->
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="author.php">Auteur</a>
                        </li>

                        <!-- Si je suis connecté, afficher lien Mon compte sinon afficher Se connecter  -->
                        <?php
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="myAccount.php">Mon compte</a>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Se connecter</a>
                        </li>
                        <?php }
            ?>

                        <!-- Si je suis connecté, ne pas afficher S'inscrire -->
                        <?php
            if (isset($_SESSION['user']) && empty($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">S'inscrire</a>
                        </li>
                        <?php }
            ?>
                        <!-- Lien page Articles  -->
                        <li class="nav-item">
                            <a class="nav-link" href="articles.php">Articles</a>
                        </li>

                        <!-- Si je suis connecté, afficher lien Publier un article -->
                        <?php
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="addPost.php">Publier un article</a>
                        </li>
                        <?php }
            ?>

                        <!-- Si je suis connecté, afficher lien Se déconnecter -->
                        <?php
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Se déconnecter</a>
                        </li>
                        <?php }
            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>