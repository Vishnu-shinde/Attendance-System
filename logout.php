<?php
    
    // unset($_SESSION['username']);
    // session_destroy();       
    // echo $_SESSION['username'];

    // if (!isset($_SESSION['username'])) 
    // {
    //     $_SESSION['msg'] = "You have to log in first";
    //     header('location: index.php');
    // }
    
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
    header ("Pragma: no-cache");
    
    if(empty($_COOKIE['first_name'])) {
        header("Location:index.php");
        exit();
    }
    
    if(isset($_GET['logout'])) {
        setcookie ("first_name", "", time() - 3600);
        unset($_COOKIE);
        header("Location:index.php");
        exit();
    }
    
       
?>