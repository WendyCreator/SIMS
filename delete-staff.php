<?php
include 'config.php';


    if(isset($_GET['userid']) AND !empty($_GET['id']) 
    AND isset($_GET['userid']) AND !empty($_GET['id'])){
        $userid = $_GET['userid'];
        $id = $_GET['id'];

        $sql = $conn->query("DELETE FROM staffs WHERE duserid='$userid' AND id='$id' ");

        if($sql){
            header("Location:staff-view.php");
        }else{
            //return error message
            $_SESSION['update'] = "<p class='text-danger'>Could not complete this action!</p>";
            header("Location:staff-profile.php?userid=$userid&id=$id");
        }



    }


