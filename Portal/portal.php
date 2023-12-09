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
    <title>Portal</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <header>
        <?php include('../Header/header2.php') ?>
    </header>
    <main>
        <?php if (isset($_SESSION["email"])) {
            echo "<h2>Welcome,$_SESSION[email]</h2>";
        } ?>

        <div class="myCourses-page">
       <div class="payment-modal">
       <button id='openModalBtn'>Payment</button>
            <div id='modal' class='modal'>
                <div class='modal-content'>
                    <span class='close' id='closeModalBtn'>&times;</span>
                    <p>
                        <?php include('../TotalAmount/totalamount.php') ?>
                    </p>
                </div>
            </div>
       </div>
            <?php include("../MyCourses/mycourses.php") ?>
        </div>
        <div class="available-courses">
            <!-- <a  href="../Courses/courses.php"><b>All Available Courses...</b></a> -->
            <button class="btn-primary" onclick="toggleItem()">Available Courses</button>
            <div id="toggleElement">
                <p>hello</p>
                <p class="courses-container"></p>
                <?php include("../Courses/courses.php") ?>
                </p>
            </div>
        </div>


    </main>
    <footer>
        <?php include('../Footer/footer2.php') ?>
    </footer>
    <script src="portal.js"></script>
</body>

</html>