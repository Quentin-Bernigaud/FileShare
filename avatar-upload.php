<?php
    session_start();
    if(session_status() !== PHP_SESSION_ACTIVE) {
		throw new Exception('Erreur lors de l\'initialisation de la session');
	}
    if (!isset($_SESSION['user'])) {header('Location: login.php');}


    require_once('./database/connection.php');
    $connection = connectionDb();

	if(isset($_POST['submit']) && substr($_FILES['avatar']['type'], 0, 5) == "image" && $_FILES['avatar']['size'] <= 10485760) {

        if (!is_dir('uploads')) {
            mkdir('uploads');
            if (!is_dir('uploads'.DIRECTORY_SEPARATOR.'profile')) {
                mkdir('uploads'.DIRECTORY_SEPARATOR.'profile');
            }
        }
        

        $fileName = 'uploads'.DIRECTORY_SEPARATOR.'profile'.DIRECTORY_SEPARATOR.$_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], $fileName);
        $query = $connection->prepare('UPDATE users SET avatar = :avatar WHERE id = :userId');
        $query->execute(['avatar' => $fileName, 'userId' => $_SESSION['user']['id']]);
    }
    header('Location: user.php');
?>