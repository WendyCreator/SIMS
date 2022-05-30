<?php
// session_start();
include 'config.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['update'])){
        $error = false;
        $fname = checkEmpty('firstname');
        
        $lname = checkEmpty('lastname');
        $phone = checkEmpty('phone');
        // $username = checkEmpty($_POST['username']);
        $username = strtolower(str_replace(' ','', checkEmpty('username')));
        $userid = $_POST['user'];
        $id = $_POST['id'];

        // $role = checkEmpty($_POST['role']);
        // $userid =  $_SESSION['userid'];
        // $hash =  $_SESSION['password'];
        // $dob = $_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
        $address = checkEmpty('address');

        
        
        if(!empty($_FILES['files']['name'])){
     
            $error = false;
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
                        // echo $fileDestination;
                       
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
            // if($error){
            //  echo 'yes';
            // }
                $sqlSelect = $conn->query("SELECT * FROM staffs WHERE duserid = '$userid' AND id ='$id' ");
                $row=$sqlSelect->fetch_assoc();
               
         if($error === false){
                if($row['dimage']){
                   unlink($row['dimage']); 
                }
            $dfileDestination = $fileDestination;
         }else{
            $dfileDestination = $row['dimage'];
        }
    } else{
        $sqlSelect = $conn->query("SELECT * FROM staffs WHERE duserid = '$userid' AND id='$id' ");
        $row=$sqlSelect->fetch_assoc();
        $dfileDestination = $row['dimage'];
       }  
      
         
        
       
         
        if($fname == false || $lname == false || $phone == false || $username == false|| $address == false || $error == true){
          $_SESSION['checker'] = "<p class='text-danger'>Please check for Empty fields!</p>";
          header("Location: staff-edit.php?userid=$userid&id=$id");

        }else{
         
        $sql = $conn->query("UPDATE staffs SET firstName='$fname', lastName='$lname', userName='$username', dphone='$phone', daddress='$address',dimage = '$dfileDestination' WHERE duserid='$userid' AND id='$id' ");
        
        if($sql){
            $_SESSION['checker'] = "<p class='text-success'>Updated successfully!</p>";
            // echo $_SESSION['success'];
            header("Location: staff-edit.php?userid=$userid&id=$id");
            // header("Location:edit?mercy=$userid&emma=$hash");
        }else{
            //return error message
            $_SESSION['checker'] = "<p class='text-danger'>Invalid details provided!</p>";
            header("Location: staff-edit.php?userid=$userid&id=$id");
        
            // echo $_SESSION['success'];
            // header("Location:index");
        }



    }
}
echo $_SESSION['checker'];
}

