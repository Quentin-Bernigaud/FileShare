<?php
    require('./components/html-header.php');
    if (!isset($_SESSION['user'])) {header('Location: login.php');}

    require_once('./database/connection.php');
    $connection = connectionDb();
    $query = $connection->prepare('SELECT * FROM files WHERE userId = :userId');
	$query->execute(['userId' => $_SESSION['user']['id']]);
    $files = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $connection->prepare('SELECT avatar FROM users WHERE id = :userId');
    $query->execute(['userId' => $_SESSION['user']['id']]);
    $avatars = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5 mb-5">
    <div class="row mt-5 justify-content-evenly">
        <div class="col-md-3">
            <div class="card">
                <img src="<?=$avatars[0]['avatar']?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$_SESSION['user']['name']?><a href="./user-update.php"><span class="float-end badge rounded-pill bg-primary"><img src="./assets/images/edit.svg"></span></a></h5>
                    <p class="card-text">Nombre de fichier : <b><?=count($files)?></b></p>
                </div>
            </div>
        </div>

        <div class="col-md-1"></div>

        <div class="col-md-4">
            <h3 class="mt-4 mb-3">Ajouter un fichier</h3>
            <form action="./file-upload.php" method="POST" id="fileUpload" class="g-3 needs-validation"
                enctype='multipart/form-data' novalidate>
                <div class="mb-3">
                    <label for="fileTitle" class="form-label">Titre</label>
                    <input type="text" class="form-control" name="fileTitle" required>
                </div>
                <div class="mb-3">
                    <label for="fileDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" name="fileDescription" required>
                </div>
                <div class="mb-3">
                    <label for="fileDescription" class="form-label">Fichier</label>
                    <input type="file" class="form-control" name="myFile" required>
                    <div name="fileHelp" class="form-text">Taille maximale 10Mo</div>
                </div>
                <input name="submit" type="submit" class="btn btn-primary" value="Envoyer le fichier">
            </form>
        </div>

        <div class="col-md-1"></div>

        <div class="col-md-3">
            <h3 class="mt-4 mb-3">Mes fichiers</h3>
            <?php foreach ($files as $file) {?>
            <blockquote class="blockquote">
                <p><a href="file.php?fileId=<?=$file['id']?>" class="link-dark"><?=$file['title']?></a>
                    <img style="cursor: pointer;margin-left:25px;" data-bs-toggle="modal"
                        data-bs-target="#modal<?=$file['id']?>" src="./assets/images/delete.svg"></p>
                <div class="modal fade" id="modal<?=$file['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Suppression d'un fichier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Voulez vous vraiment supprimer le
                                fichier<br><i><?=$file['title']?></i>
                                ?</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <form action="./file-delete.php" method="post">
                                    <input type="hidden" name="fileId" value="<?=$file['id']?>">
                                    <button type="submit" class="btn btn-primary">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </blockquote>
            <figcaption class="blockquote-footer"><?=$file['type']?> - <cite title="Source Title"><?=$file['size']?> octets</cite></figcaption>
            <?php } ?>
        </div>
    </div>
</div>


<?php require('./components/html-footer.php');?>