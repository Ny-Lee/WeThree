<?php
include('session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeThree";

$conn = new mysqli($servername, $username, $password, $dbname);

$cartTotal = $_GET['cartTotal'];
$cartQty = $_GET['cartQty'];
$grandTotal = $_GET['grandTotal'];

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
    $insert = "INSERT INTO Sales (totalPrice, dateTime, quantity) VALUES ('$cartTotal', now(), '$cartQty');";
    $result = $conn->query($insert);
    $reset = "SELECT Customer.customerId, Product.productId, quantity, cartQuantity, userId FROM Account, Cart, Product, Customer WHERE Account.customerId = Customer.customerId AND Cart.customerId = Customer.customerId AND Cart.productId = Product.productId AND userId = '$login_session';";
    $result2 = mysqli_query($conn, $reset) or die(mysqli_error($conn));
    $length = mysqli_num_rows($result2);
    while ($row = mysqli_fetch_assoc($result2)) {
        $rows[] = $row;
    }
    $salesid = mysqli_query($conn, "SELECT MAX(salesId) as salesid FROM Sales;");
    $result = mysqli_fetch_assoc($salesid);
    $salesid = $result['salesid'];
    for ($i = 0; $i < $length; $i++) {
        $newQty = $rows[$i]['quantity'] - $rows[$i]['cartQuantity'];
        $prodId = $rows[$i]['productId'];
        $update = mysqli_query($conn, "UPDATE Product SET quantity = '$newQty' WHERE productId = '$prodId'");
        $insert = mysqli_query($conn, "INSERT INTO SalesProduct (salesId, productId) VALUES ('$salesid', '$prodId');");
    }
    $userid = mysqli_query($conn, "SELECT Account.customerId FROM Account INNER JOIN Customer ON Account.customerId = Customer.customerId WHERE userId = '$login_session'");
    $userid = mysqli_fetch_assoc($userid);
    $customerid = $userid['customerId'];
    $insert = mysqli_query($conn, "INSERT INTO `Order` (customerId, salesId, totalPrice) VALUES ('$customerid', '$salesid', '$grandTotal');");
    echo "<script type='text/javascript'>window.location.href='http://192.168.64.3/capstone/checkout.php';</script>";
    $conn->close();
}
?> 