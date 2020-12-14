<?php
    session_start();
    if(session_status() !== PHP_SESSION_ACTIVE) {
		throw new Exception('Erreur lors de l\'initialisation de la session');
	}
    if (!isset($_SESSION['user'])) {header('Location: login.php');}


    require_once('./database/connection.php');
    $connection = connectionDb();

	if(isset($_POST['fileId'])) {
        // echo '<pre>';
		// var_dump($_POST);
        // echo '</pre>';

        $query = $connection->prepare('SELECT * FROM files WHERE id = :fileId AND userId = :userId');
        $query->execute(['fileId' => $_POST['fileId'], 'userId' => $_SESSION['user']['id']]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if(!empty($result)) {
            $fileName = $result['filename'];
            unlink($fileName);

            $query = $connection->prepare('DELETE FROM files WHERE id = :fileId AND userId = :userId');
            $query->execute(['fileId' => $_POST['fileId'], 'userId' => $_SESSION['user']['id']]);
        }
    }
    header('Location: user.php');
?>