<?php
include('./database.php');

$success = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new Connect();
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['type'])) {
        $type = $data['type'];

        if ($type == 'deletePublication') {
            if (isset($data['publicationId'])) {
                $publicationId = $data['publicationId'];
                
                $sql = "DELETE FROM Publication WHERE publicationId = :publicationId";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":publicationId", $publicationId, PDO::PARAM_INT);
                
                if ($stmt->execute()) {
                    $success = 1;
                }
            }
        } elseif ($type == 'deleteUser') {
            if (isset($data['userId'])) {
                $userId = $data['userId'];
                
                $sql = "DELETE FROM bloodgiver WHERE idGiver = :userId";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
                
                if ($stmt->execute()) {
                    $success = 1;
                }
            }
        } elseif ($type == 'addPublication') {
            if (isset($data['publicationData'])) {
                $publicationData = $data['publicationData'];
                
                $bloodNeed = $publicationData['bloodNeed'];
                $bloodType = $publicationData['bloodType'];
                $hospital = $publicationData['hospital'];
                $phone = $publicationData['phone'];
                
                try {
                    $sql = "INSERT INTO Publication (date, userId, hospitalId, bloodtype, phone, message) 
                            VALUES (NOW(), :userId, :hospitalId, :bloodtype, :phone, :bloodNeed)";
                    $stmt = $conn->prepare($sql);

                    $userId = 1; // Example user ID

                    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
                    $stmt->bindParam(":hospitalId", $hospital, PDO::PARAM_INT);
                    $stmt->bindParam(":bloodtype", $bloodType, PDO::PARAM_STR);
                    $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
                    $stmt->bindParam(":bloodNeed", $bloodNeed, PDO::PARAM_STR);

                    if ($stmt->execute()) {
                        $success = 1;
                    }
                } catch (PDOException $e) {
                    error_log("Error: " . $e->getMessage());
                }
            }
        } elseif ($type == 'createUser') {
            if (isset($data['userData'])) {
                $userData = $data['userData'];
                $username = $userData['username'];
                $password = $userData['password'];
                
                try {
                    $sql = "INSERT INTO admin (username, password) VALUES (:username, :password)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                    
                    if ($stmt->execute()) {
                        $success = 1;
                    } else {
                        $success = 0;
                    }
                } catch (PDOException $e) {
                    error_log("Error: " . $e->getMessage());
                    $success = 0;
                }
            } else {
                $success = 0;
            }
        } elseif ($type == 'addHospital') {
            if (isset($data['hospitalData'])) {
                $hospitalData = $data['hospitalData'];
                $hospitalName = $hospitalData['hospitalName'];
                
                try {
                    $sql = "INSERT INTO hospitals (name) VALUES (:hospitalName)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':hospitalName', $hospitalName, PDO::PARAM_STR);
                    
                    if ($stmt->execute()) {
                        $success = 1;
                    } else {
                        $success = 0;
                    }
                } catch (PDOException $e) {
                    error_log("Error: " . $e->getMessage());
                    $success = 0;
                }
            } else {
                $success = 0;
            }
        } else {
            $success = 0;
        }
    } else {
        $success = 0;
    }

    echo json_encode(['success' => $success]);
}
?>
