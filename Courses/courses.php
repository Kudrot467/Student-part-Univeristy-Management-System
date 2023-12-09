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
//  include('../Header/header2.php');
$selectQuery = "SELECT * FROM courses";
$stmt = $conn->prepare($selectQuery);
$stmt->execute();
$result = $stmt->get_result();
echo " 
<link rel='stylesheet' href='./styles.css'>
<div class='myCourse-container'>";
while ($row = $result->fetch_assoc()) { ?>
    <table>
        <tr>
            <td>
                <fieldset class="field">
                    <legend class="legend">Email of Instructor-><strong>
                            <?php echo $row['course_instructor'] ?>
                        </strong></legend>
                    <table>
                        <tr>
                            <td>Id :
                                c-
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td><b>course_name:
                                    <?php echo $row['course_name']; ?>
                                </b></td>
                        </tr>
                        <tr>
                            <td><b>credit :
                                    <?php echo $row['credit']; ?>
                                </b></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../CostOfCourse/course.php?id=<?php echo $row['id'] ?>" name="btnClick">Enroll
                                    Now...</a>
                            </td>

                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
    </table>
    <?php
}
echo "</div>

";
include('../Footer/footer2.php');
echo "<script src='courses.js'></script>";
?>