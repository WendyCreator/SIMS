<?php
require 'config.php';
$eeFname=$errLname=$errusername=$erremail=$errphone=$errpass=$errcpass='';
$error= false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // die();

    if(empty($_POST['firstname'])){
        $errFname = "Firstname is required!";
        $error = true;
    }else{
        $fname = cleanInputField('firstname');
    }
    
    if(empty($_POST['lastname'])){
        $errLname = "lastname is required!";
        $error = true;
    }else{
        $lname = cleanInputField('lastname');
    }
    
    
    
    if(empty($_POST['username'])){
        $errusername = "Username is required!";
        $error = true;
    }else{
        $username = strtolower(str_replace(' ','', cleanInputField('username')));
    }
    
    
    if(empty($_POST['phone'])){
        $errphone = "Phone number is required!";
        $error = true;
    }elseif(!is_numeric($_POST['phone'])){
        $errphone = "Invalid phone number!";
        $error = true;
    }else{
        $phone = cleanInputField('phone');
    }
    
    if(empty($_POST['email'])){
        $erremail = "Email is required!";
        $error = true;
    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $erremail = "Invalid email provided!";
        $error = true;
    }else{
        $email = cleanInputField('email');
    }
    
    // $day = $_POST['day'];
    // $month = $_POST['month'];
    // $year = $_POST['year'];
    // $dob = $day.'-'.$month.'-'.$year; //05-11-1809
    
    $role = $_POST['role'];
    $school = $_POST['school'];
    
    
    if(empty($_POST['pass'])){
        $errpass = "Password is required!";
        $error = true;
    }elseif(strlen($_POST['pass'])<3){
        $errpass = "Password is too short!";
        $error = true;
    }else{
        $pass = cleanInputField('pass');
    }
    
    if(empty($_POST['cpass'])){
        $errcpass = "Confirm Password is required!";
        $error = true;
    }elseif(empty($errpass)){
        $cpass = cleanInputField('cpass');
        if($pass != $cpass){
            $errcpass = "Password does not match!";
            $error = true;
        }
    }

    
    
    
    // $gender = cleanInputField('gender');
    $address = cleanInputField('address');
    $success='';
    
    $userid = date("Ymdhis").rand(102021, 192021);

    // php code for image upload

    if($_FILES['files']['name'] != ''){
        $files = $_FILES['files'];
        $fileName = $_FILES['files']['name'];
        $fileType = $_FILES['files']['type'];
        $fileTemp = $_FILES['files']['tmp_name'];
        $fileSize = $_FILES['files']['size'];
        $fileError = $_FILES['files']['error'];
     
       
     
        $fileExt = explode('.', $fileName);
        $fileExtention = strtolower(end($fileExt));
        $allowed = array("jpg", "png", "jpeg",'gif');
     
        if(in_array($fileExtention, $allowed)){
            
            if($fileError === 0){
                
                if($fileSize < 1000000000){
                    $fileNewName = date('ymdhis').rand(1000, 5000).'.'.$fileExtention;
                    $fileDestination = 'uploads/'.$fileNewName;
                    move_uploaded_file($fileTemp, $fileDestination);
                } else{
                    echo "File is too big";
                    $error = true;
                }
            } else{
                echo "There is a problem with this file";
                $error = true;
            }
     
        } else{
            echo "$fileExtention File type not allowed!";
            $error = true;
        }
    }
    else{
        $fileDestination = 'no image';
    }
    
    if(!$error){
        $pass = md5($pass);
        //run SQL here.... 
        
        $sql = formQuery("INSERT INTO staffs SET duserid='$userid', firstName='$fname', lastName='$lname', userName='$username', demail='$email', dphone='$phone', daddress='$address', dpassword ='$pass', drole='$role', dschool='$school',dimage='$fileDestination' ");
        
        if($sql){
            $success = "Record inserted successfully!";
            
        }else{
            $success = "Oops! try again later"; 
            
        }
        echo $success;
    }
    







   
}







