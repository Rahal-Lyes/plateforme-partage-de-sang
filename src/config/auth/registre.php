<?php
header('Content-Type: application/json');

include("../database.php");

$success = 0;
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Connect();
    $jsonData = file_get_contents('php://input');
    $userData = json_decode($jsonData, true);

    $firstname = htmlspecialchars(strip_tags($userData['name']));
    $lastname = htmlspecialchars(strip_tags($userData['prenom']));
    $email = $userData['email'];
    $password = $userData['password'];
    $age = intval($userData['age']);
    $phone = $userData['phone'];
    $bloodGroup = $userData['bloodGroup'];
    $wilaya = $userData['wilaya'];
    $daira = $userData['daira'];
  

    // Validation
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($age) || empty($phone) || empty($wilaya)) {
        $msg = "Please fill in all the required fields.";
    } elseif (strlen($firstname) < 2 || strlen($lastname) < 2) {
        $msg = "First name and last name must be at least 2 characters long.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format.";
    } elseif (strlen($password) < 8) {
        $msg = "Password must be at least 8 characters long.";
    } elseif (!is_numeric($age) || $age < 10 || $age > 80) {
        $msg = "Age must be between 10 and 80.";
    } elseif (!preg_match('/^213[5-7]\d{8}$/', $phone)) {
        $msg = "Invalid Algerian phone number format.";
    } else{
        
try {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO blooduser (firstname, lastname, email, password, bloodtype, wilaya, daira, age, phone, registration_date) 
            VALUES (:firstname, :lastname, :email, :password, :bloodtype, :wilaya, :daira, :age, :phone, NOW())";

    $statement = $connect->prepare($query);

    $statement->bindParam(':firstname', $firstname);
    $statement->bindParam(':lastname', $lastname);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $passwordHash);
    $statement->bindParam(':bloodtype', $bloodGroup);
    $statement->bindParam(':wilaya', $wilaya);
    $statement->bindParam(':daira', $daira);
    $statement->bindParam(':age', $age);
    $statement->bindParam(':phone', $phone);
  
    if ($statement->execute()) {
        // Récupérer l'ID de l'utilisateur nouvellement inséré
        $userId = $connect->lastInsertId();

        // Insérer l'utilisateur dans la table bloodgiver
        $query_giver = "INSERT INTO bloodgiver (userId, isAvailable) VALUES (:userId, 1)";
        $statement_giver = $connect->prepare($query_giver);
        $statement_giver->bindParam(':userId', $userId);

        if ($statement_giver->execute()) {
            $msg = "Your registration is successful, congratulations!";
            $success = 1;
        } else {
            $msg = "Failed to register user as a blood giver.";
        }
    } else {
        $msg = "Failed to register user.";
    }
} catch (PDOException $e) {
    $msg = "Database error: " . $e->getMessage();
    $success = 0;
}

$response = ["success" => $success, "message" => $msg];
echo json_encode($response); 


    }}
?>
