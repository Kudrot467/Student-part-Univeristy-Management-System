<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academics</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <header>
            <?php include('../Header/header2.php') ?>
    </header>
    <main>
        <?php include('./faculties.php') ?>
    </main>
    <footer>
        <?php include('../Footer/footer2.php') ?>
    </footer>
</body>
</html>