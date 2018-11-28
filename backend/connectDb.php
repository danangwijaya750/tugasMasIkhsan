<?php
include('config.php');
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?> 