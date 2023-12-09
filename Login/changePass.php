<?php
session_start();
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
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
</head>

<body>
    <form method="POST" action="changePassAction.php" novalidate>
        <fieldset>
            <legend>Provide your valid email and set your password</legend>
            <table>
                <tr>
                    <td><label for="previous">Previous password</label></td>
                    <td>: <input type="text" name="previous" id="previous"
                            value="<?php echo isset($_SESSION['previous']) ? $_SESSION['previous'] : "" ?>">
                        <?php echo isset($_SESSION['previousErr']) ? $_SESSION['previousErr'] : "" ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">New Password </label></td>
                    <td>: <input type="password" name="password" id="password"
                            value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : "" ?>">
                        <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="confirm_password">Confirm Password </label></td>
                    <td>: <input type="password" name="confirm_password" id="confirm_password"
                            value="<?php echo isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : "" ?>">
                        <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="submit"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="login.php">Login Now...</a></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>