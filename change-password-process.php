
<?php
    session_start();
    require 'config.php';

    $userid = $_SESSION['userid'];
    $email = $_SESSION['email'];

    if(isset($_POST['submit'])){
        $old = md5(cleanInputField("oldpass"));
        $pass = md5(cleanInputField("newpass"));
        $cpass = md5(cleanInputField("cnewpass"));
      if($pass === $cpass){
        $sql = formQuery("SELECT * FROM staffs WHERE dpassword ='$old' ");

          if($sql->num_rows>0){
            //
            formQuery("UPDATE staffs SET dpassword ='$pass' WHERE duserid='$userid' AND demail='$email'");
            $_SESSION['err'] = "<p class='text-success'>Password changed successfully!</p>";
          }else{
             //error message here
        $_SESSION['err'] = "<p class='text-danger'>Current password is not correct</p>";
      }
    }else{
    //error message here
     $_SESSION['err'] = "<p class='text-danger'>Passwords do not match!</p>";
    }
 }
      
header("Location: auth-recoverpw.php");