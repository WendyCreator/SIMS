<?php
// require 'config.php';
$eeFname=$errLname=$errusername=$erremail=$errphone=$errpass=$errcpass='';
$table = $_SESSION['school'];
$error= false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // die();

    if(empty($_POST['firstname'])){
        $errFname = "Firstname is required!";
        $error = true;
    }else{
        $fname = cleanInputField('firstname');
    }
    
    if(empty($_POST['lastname'])){
        $errLname = "lastname is required!";
        $error = true;
    }else{
        $lname = cleanInputField('lastname');
    }
    
    if(empty($_POST['middlename'])){
        $mname = '';
    }else{
        $mname = cleanInputField('middlename');
    }
    
    
    if(empty($_POST['phone'])){
        $errphone = "Phone number is required!";
        $error = true;
    }elseif(!is_numeric($_POST['phone'])){
        $errphone = "Invalid phone number!";
        $error = true;
    }else{
        $phone = cleanInputField('phone');
    }
    
    if(empty($_POST['email'])){
        $erremail = "Email is required!";
        $error = true;
    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $erremail = "Invalid email provided!";
        $error = true;
    }else{
        $email = cleanInputField('email');
    }
    
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dob = $day.'-'.$month.'-'.$year; //05-11-1809
    
    $gender = $_POST['gender'];
    $marital = $_POST['marital'];
    $religion = $_POST['religion'];
    $nation = $_POST['nation'];
    $stateO = $_POST['stateO'];
    $lga = $_POST['lga'];
    $country = $_POST['residence'];
    $SOresidence = $_POST['SOresidence'];
    $address = cleanInputField('address');
    $success='';
    
    // $userid = date("Ymdhis").rand(102021, 192021);

    // php code for image upload

    if($_FILES['files']['name'] != ''){
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
    }
    else{
        $fileDestination = 'no image';
    }


    // Guardian information here ######################

    if(empty($_POST['Gfirstname'])){
        $errFname = "Firstname is required!";
        $error = true;
    }else{
        $gfname = cleanInputField('Gfirstname');
    }
    
    if(empty($_POST['Glastname'])){
        $errLname = "lastname is required!";
        $error = true;
    }else{
        $glname = cleanInputField('Glastname');
    }
    
    
    if(empty($_POST['Gphone'])){
        $errphone = "Phone number is required!";
        $error = true;
    }elseif(!is_numeric($_POST['Gphone'])){
        $errphone = "Invalid phone number!";
        $error = true;
    }else{
        $gphone = cleanInputField('Gphone');
    }
    
    if(empty($_POST['Gemail'])){
        $erremail = "Email is required!";
        $error = true;
    }elseif(!filter_var($_POST['Gemail'], FILTER_VALIDATE_EMAIL)){
        $erremail = "Invalid email provided!";
        $error = true;
    }else{
        $gemail = cleanInputField('Gemail');
    }

    if(empty($_POST['occupation'])){
        $errOccupation = "occupation is required!";
        $error = true;
    }else{
        $occupation = cleanInputField('occupation');
    }

    $Gaddress = cleanInputField('Gaddress');
    $relationship = $_POST['relationship'];


//  Health related data recorded

$genotype = $_POST['genotype'];
$blood = $_POST['blood'];
if(empty($_POST['allergies'])){
    $allergies = 'Nil';
}else{
    $allergies = cleanInputField('allergies');
}
if(empty($_POST['ailment'])){
    $ailment = 'Nil';
}else{
    $ailment = cleanInputField('ailment');
}
if(empty($_POST['disable'])){
    $disable = 'Nil';
}else{
    $disable = cleanInputField('disable');
}

// Academic related data here ###################

$faculty = $_POST['faculty'];
$department = $_POST['department'];
$cls = $_POST['cls'];
$yearAdd = $_POST['yearAdd'];
$course = $_POST['course'];
$gradyear = $_POST['gradyear'];
$attRate = $_POST['attRate'];
$cgpa = $_POST['cgpa'];
$matric = $_POST['matric'];



    
    if(!$error){
        $gfullname = $gfname . ' ' . $glname;

        //run SQL here.... 
        
        $sql = formQuery("INSERT INTO $table SET firstName='$fname', lastName='$lname', middleName='$mname', matricNo='$matric', DOB='$dob', demail='$email', dphone='$phone', daddress='$address', dNationality='$nation', dState='$stateO', lga ='$lga', Religion='$religion',dimage='$fileDestination', dgender= '$gender', Bloodgroup= '$blood', genotype= '$genotype', Allergies= '$allergies', Ailment= '$ailment', disabilities= '$disable', yearAdmitted= '$yearAdd', yearGraduate= '$gradyear', currentLevel= '$cls', currentCGPA= '$cgpa', courseDuration= '$course', attendanceRate= '$attRate', dFaculty= '$faculty', ddepartment= '$department', Gfullname= '$gfullname', Gemail= '$gemail', Gphone = '$gphone', Gaddress = '$Gaddress', Goccupation='$occupation', Grelationship='$relationship', dcountry='$country', stateR = '$SOresidence', dmarital = '$marital'");
        
        if($sql){
            $success = "Record inserted successfully!";
            
        }else{
            $success = "Oops! try again later"; 
            
        }
        echo $success;
    }
    







   
}







