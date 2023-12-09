<?php
session_start();

//echo "Connected successfully";
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = test_input($_POST['email']);
  $password = test_input($_POST['password']);
  $flag = true;



  if (empty($email)) {
    $_SESSION['emailErr'] = "Email is required";
    $flag = false;
  } else {
    $_SESSION['emailErr'] = "";
    $_SESSION['email'] = $email;
  }
  ;
  if (empty($password)) {
    $_SESSION['passwordErr'] = "Password is required";
    $flag = false;
  } else {
    $_SESSION['passwordErr'] = "";
    $_SESSION["password"] = $password;
  }

  //   if ($fetch) {
//     $_SESSION["id"] = $fetch["id"];
//     $_SESSION["email"] = $fetch["email"];
//    $_SESSION["password"] = $fetch["password"];
//     if ($_SESSION["password"] == $password) {
//       $_SESSION['authenticate']=true;
//       // header("location:../Portal/portal.php");
//     } else {
//       echo "Email/Password does not match";
//     }
//   }




  if ($flag) {
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
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $select = "SELECT * FROM registration WHERE email=? AND password=?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    // $fetch = $result->fetch_assoc();
    $stmt->close();
    if ($result->num_rows == 1) {
      $_SESSION['authenticate'] = true;
      header("location:../Portal/portal.php");
    }
    else{
       $_SESSION['credentialErr']="email/pass is wrong";
       header("location:login.php");
    }
  } else {
    header("location:login.php");
  }
}
?>