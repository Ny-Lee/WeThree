<?php
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
            window.open('capstone_main_page.html', '_self');
            
        }
    </script>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openPensRefillsNonMember()">Pens & Refills</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openPaperNonMember()">Paper</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openCardsCardStockNonMember()">Cards & Card Stock</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openColouredPaperNonMember()">Coloured Paper</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openGreetingCardsNonMember()">Greeting Cards</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openStickyNotesNonMember()">Self-Stick Notes</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="openHighlightersNonMember()">Highlighters</a>
    </div>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
    <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
    <script>
        function openPensRefillsNonMember() {
            window.open('pensRefillsNonMember.php', '_self');
        }
        function openPaperNonMember() {
            window.open('paperNonMember.php', '_self');
        }
        function openCardsCardStockNonMember() {
            window.open('cardsCardStockNonMember.php', '_self');
        }
        function openColouredPaperNonMember() {
            window.open('colouredPaperNonMember.php', '_self');
        }
        function openGreetingCardsNonMember() {
            window.open('greetingCardsNonMember.php', '_self');
        }
        function openStickyNotesNonMember() {
            window.open('stickyNotesNonMember.php', '_self');
        }
        function openHighlightersNonMember() {
            window.open('highlightersNonMember.php', '_self');
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
        <p class="w3-left">Highlighters</p>
        <p class="w3-right">    
            <button class="btn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
            <button class="btn" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign up</button>
        </p>
        <form action="searchNonMember.php", method="get">
            <p class="w3-right">
                <input type="search" name="search" required>
                <button class="btn btni"><i class="fa fa-search"></i></button>
            </p>
        </form>
    </header>
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content animate" action="login.php" method="get">
            <div class="container">
                <h1>Login</h1>
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" required>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" name="submit" class="loginbtn">Login</button>
            </div>
        </form>
    </div>
    <div id="id02" class="modal">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="registration.php" method="get">
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <label for="userName"><b>User Name</b></label>
                <input type="text" placeholder="Enter User Name" name="userName" required>
                <br>
                <label for="firstName"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="firstName" required>
                <br>
                <label for="lastName"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="lastName" required>
                <br>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
                <br>
                <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" required>
                <br>
                <label for="pwd-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="pwd-repeat" required>
                <br>
                <label for="addressStreet"><b>Street Address</b></label>
                <input type="text" placeholder="Enter Address" name="address" required>
                <br>
                <label for="phoneNumber"><b>Phone Number</b></label>
                <input type="text" placeholder="Enter Phone Number" name="phoneNumber" required>
                <br>
                <label for="cc"><b>Credit Card</b></label>
                <input type="text" placeholder="Enter 16 Digit Credit Card Number" name="cc">
                <br>
                <label for="dc"><b>Debit Card</b></label>
                <input type="text" placeholder="Enter 16 Digit Debit Card Number" name="dc">
                <br>
                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

<!-- Product grid -->
<div class="w3-row" id=data>
    <?php
        $result = mysqli_query($conn, "SELECT * FROM Product WHERE category = 'Highlighter'");
        $length = mysqli_num_rows($result);
        if ($length == 1) {
            echo $length . " item <hr />";
        }
        else {
            echo $length . " items <hr />";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        for ($i = 0; $i < $length; $i++) {
    ?>
            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <div class="w3-display-container">
                        <img src="./images/<?php echo $rows[$i]["category"]; ?>/<?php echo $rows[$i]["image"]; ?>.jpg" class="center">
                        <div class="w3-display-middle w3-display-hover">
                            <button class="w3-button w3-black" onclick="message()" style="width=auto;">Buy now <i class="fa fa-shopping-cart"></i></button>
                        </div>
                        <p><?php echo $rows[$i]["productName"]; ?><br><b><?php echo "$" . $rows[$i]["price"]; ?></b></p>
                    </div>
                </div>
            </div>
    <script>
        function message() {
            var mes = "Please login or sign up";
            alert(mes);
        }
    </script>
    <?php
        }
    ?>
</div>
<hr />
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
        position: relative;
        top: 5px;
        margin-right: 5px;
        background-color: darkgray;
        border: none;
        color: white;
        font-size: 26px;
        cursor: pointer;
    }
    .btni {
        position: relative;
        font-size: 39px;
        top: 5px;
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
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }
    .container {
        padding: 16px;
    }
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 350;
        top: 0;
        width: 50%;
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: #474e5d;
        padding-top: 50px;
    }
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }
    .loginbtn, .signupbtn {
        color: white;
        background-color: lightgray;
        border: none;
        width: auto;
        padding: 5px 18px;
        cursor: pointer;
    }
    .cancelbtn {
        color: white;
        width: auto;
        padding: 5px 18px;
        background-color: #f44336;
        border: none;
        cursor: pointer;
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
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 150;
        height: 250;
    }