<?php
session_start();
require_once 'config.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
   
    if(isset($_POST['login'])){

        $user = cleanInputField("user");
        $pass = md5(cleanInputField("pass"));

        ;
        //check
        $_SESSION['error'] = '';
        $sql = formQuery("SELECT * FROM staffs WHERE (demail='$user' OR userName='$user') AND dpassword='$pass'");

        if($sql->num_rows>0){
            //correct take user to profile page
            $row = $sql->fetch_assoc();
            
            $_SESSION['status'] = $row['dstatus'];
           
            if($_SESSION['status']=='active'){
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$row['demail'];
                $_SESSION['userid']=$row['duserid'];
                $_SESSION['username']=$row['userName'];
                $_SESSION['role']=$row['drole'];
                $_SESSION['password'] = $row['dpassword'];
                $_SESSION['school']=$row['dschool'];
                $_SESSION['phone']=$row['dphone'];
                $_SESSION['address']=$row['daddress'];
                $_SESSION['image']=$row['dimage'];
                $_SESSION['fullname']=$row['firstName'].' '.$row['lastName'];
                header("Location:dashboard-saas.php");
            } else{
                // unset($_SESSION['loggedin']);
                header('Location:page-404.php');
            }

        }else{
            $_SESSION['error'] = "Sorry! this account doesn't exist";
            header("location: index.php");
        }
    }

    

}




