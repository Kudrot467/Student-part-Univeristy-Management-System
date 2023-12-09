<?php
session_start();
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


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = test_input($_POST['email']);
    $flag = true;


    if (empty($email)) {
        $_SESSION['emailErr'] = "Email is required";
        $flag = false;
    } else {
        $_SESSION['emailErr'] = "";
        $_SESSION['email'] = $email;
        // $sql = "SELECT * FROM registration WHERE email='$email'";
        // $query = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_array($query);
        
        $sql = "SELECT * FROM registration WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        $email_to = $row["email"];
        $password = $row["password"];
        $mail = new PHPMailer(true);

        try {
            // SMTP settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kkudrotekhoda@gmail.com';
            $mail->Password = 'uflhrldncrbkqpgp';  // generated App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Email content
            $mail->setFrom('kkudrotekhoda@gmail.com', 'Your Name');
            $mail->addAddress($email_to);
            $mail->Subject = 'Password Recovery email';
            $mail->Body = 'Your password is--> ' . $password;

            // Send email
            $mail->send();
            echo "
            <h3>Email Send Success</h3>
            <h3><a href='../Login/login.php'>Go Back Login</a></h3>
            
            ";
        } catch (Exception $e) {
            echo 'Email send failed: ' . $mail->ErrorInfo;
        }
    }


    if ($flag) {
        header("../Login/login.php");
    } else {
        header("forgotPass.php");
    }
}



?>