<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';


$select = "SELECT * FROM my_courses WHERE enroll_email='$userEmail' ";
$result = mysqli_query($conn, $select);
$numCourses = mysqli_num_rows($result);
echo "
<link rel='stylesheet' href='../styles.css'>
<div >
<h3 id='num-of-courses'>Ouantity of your Courses: $numCourses</h3>
<div class='myCourse-container'>
";

while ($row = mysqli_fetch_array($result)) { 
    
    ?>
    <div class="myCourses">
        <div>
            <h3> <span id="rose">Email of Instructor:</span></span>
                <?php echo $row['course_instructor'] ?>
            </h3>
            <div>
                <p> Course Id: c-
                    <?php echo $row['course_id']; ?>
                </p>
                <p>course_name:
                    <?php echo $row['course_name']; ?>
                </p>
                <p>credit:
                    <?php echo $row['credit']; ?>
                </p>
                <p>You have to pay
                    <?php echo $row['amount']; ?> tk only
                </p>
            </div>
        </div>
    </div>
    <?php
   
}

echo"</div>
</div>
";

?>