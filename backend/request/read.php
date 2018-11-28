<?php
header('Content-Type: application/json');
include('../connectDb.php');
try {
    $sql = "";
    // use exec() because no results are returned
    $stmt = $conn->prepare("SELECT * from users");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    http_response_code(200);
    echo $json;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;