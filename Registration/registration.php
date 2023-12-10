<?php
session_start();
// Set $_SESSION variables based on cookies
$_SESSION['firstname'] = isset($_COOKIE["draft_firstname"]) ? $_COOKIE["draft_firstname"] : "";
$_SESSION['lastname'] = isset($_COOKIE["draft_lastname"]) ? $_COOKIE["draft_lastname"] : "";
$_SESSION['fathername'] = isset($_COOKIE["draft_fathername"]) ? $_COOKIE["draft_fathername"] : "";
$_SESSION['mothername'] = isset($_COOKIE["draft_mothername"]) ? $_COOKIE["draft_mothername"] : "";
$_SESSION['d_birth'] = isset($_COOKIE["draft_d_birth"]) ? $_COOKIE["draft_d_birth"] : "";
$_SESSION['gender'] = isset($_COOKIE["draft_gender"]) ? $_COOKIE["draft_gender"] : "";
$_SESSION['bloodgroup'] = isset($_COOKIE["draft_bloodgroup"]) ? $_COOKIE["draft_bloodgroup"] : "";
$_SESSION['religion'] = isset($_COOKIE["draft_religion"]) ? $_COOKIE["draft_religion"] : "";
$_SESSION['email'] = isset($_COOKIE["draft_email"]) ? $_COOKIE["draft_email"] : "";
$_SESSION['Phone'] = isset($_COOKIE["draft_Phone"]) ? $_COOKIE["draft_Phone"] : "";
$_SESSION['country'] = isset($_COOKIE["draft_country"]) ? $_COOKIE["draft_country"] : "";
$_SESSION['division'] = isset($_COOKIE["draft_division"]) ? $_COOKIE["draft_division"] : "";
$_SESSION['rsc'] = isset($_COOKIE["draft_rsc"]) ? $_COOKIE["draft_rsc"] : "";
$_SESSION['postcode'] = isset($_COOKIE["draft_postcode"]) ? $_COOKIE["draft_postcode"] : "";
$_SESSION['ssc'] = isset($_COOKIE["draft_ssc"]) ? $_COOKIE["draft_ssc"] : "";
$_SESSION['sscInstitution'] = isset($_COOKIE["draft_sscInstitution"]) ? $_COOKIE["draft_sscInstitution"] : "";
$_SESSION['sscCgpa'] = isset($_COOKIE["draft_sscCgpa"]) ? $_COOKIE["draft_sscCgpa"] : "";
$_SESSION['sscBoard'] = isset($_COOKIE["draft_sscBoard"]) ? $_COOKIE["draft_sscBoard"] : "";
$_SESSION['sscDepartment'] = isset($_COOKIE["draft_sscDepartment"]) ? $_COOKIE["draft_sscDepartment"] : "";
$_SESSION['hsc'] = isset($_COOKIE["draft_hsc"]) ? $_COOKIE["draft_hsc"] : "";
$_SESSION['hscInstitution'] = isset($_COOKIE["draft_hscInstitution"]) ? $_COOKIE["draft_hscInstitution"] : "";
$_SESSION['hscCgpa'] = isset($_COOKIE["draft_hscCgpa"]) ? $_COOKIE["draft_hscCgpa"] : "";
$_SESSION['hscBoard'] = isset($_COOKIE["draft_hscBoard"]) ? $_COOKIE["draft_hscBoard"] : "";
$_SESSION['hscDepartment'] = isset($_COOKIE["draft_hscDepartment"]) ? $_COOKIE["draft_hscDepartment"] : "";
$_SESSION['username'] = isset($_COOKIE["draft_username"]) ? $_COOKIE["draft_username"] : "";
$_SESSION['password'] = "";
$_SESSION['confirm_password'] = "";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="./styles.css">
    <script src="registrationValidate.js"></script>
</head>

