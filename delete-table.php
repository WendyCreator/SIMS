<?php
require_once 'config.php';
$error= false;
$sname = $alias = '';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // die();

    if(empty($_POST['school'])){
        // $errFname = "Firstname is required!";
        $error = true;
    }else{
        $sname = cleanInputField('school');
    }
    
  
   
    
    
    if(empty($_POST['alias'])){
        // $errusername = "Username is required!";
        $error = true;
    }else{
        $alias = cleanInputField('alias');
    }
if(!$error){

    // Check if table exists;
    // $check = formQuery("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = $alias");
    $check = formQuery("SHOW TABLES LIKE '$alias'");
    if($check->num_rows == 1){
        // Drop sql table
        $sql = formQuery("DROP TABLE $alias");
        if($sql){

        $_SESSION['create'] = "<p class='text-primary'>$sname deleted successfully. Thank you. </p>";
        header("Location:add-school.php");
    } else{
    
        $_SESSION['create'] = "<p class='text-danger'> Problem adding $sname. Please try again </p>";
        header("Location:add-school.php");

    }

    }else{
        

        // Table does not exist message
        
                $_SESSION['create'] = "<p class='text-danger'> it Seems $sname does not exist in our database. Thank you </p>";
                header("Location:add-school.php");

        

      
    
    }
   
    
       

}
}