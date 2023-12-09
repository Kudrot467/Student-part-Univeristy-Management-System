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
// $select = "SELECT * FROM faculties ";
// $result = mysqli_query($conn, $select);

$select = "SELECT name, department, email, image FROM faculties";
$stmt = $conn->prepare($select);
$stmt->execute();
$result = $stmt->get_result();

echo"<h2>Faculties</h2>";
while ($row = $result->fetch_assoc()) { ?>
<link rel="stylesheet" href="./styles.css">  
    <table>
        <tr>
            <td>
                <fieldset>
                    <legend> Information of <?php echo $row['name']; ?></legend>
                    <table>
                        <tr>
                        <img src="../images/<?php echo $row['image'] ?>" height="100px" width="200px" alt="">
                         </tr>
        <tr>
            <td><label for="name"><b>Name</b></label></td>
            <td>:
                <?php echo $row['name']; ?>
            </td>
        </tr>
        <tr>
            <td><label for="department"><b>Department</b></label></td>
            <td>:
                <?php echo $row['department']; ?>
            </td>
        </tr>
        <tr>
            <td><label for="email"><b>Email</b></label></td>
            <td>:
                <?php echo $row['email']; ?>
            </td>
        </tr>
    </table>
    </fieldset>
    </td>
    </tr>
    </table>
    <?php
}
?>