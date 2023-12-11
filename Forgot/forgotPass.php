<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="forgotValidate.js" ></script>
</head>

<body>
    <main>
        <div>
            <fieldset>
                <legend>Recovery Password</legend>
                <form method="POST" 
                action="forgotPassAction.php" 
                onsubmit="return validateForgotForm(this)"
                novalidate>
                <table>
                    <tr>
                        <td><label>Email</label></td>
                        <td>: <input type="text" name="email" id="Email"
                                value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                                <span id="emailErr" ></span>
                            <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
                        </td>
                        <td>
                            <input type="submit" value="Recovery" name="submit">
                        </td>
                    </tr>
                </table>
                </form>
            </fieldset>
        </div>
    </main>
</body>

</html>