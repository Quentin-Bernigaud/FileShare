<?php
    require('./components/html-header.php');

    require_once('./database/connection.php');
    $connection = connectionDb();
    $query = $connection->prepare('SELECT f.*, u.name FROM files f JOIN users u ON f.userId = u.id WHERE f.id = :id');
	$query->execute(['id' =>$_GET['fileId']]);
    $files = $query->fetchAll(PDO::FETCH_ASSOC);
    if (count($files) == 0) {
        throw new Exception('Le fichier n\'est pas trouvé');
    }
    $file = $files[0];
?>

<div class="container mt-5">
    <div class="row justify-content-evenly">
        <div class="col-md-3 mt-5 mb-5">
            <div class="card">
                <?php if (substr($file['type'], 0, 5) == "image") {?>
                    <img src="<?=$file['filename']?>" class="card-img-top">
                <?php } else { ?>
                    <img src="./assets/images/card.svg" class="card-img-top">
                <?php } ?>
                <div class="card-body">
                    <h5 class="card-title mb-0"><?=$file['title']?></h5>
                    <p class="cad-text"><small><?=$file['description']?></small></p>
                    <p class="card-text">Utilisateur : <?=$file['name']?></p>
                    <p class="card-text">Taille du fichier : <?=$file['size']?> octets</p>
                    <p class="card-text">Format : <?=$file['type']?></p>
                </div>
                <div class="card-footer">
                    <a href="<?=$file['filename']?>" download><small class="link-light btn btn-primary"><img src="./assets/images/download.svg"> Télécharger le fichier</small></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('./components/html-footer.php');?>