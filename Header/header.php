<!-- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <nav class="nav-items">
        <h1 class="nav-title">
            ROSE UNIVERSITY
            <!-- WHEELY -->
        </h1>
       <img id="nav-img" width="100px" height="100px" src="./logo-without-name.png" alt="">
        <ul class="nav-items">
            <li><a href="./Academics/details.php">Academics</a></li>
            <li><a href="./Contact/contact.php">Contact</a></li>
            <?php
            $servername = "localhost";
            $user = "root";
            $password = "";
            $db = "registration";

            // Create connection
            $conn = new mysqli($servername, $user, $password, $db);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_SESSION['authenticate']) && $_SESSION['authenticate'] === true) {
                // header("Location: login.php");
                $userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';
                if ($userEmail) {

                    $select = "SELECT * FROM registration WHERE email='$userEmail' ";
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_array($result)) {

                       
                        $userName = $row["username"];
                        $image = $row["image"];
                        echo '
                       <li> <a href="./Portal/portal.php">Portal</a></li>
                     <li><a href="./Portal/profile.php">profile</a></li> 
                     <div>
                     <h4 id="user-name">' . $userName . '</h4>
                     <img id="header-img" src="./images/' . $image . '" />
                     </div>
                      <li> <a href="./Login/logout.php">Logout</a></li>
                      ';
                    }
                }

            } else {
                echo '<li><a href="./Login/login.php">Login</a></li>
                    ';
            }
            ?>
        </ul>
    </nav>
</body>

</html>