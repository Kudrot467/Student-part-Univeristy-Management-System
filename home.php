<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
            <?php include('./Header/header.php') ?>
    </header>
    <main>
            <?php include('./Banner/banner.php') ?>
    </main>
    <footer>
            <?php include('./Footer/footer.php') ?>
    </footer>
</body>
</html>