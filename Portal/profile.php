<?php
session_start();

if (!isset($_SESSION['authenticate']) || $_SESSION['authenticate'] !== true) {
    header("Location: ../Login/login.php");
	exit();
}

include("../Header/header2.php");
$servername = "localhost";
$user = "root";
$password = "";
$db = "registration";

// Create connection
$conn = new mysqli($servername, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION["firstname"]) || isset($_SESSION["lastname"])) {
    echo "<h2>Welcome,$_SESSION[firstname] $_SESSION[lastname]</h2>";
}

$userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';

$select = "SELECT * FROM registration WHERE email=?";
$stmt = $conn->prepare($select);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();
echo "<link rel='stylesheet' href='../styles.css'>
<div class='profile-container'>
";
while ($row = $result->fetch_assoc()) { ?>
    
    <!-- #region -->
   
    <div class="profile-content" >
    <div class="profile-part-a">
    <table>
        <tr>
            <td>
                <a href="../Update/update.php?idNo=<?php echo $row['id']; ?>">Edit Profile</a>
            </td>
        </tr>
        <tr>
            <td>
                <div class="modal-items">
                    <button id='contact-modal-btn'>Contact Information</button>
                    <div id='modal-3' class='modal'>
                        <div class='modal-content'>
                            <span class='close' id='closeModalBtn-3'>&times;</span>
                            <p>
                                <legend class="legend">Contact Information:</legend>
                            <table>
                                <tr>
                                    <td><label for="Email"><b>Email</b></label></td>
                                    <td>:
                                        <?php echo $row['email']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="Phone/Mobile"><b>Phone/Mobile</b></label></td>
                                    <td>:
                                        <?php echo $row['phone']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Present Address:</strong>
                                    </td>
                                    <td>:
                                        <?php echo $row['country'] . ', ' . $row['division'] ?>
                                    </td>
                                </tr>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="modal-items">
                    <button id='acc-modal-btn'>Account Information</button>
                    <div id='modal' class='modal'>
                        <div class='modal-content'>

                            <p>
                                <legend class="legend">Account Information:</legend>
                            <table>
                                <tr>
                                    <td><label for="userId">User Id</label></td>
                                    <td>:
                                        <?php echo $row['id']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="username"><b>Username</b></label></td>
                                    <td>:
                                        <?php echo $row['username']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <button class='close' id='closeModalBtn'>&times;</button>
                                </tr>
                                <a href="../Login/changePass.php">Change Password</a>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="modal-items">
                    <button id='academic-modal-btn'>Academic Information</button>
                    <div id='modal-2' class='modal'>
                        <div class='modal-content'>
                            <p>
                                <legend class="legend">Academic Information:</legend>
                            <table>
                                <tr>
                                    <td>
                                        <h4>SSC Information</h4>
                                <tr>
                                    <td><label for="ssc">SSC Passing Year</label></td>
                                    <td>:
                                        <?php echo $row['ssc']; ?>

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label for="sscDepartment">Department</label>
                                    </td>
                                    <td>
                                        :
                                        <?php echo $row['sscDepartment'] ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="sscInstitution">Institution </label></td>
                                    <td>:
                                        <?php echo $row['sscInstitution'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="cgpa">CGPA </label></td>
                                    <td>:
                                        <?php echo $row['sscCgpa'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="sscBoard">Board</label>
                                    </td>
                                    <td>:
                                        <?php echo $row['sscBoard'] ?>
                                    </td>
                                </tr>

            </td>
            <td>
                <h4>HSC Information</h4>
        <tr>
            <td><label for="hsc">HSC Passing Year</label></td>
            <td>:
                <?php echo $row['hsc']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="hscDepartment">Department</label>
            </td>
            <td>
                :
                <?php echo $row['hscDepartment'] ?>
            </td>
        </tr>
        <tr>
            <td><label for="hscInstitution">Institution </label></td>
            <td>:
                <?php echo $row['hscInstitution'] ?>
            </td>
        </tr>
        <tr>
            <td><label for="cgpa">CGPA </label></td>
            <td>:
                <?php echo $row['hscCgpa'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="hscBoard">Board:</label>
            </td>
            <td>:
                <?php echo $row['hscBoard'] ?>
            </td>
        </tr>
        </td>
        <span class='close' id='closeModalBtn-2'>&times;</span>
        </tr>
    </table>
    </p>
    </div>
    </div>
    </div>
    </td>
    </tr>
    </table>
    </div>
    <div class="profile-part-b">
    <legend>General Information</legend>
            <table>
                <tr>
                    <img src="../images/<?php echo $row['image'] ?>" height="150px" width="200px" alt="">
                <tr><a href="../Update/updateImage.php">change photo</a></tr>
        </tr>
        <tr>
            <td><label><b>First Name</b></label></td>
            <td>:
                <?php echo $row['firstname']; ?>
            </td>
        </tr>
        <tr>
            <td><label for="lastname"><b>Last Name</b></label></td>
            <td>:
                <?php echo $row['lastname']; ?>
            </td>
        </tr>
        <tr>
            <td><label for="fathername"><b>Father's Name</b></label></td>
            <td>:
                <?php echo $row['fathername']; ?>
            </td>
        </tr>
        <tr>
            <td><label for="mothername"><b>Mother's Name</b></label></td>
            <td>:
                <?php echo $row['mothername']; ?>
            </td>
        </tr>
        <tr>
            <td><label for="d_birth"><b>Date Of Birth</b></label></td>
            <td>:
                <?php echo $row['dob']; ?>
            </td>
        </tr>
        <tr>
            <td><label for="gender"><b>Gender</b></label></td>
            <td>:
                <?php echo $row['gender']; ?>
            </td>
        </tr>
        <tr>
            <td><label for="bloodgroup"><b>Blood Group</b></label></td>
            <td>:
                <?php echo $row['bloodgroup']; ?>
            </td>
        </tr>
        <tr>
            <td><label for="religion"><b>Religion</b></label></td>
            <td>:
                <?php echo $row['religion']; ?>
            </td>
        </tr>
    </table>
    </div>
    </div>


<?php }

echo"</div>";
include("../Footer/footer2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <script src="portal.js"></script>
</body>

</html>