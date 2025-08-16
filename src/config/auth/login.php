<?php
include("../database.php");
session_start();
$success =0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
   
   
    if (empty($email) || empty($password)) {
        $msgEmail = 'Please fill in all the required fields.';
       
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msgEmail = "Invalid email format.";
    } elseif (strlen($password) < 8) {
        $msgEmail = "Password must be at least 8 characters long.";
    } else {
       

        try {
         
            $connect = new Connect();

            
            $query = "SELECT * FROM blooduser WHERE email = :email";
            $statement = $connect->prepare($query);

         
            $statement->bindParam(':email', $email);

          
            $statement->execute();

          
            $user = $statement->fetch(PDO::FETCH_ASSOC);
           
           
            if ($user) {
                $passwordHash = $user['password'];
                if (password_verify($password, $passwordHash)) {
                    $success =1;
                    $msgEmail= "Success";
                 
                    // START SESSION
                    $_SESSION['userId']=$user['userId'];
                    $_SESSION['email']=$user['email'];
                    $_SESSION['firstname']=$user['firstname'];
                    $_SESSION['lastname']=$user['lastname'];
                    $_SESSION['bloodtype']=$user['bloodtype'];
                    $_SESSION['phone']=$user['phone'];
                    $_SESSION['wilaya']=$user['wilaya'];
                    $_SESSION['daira']=$user['daira'];
                    $_SESSION['age']=$user['age'];
                        
               
                } else {
                     $msgEmail= "Email or Password invalid !!";
                } } 
        } catch (PDOException $e) {
          
            $msgEmail="Identifiants invalides";
          
        }
    }
 }
 

$response=[ "success"=>$success,"message"=> $msgEmail];
echo json_encode($response);
?>

