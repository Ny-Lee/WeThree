<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeThree";

$conn = new mysqli($servername, $username, $password, $dbname);

session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($conn, "SELECT userId FROM Account WHERE userId = '$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['userId'];

if (!isset($login_session)){
    mysqli_close($conn);
    header("Location: http://192.168.64.3/capstone/capstone_main_page.html");
}
?>