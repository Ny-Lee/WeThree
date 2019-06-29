<?php 
session_start();
if(session_destroy()){
    header("Location: http://192.168.64.3/capstone/capstone_main_page.html");
}
?>