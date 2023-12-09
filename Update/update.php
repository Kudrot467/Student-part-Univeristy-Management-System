<?php
session_start();
if (!isset($_SESSION['email'])) {
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <header>
        <?php include('../Header/header2.php') ?>
    </header>
    <main>
        <form method="post" action="updateAction.php" enctype="multipart/form-data" novalidate>
            <?php $userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';
            $sql = "SELECT * FROM registration WHERE email='$userEmail'";
            $select = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($select); ?>
            <table>
                <tr>
                    <td>
                        <fieldset>
                            <legend>General Information:</legend>
                            <table>
                                <tr>
                                    <td><label for="firstname"><b>First Name</b> </label></td>
                                    <td>: <input type="text" name="firstname" id="firstname"
                                            value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : $row['firstname'] ?>">
                                        <?php echo isset($_SESSION['fnameErr']) ? $_SESSION['fnameErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="lastname"><b>Last Name</b> </label></td>
                                    <td>: <input type="text" name="lastname" id="lastname"
                                            value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : $row['lastname'] ?>">
                                        <?php echo isset($_SESSION['lnameErr']) ? $_SESSION['lnameErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="fathername"><b>Father's Name</b> </label> </td>
                                    <td>: <input type="text" name="fathername" id="fathername"
                                            value="<?php echo isset($_SESSION['fathername']) ? $_SESSION['fathername'] : $row['fathername'] ?>">
                                        <?php echo isset($_SESSION['fonameErr']) ? $_SESSION['fonameErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="mothername"><b>Mother's Name <b></label> </td>
                                    <td>: <input type="text" name="mothername" id="mothername"
                                            value="<?php echo isset($_SESSION['mothername']) ? $_SESSION['mothername'] : $row['mothername'] ?>">
                                        <?php echo isset($_SESSION['mnameErr']) ? $_SESSION['mnameErr'] : "" ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="d_birth"> Date Of Birth </label> </td>
                                    <td>: <input type="date" name="d_birth" id="d_birth"
                                            value="<?php echo isset($_SESSION['d_birth']) ? $_SESSION['d_birth'] : $row['dob'] ?>">
                                        <?php echo isset($_SESSION['d_birthErr']) ? $_SESSION['d_birthErr'] : "" ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="gender">Gender</label></td>
                                    <td>:
                                        <input type="radio" id="male" name="gender" value="male"
                                            value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : $row['gender'] ?>">
                                        <label for="male">Male</label>
                                        <input type="radio" id="female" name="gender" value="female"
                                            value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : "" ?>">
                                        <label for="female">Female</label>
                                        <input type="radio" id="other" name="gender" value="other"
                                            value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : $row['gender'] ?>">
                                        <label for="other">Other</label>
                                        <?php echo isset($_SESSION['genderErr']) ? $_SESSION['genderErr'] : "" ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td><label for="bloodgroup">Blood Group </label></td>
                                    <td>:
                                        <select name="bloodgroup" id="bloodgroup"
                                            value="<?php echo isset($_SESSION['bloodgroup']) ? $_SESSION['bloodgroup'] : $row['bloodgroup'] ?>">
                                            <option value="" selected>Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        <?php echo isset($_SESSION['groupErr']) ? $_SESSION['groupErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="religion">Religion</label></td>
                                    <td>:
                                        <select name="religion" id="religion"
                                            value="<?php echo isset($_SESSION['religion']) ? $_SESSION['religion'] : $row['religion'] ?>">
                                            <option value="" selected>Select Religion</option>
                                            <option value="Muslim">Muslim</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Buddhist">Buddhist</option>
                                        </select>
                                        <?php echo isset($_SESSION['religionErr']) ? $_SESSION['religionErr'] : "" ?>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>Contact Information:</legend>
                            <table>
                                <tr>
                                    <td><label for="Email">Email:</label></td>
                                    <td>: <input type="text" name="email" id="Email"
                                            value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : $row['email'] ?>">
                                        <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="Phone/Mobile">Phone/Mobile:</label></td>
                                    <td>: <input type="text" name="Phone/Mobile" id="Phone/Mobile"
                                            value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : $row['phone'] ?>">
                                        <?php echo isset($_SESSION['phoneErr']) ? $_SESSION['phoneErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Address:</label>
                                    </td>
                                    <td>
                                        <p>
                                        <fieldset>
                                            <legend>Present Address</legend>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <select name="country" id="country"
                                                             >

                                                                <option value="<?php echo isset($_SESSION['country']) ? $_SESSION['country'] : $row['country'] ?>" selected>Select Country</option>
                                                                <option value="USA"<?php echo (isset($_SESSION['country']) && $_SESSION['country'] === 'USA') ? 'selected' : '' ?>>USA</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="UK">UK</option>
                                                                <option value="Bangladesh">Bangladesh</option>
                                                            </select>
                                                            <?php echo isset($_SESSION['countryErr']) ? $_SESSION['countryErr'] : "" ?>
                                                            <select name="Division" id="Division"
                                                                value="<?php echo isset($_SESSION['division']) ? $_SESSION['division'] :  $row['division'] ?>">
                                                                <option value="" selected>Select Division</option>
                                                                <option value="Dhaka">Dhaka</option>
                                                                <option value="Rajshahi">Rajshahi</option>
                                                                <option value="Dinajpur">Dinajpur</option>
                                                                <option value="Sylhet">Sylhet</option>
                                                                <option value="Chottogram">Chottogram</option>
                                                                <option value="Khulna">Khulna</option>
                                                                <option value="Rangpur">Rangpur</option>
                                                                <option value="Barsal">Barisal</option>
                                                            </select>
                                                            <?php echo isset($_SESSION['divisionErr']) ? $_SESSION['divisionErr'] : "" ?>
                                                        </p>
                                                        </p>
                                                        <p>
                                                            <textarea name="rsc" id="rsc" placeholder="Road/Street/City"
                                                                rows="6" cols="30"
                                                                value="<?php echo isset($_SESSION['rsc']) ? $_SESSION['rsc'] :  "" ?>"></textarea>
                                                            <?php echo isset($_SESSION['rscErr']) ? $_SESSION['rscErr'] : "" ?>
                                                        </p>
                                                        </p>
                                                        <p>
                                                            <input type="text" name="postcode" id="postcode"
                                                                placeholder="Post Code"
                                                                value="<?php echo isset($_SESSION['postcode']) ? $_SESSION['postcode'] :  ""?>">
                                                            <?php echo isset($_SESSION['postcodeErr']) ? $_SESSION['postcodeErr'] : "" ?>
                                                        </p>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        </p>
                                    </td>
                                </tr>                              
                            </table>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>Account information:</legend>
                            <table>
                                <tr>
                                    <td><label for="username">Username </label></td>
                                    <td>: <input type="text" name="username" id="Username" disabled
                                            value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] :  $row['username'] ?>">
                                        <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="password">Password </label></td>
                                    <td>: <input type="password" name="password" id="password"
                                            value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] :  $row['password'] ?>">
                                        <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="confirm_password">Confirm Password </label></td>
                                    <td>: <input type="password" name="confirm_password" id="confirm_password"
                                            value="<?php echo isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : $row['password']?>">
                                        <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <table>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="registration" value="Update Profile">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <td><a href="../Portal/profile.php">Go to Profile</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <fieldset>
                            <legend>Academic information:</legend>
                            <table>
                                <tr>
                                    <td>
                                        <h4>SSC Information</h4>
                                <tr>
                                    <td><label for="ssc">SSC</label></td>
                                    <td>: <input type="text" placeholder="enter ssc passing year" name="ssc" id="ssc"
                                            value="<?php echo isset($_SESSION['ssc']) ? $_SESSION['ssc'] :  $row['ssc'] ?>">
                                        <?php echo isset($_SESSION['sscErr']) ? $_SESSION['sscErr'] : "" ?>
                                    </td>
                                    <td>
                                        <select name="sscDepartment" id=""
                                            value="<?php echo isset($_SESSION['sscDepartment']) ? $_SESSION['sscDepartment'] :  $row['sscDepartment'] ?>">
                                            <option value="" selected>Select department</option>
                                            <option value="Science">Science</option>
                                            <option value="Arts">Arts</option>
                                            <option value="Commerce">Commerce</option>
                                        </select>
                                        <?php echo isset($_SESSION['departmentErr']) ? $_SESSION['departmentErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="sscInstitution">Institution </label></td>
                                    <td>: <input type="institution" placeholder="enter your institution name"
                                            name="sscInstitution" id="institution"
                                            value="<?php echo isset($_SESSION['sscInstitution']) ? $_SESSION['sscInstitution'] :  $row['sscInstitution'] ?>">
                                        <?php echo isset($_SESSION['institutionErr']) ? $_SESSION['institutionErr'] : "" ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="cgpa">CGPA </label></td>
                                    <td>: <input type="text" placeholder="0.00" name="sscCgpa" id="cgpa"
                                            value="<?php echo isset($_SESSION['sscCgpa']) ? $_SESSION['sscCgpa'] :  $row['sscCgpa'] ?>">
                                        <?php echo isset($_SESSION['cgpaErr']) ? $_SESSION['cgpaErr'] : "" ?>
                                    </td>
                                    <td>
                                        <select name="sscBoard" id="Division"
                                            value="<?php echo isset($_SESSION['sscBoard']) ? $_SESSION['sscBoard'] :  $row['sscBoard'] ?>">
                                            <option value="" selected>Select Board</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Dinajpur">Dinajpur</option>
                                            <option value="Sylhet">Sylhet</option>
                                            <option value="Chottogram">Chottogram</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Barsal">Barisal</option>
                                        </select>
                                        <?php echo isset($_SESSION['sscBoardErr']) ? $_SESSION['sscBoardErr'] : "" ?>
                                    </td>
                                </tr>
                    </td>
                    <td>
                        <h4>HSC Information</h4>
                <tr>
                    <td><label for="hsc">HSC</label></td>
                    <td>: <input type="text" placeholder="enter hsc passing year" name="hsc" id="hsc"
                            value="<?php echo isset($_SESSION['hsc']) ? $_SESSION['hsc'] : $row['hsc'] ?>">
                        <?php echo isset($_SESSION['hscErr']) ? $_SESSION['hscErr'] : "" ?>
                    </td>
                    <td>
                        <select name="hscDepartment" id=""
                            value="<?php echo isset($_SESSION['hscDepartment']) ? $_SESSION['hscDepartment'] :  $row['hscDepartment'] ?>">
                            <option value="" selected>Select department</option>
                            <option value="Science">Science</option>
                            <option value="Arts">Arts</option>
                            <option value="Commerce">Commerce</option>
                        </select>
                        <?php echo isset($_SESSION['departmentErr']) ? $_SESSION['departmentErr'] : "" ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="institution">Institution </label></td>
                    <td>: <input type="institution" placeholder="enter your institution name" name="hscInstitution"
                            id="institution"
                            value="<?php echo isset($_SESSION['hscInstitution']) ? $_SESSION['hscInstitution'] : $row['hscInstitution'] ?>">
                        <?php echo isset($_SESSION['institutionErr']) ? $_SESSION['institutionErr'] : "" ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="cgpa">CGPA </label></td>
                    <td>: <input type="text" placeholder="0.00" name="hscCgpa" id="cgpa"
                            value="<?php echo isset($_SESSION['hscCgpa']) ? $_SESSION['hscCgpa'] :  $row['hscCgpa'] ?>">
                        <?php echo isset($_SESSION['cgpaErr']) ? $_SESSION['cgpaErr'] : "" ?>
                    </td>
                    <td>
                        <select name="hscBoard" id="Division"
                            value="<?php echo isset($_SESSION['hscBoard']) ? $_SESSION['hscBoard'] :  $row[''] ?>">
                            <option value="" selected>Select Board</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Chottogram">Chottogram</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Barisal">Barisal</option>
                        </select>
                        <?php echo isset($_SESSION['hscBoardErr']) ? $_SESSION['hscBoardErr'] : "" ?>
                    </td>
                </tr>
                </td>
                </tr>
            </table>
            </fieldset>
            </td>
            </tr>
            </table>
        </form>
    </main>
    <footer>
        <?php include("../Footer/footer.php") ?>
    </footer>
</body>

</html>