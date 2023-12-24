<?php
session_start();
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    header("Location: ../Login/login.php");
    exit();
}
$servername = "localhost";
$user = "root";
$password = "";
$db = "registration";

// Create connection
$conn = new mysqli($servername, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$userEmail = isset($_SESSION['email']) ? $_SESSION['email']:'';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST["std"])) {
        $data = $_POST["std"];
        $data = json_decode($data);
        $previous=$data->prevPass;
        $password = $data->password;

        $selectQuery = "SELECT * FROM registration WHERE email=?";
        $stmtSelect = $conn->prepare($selectQuery);
        $stmtSelect->bind_param("s", $userEmail);
        $stmtSelect->execute();
        $result = $stmtSelect->get_result();

        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $dbPass=$row['password'];
                if($previous==$dbPass)
                {
                    $updateQuery = "UPDATE registration SET password=? WHERE email=?";
                    $stmtUpdate = $conn->prepare($updateQuery);
                    $stmtUpdate->bind_param("ss", $password, $userEmail);
                    $result2 = $stmtUpdate->execute();
                    if ( $result2) {
                       echo "Success";
                    }
                    else{
                        echo "failed";
                       // header("changePass.php");
                    }
                }
            }
        
        } else {
            $_SESSION['previousErr'] = "not found";
            //$flag = false;
        }
       
    
    }


    // $previous = test_input($_POST['previous']);
    // $password = test_input($_POST['password']);
    // $confirm_password = test_input($_POST['confirm_password']);

    // $flag = true;

    // if(empty($previous)){
    //     $_SESSION["previousErr"]="Provide you previous password";
    //     $flag = false;
    // }
    // else{
    //     $_SESSION['previousErr'] = "";
    //     $_SESSION['previous'] = $previous;
    // }
    // $special_Character = preg_match("/[!@#$%^&*()_+{}[\]:;<>,.?~]/", $password);
    // if (empty($password)) {
    //     $_SESSION["passwordErr"] = "Provide your password";
    //     $flag = false;
    // } elseif (strlen($password) <= 8 && !$special_Character) {
    //     $_SESSION['passwordErr'] = "Please give a special character and password length more than 8.";
    //     $flag = false;
    // } else {
    //     if ($password == $confirm_password) {
    //         $_SESSION["passwordErr"] = "";
    //         $_SESSION["password"] = $password;

           
    //     } else {
    //         $_SESSION['passwordErr'] = "password and confirm password does not match";
    //        $flag = false;
    //     }
    // }

    // if (empty($confirm_password)) {
    //     $_SESSION["confirm_passwordErr"] = "Enter your confirm password";
    //     $flag = false;
    // } else {
    //     $_SESSION["confirm_passwordErr"] = "";
    //     $_SESSION["confirm_password"] = $confirm_password;
    // }

    // if(!$flag){
    //     header("changePass.php");
    // }
    // else{
    //     header("login.php");
    // }
}

?>