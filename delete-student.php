<?php
include 'config.php';


     $school = $_GET['school']; 
    if(isset($_GET['matric']) AND !empty($_GET['matric']) 
    AND isset($_GET['id']) AND !empty($_GET['id'])){
        $matric = $_GET['matric'];
        $id = $_GET['id'];

        $sql = $conn->query("DELETE FROM $school WHERE matricNo='$matric' AND id='$id' ");

        if($sql){
            header("Location:student-view.php");
        }else{
            //return error message
            $_SESSION['update'] = "<p class='text-danger'>Could not complete this action!</p>";
            header("Location:student-profile.php?matric=$userid&id=$id&school=$school");
        }



    }


