<?php
include('session.php');
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "WeThree");
?>

<!DOCTYPE html>
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
        <p class="w3-left">Stationary</p>
        <p class="w3-right">
            <button class="btn" onclick="cart()"><i class="fa fa-shopping-cart"></i></button>
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
                <input type="search" name="search" required>
                <button class="btn"><i class="fa fa-search"></i></button>
            </p>
        </form>
    </header>
    <hr /><br>
    <script>
        function cart() {
            window.open('cart.php', '_self');
        }
        
        function myPage() {
            window.open('mypage.php', '_self');
        }
        
        function logOut() {
            window.open('logOut.php', '_self');
        }
    </script>
    
    <!-- Checkout  -->
    <div class="row">
        <div class="column">
            <form action="">
                <!-- Shipping Address -->
                <h4>Shipping Address</h4>
                <?php
                $address = mysqli_query($conn, "SELECT * FROM Address INNER JOIN Account ON Address.customerId = Account.customerId WHERE userId = '$login_session'");
                while ($row = mysqli_fetch_assoc($address)) {
                    $rows[] = $row;
                }
                $length = mysqli_num_rows($address);
                for ($i = 0; $i < $length; $i++) {
                    ?>
                    <input type="radio" name="radio" value="<?php echo "address" . $i; ?>" checked>&nbsp;&nbsp;<?php echo $rows[$i]['address'] ?><br>
                <?php 
                }
                ?>
                <br>
            </form>
        </div>
        <div class="column">
            <form action="">
                <!-- Payment Methods -->
                <h4>Payment</h4>
                <?php
                $card = mysqli_query($conn, "SELECT * FROM Card INNER JOIN Account ON Card.customerId = Account.customerId WHERE userId = '$login_session'");
                while ($row = mysqli_fetch_assoc($card)) {
                    $rows2[] = $row;
                }
                $length = mysqli_num_rows($card);
                for ($i = 0; $i < $length; $i++) {
                    if ($rows2[$i]['credit'] != null) {
                        ?>
                        <input type="radio" name="radio" value="<?php echo "card" . $i; ?>" checked>&nbsp;&nbsp;<?php echo $rows2[$i]['credit'] ?><br>
                        <?php
                    }
                    if ($rows2[$i]['debit'] != null) {
                        ?>
                        <input type="radio" name="radio" value="<?php echo "card" . $i; ?>">&nbsp;&nbsp;<?php echo $rows2[$i]['debit'] ?><br>
                <?php 
                    }
                }
                ?>
                <br>
            </form>
        </div>
        <div class="column">
            <form action="resetCart.php" method="get">
                <Button class="checkoutbtn" type="submit">Checkout</Button>
            </form>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
    
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
    .checkoutbtn {
        border: none;
        background-color: red;
        cursor: pointer;
        font-size: 26px;
        margin-top: 200px;
        margin-left: 100px;
        color: white;
    }
    .checkoutbtn:hover {
        background-color: darkred;
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
    .column {
        float: left;
        width: 33%;
        padding-left: 30px;
    }
</html>