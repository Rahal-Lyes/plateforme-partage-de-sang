<?php
session_start();
include "../config/database.php";
function verifierMotsDePasse($motDePasse1, $motDePasse2) {
   
    if ($motDePasse1 === $motDePasse2) {
        return true; 
    } else {
        return false; 
    }
}
?>

<?php
// Récupérer les valeurs du formulaire POST
$username = $_POST['username'];
$password = $_POST['password'];
$success=0;
$msg="";
if(!empty($username) AND !empty($password)){
    try {
        // Assuming you have a class Connect that handles the DB connection
        $connect = new Connect();
        $query = "SELECT * FROM admin WHERE username = :username";
        $statement = $connect->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();

        $admin = $statement->fetch(PDO::FETCH_ASSOC);
      
         
        if ($admin && verifierMotsDePasse($password,$admin['password'])) {
            $_SESSION['username']=$admin['username'];
            $success=1;
            $msg="Successfully logged in";
    
    
        } else {
            $success= -1;
            $msg="Invalid credentials";
        }
    } catch (PDOException $e) {
        $success=-3; 
        $msg="Database error: " . $e->getMessage();
    }
}
else{
    $msg="Veuiller remplir les champs";
}

$res=["success"=>$success,"message"=>$msg];
echo json_encode($res);

   

?>


