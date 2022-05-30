<?php
require_once 'config.php';
$error= false;
$sname = $alias = '';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // die();

    if(empty($_POST['schoolname'])){
        // $errFname = "Firstname is required!";
        $error = true;
    }else{
        $sname = cleanInputField('schoolname');
    }
    
  
   
    
    
    if(empty($_POST['alias'])){
        // $errusername = "Username is required!";
        $error = true;
    }else{
        $alias = strtolower(str_replace(' ','', cleanInputField('alias')));
    }
if(!$error){

    // Check if table exists;
    // $check = formQuery("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = $alias");
    $check = formQuery("SHOW TABLES LIKE '$alias'");
    if($check->num_rows == 1){
        $_SESSION['create'] = "<p class='text-danger'> It seems $sname already exist. Thank you. </p>";
        header("Location:add-school.php");

    }else{
        // Create sql table
        $sql = formQuery("CREATE TABLE $alias AS SELECT * FROM uniosun");

        // Delete duplicated values

        $sql2 = formQuery("DELETE FROM $alias");

        if($sql){
    
            $_SESSION['create'] = "<p class='text-success'> $sname has been added successfully. Thank you </p>";
            header("Location:add-school.php");
        } else{
    
            $_SESSION['create'] = "<p class='text-danger'> Problem adding $sname. Please try again </p>";
            header("Location:add-school.php");

        }
    }
   
    
       

}
}