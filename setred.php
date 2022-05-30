<?php include_once 'head.php';
  if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
} elseif($_SESSION['loggedin'] != true){
    header("Location:auth-lock-screen.php");
}
?>
<!-- Sweet Alert-->
<!-- <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" /> -->


    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

           <?php include_once 'header.php';
             
           ?>
            

            <!-- ========== Left Sidebar Start ========== -->
             <?php include_once 'siderbar.php';
          
             ?>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <?php
           $matric = $_GET['matric'];
           $id = $_GET['id'];
           $school = $_GET['school'];
           $sql = formQuery("SELECT * FROM $school WHERE matricNo = '$matric' AND id = '$id'");
           if($sql->num_rows > 0){
              
               $row= $sql->fetch_assoc(); 
?>
                <div class="card">
                <?php if(isset($_SESSION['redmsg']) and !empty($_SESSION['redmsg'])){ ?>
                            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                                <i class="mdi me-2"></i>
                                                <?php echo $_SESSION['redmsg'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                            <!-- <span class='alert alert-danger my-2 d-block'></span> -->
                        <?php } ?>
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"> Set Red flag</h4>
                                        

                                        <div class="card mfp-hide mfp-popup-form mx-auto" id="test-form">
                                            <div class="card-body">
                                                <h4 class="mb-4 text-danger">You are setting a red flag for <?=$row['lastName'].' '. $row['firstName']?>. Please state your reason and provide your userid</h4> 
                                                <form action='redflag.php' method='post' id='red-flag' class='my-form'>
                                                    <div class="row">
                                                        <input type="hidden" value=<?=$row['matricNo']?> name='matric' id='my-matric'>
                                                        <input type="hidden" value=<?=$row['id']?> name='id' id='my-id'>
                                                        <input type="hidden" value=<?=$row['school']?> name='school' id='my-school'>
                                                        <input type="hidden" value="<?=$row['lastName'].' '. $row['firstName']?>" name='fullname' id='my-fullname'>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                            <label for="reason" class="form-label">Comment on Redflag</label>
                                                             <textarea name="comment" id="reason" cols="30" rows="10" class='form-control'></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="my-userid" class="form-label">Staff Userid</label>
                                                                <input type="text" class="form-control" id="my-userid" placeholder=" Please provide your staff userid.." name='userid'>
                                                                <!-- <input type="text" class="form-control" id="password" placeholder=" Please provide your staff userid.." name='' value=> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                     

                                                    <div class="text-end">
                                                        <a href="student-edit.php?matric=<?=$row['matricNo']?>&id=<?=$row['id']?>&school=<?=$row['school']?>" class="btn btn-primary btn-lg">Go Back</a>
                                                        <button type="submit" class="btn btn-danger btn-lg" name='setred' id='set-red'>Set Redflag</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>



               </div>
          </div>
     </div>
   </div>
   <?php } 
   unset($_SESSION['redmsg']);
   ?>
  </div>
</div>