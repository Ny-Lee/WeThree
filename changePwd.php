<?php
include('session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeThree";

$conn = new mysqli($servername, $username, $password, $dbname);

$pwd = $_GET['pwd'];
$confirmpwd = $_GET['confirmpwd'];

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
    $userid = mysqli_query($conn, "SELECT customerId FROM Account WHERE userId = '$login_session'");
    $customerid = mysqli_fetch_assoc($userid);
    $userid = $customerid["customerId"];
    if ($pwd == $confirmpwd) {
        $update = mysqli_query($conn, "UPDATE Account SET password = '$pwd' WHERE customerId = '$userid'");
        $result = mysqli_fetch_assoc();
        $message = "Password changed";
        echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/profile.php';</script>";
    } else {
        $message = "Password does not match";
        echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/profile.php';</script>";
    }
    $conn->close();
}
?>