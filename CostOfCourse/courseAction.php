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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userEmail = isset($_SESSION['email']) ? $_SESSION['email']:'';
echo $userEmail;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $courseId = isset($_POST['course_id']) ? intval($_POST['course_id']) : 0;
    $selectQuery = "SELECT * FROM courses WHERE id=?";
    $stmtSelect = $conn->prepare($selectQuery);
    $stmtSelect->bind_param("i", $courseId);
    $stmtSelect->execute();
    $result = $stmtSelect->get_result();
    while ($row = $result->fetch_assoc()) { 
        
        $perCredit=5500;
        $totalAmount= $row["credit"]*$perCredit;
        $courseName= $row["course_name"];
        $courseInstructor = $row["course_instructor"];
        $credit=$row["credit"];
        
        $insertQuery = "INSERT INTO my_courses (enroll_email, course_id,course_name,course_instructor,credit,amount) VALUES ('$userEmail', '$courseId','$courseName',' $courseInstructor','$credit','$totalAmount')";
        $insert = mysqli_query($conn, $insertQuery);
        if($insert){
           header("location:../Portal/portal.php");
        }
        else {
           header("location:../Courses/courses.php");
        }
   
    }

}
?>