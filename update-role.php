<?php
session_start();
include 'config.php';
$userid = $_GET['userid'];
$id = $_GET['id'];

if($_GET['role'] == 'promote'){
    


        $sql = $conn->query("UPDATE staffs SET drole='admin' WHERE duserid='$userid' AND id='$id' ");
        
        if($sql){
            $_SESSION['update'] = "<p class='text-success'>Updated successfully!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }else{
            //return error message
            $_SESSION['update'] = "<p class='text-danger'>Action could not be completed!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }



    }
    elseif($_GET['role'] == 'demote'){
    


        $sql = $conn->query("UPDATE staffs SET drole='staff' WHERE duserid='$userid' AND id='$id' ");
        
        if($sql){
            $_SESSION['update'] = "<p class='text-success'>Updated successfully!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }else{
            //return error message
            $_SESSION['update'] = "<p class='text-danger'>Action could not be completed!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }



    }