<body>
    <header>
        <?php include('../Header/header2.php') ?>
    </header>
    <main>
        <form 
         class="registration"
         method="post" 
         action="registrationAction.php" 
         enctype="multipart/form-data"
         onsubmit="return validateRegistrationForm(this)" 
        novalidate>
            <h1>Registration</h1>
            <?php
            if (isset($_SESSION['me'])) {
                echo "<h3>Last Modification Time: " . date('Y-m-d H:i:s', time()) . "</h3>";
                echo "<p>" . $_SESSION['me'] . "</p>";
            }
            ?>
            <div class="upload">
                <h4 class="general-title">Please upload your image</h4>
                <input type="file" name="image">
            </div>
            <div class="up-info-container">
                <div class="general-information">
                    <h3 class="general-title">General Information</h3>
                    <table>
                        <tr>
                            <td><label for="firstname"><b>First Name</b> </label></td>
                            <td>: <input type="text" name="firstname" id="firstname"
                                    value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "" ?>">
                                    <span id="firstnameErr"></span>
                                <?php echo isset($_SESSION['fnameErr']) ? $_SESSION['fnameErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lastname"><b>Last Name</b> </label></td>
                            <td>: <input type="text" name="lastname" id="lastname"
                                    value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "" ?>">
                                    <span id="lastnameErr"></span>
                                <?php echo isset($_SESSION['lnameErr']) ? $_SESSION['lnameErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="fathername"><b>Father's Name</b> </label> </td>
                            <td>: <input type="text" name="fathername" id="fathername"
                                    value="<?php echo isset($_SESSION['fathername']) ? $_SESSION['fathername'] : "" ?>">
                                    <span id="fathernameErr"></span>
                                <?php echo isset($_SESSION['fonameErr']) ? $_SESSION['fonameErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="mothername"><b>Mother's Name <b></label> </td>
                            <td>: <input type="text" name="mothername" id="mothername"
                                    value="<?php echo isset($_SESSION['mothername']) ? $_SESSION['mothername'] : "" ?>">
                                    <span id="mothernameErr"></span>
                                <?php echo isset($_SESSION['mnameErr']) ? $_SESSION['mnameErr'] : "" ?>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="d_birth"> Date Of Birth </label> </td>
                            <td>: <input type="date" name="d_birth" id="d_birth"
                                    value="<?php echo isset($_SESSION['d_birth']) ? $_SESSION['d_birth'] : "" ?>">
                                    <span id="d_birthErr"></span>
                                <?php echo isset($_SESSION['d_birthErr']) ? $_SESSION['d_birthErr'] : "" ?>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="gender">Gender:</label></td>
                            <td>:
                                <input type="radio" id="male" name="gender" value="male"
                                    value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : "" ?>">
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="female"
                                    value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : "" ?>">
                                <label for="female">Female</label>
                                <input type="radio" id="other" name="gender" value="other"
                                    value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : "" ?>">
                                <label for="other">Other</label>
                                <span id="genderErr"></span>
                                <?php echo isset($_SESSION['genderErr']) ? $_SESSION['genderErr'] : "" ?>
                            </td>

                        </tr>
                        <tr>
                            <td><label for="bloodgroup">Blood <br> Group </label></td>
                            <td>:
                                <select name="bloodgroup" id="bloodgroup"
                                    value="<?php echo isset($_SESSION['bloodgroup']) ? $_SESSION['bloodgroup'] : "" ?>">
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
                            <td><label for="religion">Religion</label></td>
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
                            <td><label for="Email">Email:</label></td>
                            <td>: <input type="text" name="email" id="Email"
                                    value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                                    <span id="emailErr"></span>
                                <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Phone/Mobile">Phone/Mobile:</label></td>
                            <td>: <input type="text" name="Phone/Mobile" id="Phone/Mobile"
                                    value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : "" ?>">
                                    <span id="phoneErr"></span>
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
                        <td><label for="ssc">SSC</label></td>
                        <td>: <input type="text" placeholder="enter ssc passing year" name="ssc" id="ssc"
                                value="<?php echo isset($_SESSION['ssc']) ? $_SESSION['ssc'] : "" ?>">
                                <span id="sscErr"></span>
                            <?php echo isset($_SESSION['sscErr']) ? $_SESSION['sscErr'] : "" ?>
                        </td>
                        <td>
                            <select name="sscDepartment" id=""
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
                        <td><label for="sscInstitution">Institution </label></td>
                        <td>: <input type="institution" placeholder="enter your institution name" name="sscInstitution"
                                id="institution"
                                value="<?php echo isset($_SESSION['sscInstitution']) ? $_SESSION['sscInstitution'] : "" ?>">
                                <span id="sscInstitutionErr"></span>
                            <?php echo isset($_SESSION['institutionErr']) ? $_SESSION['institutionErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="cgpa">CGPA </label></td>
                        <td>: <input type="text" placeholder="0.00" name="sscCgpa" id="cgpa"
                                value="<?php echo isset($_SESSION['sscCgpa']) ? $_SESSION['sscCgpa'] : "" ?>">
                                <span id="sscCgpaErr"></span>
                            <?php echo isset($_SESSION['cgpaErr']) ? $_SESSION['cgpaErr'] : "" ?>
                        </td>
                        <td>
                            <select name="sscBoard" id="Division"
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
                        <td><label for="hsc">HSC</label></td>
                        <td>: <input type="text" placeholder="enter hsc passing year" name="hsc" id="hsc"
                                value="<?php echo isset($_SESSION['hsc']) ? $_SESSION['hsc'] : "" ?>">
                                <span id="hscErr"></span>
                            <?php echo isset($_SESSION['hscErr']) ? $_SESSION['hscErr'] : "" ?>
                        </td>
                        <td>
                            <select name="hscDepartment" id=""
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
                        <td><label for="institution">Institution </label></td>
                        <td>: <input type="institution" placeholder="enter your institution name" name="hscInstitution"
                                id="institution"
                                value="<?php echo isset($_SESSION['hscInstitution']) ? $_SESSION['hscInstitution'] : "" ?>">
                                <span id="hscInstitutionErr"></span>
                            <?php echo isset($_SESSION['institutionErr']) ? $_SESSION['institutionErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="cgpa">CGPA </label></td>
                        <td>: <input type="text" placeholder="0.00" name="hscCgpa" id="cgpa"
                                value="<?php echo isset($_SESSION['hscCgpa']) ? $_SESSION['hscCgpa'] : "" ?>">
                                <span id="hscCgpaErr"></span>
                            <?php echo isset($_SESSION['cgpaErr']) ? $_SESSION['cgpaErr'] : "" ?>
                        </td>
                        <td>
                            <select name="hscBoard" id="Division"
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
                        <td><label for="username">Username </label></td>
                        <td>: <input type="text" name="username" id="Username"
                                value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>">
                                <span id="usernameErr"></span>
                            <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password">Password </label></td>
                        <td>: <input type="password" name="password" id="password"
                                value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : "" ?>">
                                <span id="passwordErr"></span>
                            <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="confirm_password">Confirm Password </label></td>
                        <td>: <input type="password" name="confirm_password" id="confirm_password"
                                value="<?php echo isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : "" ?>">
                                <span id="confirm_passwordErr"></span>
                            <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                        </td>
                       
                    </tr>
                </table>
                <div>
                    <div class="submit">
                    <input class="btn-registration" type="submit" name="registration" value="Registration">
                        <button class="btn-save-as-draft" type="submit" name="save_draft" value="1">Save as Draft</button>
                    </div>
                    <div class="navigate-login">
                        <p>Already have an account?</p>
                        <a href="../Login/login.php">login</a>
                    </div>
                </div>
                </table>
            </div>
        </form>
    </main>
    <footer>
        <?php include('../Footer/footer2.php') ?>
    </footer>

</body>

</html>