<?php
// session_start();
include 'config.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $matric = $_POST['matric'];
    $id = $_POST['id'];
    $school = $_POST['school'];
    if(isset($_POST['update'])){
        $error = false;
        $fname = checkEmpty('firstname');
        $lname = checkEmpty('lastname');
        $phone = checkEmpty('phone');
        $email = checkEmpty('email');
        $address = checkEmpty('address');
        $dob = checkEmpty('dob');
        $religion = checkEmpty('religion');
        $nation = checkEmpty('nation');
        $state = checkEmpty('state');
        $lga = checkEmpty('lga');
        $marital = checkEmpty('marital');
        $mname = cleanInputField('midname');
        
        $bloodgroup = checkEmpty('bloodgroup');
        $genotype = checkEmpty('genotype');
        $allergy = checkEmpty('allergy');
        $ailment = checkEmpty('ailment');
        $disable = checkEmpty('disable');
        
        $yearadd = checkEmpty('yearadd');
        $yeargrad = checkEmpty('yeargrad');
        $current = checkEmpty('currentlevel');
        $currentcgpa = checkEmpty('currentcgpa');
        $courseduration = checkEmpty('courseduration');
        $attendance = checkEmpty('attendance');
        $faculty = checkEmpty('faculty');
        $department = checkEmpty('department');
        $redflag = checkEmpty('red');
       

        $gfullname = checkEmpty('gfullname');
        $gemail = checkEmpty('gemail');
        $gphone = checkEmpty('Gphone');
        $gaddress = checkEmpty('Gaddress');
        $relationship = checkEmpty('relation');
        // $username = checkEmpty($_POST['username']);
        // $username = strtolower(str_replace(' ','', checkEmpty('username')));
        // $userid = $_POST['user'];
        // $id = $_POST['id'];

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
                        $fileDestination = 'upload/'.$fileNewName;
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
                $sqlSelect = $conn->query("SELECT * FROM $school WHERE matricNo = '$matric' AND id ='$id' ");
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
        $sqlSelect = $conn->query("SELECT * FROM $school WHERE matricNo = '$matric' AND id='$id' ");
        $row=$sqlSelect->fetch_assoc();
        $dfileDestination = $row['dimage'];
       }  
      
         
        // echo $dfileDestination;
       
         
        if($fname == false || $lname == false || $phone == false || $email == false|| $address == false || $dob == false || $nation == false || $religion == false || $state == false || $lga == false || $marital == false || $bloodgroup == false || $genotype == false || $allergy == false || $ailment == false || $disable == false || $yearadd == false || $yeargrad == false || $current == false || $currentcgpa == false || $attendance == false || $faculty == false || $department == false || $courseduration == false || $gfullname == false || $gemail == false || $gphone == false || $gaddress == false || $relationship == false || $error == true){
          $_SESSION['schecker'] = "<p class='text-danger'>Please check for Empty fields!</p>";
        //   echo $_SESSION['schecker'] ;
          header("Location: student-edit.php?matric=$matric&id=$id&school=$school");

        }else{
         
        // $sql = $conn->query("UPDATE staffs SET firstName='$fname', lastName='$lname', userName='$username', dphone='$phone', daddress='$address',dimage = '$dfileDestination' WHERE duserid='$userid' AND id='$id' ");

        $sql = formQuery("UPDATE $school SET firstName='$fname', lastName='$lname', middleName='$mname', DOB='$dob', demail='$email', dphone='$phone', daddress='$address', dNationality='$nation', dState='$state', lga ='$lga', Religion='$religion',dimage='$dfileDestination', Bloodgroup= '$bloodgroup', genotype= '$genotype', Allergies= '$allergy', Ailment= '$ailment', disabilities= '$disable', yearAdmitted= '$yearadd', yearGraduate= '$yeargrad', currentLevel= '$current', currentCGPA= '$currentcgpa', courseDuration= '$courseduration', attendanceRate= '$attendance', dFaculty= '$faculty', ddepartment= '$department', Gfullname= '$gfullname', Gemail= '$gemail', Gphone = '$gphone', Gaddress = '$gaddress', Grelationship='$relationship', dmarital = '$marital'");
        
        if($sql){
            $_SESSION['schecker'] = "<p class='text-success'>Updated successfully!</p>";
            // echo $_SESSION['success'];
            header("Location: student-edit.php?matric=$matric&id=$id&school=$school");

            // header("Location:edit?mercy=$userid&emma=$hash");
        }else{
            //return error message
            $_SESSION['schecker'] = "<p class='text-danger'>Invalid details provided!</p>";
            header("Location: student-edit.php?matric=$matric&id=$id&school=$school");

        
            // echo $_SESSION['success'];
            // header("Location:index");
        }



    }
}
echo $_SESSION['schecker'];
}

