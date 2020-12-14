<?php
    require('./components/html-header.php');
?>

<div class="container mt-5">
    <div class="row justify-content-evenly">
        <div class="col-md-3 mt-5 mb-5">
            <?php if (isset($_SESSION['user'])) { ?>
            <h5 class="text-center mb-3">Bonjour <?=$_SESSION['user']['name']?>&nbsp;!</h5>
            <?php } ?>
            <div class="card">
                <img src="./assets/images/card.svg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">À propos de FileShare</h5>
                    <p class="card-text">Fileshare est une plateforme de partage de fichier, qui a pour but de faciliter les échanges de documents.</p>
                    <pclass="card-text">L'existence de cette plateforme tient au fait qu'il s'agit d'un projet de cours réalisé le 10 Décembre 2020 dans le cadre d'un cours de PHP</p>
                    <pclass="card-text">La finalité de ce cours est de créer une plateforme de partage de fichier.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4 mb-5">
            <div class="col-md-12">
                <h5 class="mt-4 mb-0">Consignes</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <small><img src="./assets/images/check.svg"> Réaliser une plateforme de partage de fichier.</small><br>
                    </li>
                </ul>
                <h5 class="mt-3 mb-0">Fonctionnalités&nbsp;:</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <small><img src="./assets/images/check.svg"> Inscription, connexion, déconnexion</small><br>
                        <small><img src="./assets/images/check.svg"> Page pour uploader un fichier (titre, description)</small><br>
                        <small><img src="./assets/images/check.svg"> Page listant les fichiers disponibles.</small><br>
                        <small><img src="./assets/images/check.svg"> Au clic sur un fichier de la liste : page de description du fichier (titre, description
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;taille du fichier, poids, format <i>(mime-type)</i>), ainsi qu'un lien pour le télécharger</small><br>
                        <small><img src="./assets/images/check.svg"> Page listant uniquement les fichiers de l'utilisateur connecté</small><br>
                        <small><img src="./assets/images/check.svg"> Chaque fichier de la liste est accompagné d'un bouton "supprimer"</small><br>
                        <small><img src="./assets/images/check.svg"> Le propriétaire d'un fichier peut le supprimer (et uniquement le propriétaire)</small><br>
                        <small><img src="./assets/images/check.svg"> Page de modification du profil</small><br>
                    </li>
                </ul>
                <h5 class="mt-3 mb-0">Points attendus&nbsp;:</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <small><img src="./assets/images/check.svg"> Toutes les features fonctionnelles</small><br>
                        <small><img src="./assets/images/check.svg"> Avoir une navigation permettant d'accéder à toutes les pages</small><br>
                        <small><img src="./assets/images/check.svg"> Validation des informations reçues via POST et GET (Les variables existent-elles,
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sont-elles vides, etc...)</small><br>
                        <small><img src="./assets/images/check.svg"> Validation avant de faire une action (supprimer une annonce qui ne nous appartient
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pas, créer une annonce sans être connecté, etc... Liste non exhaustive)</small><br>
                        <small><img src="./assets/images/check.svg"> Validation du fichier uploadé</small><br>
                        <small><img src="./assets/images/check.svg"> Pas de notice, warning, ou fatal_error (excepté celles créées volontairement)</small><br>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<?php require('./components/html-footer.php');?>