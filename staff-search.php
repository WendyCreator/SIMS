<?php
require_once 'config.php';
$error= false;
// $sname = $alias = '';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['search'])){
         $search = cleanInputField('search');

         // Search the database...
         $school = $_SESSION['school'];
        
         $sql = formQuery("SELECT * FROM staffs WHERE dschool = '$school' AND firstName LIKE '%$search%'");
         if($sql->num_rows>0){
            $row = $sql->fetch_assoc();
            $_SESSION['searchstaff'] = 'Available';
            echo $row['lastName'];
         }
         else{
             unset($_SESSION['searchstaff']);
         }
    }

   
}

// echo $search;
