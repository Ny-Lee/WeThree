<?php
include('session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeThree";

$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
    $customerid = mysqli_query($conn, "SELECT userId, Customer.customerId FROM Account INNER JOIN Customer ON Account.customerId = Customer.customerId WHERE userId = '$login_session'");
    $row = mysqli_fetch_assoc($customerid);
    $customerid = $row['customerId'];
    $delete = mysqli_query($conn, "DELETE FROM Cart WHERE customerId = '$customerid'");
    $message = "Thank you for your order!";
    echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/main_page_logged_in.html';</script></script>";
    $conn->close();
}
?> 