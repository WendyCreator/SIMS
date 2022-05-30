<?php include_once 'head.php';
  if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
} elseif($_SESSION['loggedin'] != true){
    header("Location:auth-lock-screen.php");
}
?>
        <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

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
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Students List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">Students List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Search for Student</h4>
                                        <div>
                                            <a class="popup-form btn btn-primary" href="#test-form">Click Search For Student</a>
                                        </div>

                                        <div class="card mfp-hide mfp-popup-form mx-auto" id="test-form">
                                            <div class="card-body">
                                                <h4 class="mb-4">Form</h4> 
                                                <form action='student-profile.php' method='post'>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                            <label for="formrow-school" class="form-label">School</label>
                                                             <select id="formrow-school" class="form-select" name='school'>
                                                                <option>Choose...</option>
                                                                <!-- <option value='uniosun'>University of Osun State</option>
                                                                <option value='unn'>University of Nigeria Nssuka</option> -->
                
                                                              </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Matric Number</label>
                                                                <input type="text" class="form-control" id="password" placeholder="Enter Student Matric Number..." name='matric'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     

                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary" name='search'>Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-hover">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 70px;">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Faculty</th>
                                                        <th scope="col">Department</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    D
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">David McHenry</a></h5>
                                                            <p class="text-muted mb-0">UI/UX Designer</p>
                                                        </td>
                                                        <td>david@skote.com</td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Photoshop</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">illustrator</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            125
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Profile"><i class="bx bx-user-circle"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr> -->
                                                    
                                                    <?php
                                                    $table = $_SESSION['school'];
                                                     $sql = formQuery("SELECT * FROM $table ORDER BY id DESC");
                                                     if($sql->num_rows>0){ $num = 1;
                                                         while($row=$sql->fetch_assoc()){
                                                             
                                                     ?>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img class="rounded-circle avatar-xs" src="<?= $row['dimage'] ?>" alt="">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark"><?= $row['firstName'].' '. $row['lastName'] ?></a></h5>
                                                            <p class="text-muted mb-0"><?= $row['ddepartment'] ?></p>
                                                        </td>
                                                        <td><?= $row['demail'] ?></td>
                                                        <td>
                                                        <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark"><?= $row['dFaculty']?></a></h5> 
                                                        </td>
                                                        <td>
                                                        <?= $row['ddepartment'] ?>
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title mb-4">Search for Student</h4> -->
                                        <!-- <div> -->
                                            <!-- <a class="popup-form btn btn-primary" href="#check-form">Click Search For Student</a> -->
                                            <a href="#check-form" title="Profile" class='popup-form'><i class="bx bx-user-circle"></i></a>
                                        <!-- </div> -->

                                        <div class="card mfp-hide mfp-popup-form mx-auto" id="check-form">
                                            <div class="card-body">
                                                <h4 class="mb-4">Form</h4> 
                                                <form action='student-profile.php' method='post'>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input class='form-control' type="hidden" name="school" value='<?=$_SESSION['school']?>'>
                                                        </div>
                                                        
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Matric Number</label>
                                                                <input type="text" class="form-control" id="password" placeholder="Enter Student Matric Number..." name='matric'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     

                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary" name='search'>Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                                                
                                                                    
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <?php } } ?>
                                                    <!-- <tr>
                                                        <td>
                                                            <div>
                                                                <img class="rounded-circle avatar-xs" src="assets/images/users/avatar-3.jpg" alt="">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Rafael Morales</a></h5>
                                                            <p class="text-muted mb-0">Backend Developer</p>
                                                        </td>
                                                        <td>Rafael@skote.com</td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Php</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Java</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Python</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            112
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Profile"><i class="bx bx-user-circle"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    M
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Mark Ellison</a></h5>
                                                            <p class="text-muted mb-0">Full Stack Developer</p>
                                                        </td>
                                                        <td>mark@skote.com</td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Ruby</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Php</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">2 + more</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            121
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Profile"><i class="bx bx-user-circle"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img class="rounded-circle avatar-xs" src="assets/images/users/avatar-4.jpg" alt="">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Minnie Walter</a></h5>
                                                            <p class="text-muted mb-0">Frontend Developer</p>
                                                        </td>
                                                        <td>minnie@skote.com</td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Html</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Css</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">2 + more</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            145
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Profile"><i class="bx bx-user-circle"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img class="rounded-circle avatar-xs" src="assets/images/users/avatar-5.jpg" alt="">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Shirley Smith</a></h5>
                                                            <p class="text-muted mb-0">UI/UX Designer</p>
                                                        </td>
                                                        <td>shirley@skote.com</td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Photoshop</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">illustrator</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            136
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Profile"><i class="bx bx-user-circle"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    J
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">John Santiago</a></h5>
                                                            <p class="text-muted mb-0">Full Stack Developer</p>
                                                        </td>
                                                        <td>john@skote.com</td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Ruby</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Php</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">2 + more</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            125
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Profile"><i class="bx bx-user-circle"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img class="rounded-circle avatar-xs" src="assets/images/users/avatar-5.jpg" alt="">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Colin Melton</a></h5>
                                                            <p class="text-muted mb-0">Backend Developer</p>
                                                        </td>
                                                        <td>colin@skote.com</td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Php</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Java</a>
                                                                <a href="javascript: void(0);" class="badge badge-soft-primary font-size-11 m-1">Python</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            136
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="javascript: void(0);" title="Profile"><i class="bx bx-user-circle"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="pagination pagination-rounded justify-content-center mt-4">
                                                    <li class="page-item disabled">
                                                        <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="javascript: void(0);" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="javascript: void(0);" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="javascript: void(0);" class="page-link">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="javascript: void(0);" class="page-link">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="javascript: void(0);" class="page-link">5</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
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

           <!-- Magnific Popup-->
           <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- lightbox init js-->
<script src="assets/js/pages/lightbox.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script>
            const schoolAlias = []
            const formSchools = document.querySelector('#formrow-school');
            const allSchools = JSON.parse(localStorage.getItem('schools'))??[];
            const aliases = JSON.parse(localStorage.getItem('aliases'))??[];
            for(i=0; i < allSchools.length; i++){
               
                schoolAlias.push({
                  school:allSchools[i],
                  alias: aliases[i]
                })
            }
            // console.log(schoolAlias)
            schoolAlias.forEach(school=>{
                    formSchools.innerHTML += ` 
                    <option value=${school.alias}>${school.school}</option>
                    `
            
            })
            formSchools.addEventListener('change',(e)=>{
               console.log(e.target.value);
            })
        </script>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/contacts-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:42 GMT -->
</html>
