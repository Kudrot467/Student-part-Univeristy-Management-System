<?php
session_start();
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
echo "Connected successfully";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {


    if (isset($_POST['save_draft'])) {
        // Save draft data as cookies
        setcookie("draft_firstname", $_POST['firstname'], time() + 3600, "/");
        setcookie("draft_lastname", $_POST['lastname'], time() + 3600, "/");
        setcookie("draft_fathername", $_POST["fathername"], time() + 3600, "/");
        setcookie("draft_mothername", $_POST["mothername"], time() + 3600, "/");
        setcookie("draft_d_birth", $_POST["d_birth"], time() + 3600, "/");
        setcookie("draft_gender", $_POST['gender'], time() + 3600, "/");
        setcookie("draft_bloodgroup", $_POST['bloodgroup'], time() + 3600, "/");
        setcookie("draft_religion", $_POST['religion'], time() + 3600, "/");
        setcookie("draft_email", $_POST['email'], time() + 3600, "/");
        setcookie("draft_Phone", $_POST['Phone/Mobile'], time() + 3600, "/");
        setcookie("draft_country", $_POST['country'], time() + 3600, "/");
        setcookie("draft_division", $_POST['Division'], time() + 3600, "/");
        setcookie("draft_rsc", $_POST['rsc'], time() + 3600, "/");
        setcookie("draft_postcode", $_POST['postcode'], time() + 3600, "/");
        setcookie("draft_ssc", $_POST['ssc'], time() + 3600, "/");
        setcookie("draft_sscInstitution", $_POST['sscInstitution'], time() + 3600, "/");
        setcookie("draft_sscCgpa", $_POST['sscCgpa'], time() + 3600, "/");

        setcookie("draft_sscBoard", $_POST['sscBoard'], time() + 3600, "/");
        setcookie("draft_sscDepartment", $_POST['sscDepartment'], time() + 3600, "/");
        setcookie("draft_hsc", $_POST['hsc'], time() + 3600, "/");
        setcookie("draft_hscInstitution", $_POST['hscInstitution'], time() + 3600, "/");
        setcookie("draft_hscCgpa", $_POST['hscCgpa'], time() + 3600, "/");
        setcookie("draft_hscBoard", $_POST['hscBoard'], time() + 3600, "/");
        setcookie("draft_hscDepartment", $_POST['hscDepartment'], time() + 3600, "/");
        setcookie("draft_username", $_POST['username'], time() + 3600, "/");
        $_SESSION['me'] = "Your data's are saved. They will be deleted on " . date('Y-m-d H:i:s', time() + 3600);
    }


    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $fathername = test_input($_POST["fathername"]);
    $mothername = test_input($_POST["mothername"]);
    $d_birth = test_input($_POST["d_birth"]);
    $gender = test_input($_POST['gender']);
    $bloodgroup = test_input($_POST['bloodgroup']);
    $religion = test_input($_POST['religion']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['Phone/Mobile']);
    $country = test_input($_POST['country']);
    $division = test_input($_POST['Division']);
    $rsc = test_input($_POST['rsc']);
    $postcode = test_input($_POST['postcode']);
    $ssc = test_input($_POST['ssc']);
    $sscInstitution = test_input($_POST['sscInstitution']);
    $sscCgpa = test_input($_POST['sscCgpa']);
    $sscBoard = test_input($_POST['sscBoard']);
    $sscDepartment = test_input($_POST['sscDepartment']);
    $hsc = test_input($_POST['hsc']);
    $hscInstitution = test_input($_POST['hscInstitution']);
    $hscCgpa = test_input($_POST['hscCgpa']);
    $hscBoard = test_input($_POST['hscBoard']);
    $hscDepartment = test_input($_POST['hscDepartment']);
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $confirm_password = test_input($_POST['confirm_password']);
    $name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $flag = true;

    $upload = move_uploaded_file($tmp_name, "../images/" . $name);


    if (empty($firstname)) {
        $_SESSION['fnameErr'] = "First Name Empty";
        $flag = false;
    } else {
        $_SESSION['fnameErr'] = "";
        $_SESSION['firstname'] = $firstname;
    }

    if (empty($lastname)) {
        $_SESSION['lnameErr'] = "Last Name Empty";
        $flag = false;
    } else {
        $_SESSION['lnameErr'] = "";
        $_SESSION['lastname'] = $lastname;
    }
    if (empty($fathername)) {
        $_SESSION['fonameErr'] = "Father Name Empty";
        $flag = false;
    } else {
        $_SESSION['fonameErr'] = "";
        $_SESSION['fathername'] = $fathername;
    }
    if (empty($mothername)) {
        $_SESSION['mnameErr'] = "Mother Name Empty";
        $flag = false;
    } else {
        $_SESSION['mnameErr'] = "";
        $_SESSION['mothername'] = $mothername;
    }

    if (empty($d_birth)) {
        $_SESSION['d_brithErr'] = "give your dob";
        $flag = false;
    } else {
        $_SESSION["d_birthErr"] = "";
        $_SESSION["d_birth"] = $d_birth;
    }

    if (empty($gender)) {
        $_SESSION['genderErr'] = "gender is required";
        $flag = false;
    } else {
        $_SESSION['genderErr'] = "";
        $_SESSION['gender'] = $gender;

    }

    if (empty($bloodgroup)) {
        $_SESSION['groupErr'] = "Bloodgroup is required";
        $flag = false;
    } else {
        $_SESSION["groupErr"] = "";
        $_SESSION["bloodgroup"] = $bloodgroup;
    }
    if (empty($religion)) {
        $_SESSION["religionErr"] = "select your religion";
        $flag = false;
    } else {
        $_SESSION["religionErr"] = "";
        $_SESSION["religion"] = $religion;
    }
    if (empty($email)) {
        $_SESSION['emailErr'] = "Email is required";
        $flag = false;
    } else {
        $_SESSION['emailErr'] = "";
        $_SESSION['email'] = $email;
    }

    if (empty($phone)) {
        $_SESSION['phoneErr'] = "number is required";
        $flag = false;
    } else {
        $_SESSION['phoneErr'] = "";
        $_SESSION['phone'] = $phone;
    }
    if (empty($country)) {
        $_SESSION['countryErr'] = "Select your country";
        $flag = false;
    } else {
        $_SESSION["countryErr"] = "";
        $_SESSION["country"] = $country;
    }
    if (empty($division)) {
        $_SESSION["divisionErr"] = "Select your division";
        $flag = false;
    } else {
        $_SESSION["divisionErr"] = "";
        $_SESSION["division"] = $division;
    }
    if (empty($rsc)) {
        $_SESSION["rscErr"] = "Provide your rsc information";
        $flag = false;
    } else {
        $_SESSION["rscErr"] = "";
        $_SESSION["rsc"] = $rsc;
    }


    if (empty($ssc)) {
        $_SESSION["sscErr"] = "enter your passing year";
        $flag = false;
    } else {
        $_SESSION["sscErr"] = "";
        $_SESSION["ssc"] = $ssc;
    }
    if (empty($sscDepartment)) {
        $_SESSION["departmentErr"] = "select your department";
        $flag = false;
    } else {
        $_SESSION["departmentErr"] = "";
        $_SESSION["sscDepartment"] = $sscDepartment;
    }

    if (empty($sscCgpa)) {
        $_SESSION["cgpaErr"] = "enter your cgpa";
        $flag = false;
    } else {
        $_SESSION["cgpaErr"] = "";
        $_SESSION["sscCgpa"] = $sscCgpa;
    }

    if (empty($sscInstitution)) {
        $_SESSION["institutionErr"] = "Institution name required";
        $flag = false;
    } else {
        $_SESSION["institutionErr"] = "";
        $_SESSION["sscInstitution"] = $sscInstitution;
    }
    if (empty($sscBoard)) {
        $_SESSION["sscBoardErr"] = "which board?";
        $flag = false;
    } else {
        $_SESSION["sscBoardErr"] = "";
        $_SESSION["sscBoard"] = $sscBoard;
    }


    if (empty($hsc)) {
        $_SESSION["hscErr"] = "enter your passing year";
        $flag = false;
    } else {
        $_SESSION["hscErr"] = "";
        $_SESSION["hsc"] = $hsc;
    }
    if (empty($hscDepartment)) {
        $_SESSION["departmentErr"] = "select your department";
        $flag = false;
    } else {
        $_SESSION["departmentErr"] = "";
        $_SESSION["hscDepartment"] = $hscDepartment;
    }

    if (empty($hscCgpa)) {
        $_SESSION["cgpaErr"] = "enter your cgpa";
        $flag = false;
    } else {
        $_SESSION["cgpaErr"] = "";
        $_SESSION["hscCgpa"] = $hscCgpa;
    }


    if (empty($hscInstitution)) {
        $_SESSION["institutionErr"] = "Institution name required";
        $flag = false;
    } else {
        $_SESSION["institutionErr"] = "";
        $_SESSION["hscInstitution"] = $hscInstitution;
    }
    if (empty($hscBoard)) {
        $_SESSION["hscBoardErr"] = "which board?";
        $flag = false;
    } else {
        $_SESSION["hscBoardErr"] = "";
        $_SESSION["hscBoard"] = $hscBoard;
    }


    if (empty($postcode)) {
        $_SESSION["postcodeErr"] = "Provide your postcode";
        $flag = false;
    } else {
        $_SESSION["postcodeErr"] = "";
        $_SESSION["postcode"] = $postcode;
    }
    if (empty($username)) {
        $_SESSION["usernameErr"] = "Provide your username";
        $flag = false;
    } else {
        $_SESSION["usernameErr"] = "";
        $_SESSION["username"] = $username;
    }
    $special_Character = preg_match("/[!@#$%^&*()_+{}[\]:;<>,.?~]/", $password);
    if (empty($password)) {
        $_SESSION["passwordErr"] = "Provide your password";
        $flag = false;
    } elseif (strlen($password) <= 8 && !$special_Character) {
        $_SESSION['passwordErr'] = "Please give a special character and password length more than 8.";
        $flag = false;
    } else {
        if ($password == $confirm_password) {
            $_SESSION["passwordErr"] = "";
            $_SESSION["password"] = $password;
            // $_SESSION['checkPass']= "matched";


        } else {
            $_SESSION['passwordErr'] = "password and confirm password does not match";
            $flag = false;
        }
    }
    if (empty($confirm_password)) {
        $_SESSION["confirm_passwordErr"] = "Enter your confirm password";
        $flag = false;
    } else {
        $_SESSION["confirm_passwordErr"] = "";
        $_SESSION["confirm_password"] = $confirm_password;
    }



    if ($flag) {


        $draft_cookies = array(
            "draft_firstname",
            "draft_lastname",
            "draft_fathername",
            "draft_mothername",
            "draft_gender",
            "draft_bloodgroup",
            "draft_religion",
            "draft_email",
            "draft_Phone",
            "draft_country",
            "draft_division",
            "draft_rsc",
            "draft_postcode",
            "draft_username",
            "draft_d_birth",
            "draft_ssc",
            "draft_sscInstitution",
            "draft_sscCgpa",
            "draft_sscBoard",
            "draft_sscDepartment",
            "draft_hsc",
            "draft_hscInstitution",
            "draft_hscCgpa",
            "draft_hscBoard",
            "draft_hscDepartment"
        );
        foreach ($draft_cookies as $cookie_name) {
            setcookie($cookie_name, "", time() - 3600, "/");
        }
        unset($_SESSION['me']);


        $query = "INSERT INTO registration 
    (firstname, lastname, fathername, mothername, dob, gender, bloodgroup, religion, email, phone, country, division, username, password, ssc, sscInstitution, sscCgpa, sscBoard, sscDepartment, hsc, hscInstitution, hscCgpa, hscBoard, hscDepartment, image) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param(
            "ssssssssssssssssssssssss",
            $firstname,
            $lastname,
            $fathername,
            $mothername,
            $d_birth,
            $gender,
            $bloodgroup,
            $religion,
            $email,
            $phone,
            $country,
            $division,
            $username,
            $password,
            $ssc,
            $sscInstitution,
            $sscCgpa,
            $sscBoard,
            $sscDepartment,
            $hsc,
            $hscInstitution,
            $hscCgpa,
            $hscBoard,
            $hscDepartment,
            $name
        );


        $insert = $stmt->execute();

        $stmt->close();

        if ($insert) {
            // header("login.php");
            $_SESSION['authenticate']=true;
            header("Location:../Portal/portal.php");
           
        } else {
            header("location:registration.php");
        }

       
    } else {

        header("Location: registration.php");
    }
}

?>