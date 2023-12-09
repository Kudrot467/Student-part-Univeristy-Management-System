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

include("../Header/header2.php");
// Create connection
$conn = new mysqli($servername, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$clickedId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$select = "SELECT * FROM courses WHERE id = ?";
$stmt = $conn->prepare($select);
$stmt->bind_param("i", $clickedId);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
echo "<link rel='stylesheet' href='../styles.css'>
<div class='course-details-page'>

";
while ($row = $result->fetch_assoc()) { ?>
    <?php
    $perCredit = 5500;
    $totalAmount = $row["credit"] * $perCredit;
    ?>

    <div class='course-details'>
        <table>
            <tr>
                <td>
                    <fieldset class='course-details-field'>
                        <legend class="course-details-field-title"><strong>Cost with details</strong></legend>
                        <table>
                            <tr>
                                <td><label for="id">Id</label></td>
                                <td>:
                                    c-
                                    <?php echo $row['id']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="course_name"><b>course_name</b></label></td>
                                <td>:
                                    <?php echo $row['course_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="credit"><b>credit</b></label></td>
                                <td>:
                                    <?php echo $row['credit']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="Instructor"><b>Instructor Email</b></label></td>
                                <td>:
                                    <?php echo $row['course_instructor'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="cost"><b>Cost Per Credit</b></label></td>
                                <td>:
                                    <?php echo $perCredit ?>
                                </td>
                            </tr>
                            <tr>
                                <td>-----------------------</td>
                                <td>:-----------------------</td>
                            </tr>
                            <tr>
                                <td><label for="cost"><b>Total Amount</b></label></td>
                                <td>:
                                    <?php echo $totalAmount ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <form method="post" action="courseAction.php" novalidate>
                                    <input type="hidden" name="course_id" value="<?php echo $row['id']; ?>">
                                    <input id="add-course" type="submit" name="submit" value="add to my course">
                                </form>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </div>

    <?php
}
echo "</div>";
include("../Footer/footer2.php");

?>