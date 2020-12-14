<?php
    function connectionDb()  {
        return $connection = new PDO(
            'mysql:host=localhost:3306;dbname=iim_php_fileshare',
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
            ]
        );
    }
    $connection = connectionDb();
?>