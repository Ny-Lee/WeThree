<?php 
include('session.php');

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "WeThree");
?>

<html>
<title>WeThree</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .w3-sidebar a {font-family: "Roboto", sans-serif}
    body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
        <h3 class="w3-wide"><button class="btntitle" onclick="toHomePage()"><b>WeThree</b></button></h3>
    </div>
    <script>
        function toHomePage() {
            window.open('main_page_logged_in.html', '_self');
            
        }
    </script>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openPensRefills()">Pens & Refills</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openPaper()">Paper</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openCardsCardStock()">Cards & Card Stock</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openColouredPaper()">Coloured Paper</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openGreetingCards()">Greeting Cards</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openStickyNotes()">Self-Stick Notes</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openHighlighters()">Highlighters</a>
    </div>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
    <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
    <script>
        function openPensRefills() {
            window.open('pensRefills.php', '_self');
        }
        function openPaper() {
            window.open('paper.php', '_self');
        }
        function openCardsCardStock() {
            window.open('cardsCardStock.php', '_self');
        }
        function openColouredPaper() {
            window.open('colouredPaper.php', '_self');
        }
        function openGreetingCards() {
            window.open('greetingCards.php', '_self');
        }
        function openStickyNotes() {
            window.open('stickyNotes.php', '_self');
        }
        function openHighlighters() {
            window.open('highlighters.php', '_self');
        }
    </script>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-padding-24 w3-wide">WeThree</div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">
   
    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>
  
    <!-- Top header -->
    <header class="w3-container w3-xlarge">
        <p class="w3-left">Cart</p>
        <p class="w3-right">
            <button class="btn btni" onclick="cart()"><i class="fa fa-shopping-cart"></i></button>
            <button class="btn" onclick="logOut()" style="width:auto;">Log Out</button>
        </p>
        <div class="w3-right dropdown">
            <button class="btn" onclick="myPage()" style="width:auto;">My Page
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="http://192.168.64.3/capstone/profile.php">Profile</a>
                <a href="http://192.168.64.3/capstone/orders.php">Orders</a>
            </div>
        </div>
        <form action="search.php", method="get">
            <p class="w3-right">
                <input class="input" type="search" name="search" required>
                <button class="btn btni"><i class="fa fa-search"></i></button>
            </p>
        </form>
    </header>
    <script>
        function cart() {
            window.open('cart.php', '_self');
        }
        
        function myPage() {
            window.open('mypage.php', '_self');
        }
        
        function logOut() {
            window.open('capstone_main_page.html', '_self');
        }
    </script>

<!-- Cart Product grid -->
<div class="w3-row" id=data>
    <?php
        $userid = mysqli_query($conn, "SELECT customerId FROM Account WHERE userId = '$login_session'");
        $customerid = mysqli_fetch_assoc($userid);
        $userid = $customerid["customerId"];
        $cart = mysqli_query($conn, "SELECT * FROM Cart WHERE customerId = '$userid'");
        $length2 = mysqli_num_rows($cart);

        if ($length2 == 1) {
            echo $length2 . " item <hr />";
        }
        else {
            echo $length2 . " items <hr />";
        }

        while ($row = mysqli_fetch_assoc($cart)) {
            $rows[] = $row;
        }
        
        $result = mysqli_query($conn, "SELECT * FROM Product INNER JOIN Cart ON Product.productId = Cart.productId WHERE customerId = '$userid'");
        while ($cartRow = mysqli_fetch_assoc($result)) {
            $cartRows[] = $cartRow;
        }
        
        $length = mysqli_num_rows($result);
        
        for ($i = 0; $i < $length; $i++) {
            if ($length - $i == 0) {
                break;
            } else {
    ?>
                <form action="cart.php" method="post">
                    <div class="w3-row">
                        <br>
                        <div class="w3-col l3 s6">
                            <div class="w3-container">
                                <div class="w3-display-container">
                                    <img src="./images/<?php echo $cartRows[$i]["category"]; ?>/<?php echo $cartRows[$i]["image"]; ?>.jpg" class="center">
                                </div>
                            </div>
                            <br><br>
                        </div>
                        <div class="w3-col l3 s6">
                            <div class="w3-container">
                                <p><?php echo $cartRows[$i]["productName"]; ?></p>
                            </div>
                        </div>
                        <div class="w3-col l3 s6">
                            <div class="w3-container">
                                <p><b><?php echo "$" . $cartRows[$i]["price"]; ?> /each</b></p>
                                <br><br><br><br><label>Qty: &nbsp;&nbsp;</label><input value="<?php echo $cartRows[$i]["cartQuantity"]; ?>" type="number" name="qty" min="1" max="10">
                                <input type="submit" name="update<?php echo $i; ?>" value="Update "class="btnm">
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" onclick="document.getElementById('id01'+<?php echo $i; ?>).style.display=block") name="delete<?php echo $i; ?>" value="Delete" class="btnm">Delete</button>
                            </div>
                        </div>
                        <div class="w3-col l3 s6">
                            <div class="w3-container">
                                <br><br><br><br><br><br><p><?php echo "$" . $cartRows[$i]["totalPrice"]; ?></p>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
            }
            ?>
                <div id="id01<?php echo $i; ?>">
    <?php
                $cartDelete = $cartRows[$i]['cartId'];
                if (isset($_POST['delete'.$i])) {
                    $DeleteQuery = "DELETE FROM Cart WHERE cartId = '$cartDelete'";
                    mysqli_query($conn, $DeleteQuery);
                    echo("<script>location.href = 'http://192.168.64.3/capstone/cart.php?msg=$msg';</script>");
                }
                $cartUpdate = $cartRows[$i]['price'];
                if (isset($_POST['update'.$i])) {
                    $qty = $_POST['qty'];
                    $UpdateQuery = "UPDATE Cart SET cartQuantity = '$qty', totalPrice = '$qty' * '$cartUpdate' WHERE cartId = '$cartDelete'";
                    mysqli_query($conn, $UpdateQuery);
                    echo("<script>location.href = 'http://192.168.64.3/capstone/cart.php?msg=$msg';</script>");
                }
                ?>
    </div>
    <?php
        }
    ?>
    <hr />
    <?php  
    $total = mysqli_query($conn, "SELECT * FROM Cart INNER JOIN Account ON Cart.customerId = Account.customerId WHERE userId = '$login_session'");
    while ($row = mysqli_fetch_assoc($total)) {
        $rows[] = $row;
    }
    $length = mysqli_num_rows($result);
    $cartTotal = 0;
    for ($i = 0; $i < $length; $i++) {
        $cartTotal = $cartTotal + $rows[$i]['totalPrice'];
    }
    $tax = $cartTotal * 0.13;
    $total = $cartTotal + $tax;
    $cartQty = 0;
    for ($i = 0; $i < $length; $i++) {
        $cartQty = $cartQty + $rows[$i]['cartQuantity'];
    }
    if ($cartTotal != 0) {
    ?>
    <form action="sales.php" method="get">
        <input type="hidden" name="cartTotal" value="<?php echo $cartTotal ?>">
        <input type="hidden" name="cartQty" value="<?php echo $cartQty ?>">
        <input type="hidden" name="grandTotal" value="<?php echo $total ?>">
        <div class="row">
            <div class="column1">
                <p><b>Subtotal:</b></p>
                <p><b>HST:</b></p>
                <p><b>Total:</b></p>
            </div>
            <div class="column2">
                <p><?php echo "$" . $cartTotal; ?></p>
                <p><?php echo "$" . round($tax, 2); ?></p>
                <p><?php echo "$" . round($total, 2); ?></p>
                <button class="btn checkout">Checkout</button>
            </div>
        </div>
    </form>
    <?php
    }
    ?>
