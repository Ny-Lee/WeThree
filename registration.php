<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeThree";

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['userName'];
$fn = $_GET['firstName'];
$ln = $_GET['lastName'];
$email = $_GET['email'];
$pwd = $_GET['pwd'];
$repwd = $_GET['pwd-repeat'];
$address = $_GET['address'];
$pn = $_GET['phoneNumber'];
$cc = $_GET['cc'];
$dc = $_GET['dc'];

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
    $SELECT = "SELECT email FROM Customer WHERE email = ? LIMIT 1";
    
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    
    if ($rnum == 0) {
        $SELECT = "SELECT userId FROM Account WHERE userId = '$id';";
        $result = $conn->query($SELECT);
        if($result->num_rows > 0) {
            $message = "User Name taken. Please choose different User Name";
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/capstone_main_page.html';</script>";
            $result->free();
        } else if ($pwd != $repwd) {
            $message = "Password does not match. Please try again.";
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/capstone_main_page.html';</script>";
        } else {
            $sql = "INSERT INTO Customer (firstName, lastName, phoneNumber, email) VALUES ('$fn', '$ln', '$pn', '$email');";
            if ($conn->query($sql) === true){
                $sql = "SELECT customerId FROM Customer WHERE email='$email';";
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $cusid = $row["customerId"];
                }
                if ($cc != NULL) {
                    $sql = "INSERT INTO Card (customerId, credit) VALUES ('$cusid', '$cc');";
                    $result = $conn->query($sql);
                }
                if ($dc != NULL) {
                    $sql = "INSERT INTO Card (customerId, debit) VALUES ('$cusid', '$dc');";
                    $result = $conn->query($sql);
                }
                $sql = "INSERT INTO Account VALUES ('$cusid', '$id', '$pwd');";
                $sql .= "INSERT INTO Address (customerId, address) VALUES ('$cusid', '$address');";
                if ($conn->multi_query($sql) === true) {
                    header("Location: http://192.168.64.3/capstone/main_page_logged_in.html");
                }
                $message = "Account created successfully";
                echo "<script type='text/javascript'>alert('$message');window.location.href='thhp://192.168.64.3/capstone/main_page_logged_in.html'</script>";
                $result->free();
            } else {
                $message = "'Error: ' . $sql . '<br>' . $conn->error";
                echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/capstone_main_page.html';</script>";
            }
        }
    } else {
        $message = "Someone already registered using this email";
        echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/capstone_main_page.html';</script>";
    }
    $stmt->close();
    $conn->close();
}
?>