<?php include_once 'head.php';
  if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
} elseif($_SESSION['loggedin'] != true){
    header("Location:auth-lock-screen.php");
}
?>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

           <?php include_once 'header.php' ?>
            

            <!-- ========== Left Sidebar Start ========== -->
        <?php include_once 'siderbar.php' ?>
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
                                <?php $school = $_SESSION['school']  ?>
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">All <?=$school ?> SIMS Staffs</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">Users Grid</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                        <div class="col-lg-12">
                                <div class="card card-body">
                                    <!-- <h4 class="card-title">Special title treatment</h4>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p> -->
                                        <form action="" method="POST" id='search-form'>
                                            <!-- <div class="form-group my-3"> -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                     <div class="card">
                                                       <div class="card-body">
                                        <!-- <h5 class="card-title mb-4">Inline Forms With Hstack</h5> -->

                                                         <div class="hstack gap-3">
                                                            <input class="form-control me-auto" type="text" placeholder="Enter the staff userid here..."aria-label="Add your item here..." name='userid'>
                                                            <button type="submit" class="btn btn-secondary btn-sm px-5" name='searchstaff'>Search Staff</button>
                                            <!-- <div class="vr"></div> -->
                                            <!-- <button type="button" class="btn btn-outline-danger">Reset</button> -->

                                        </div>
                                        
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <input type="search" class="form-control" placeholder='Filter Staffs by name here...' id='search'>
                                                </div>
                                                
                                            <!-- </div> -->
                                        </form>
                                    <!-- <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light">Search</a> -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                                D
                                            </span>
                                        </div>
                                        <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">David McHenry</a></h5>
                                        <p class="text-muted">UI/UX Designer</p>

                                        <div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Photoshop</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">illustrator</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <?php if(isset($_POST['searchstaff'])){
                                if(!empty($_POST['userid'])){
                                    $search = cleanInputField('userid');
                           
                                    // Search the database...
                                    // $school = $_SESSION['school'];
                                   
                                    $sql = formQuery("SELECT * FROM staffs WHERE dschool = '$school' AND duserid = '$search'");
                                    if($sql->num_rows>0){
                                       $row = $sql->fetch_assoc(); ?>

<section class="col-xl-3 col-sm-6">
                                  <div>
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <?php if($row['dstatus'] == 'active'){?>
                                        <div class="alert alert-success" role="alert">
                                                <i class="mdi mdi-check-all me-2"></i>
                                                Active
                                            </div>
                                            <?php }
                                            elseif($row['dstatus'] == 'suspended'){?>
                                        <div class="alert alert-warning" role="alert">
                                        <i class="mdi mdi-alert-outline me-2"></i>
                                                Suspended
                                            </div>
                                            <?php }
                                             elseif($row['dstatus'] == 'terminated'){?>
                                        <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                                Terminated
                                            </div>
                                            <?php }?>
                                            <img class="rounded-circle avatar-sm" src="<?php echo ($row['dimage'] != 'no image')? $row['dimage'] :'assets/images/users/avatar-2.jpg'?>" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1 fullname"><a href="javascript: void(0);" class="text-dark"><?= $row['firstName'].' '.$row['lastName'] ?></a></h5>
                                        <p class="text-muted">SIMS <?=$row['drole']?></p>

                                        <div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">csc</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">ece</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">eee</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="staff-edit.php?userid=<?=$row['duserid']?>&id=<?=$row['id']?>"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="staff-profile.php?userid=<?=$row['duserid']?>&&id=<?=$row['id']?>"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                  </section>
                                   
                               <?php     }
                                   
                               }
                              }
                              
                            

                           

                            else{ 
                                  $sql = formQuery("SELECT * FROM staffs WHERE dschool = '$school'");
                                  if($sql->num_rows>0){ $num = 1;
                                      while($row=$sql->fetch_assoc()){
                                
                                          
                                  ?>
                                  <section class="col-xl-3 col-sm-6">
                                  <div>
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <?php if($row['dstatus'] == 'active'){?>
                                        <div class="alert alert-success" role="alert">
                                                <i class="mdi mdi-check-all me-2"></i>
                                                Active
                                            </div>
                                            <?php }
                                            elseif($row['dstatus'] == 'suspended'){?>
                                        <div class="alert alert-warning" role="alert">
                                        <i class="mdi mdi-alert-outline me-2"></i>
                                                Suspended
                                            </div>
                                            <?php }
                                             elseif($row['dstatus'] == 'terminated'){?>
                                        <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                                Terminated
                                            </div>
                                            <?php }?>
                                            <img class="rounded-circle avatar-sm" src="<?php echo ($row['dimage'] != 'no image')? $row['dimage'] :'assets/images/users/avatar-2.jpg'?>" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1 fullname"><a href="javascript: void(0);" class="text-dark"><?= $row['firstName'].' '.$row['lastName'] ?></a></h5>
                                        <p class="text-muted">SIMS <?=$row['drole']?></p>

                                        <div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">csc</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">ece</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">eee</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="staff-edit.php?userid=<?=$row['duserid']?>&id=<?=$row['id']?>"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="staff-profile.php?userid=<?=$row['duserid']?>&&id=<?=$row['id']?>"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                  </section>
                            
                            <?php }} }?>
                              
                            
                            <!-- <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="rounded-circle avatar-sm" src="assets/images/users/avatar-3.jpg" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">Rafael Morales</a></h5>
                                        <p class="text-muted">Backend Developer</p>

                                        <div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Php</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Java</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Python</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-success bg-soft text-success font-size-16">
                                                M
                                            </span>
                                        </div>
                                        <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">Mark Ellison</a></h5>
                                        <p class="text-muted">Full Stack Developer</p>

                                        <div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Ruby</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Php</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">2 + more</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- end row -->
