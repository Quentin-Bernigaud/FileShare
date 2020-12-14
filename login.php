<?php
    require('./components/html-header.php');
    require_once('./database/connection.php');
    $connection = connectionDb();

    // INSCRIPTION
    if (isset($_POST['signUpName'])) {
		if (empty($_POST['signUpName']) || empty($_POST['signUpPassword']) || empty($_POST['signUpPasswordCheck'])) {
			
		} else {
            $query = $connection->prepare('SELECT * FROM users WHERE name = :signUpName');
            $query->execute(['signUpName' => $_POST['signUpName']]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
			 if (!empty($user)) {
                echo '
                <div class="container mt-5 mb-5">
                    <div class="row justify-content-evenly">
                        <div class="col-md-4">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ce nom existe déjà&nbsp;!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
                ';
             } else if ($_POST['signUpPassword'] === $_POST['signUpPasswordCheck'] ) {
				$query = $connection->prepare('INSERT INTO users (name, password, avatar) VALUES (:signUpName, :signUpPassword, :avatar)');
                $query->execute(['signUpName' => $_POST['signUpName'], 'signUpPassword' => $_POST['signUpPassword'], 'avatar' => $_POST['signUpAvatar']]);
                $newId = $connection->lastInsertId();
                if ($newId > 0) {
                    $_SESSION['user']['id'] = $newId;
                    $_SESSION['user']['name'] = $_POST['signUpName'];
                    $_SESSION['user']['password'] = $_POST['signUpPassword'];
                }
                header('Location: index.php');
			} else {
                echo '
                <div class="container mt-5 mb-5">
                    <div class="row justify-content-evenly">
                        <div class="col-md-4">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Erreur de connexion&nbsp;!</strong><br>Les mots de passe doivent être identiques
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
                ';
			}
		}
    }


    // CONNEXION
	if(session_status() !== PHP_SESSION_ACTIVE) {
        throw new Exception('
        <div class="container mt-5 mb-5">
            <div class="row justify-content-evenly">
                <div class="col-md-4">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erreur lors de l\'initialisation de la session&nbsp;!</strong><br>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        ');
    }

    if (isset($_POST['signInName'])) {
		if (empty($_POST['signInName']) || empty($_POST['signInPassword'])) {
			
		} else {
                $query = $connection->prepare('SELECT * FROM users WHERE name = :signInName AND password = :signInPassword');
            	$query->execute(['signInName' => $_POST['signInName'], 'signInPassword' => $_POST['signInPassword']]);
            	$user = $query->fetch(PDO::FETCH_ASSOC);
			 if (!empty($user)) {
                $_SESSION['user'] = $user;
                // Hide password from session
                $_SESSION['user']['password'] = '*****';
                header('Location: index.php');
                } else {
                    echo '
                    <div class="container mt-5 mb-5">
                        <div class="row justify-content-evenly">
                            <div class="col-md-4">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Erreur de connexion&nbsp;!</strong><br>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
        }
    }
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-evenly">
        <div class="col-md-4">
            <h3 class="mt-4 mb-3">Connexion</h3>
            <form action="./login.php" method="POST" id="login" class="g-3 needs-validation" novalidate>
                <div class="mb-3">
                    <label for="signInName" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" name="signInName" required>
                </div>
                <div class="mb-3">
                    <label for="signInPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="signInPassword" required>
                </div>
                <input id="submit" type="submit" class="btn btn-primary" value="Se connecter">
            </form>
        </div>

        <div class="col-md-4">
            <h3 class="mt-4 mb-3">Inscription</h3>
            <form action="./login.php" method="POST" id="register" class="g-3 needs-validation" novalidate>
            <div class="mb-3">
                    <input type="hidden" name="signUpAvatar" value="./uploads/profile/avatar-default.svg">
                    <label for="signUpName" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" name="signUpName" required>
                </div>
                <div class="mb-3">
                    <label for="signUpPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="signUpPassword" required>
                </div>
                <div class="mb-3">
                    <label for="signUpPasswordCheck" class="form-label">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" name="signUpPasswordCheck" required>
                </div>
                <div class="col-12">
                    <input id="submit" type="submit" class="btn btn-primary" value="S'inscrire">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('./components/html-footer.php');?>