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
    <link rel="stylesheet" href="../styles.css">
    <script src="updateValidate.js" ></script>
</head>

<body>
    <header>
        <?php include('../Header/header2.php') ?>
    </header>
    <main>
    <form 
         class="registration"
         method="post" 
         action="updateAction.php" 
         enctype="multipart/form-data"
        onsubmit="return validateUpdateForm(this) "
        novalidate>
        <?php $userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';
            $sql = "SELECT * FROM registration WHERE email='$userEmail'";
            $select = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($select); ?>
            <h1 class="regAndUpdateTitle">Update All Information</h1>
            <div class="up-info-container">
                <div class="general-information">
                    <h3 class="general-title">General Information</h3>
                    <table>
                        <tr>
                            <td><label ><b>First Name</b> </label></td>
                            <td>: <input type="text" name="firstname" id="firstname"
                            value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : $row['firstname'] ?>">
                                    <span id="firstnameErr"></span>
                                <?php echo isset($_SESSION['fnameErr']) ? $_SESSION['fnameErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label ><b>Last Name</b> </label></td>
                            <td>: <input type="text" name="lastname" id="lastname"
                            value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : $row['lastname'] ?>">
                                    <span id="lastnameErr"></span>
                                <?php echo isset($_SESSION['lnameErr']) ? $_SESSION['lnameErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label ><b>Father's Name</b> </label> </td>
                            <td>: <input type="text" name="fathername" id="fathername"
                            value="<?php echo isset($_SESSION['fathername']) ? $_SESSION['fathername'] : $row['fathername'] ?>">
                                    <span id="fathernameErr"></span>
                                <?php echo isset($_SESSION['fonameErr']) ? $_SESSION['fonameErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label ><b>Mother's Name <b></label> </td>
                            <td>: <input type="text" name="mothername" id="mothername"
                            value="<?php echo isset($_SESSION['mothername']) ? $_SESSION['mothername'] : $row['mothername'] ?>">
                                    <span id="mothernameErr"></span>
                                <?php echo isset($_SESSION['mnameErr']) ? $_SESSION['mnameErr'] : "" ?>
                            </td>
                        </tr>

                        <tr>
                            <td><label > Date Of Birth </label> </td>
                            <td>: <input type="date" name="d_birth" id="d_birth"
                            value="<?php echo isset($_SESSION['d_birth']) ? $_SESSION['d_birth'] : $row['dob'] ?>">
                                    <span id="d_birthErr"></span>
                                <?php echo isset($_SESSION['d_birthErr']) ? $_SESSION['d_birthErr'] : "" ?>
                            </td>
                        </tr>

                        <tr>
                            <td><label >Gender:</label></td>
                            <td>:
                                <input type="radio" id="male" name="gender" value="male"
                                value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : $row['gender'] ?>">
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="female"
                                value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : $row['gender'] ?>">
                                <label for="female">Female</label>
                                <input type="radio" id="other" name="gender" value="other"
                                value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : $row['gender'] ?>">
                                <label for="other">Other</label>
                                <span id="genderErr"></span>
                                <?php echo isset($_SESSION['genderErr']) ? $_SESSION['genderErr'] : "" ?>
                            </td>

                        </tr>
                        <tr>
                            <td><label >Blood <br> Group </label></td>
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
                                <span id="bloodgroupErr"></span>

                                <?php echo isset($_SESSION['groupErr']) ? $_SESSION['groupErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Religion</label></td>
                            <td>:
                                <select name="religion" id="religion"
                                    value="<?php echo isset($_SESSION['religion']) ? $_SESSION['religion'] : "" ?>">
                                    <option value="" selected>Select Religion</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Buddhist">Buddhist</option>
                                </select>
                                <span id="religionErr"></span>
                                <?php echo isset($_SESSION['religionErr']) ? $_SESSION['religionErr'] : "" ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="contact-info" class="general-information">

                    <h3 class="general-title">Contact Information</h3>
                    <table>
                        <tr>
                            <td><label >Email:</label></td>
                            <td>: <input type="text" name="email" id="Email"
                            value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : $row['email'] ?>">
                                    <span id="emailErr"></span>
                                <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Phone/Mobile:</label></td>
                            <td>: <input type="text" name="Phone" id="Phone"
                            value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : $row['phone'] ?>">
                                    <span id="phoneErr"></span>
                                <?php echo isset($_SESSION['phoneErr']) ? $_SESSION['phoneErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label >Address:</label>
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
                                                        value="<?php echo isset($_SESSION['country']) ? $_SESSION['country'] : "" ?>">

                                                        <option value="" selected>Select Country</option>
                                                        <option value="USA">USA</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="UK">UK</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                    </select>
                                                    <span id="countryErr"></span>
                                                    <?php echo isset($_SESSION['countryErr']) ? $_SESSION['countryErr'] : "" ?>
                                                    <select name="Division" id="Division"
                                                        value="<?php echo isset($_SESSION['division']) ? $_SESSION['division'] : "" ?>">
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
                                                    <span id="divisionErr"></span>
                                                    <?php echo isset($_SESSION['divisionErr']) ? $_SESSION['divisionErr'] : "" ?>
                                                </p>
                                                </p>
                                                <p>
                                                    <textarea name="rsc" id="rsc" placeholder="Road/Street/City"
                                                        rows="6" cols="30"
                                                        value="<?php echo isset($_SESSION['rsc']) ? $_SESSION['rsc'] : "" ?>"></textarea>
                                                        <span id="rscErr"></span>
                                                    <?php echo isset($_SESSION['rscErr']) ? $_SESSION['rscErr'] : "" ?>
                                                </p>
                                                </p>
                                                <p>
                                                    <input type="text" name="postcode" id="postcode"
                                                        placeholder="Post Code"
                                                        value="<?php echo isset($_SESSION['postcode']) ? $_SESSION['postcode'] : "" ?>">
                                                        <span id="postcodeErr"></span>
                                                    <?php echo isset($_SESSION['postcodeErr']) ? $_SESSION['postcodeErr'] : "" ?>
                                                </p>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                 </p>
                            </td>
                        </tr>
                    </table>
                    </fieldset>
                </div>
            </div>
            <div id="academic-info" class="general-information">
                <h3 class="general-title">Academic information</h3>
                <table>
               
                    <tr>
                        <div>
                            <h4>SSC Information</h4>
                    <tr>
                        <td><label >SSC</label></td>
                        <td>: <input type="text" placeholder="enter ssc passing year" name="ssc" id="ssc"
                        value="<?php echo isset($_SESSION['ssc']) ? $_SESSION['ssc'] :  $row['ssc'] ?>">
                                <span id="sscErr"></span>
                            <?php echo isset($_SESSION['sscErr']) ? $_SESSION['sscErr'] : "" ?>
                        </td>
                        <td>
                            <select name="sscDepartment" id="sscDepartment"
                                value="<?php echo isset($_SESSION['sscDepartment']) ? $_SESSION['sscDepartment'] : "" ?>">
                                <option value="" selected>Select department</option>
                                <option value="Science">Science</option>
                                <option value="Arts">Arts</option>
                                <option value="Commerce">Commerce</option>
                            </select>
                            <span id="sscDepartmentErr"></span>
                            <?php echo isset($_SESSION['departmentErr']) ? $_SESSION['departmentErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Institution </label></td>
                        <td>: <input type="text" placeholder="enter your institution name" name="sscInstitution"
                                id="sscInstitution"
                                value="<?php echo isset($_SESSION['sscInstitution']) ? $_SESSION['sscInstitution'] :  $row['sscInstitution'] ?>">
                                <span id="sscInstitutionErr"></span>
                            <?php echo isset($_SESSION['institutionErr']) ? $_SESSION['institutionErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>CGPA </label></td>
                        <td>: <input type="text" placeholder="0.00" name="sscCgpa" id="sscCgpa"
                        value="<?php echo isset($_SESSION['sscCgpa']) ? $_SESSION['sscCgpa'] :  $row['sscCgpa'] ?>">
                                <span id="sscCgpaErr"></span>
                            <?php echo isset($_SESSION['cgpaErr']) ? $_SESSION['cgpaErr'] : "" ?>
                        </td>
                        <td>
                            <select name="sscBoard" id="sscBoard"
                                value="<?php echo isset($_SESSION['sscBoard']) ? $_SESSION['sscBoard'] : "" ?>">
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
                            <span id="sscBoardErr"></span>
                            <?php echo isset($_SESSION['sscBoardErr']) ? $_SESSION['sscBoardErr'] : "" ?>
                        </td>
                    </tr>
            </div>
            <div>
                <td>
                    <h4>HSC Information</h4>
                    <tr>
                        <td><label >HSC</label></td>
                        <td>: <input type="text" placeholder="enter hsc passing year" name="hsc" id="hsc"
                        value="<?php echo isset($_SESSION['hsc']) ? $_SESSION['hsc'] : $row['hsc'] ?>">
                                <span id="hscErr"></span>
                            <?php echo isset($_SESSION['hscErr']) ? $_SESSION['hscErr'] : "" ?>
                        </td>
                        <td>
                            <select name="hscDepartment" id="hscDepartment"
                                value="<?php echo isset($_SESSION['hscDepartment']) ? $_SESSION['hscDepartment'] : "" ?>">
                                <option value="" selected>Select department</option>
                                <option value="Science">Science</option>
                                <option value="Arts">Arts</option>
                                <option value="Commerce">Commerce</option>
                            </select>
                            <span id="hscDepartmentErr"></span>
                            <?php echo isset($_SESSION['departmentErr']) ? $_SESSION['departmentErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label >Institution </label></td>
                        <td>: <input type="text" placeholder="enter your institution name" name="hscInstitution"
                                id="hscInstitution"
                                value="<?php echo isset($_SESSION['hscInstitution']) ? $_SESSION['hscInstitution'] : $row['hscInstitution'] ?>">
                                <span id="hscInstitutionErr"></span>
                            <?php echo isset($_SESSION['institutionErr']) ? $_SESSION['institutionErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label >CGPA </label></td>
                        <td>: <input type="text" placeholder="0.00" name="hscCgpa" id="hscCgpa"
                        value="<?php echo isset($_SESSION['hscCgpa']) ? $_SESSION['hscCgpa'] :  $row['hscCgpa'] ?>">
                                <span id="hscCgpaErr"></span>
                            <?php echo isset($_SESSION['cgpaErr']) ? $_SESSION['cgpaErr'] : "" ?>
                        </td>
                        <td>
                            <select name="hscBoard" id="hscBoard"
                                value="<?php echo isset($_SESSION['hscBoard']) ? $_SESSION['hscBoard'] : "" ?>">
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
                            <span id="hscBoardErr"></span>
                            <?php echo isset($_SESSION['hscBoardErr']) ? $_SESSION['hscBoardErr'] : "" ?>
                        </td>
                    </tr>
                </td>
            </div>
            </div>
            </tr>
            </table>
            <div id="acc-info" class="general-information">
                <h3 class="general-title">Account information</h3>
                <table>
                    <tr>
                        <td><label >Username </label></td>
                        <td>: <input type="text" name="username" id="Username"
                        value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] :  $row['username'] ?>">
                                <span id="usernameErr"></span>
                            <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label >Password </label></td>
                        <td>: <input type="password" name="password" id="password"
                        value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] :  $row['password'] ?>">
                                <span id="passwordErr"></span>
                            <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Confirm Password </label></td>
                        <td>: <input type="password" name="confirm_password" id="confirm_password"
                        value="<?php echo isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : $row['password']?>">
                                <span id="confirm_passwordErr"></span>
                            <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                        </td>
                       
                    </tr>
                </table>
                <div>
                    <div class="submit">
                    <input class="btn-registration" type="submit" name="registration" value="Update">
                    </div>
                </div>
                </table>
            </div>
        </form>
    </main>
    <footer>
        <?php include("../Footer/footer2.php") ?>
    </footer>
</body>

</html>