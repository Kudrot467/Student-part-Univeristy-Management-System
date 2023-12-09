<?php
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    header("Location: ../Login/login.php");
    exit();
}
// $userEmail = isset($_SESSION['email']) ? $_SESSION['email']:'';
// $select = "SELECT SUM(amount) AS totalAmount FROM my_courses WHERE enroll_email='$userEmail'";
// $result = mysqli_query($conn, $select);
// $row1 = mysqli_fetch_assoc($result);
$select = "SELECT SUM(amount) AS totalAmount FROM my_courses WHERE enroll_email=?";
$stmt = $conn->prepare($select);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

$row1 = mysqli_fetch_assoc($result);

$totalAmount = $row1['totalAmount'];
if($totalAmount){
    echo "<fieldset><legend class='amount-field-title'>Total Amount</legend>
    <h3 class='pay-amount'> <span class='total-amount-title'>You Have to Pay:</span> $totalAmount tk only</h3>
    </fieldset>";
}
else{
    echo "";
}

?>