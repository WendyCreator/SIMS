<?php
session_start();
    // $host = "localhost";
    // $user = "root";
    // $pass = "";
    // $dbname = "2021batchc";

    // $conn = new mysqli($host,$user,$pass,$dbname);


    $conn=new mysqli("localhost","root","","sims");

     //check whether on localhost or online
    //  $localhost = array(
    //     '127.0.0.1',
    //     '::1'
    // );

    // if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){
    //     $conn=new mysqli("localhost","root","","2021batchb");
    // }
    // else {
    //     $conn=new mysqli("localhost","bitrrenc_test","@admin100@","bitrrenc_test");
    // }

    function cleanInputField($data){
        GLOBAL $conn;
            
        $data = $_POST[$data];    
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        $data = $conn->real_escape_string($data);

    
        return $data;
    }

    function formQuery($data){
        GLOBAL $conn;
        return $conn->query($data);
    }

    function checkEmpty($checker){
        if(empty($_POST[$checker])){
          return false;   
        } else{
          return cleanInputField($checker);
        }
        
    }