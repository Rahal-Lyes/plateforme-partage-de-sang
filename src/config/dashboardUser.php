<?php
include("../database.php");
session_start(); 
$success = 0;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $idUser = $_SESSION['userId']; 

    try {
        $connect = new Connect();

        $query = "UPDATE bloodgiver
                  SET isAvailable = 1
                  WHERE userId = :userId";
        $statement = $connect->prepare($query);

        $statement->bindParam(':userId', $idUser, PDO::PARAM_INT);

        $statement->execute();
        $success = 1;
    } catch (PDOException $e) {
        $success = 0;
    }

    // Préparation de la réponse JSON
    header('Content-Type: application/json');
    echo json_encode($success);
}



?>
