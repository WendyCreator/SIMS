<?php
require_once 'config.php';
$error= false;
// $sname = $alias = '';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['matric'])){
        $matric = $_POST['matric'];
        $id = $_POST['id'];
        
        $fullname = $_POST['fullname'];
        $school = $_POST['school'];
        $fullname = $_POST['fullname'];
        if(empty($_POST['comment'])){
            $error = true;
            $_SESSION['redmsg'] = 'Please provide a comment';
            header("Location:setred.php?matric=$matric&id=$id&school=$school");
        }else{
            $comment = cleanInputField('comment');
        }
        if(empty($_POST['userid'])){
            $error = true;
            $_SESSION['redmsg'] = 'Please provide your userid';
            header("Location:setred.php?matric=$matric&id=$id&school=$school");

        }else{
            $userid = cleanInputField('userid');
        }

        if(!$error){
           if($userid !== $_SESSION['userid']){
            $_SESSION['redmsg'] = 'inappropraite userid!';
           }else{
              // Write sql code

              // Check if student alreeady has a red flag and append...

              $collect = formQuery("SELECT * FROM redflag WHERE matricNo = '$matric'");
              if($collect->num_rows>0){
                $row = $collect->fetch_assoc(); 
               $newcomment =  $row['dcomment'] .' | '. $comment;
               $newuserid = $row['setBy']. ' | ' . $userid;
           
               $update = formQuery("UPDATE redflag SET dcomment = '$newcomment', setBy = '$newuserid' WHERE matricNo ='$matric'");
               if($update){
                $_SESSION['redmsg'] = 'Red flag updated successfully'; 
            header("Location:setred.php?matric=$matric&id=$id&school=$school");
              }else{
                $_SESSION['redmsg'] = 'Could not update Red flag try again'; 
                header("Location:setred.php?matric=$matric&id=$id&school=$school"); 
              }
            }
            else{
                
                // Student does not have a red flag. create a new one ...

                $sql = formQuery("INSERT INTO redflag SET matricNo = '$matric', fullName = '$fullname', dcomment = '$comment', setBy = '$userid'");
                $sql2 = formQuery("UPDATE $school SET Redflag = 1 ");
                if($sql and $sql2){
                  $_SESSION['redmsg'] = 'Red flag set successfully'; 
              header("Location:setred.php?matric=$matric&id=$id&school=$school");
            }else{
                $_SESSION['redmsg'] = 'Seems we have a server problem!';
            header("Location:setred.php?matric=$matric&id=$id&school=$school");

              }

              }
           }
        }
    }



}

