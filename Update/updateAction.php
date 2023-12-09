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

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
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
    $id = $_SESSION['id'];
    $password = test_input($_POST['password']);
    $confirm_password = test_input($_POST['confirm_password']);
    $flag = true;


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
    $special_Character = preg_match("/[!@#$%^&*()_+{}[\]:;<>,.?~]/", $password);
    if (empty($password)) {
        $_SESSION["passwordErr"] = "Provide your password";
        $flag = false;
    } elseif (strlen($password) <= 8 && !$special_Character) {
        $_SESSION['passwordErr'] = "Please give a special character and password length more than 8.";
        $flag = false;
    } else {
        if ($password === $confirm_password) {
            $_SESSION["passwordErr"] = "";
            $_SESSION["password"] = $password;




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
        // $query = "UPDATE registration SET 
        // firstname = '$firstname',
        // lastname = '$lastname',
        // fathername = '$fathername',
        // mothername = '$mothername',
        // dob = '$d_birth',
        // gender = '$gender',
        // bloodgroup = '$bloodgroup',
        // religion = '$religion',
        // email = '$email',
        // phone = '$phone',
        // country = '$country',
        // division = '$division',
        // password = '$password',
        // ssc = '$ssc',
        // sscInstitution = '$sscInstitution',
        // sscCgpa = '$sscCgpa',
        // sscBoard = '$sscBoard',
        // sscDepartment = '$sscDepartment',
        // hsc = '$hsc',
        // hscInstitution = '$hscInstitution',
        // hscCgpa = '$hscCgpa',
        // hscBoard = '$hscBoard',
        // hscDepartment = '$hscDepartment',
        // WHERE id='$id' "; 
        //  $update = mysqli_query($conn, $query);

        $query = "UPDATE registration SET 
    firstname = ?,
    lastname = ?,
    fathername = ?,
    mothername = ?,
    dob = ?,
    gender = ?,
    bloodgroup = ?,
    religion = ?,
    email = ?,
    phone = ?,
    country = ?,
    division = ?,
    password = ?,
    ssc = ?,
    sscInstitution = ?,
    sscCgpa = ?,
    sscBoard = ?,
    sscDepartment = ?,
    hsc = ?,
    hscInstitution = ?,
    hscCgpa = ?,
    hscBoard = ?,
    hscDepartment = ?
    WHERE id = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param(
            "ssssssssssssssssssssssssi",
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
            $id
        );

        // Execute the statement
        $update = $stmt->execute();

        // Close the statement
        $stmt->close();



        if ($update) {
            header("Location:../Portal/profile.php");
        } else {
            header("Location:../Portal/portal.php");
        }

    } else {
        header("Location:../Update/update.php");

    }
}

?>