<!-- 
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="rounded-circle avatar-sm" src="assets/images/users/avatar-4.jpg" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">Minnie Walter</a></h5>
                                        <p class="text-muted">Frontend Developer</p>

                                        <div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Html</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Css</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">2 + more</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="rounded-circle avatar-sm" src="assets/images/users/avatar-5.jpg" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">Shirley Smith</a></h5>
                                        <p class="text-muted">UI/UX Designer</p>

                                        <div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Photoshop</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">illustrator</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-info bg-soft text-info font-size-16">
                                                J
                                            </span>
                                        </div>
                                        <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">John Santiago</a></h5>
                                        <p class="text-muted">Full Stack Developer</p>

                                        <div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Ruby</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Php</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">2 + more</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="rounded-circle avatar-sm" src="assets/images/users/avatar-7.jpg" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">Colin Melton</a></h5>
                                        <p class="text-muted">Backend Developer</p>

                                        <div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Php</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Java</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">Python</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="text-center my-3">
                                    <a href="javascript:void(0);" class="text-success"><i class="bx bx-hourglass bx-spin me-2"></i> Load more </a>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © SIMS.
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
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script>
            const search = document.querySelector('#search');
            const searchForm  = document.querySelector('#search-form');
            const fullnames  = document.querySelectorAll('.fullname');

            search.addEventListener('input',(e)=>{
                fullnames.forEach(fullname=>{
                    const fullInner = fullname.innerText.toLowerCase();
                    const filterText = e.target.value.toLowerCase();
                    // console.log(filterText)
                    if(fullInner.includes(filterText)){
                        fullname.closest('section').style.display = ''
                           }else{
                             fullname.closest('section').style.display = 'none' 
                            }
                })
                // ajaxSend();
            })

            function ajaxSend(){
                $.ajax({
            url:'staff-search.php',
            type:'post',
            data:{
                search:search.value
            },
            success: function(data, status){
                  console.log("Data: " + data + "\nStatus: " + status);
                }
            })
            }
        </script>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/contacts-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:42 GMT -->
</html>
