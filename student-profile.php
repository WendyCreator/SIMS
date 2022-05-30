<?php include_once 'head.php';
  if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
} elseif($_SESSION['loggedin'] != true){
    header("Location:auth-lock-screen.php");
}
?>
<link rel="stylesheet" href="style.css">
    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

           <?php include_once 'header.php' ?>
            

            <!-- ========== Left Sidebar Start ========== -->
        <?php include_once 'siderbar.php' ?>
            <!-- Left Sidebar End -->

            <?php 
            if(isset($_POST['search'])){
                        $theschool = $_POST['school'];
                        $matric = cleanInputField('matric');
                        // $id = $_GET['id'];
                        // $school = $_SESSION['school'];
                        $sql = formQuery("SELECT * FROM $theschool WHERE matricNo = '$matric'");
                        if($sql->num_rows>0){
                        $row= $sql->fetch_assoc();
                        $fullname = $row['firstName'].' '. $row['middleName'] .' '. $row['lastName'];
                        $semifullname = $row['lastName'].' '.$row['firstName'];
                    
                         ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <?php if($row['Redflag']){ ?>
                    
                    <div class="alert alert-danger" role="alert" style='background-color:rgb(210,10,10)'>
                                                <i class="mdi mdi-block-helper me-2"></i>
                                                <h3 class='text-center text-white'>Red Flag!!!</h3>
                                                
                                            </div>
                                            <div>
                                                <a href="red-details.php?matric=<?=$row['matricNo']?>" class='btn btn-danger'>View red comment</a>
                                            </div>
                                            <?php } ?>
                        <!-- start page title -->
                        <div class="row">
                            <?php if($row['school'] == $_SESSION['school']){ ?>

                                <div class="d-grid gap-2 my-3">
                                            <a href="student-edit.php?matric=<?=$row['matricNo']?>&id=<?=$row['id']?>&school=<?=$row['school']?>" class="btn btn-primary btn-lg waves-effect waves-light">Edit Student Profile</a>
                                        </div>
                            <?php } ?>
                        <div class="col-md-6">
                                                <div class="mt-4 mt-md-0">
                                                    <img class="rounded-circle avatar-xl" alt="200x200" src="<?php echo ($row['dimage'] != 'no image')?$row['dimage']:'assets/images/users/avatar-4.jpg'?>" data-holder-rendered="true">
                                                </div>
                                            </div>
                            <div class="col-6">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"> Student Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                   

                       
                        <h3><?=$semifullname?>'s Information</h3>

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>It will seem like simplified</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="<?=  $row['dimage'] ?>" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate"><?=  $row['firstName'] ?></h5>
                                                <p class="text-muted mb-0 text-truncate"><?= $row['school'] ?></p>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">
                                                   
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">20</h5>
                                                            <p class="text-muted mb-0">Projects</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">325</h5>
                                                            <p class="text-muted mb-0">Classes</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>

                                        <p class="text-muted mb-4">Hi I'm <?=$semifullname?>, has been the industry's standard dummy text To an English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td><?=$fullname?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td><?php echo $row['dphone'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td><?php echo  $row['demail'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Matric Number :</th>
                                                        <td><?php echo  $row['matricNo'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Location :</th>
                                                        <td><?php echo  $row['daddress'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Date of Birth :</th>
                                                        <td><?php echo  $row['DOB'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Gender :</th>
                                                        <td><?php echo  $row['dgender'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Religion :</th>
                                                        <td><?php echo  $row['Religion'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nationality :</th>
                                                        <td><?php echo  $row['dNationality'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">State of Origin :</th>
                                                        <td><?php echo  $row['dState'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Local Government Area :</th>
                                                        <td><?php echo  $row['lga'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Marital Status :</th>
                                                        <td><?php echo  $row['dmarital'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Country of Residence :</th>
                                                        <td><?php echo  $row['dcountry'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">State of Residence :</th>
                                                        <td><?php echo  $row['stateR'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                
                                    <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Parent/Guardian Information</h4>

                                        <p class="text-muted mb-4">This information provided are specific to <?=$semifullname?></p>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td><?=$row['Gfullname']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td><?php echo $row['Gphone'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td><?php echo  $row['Gemail'] ?></td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <th scope="row">Location :</th>
                                                        <td><?php echo  $row['Gaddress'] ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th scope="row">Religion :</th>
                                                        <td><?php echo  $row['Religion'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Occupation :</th>
                                                        <td><?php echo  $row['Goccupation'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Relationship :</th>
                                                        <td><?php echo  $row['Grelationship'] ?></td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                    

                                <!-- <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">Experience</h4>
                                        <div class="">
                                            <ul class="verti-timeline list-unstyled">
                                                <li class="event-list active">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <i class="bx bx-server h4 text-primary"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Back end Developer</a></h5>
                                                                <span class="text-primary">2016 - 19</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="event-list">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <i class="bx bx-code h4 text-primary"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Front end Developer</a></h5>
                                                                <span class="text-primary">2013 - 16</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="event-list">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <i class="bx bx-edit h4 text-primary"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"></a></h5>
                                                                <span class="text-primary">2018 - present</span>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>   -->
                                <!-- end card -->
                            </div>         
                            
                            <div class="col-xl-8">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium mb-2">Completed Courses</p>
                                                        <h4 class="mb-0">90</h4>
                                                    </div>
        
                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-check-circle font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium mb-2">Pending Courses</p>
                                                        <h4 class="mb-0">12</h4>
                                                    </div>
        
                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-hourglass font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium mb-2">Total courses</p>
                                                        <h4 class="mb-0">102</h4>
                                                    </div>
        
                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-package font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </div> -->
                                <!-- <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Attendance Rate (monthly)</h4>
                                        <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Academic Information</h4>

                                        <p class="text-muted mb-4">Kindly note that the information provided below are specific to  <?=$semifullname?> The data has been vetted and certified legitmate. Please ensure the appropriate use of this information as misuse will lead to serious penalties </p>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                <tr>
                                                        <th scope="row">Faculty :</th>
                                                        <td><?php echo  $row['dFaculty'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Department :</th>
                                                        <td><?php echo  $row['ddepartment'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Current Level of Studies :</th>
                                                        <td><?=$row['currentLevel']?> Level</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Course Duration :</th>
                                                        <td><?php echo $row['courseDuration'] ?> Years</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Year Admitted:</th>
                                                        <td><?php echo  $row['yearAdmitted'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Expected Year of Graduation :</th>
                                                        <td><?php echo  $row['yearGraduate'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Attendance Rate :</th>
                                                        <td><?php echo  $row['attendanceRate'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Current CGPA :</th>
                                                        <td><?php echo  $row['currentCGPA'] ?></td>
                                                    </tr>
                                                    <tr>
                                                    <tr>
                                                        <th scope="row">Matric Number :</th>
                                                        <td><?php echo  $row['matricNo'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Date Registered :</th>
                                                        <td><?php echo $row['regdate'] ?></td>
                                                    </tr>
                                                  
                                                    
                                                       
                                            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Health Related Information</h4>

                                        <p class="text-muted mb-4">The following information are specific to <?=$semifullname?>. Kindly note that these information has been verified by certified health practitioners</p>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Blood Group :</th>
                                                        <td><?=$row['Bloodgroup']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Genotype :</th>
                                                        <td><?php echo $row['genotype'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Allergies :</th>
                                                        <td><?php echo  $row['Allergies'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Ailments :</th>
                                                        <td><?php echo  $row['Ailment'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Disabilities :</th>
                                                        <td><?php echo  $row['disabilities'] ?></td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Attendance Rate (monthly)</h4>
                                        <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>



                                </div>

                                
                                   
                                </div>

                                

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><?= $row['firstName'] ?>'s Projects</h4>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Projects</th>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">Deadline</th>
                                                        <th scope="col">Budget</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Skote admin UI</td>
                                                        <td>2 Sep, 2019</td>
                                                        <td>20 Oct, 2019</td>
                                                        <td>$506</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Skote admin Logo</td>
                                                        <td>1 Sep, 2019</td>
                                                        <td>2 Sep, 2019</td>
                                                        <td>$94</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Redesign - Landing page</td>
                                                        <td>21 Sep, 2019</td>
                                                        <td>29 Sep, 2019</td>
                                                        <td>$156</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>App Landing UI</td>
                                                        <td>29 Sep, 2019</td>
                                                        <td>04 Oct, 2019</td>
                                                        <td>$122</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">5</th>
                                                        <td>Blog Template</td>
                                                        <td>05 Oct, 2019</td>
                                                        <td>16 Oct, 2019</td>
                                                        <td>$164</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">6</th>
                                                        <td>Redesign - Multipurpose Landing</td>
                                                        <td>17 Oct, 2019</td>
                                                        <td>05 Nov, 2019</td>
                                                        <td>$192</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">7</th>
                                                        <td>Logo Branding</td>
                                                        <td>04 Nov, 2019</td>
                                                        <td>05 Nov, 2019</td>
                                                        <td>$94</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <
                <!-- End Page-content -->
 <?php
 } 
 else{
     echo '<div class="account-pages my-5 pt-5">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="text-center mb-5">
                     <h1 class="display-2 fw-medium">5<i class="bx bx-buoy bx-spin text-primary display-3"></i>0</h1>
                     <h4 class="text-uppercase">This record was not found in our database!</h4>
                     <div class="mt-5 text-center">
                         <a class="btn btn-primary waves-effect waves-light" href="dashboard-saas.php">Back to Dashboard</a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-md-8 col-xl-6">
                 <div>
                     <img src="assets/images/error-img.png" alt="" class="img-fluid">
                 </div>
             </div>
         </div>
     </div>
 </div>';
 }
}

?>
                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/profile.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/contacts-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:04:39 GMT -->
</html>
