<?php
session_start();
include 'config.php';
$userid = $_GET['userid'];
$id = $_GET['id'];

if($_GET['status'] == 'suspend'){
    


        $sql = $conn->query("UPDATE staffs SET dstatus='suspended' WHERE duserid='$userid' AND id='$id' ");
        
        if($sql){
            $_SESSION['update'] = "<p class='text-success'>Updated successfully!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }else{
            //return error message
            $_SESSION['update'] = "<p class='text-danger'>Action could not be completed!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }



    }
    elseif($_GET['status'] == 'terminate'){
    


        $sql = $conn->query("UPDATE staffs SET dstatus='terminated' WHERE duserid='$userid' AND id='$id' ");
        
        if($sql){
            $_SESSION['update'] = "<p class='text-success'>Updated successfully!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }else{
            //return error message
            $_SESSION['update'] = "<p class='text-danger'>Action could not be completed!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }



    }
    elseif($_GET['status'] == 'restore'){
    


        $sql = $conn->query("UPDATE staffs SET dstatus='active' WHERE duserid='$userid' AND id='$id' ");
        
        if($sql){
            $_SESSION['update'] = "<p class='text-success'>Updated successfully!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }else{
            //return error message
            $_SESSION['update'] = "<p class='text-danger'>Action could not be completed!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }



    }


