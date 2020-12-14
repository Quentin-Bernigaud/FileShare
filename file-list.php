<?php
    require('./components/html-header.php');

    require_once('./database/connection.php');
    $connection = connectionDb();
    
    $query = $connection->prepare('SELECT f.*, u.name FROM files f JOIN users u ON f.userId = u.id');
	$query->execute();
    $files = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5 mb-3">
    <div class="row">
        <h2 class="mt-4 mb-0 text-center">Liste des fichiers</h2>
        <p class="h6 mt-0 mb-4 text-center">Retrouvez ci-dessous tous les documents présents dans notre base de données.</p>
    </div>
</div>

<div class="container mt-2">
    <div class="row">
        <?php foreach ($files as $file) {?>
        <div class="col-md-4">
            <figure class="text-center">
                <blockquote class="blockquote"><p><a href="file.php?fileId=<?=$file['id']?>" class="link-dark"><?=$file['title']?></a></p></blockquote>
                <figcaption class="blockquote-footer"><?=$file['name']?> - <cite title="Source Title"><?=$file['size']?> octets</cite></figcaption>
            </figure>
        </div>
        <?php } ?>
    </div>
</div>


<?php require('./components/html-footer.php');?>