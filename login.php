<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeThree";

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['uname'];
$pwd = $_GET['pwd'];

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
    $SELECT = "SELECT * FROM Account WHERE userId = '$id';";
    $result = $conn->query($SELECT);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row["userId"] == $id && $row["password"] == $pwd) {
            $_SESSION['login_user'] = $id;
            header("Location: http://192.168.64.3/capstone/main_page_logged_in.html");
        } else {
            $message = "User Id and password does not match";
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/capstone_main_page.html';</script>";
        }
    } else {
        $message = "User Id or password does not exist";
        echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/capstone_main_page.html';</script>";
    }
    $conn->close();
}
?>