</div>
<hr />
    
<br><br>
<!-- Subscribe section -->
    <div class="w3-container w3-black w3-padding-32">
        <h1>Subscribe</h1>
        <p>To get special offers and VIP treatment:</p>
        <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
        <button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
    </div>
  
    <!-- Footer -->
    <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
        <div class="w3-row-padding">
            <div class="w3-col s4">
                <h4>Contact</h4>
                <p>Questions? Go ahead.</p>
                <form action="/action_page.php" target="_blank">
                    <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
                    <button type="submit" class="w3-button w3-block w3-black">Send</button>
                </form>
            </div>

            <div class="w3-col s4">
                <h4>About</h4>
                <p><a href="#">About us</a></p>
                <p><a href="#">Shipment</a></p>
                <p><a href="#">Payment</a></p>
                <p><a href="#">Return</a></p>
                <p><a href="#">Help</a></p>
            </div>

            <div class="w3-col s4 w3-justify">
                <h4>Store</h4>
                <p><i class="fa fa-fw fa-map-marker"></i> WeThree</p>
                <p><i class="fa fa-fw fa-phone"></i> 012-345-6789</p>
                <p><i class="fa fa-fw fa-envelope"></i> WeThree@gmail.com</p>
                <h4>We accept</h4>
                <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
                <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
                <br>
                <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
                <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
                <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
                <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
                <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
            </div>
        </div>
    </footer>

  

  <!-- End page content -->
</div>


<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-white w3-center">
        <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
            <h2 class="w3-wide">NEWSLETTER</h2>
            <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
            <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
            <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
        </div>
    </div>
</div>

<script>
    // Accordion 
    function myAccFunc() {
        var x = document.getElementById("demoAcc");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
        x.className = x.className.replace(" w3-show", "");
        }
    }

    // Click on the "Jeans" link on page load to open the accordion for demo purposes
    document.getElementById("myBtn").click();


    // Open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }
 
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>

</body>

<style>
    .btntitle {
        background-color: white;
        border: none;
        font-size: 36px;
    }
    .btn {
        display: inline-block;
        margin-right: 5px;
        background-color: darkgray;
        border: none;
        color: white;
        font-size: 26px;
        cursor: pointer;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
    
    .btn:hover {
        background-color: darkgray;
        color: black;
    }
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 40px;
        font-weight: bold;
        color: #f1f1f1;
    }
    .dropdown {
        float: left;
        overflow: hidden;
        margin-top: 24px;
    }
    .dropdown .dropbtn {
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }
    .dropdown-content {
        font-size: 20px;
        display: none;
        position: absolute;
        background-color: darkgray;
        min-width: 149px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    .dropdown-content a {
        float: none;
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }
    .dropdown-content a:hover {
        background-color: #ddd;
        color: black;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .btni {
        font-size: 25px;
        padding-bottom: 8px;
        padding-top: 9px;
    }
    .btnm {
        background-color: darkgray;
        border: none;
        color: white;
        font-size: 17px;
        cursor: pointer;
    }
    .btnm:hover {
        color: black;
    }
    .checkout {
        background-color: darkred;
    }
    .checkout:hover {
        background-color: red;
        color: white;
    }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 150;
        height: 200;
    }
    .column1 {
        float: left;
        width: 70%;
        padding-left: 500px;
    }
    .column2 {
        float: left;
        width: 30%;
        padding-left: 60px;
    }
    