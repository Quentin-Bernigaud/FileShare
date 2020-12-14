<?php
    require('./components/html-header.php');
    if (!isset($_SESSION['user'])) {header('Location: login.php');}
    require_once('./database/connection.php');
    $connection = connectionDb();

    if (isset($_POST['submit'])) {
		if (empty($_POST['updateName']) && empty($_POST['updatePassword'])) {

		} else {
            $ok=true;
            if (!empty($_POST['updateName'])) {
                $query = $connection->prepare('UPDATE users SET name = :updateName WHERE id = :updateId');
                $query->execute(['updateName' => $_POST['updateName'], 'updateId' => $_SESSION['user']['id']]);
                $_SESSION['user']['name'] = $_POST['updateName'];
            }

			if (!empty($_POST['updatePassword'])) {

                if ($_POST['updatePassword'] != $_POST['updatePasswordCheck'] ) {
                    $ok=false;
                    ?>
                    <div class="container mt-5 mb-5">
                        <div class="row justify-content-evenly">
                            <div class="col-md-4">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Erreur de modification&nbsp;!</strong><br>Les mots de passe doivent être identiques
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    $query = $connection->prepare('UPDATE users SET password = :updatePassword WHERE id = :updateId');
                    $query->execute(['updatePassword' => $_POST['updatePassword'], 'updateId' => $_SESSION['user']['id']]);
                }
            } 
            
            if ($ok) {?>
                <div class="container mt-5 mb-5">
                    <div class="row justify-content-evenly">
                        <div class="col-md-4">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Mise à jour réussie&nbsp;!</strong><br>Les modifications ont bien été prises en compte
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                header( "refresh:2;url=user.php" );
            }
		}
    }

    $query = $connection->prepare('SELECT * FROM files WHERE userId = :userId');
	$query->execute(['userId' => $_SESSION['user']['id']]);
    $files = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $connection->prepare('SELECT avatar FROM users WHERE id = :userId');
    $query->execute(['userId' => $_SESSION['user']['id']]);
    $avatars = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-evenly">
        <div class="col-md-4">
            <div class="card">
                <img src="<?=$avatars[0]['avatar']?>" class="card-img-top">
                <div class="card-body">
                    <form action="./avatar-upload.php" method="POST" id="AvatarUpload" class="g-3 needs-validation"
                        enctype='multipart/form-data' novalidate>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Photo de profil</label>
                            <input type="file" class="form-control" name="avatar" required>
                            <div name="avatarHelp" class="form-text">Taille maximale 10Mo</div>
                        </div>
                        <input name="submit" type="submit" class="btn btn-primary" value="Modifier la photo de profil">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="mt-4 mb-3">Modification de compte</h3>
            <form action="./user-update.php" method="POST" name="userUpdate" class="g-3 needs-validation" novalidate>
                <div class="mb-3">
                    <label for="updateName" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" name="updateName" value="<?=$_SESSION['user']['name']?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="updatePassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="updatePassword">
                </div>
                <div class="mb-3">
                    <label for="updatePasswordCheck" class="form-label">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" name="updatePasswordCheck">
                </div>
                <div class="col-12">
                    <input name="submit" type="submit" class="btn btn-primary" value="Modifier">
                </div>
            </form>
        </div>
    </div>
</div>


<?php require('./components/html-footer.php');?>