<?php 

 require_once('../config/database.php');

?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonData = file_get_contents('php://input');
    $success = 0;
    $userData = json_decode($jsonData, true);

    // Vérification des données de session
    if (isset($_SESSION['userId']) && isset($_SESSION['bloodtype'])) {
        $userId = $_SESSION['userId'];
        $bloodtype = $_SESSION['bloodtype'];
        $userPhone= $_SESSION['phone'];
        $hospitalId = json_encode($userData);
        $hospitalId = intval($userData);


        try {
            $connect = new Connect(); 

            $query = "INSERT INTO Publication (date, userId, hospitalId, bloodtype,phone) 
                      VALUES (NOW(), :userId, :hospitalId, :bloodtype,:phone)";
           
            $statement = $connect->prepare($query);

            // Liaison des valeurs
            $statement->bindParam(':userId', $userId);
            $statement->bindParam(':hospitalId', $hospitalId);
            $statement->bindParam(':bloodtype', $bloodtype);
            $statement->bindParam(':phone', $userPhone);

            if ($statement->execute()) {
                
                $success = 1;
            } else {
                
                $success = 0;
            }
        } catch (PDOException $e) {
            // Erreur PDO
            $success = -1;
        }
    } else {
        
        $success = 0;
    }

    header('Content-Type: application/json');
    echo json_encode($success);
}
?>
