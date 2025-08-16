
<?php
header("Content-Type: application/json");

include("../database.php");

// Initialisation de la réponse JSON
$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $bloodtypeFind = $data['bloodGroup'];
    $wilayaFind = $data['wilaya'];
    $dairaFind = $data['daira'];

    try {
        $connect = new Connect();

        $query = "SELECT bu.firstname, bu.lastname, bu.bloodtype, bu.wilaya, bu.daira
                  FROM blooduser bu
                  JOIN bloodgiver bg ON bg.userId = bu.userId
                  WHERE bu.wilaya = :wilaya AND bu.daira = :daira AND bu.bloodtype = :bloodtype";

      
                

        $statement = $connect->prepare($query);

        // Liaison des paramètres
        $statement->bindParam(':wilaya', $wilayaFind);
        $statement->bindParam(':daira', $dairaFind);
        $statement->bindParam(':bloodtype', $bloodtypeFind);

        // Exécution de la requête
        $statement->execute();

        // Récupération des résultats
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $success = 1;
        $response['data'] = $results;

    } catch (PDOException $e) {
        $success = 0;
        $response['error'] = $e->getMessage();
    }

    $response['success'] = $success;

    // Envoi de la réponse JSON
    echo json_encode($response);
}
?>
