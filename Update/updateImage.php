<?php
session_start();
if (!isset($_SESSION['authenticate']) || $_SESSION['authenticate'] !== true) {
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
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

echo $id;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $upload = move_uploaded_file($tmp_name, "../images/" . $name);
        
        $updateQuery = "UPDATE registration SET image=? WHERE id=?";
        $stmtUpdate = $conn->prepare($updateQuery);
        $stmtUpdate->bind_param("si", $name, $id);
        $result = $stmtUpdate->execute();
        
        $stmtUpdate->close();
        if($upload){
            header("Location:../Portal/profile.php");
        }    
    }
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Image</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <form method="POST" action="updateImage.php" enctype="multipart/form-data" novalidate>
        <table>
            <tr>
            <td>
                <fieldset>
                  <h4>Please upload your image</h4>
                  <input type="file" name="image">
                  <input type="submit" name="submit">
                </fieldset>
            </td>
            </tr>
        </table>
    </form>
</body>
</html>