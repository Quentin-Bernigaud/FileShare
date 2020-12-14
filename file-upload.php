<?php
    session_start();
    if(session_status() !== PHP_SESSION_ACTIVE) {
		throw new Exception('Erreur lors de l\'initialisation de la session');
	}
    if (!isset($_SESSION['user'])) {header('Location: login.php');}


    require_once('./database/connection.php');
    $connection = connectionDb();

	if(isset($_POST['submit']) && $_FILES['myFile']['size'] <= 10485760) {
        // echo '<pre>';
		// var_dump($_FILES['myFile']);
        // echo '</pre>';
        $fileName = 'uploads'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.$_FILES['myFile']['name'];

        $query = $connection->prepare('SELECT * FROM files WHERE filename = :filename');
        $query->execute(['filename' => $fileName]);
        $files = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($files) == 0) {
            if (!is_dir('uploads')) {
                mkdir('uploads');
                if (!is_dir('uploads'.DIRECTORY_SEPARATOR.'files')) {
                    mkdir('uploads'.DIRECTORY_SEPARATOR.'files');
                }
            }
            
            move_uploaded_file($_FILES['myFile']['tmp_name'], $fileName);
            $query = $connection->prepare('INSERT INTO files (filename, title, description, size, type, userId) VALUES (:filename, :title, :description, :size, :type, :userId)');
            $query->execute(['filename' => $fileName, 'title' => $_POST['fileTitle'], 'description' => $_POST['fileDescription'], 'size' => $_FILES['myFile']['size'], 'type' => $_FILES['myFile']['type'], 'userId' => $_SESSION['user']['id']]);
        }
    }
    header('Location: user.php');
?>