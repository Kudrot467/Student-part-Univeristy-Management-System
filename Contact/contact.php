<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-us</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <header><?php include('../Header/header2.php')?></header>
    <main>
    <table>
        <tr>
            <td>
                <fieldset>
                    <legend>Contact-us</legend>
                    <table>
                        <tr>
                            <td><label for="address"><b>Address</b></label></td>
                            <td>: 408/1 (Old KA 66/1), Kuratoli, Khilkhet, Dhaka 1229, Bangladesh.
                            </td>
                        </tr>
                        <tr>
                            <td><label for=""><b>Web</b></label></td>
                            <td>:http://localhost/projects/management-system-versity/home.php
                            </td>
                        </tr>
                        <tr>
                            <td><label for="email"><b>Email</b></label></td>
                            <td>:
                                info@brocelle.edu
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
    </table>
    </main>
    <footer>
        <?php include('../Footer/footer2.php')?>
    </footer>
</body>

</html>