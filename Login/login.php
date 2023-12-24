<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles.css">
    <script src="loginValidate.js"></script>
</head>

<body>
    <header>
        <?php include("../Header/header2.php"); ?>
    </header>
    <main>
        <div class="login-container">
   
            <form 
            class="login" 
            method="POST" 
            action="loginAction.php" 
            onsubmit="return validateLoginForm(this)" 
             novalidate>
                   <div class="login-title-container">
                   <img width="100px" height="100px" src="../logo-without-name.png" alt="">
                   <!-- <img width="100px" height="100px" src="https://i.ibb.co/Bnn1dXL/Black-Modern-Car-Service-Logo.png" alt=""> -->
                   <h1 class="login-title"> <span id="rose">ROSE</span> UNIVERSITY</h1>
                   <!-- <h1 class="login-title"> <span id="rose">WHEE</span>LY</h1> -->
                    <!-- <h2 class="login-title">Login!</h2> -->
                   </div>
                <div>
                    <label class="email" for="Email">Email:</label>
                    <input class="custom-input" type="text" placeholder="enter your email" name="email" id="Email"
                        value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                        <span id="emailErr"></span>
                    <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
                </div>
                <div>
                    <label class="password" for="password">Password: </label>
                    <input class="custom-input" type="password" placeholder="enter your password" name="password"
                        id="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : "" ?>">
                        <span id="passwordErr"></span>
                    <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                </div>
                <?php echo isset($_SESSION['credentialErr']) ? $_SESSION['credentialErr'] : "" ?>
                </table>
                <div>
                    <button id="btn-login" type="submit" name="submit">login</button>
                    <a class="login-page-forget" href="../Forgot/forgotPass.php" name="">forgot password ?</a>
                </div>
                <div class="login-page-content">
                    <p class="login-page-content-para">Don't have any account?</p>
                    <a href="../Registration/registration.php">register here..</a>
                </div>

            </form>
        </div>
    </main>
    <footer>
        <?php include("../Footer/footer2.php"); ?>
    </footer>
    
</body>

</html>