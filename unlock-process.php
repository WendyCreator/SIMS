
<?php

session_start();

if(isset($_POST['unlock'])){
    $unlockpass = md5($_POST['password']);
    if($unlockpass == $_SESSION['password']){
        $_SESSION['loggedin'] = true;
        header("Location:dashboard-saas.php");
    }else{
        $_SESSION['msg'] = 'Invalid password ';
        header("Location:auth-lock-screen.php");
    }
}