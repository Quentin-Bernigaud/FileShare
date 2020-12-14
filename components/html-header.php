<?php
    session_start();
    if(session_status() !== PHP_SESSION_ACTIVE) {
		throw new Exception('Erreur lors de l\'initialisation de la session');
	}
?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Main File JS -->
    <script src="./assets/js/main.js"></script>

    <link rel="icon" href="./assets/images/favicon.svg">
    <title>FileShare - Quentin Bernigaud</title>
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">FileShare</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./file-list.php">Voir les fichiers</a>
                        </li>
                        <?php if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./user.php">Mon compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./logout.php">Se déconnecter</a>
                        </li>
                        <?php } else {?>
                        <li class="nav-item">
                            <a class="nav-link" href="./login.php">Se connecter</a>
                        </li>
                        <?php } ?>
                    </ul>
                </form>
            </div>
        </div>
    </nav>


    <img id="hero" src="assets/images/hero-mobile.svg"/>