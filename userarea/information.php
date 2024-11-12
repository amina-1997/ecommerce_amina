<?php


session_start();
if(isset($_SESSION['username'])){

    echo "welcome ".$_SESSION['username'];

    echo"<br>";
    echo "your password is saved ".$_SESSION['password'];
    
    echo"<br>";
    echo "your email is saved ".$_SESSION['email'];
    
    
}else{
    echo"login again to continue";
}







?>