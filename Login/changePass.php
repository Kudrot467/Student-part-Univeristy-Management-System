<?php
session_start();
if (!isset($_SESSION['authenticate']) || $_SESSION['authenticate'] !== true) {
    header("Location: ../Login/login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="changeValidate.js" ></script>
</head>

<body>
<?php include('../Header/header2.php') ?>
   <div class="changePass">
   <form  
     class="login" 
     method="POST" 
     action="changePassAction.php" 
     onsubmit="return changeValidateForm(this)" 
     novalidate>
        <fieldset>
            <legend>Provide your valid email and set your password</legend>
            <table>
                <span id="msg"></span>
                <tr>
                    <td><label>Previous password</label></td>
                    <td>:<input type="text" name="previous" id="previous"
                            value="<?php echo isset($_SESSION['previous']) ? $_SESSION['previous'] : "" ?>">
                            <span id="prevPassErr"></span>
                        <?php echo isset($_SESSION['previousErr']) ? $_SESSION['previousErr'] : "" ?>
                    </td>
                </tr>
                <tr>
                    <td><label >New Password </label></td>
                    <td>: <input type="password" name="password" id="password"
                            value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : "" ?>">
                            <span id="passwordErr"></span>
                        <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                    </td>
                </tr>
                <tr>
                    <td><label >Confirm Password </label></td>
                    <td>: <input type="password" name="confirm_password" id="confirm_password"
                            value="<?php echo isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : "" ?>">
                            <span id="confirm_Err"></span>
                        <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="submit"></td>
                </tr>
                <tr>
                    <td></td>
                    <!-- <td><a href="login.php">Login Now...</a></td> -->
                </tr>
            </table>
        </fieldset>
    </form>
   </div>
    <?php include('../Footer/footer2.php') ?>
</body>

</html>