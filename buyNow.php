<?php
include('session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeThree";

$conn = new mysqli($servername, $username, $password, $dbname);

$productId = $_GET['product'];
$qty = $_GET['qty'];

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
    $SELECT = "SELECT * FROM Product WHERE productId = '$productId';";
    $result = $conn->query($SELECT);
    $row = $result->fetch_assoc();
    $message = "";
    // Not available
    if ($row['quantity'] < $qty || $qty == 0) {
        if ($qty == 0) {
            $message = "Please select 1 or more";
        } else {
            $message = "The product is out of stock";
        }
        $category = $row['category'];
        if ($category == 'Pen') {
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/pensRefills.php';</script></script>";
        }
        if ($category == 'Paper') {
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/paper.php';</script></script>";
        }
        if ($category == 'Card') {
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/cardsCardStock.php';</script></script>";
        }
        if ($category == 'ColouredPaper') {
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/colouredPaper.php';</script></script>";
        }
        if ($category == 'GreetingCard') {
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/greetingCards.php';</script></script>";
        }
        if ($category == 'StickyNote') {
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/stickyNotes.php';</script></script>";
        }
        if ($category == 'Highlighter') {
            echo "<script type='text/javascript'>alert('$message');window.location.href='http://192.168.64.3/capstone/highlighters.php';</script></script>";
        }
    }
    else {
        $userid = mysqli_query($conn, "SELECT customerId FROM Account WHERE userId = '$login_session'");
        $customerid = mysqli_fetch_assoc($userid);
        $userid = $customerid["customerId"];
        $price = $row['price'];
        $totalprice = $row['price'] * $qty;
        $INSERT = "INSERT INTO Cart VALUES($productId, $qty, $totalprice, $userid, 'null', $price)";
        $result = $conn->query($INSERT);
        echo "<script type='text/javascript'>window.location.href='http://192.168.64.3/capstone/cart.php';</script>";
    }
    $conn->close();
}

?>