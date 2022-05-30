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
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Projects Grid</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                            <li class="breadcrumb-item active">Projects Grid</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="assets/images/companies/img-1.png" alt="" height="30">
                                                    </span>
                                                </div>
                                            </div>
                                            

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">New admin Design</a></h5>
                                                <p class="text-muted mb-4">It will be as simple as Occidental</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                                    A
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-success">Completed</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-calendar me-1"></i> 15 Oct, 19
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-comment-dots me-1"></i> 214
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="assets/images/companies/img-2.png" alt="" height="30">
                                                    </span>
                                                </div>
                                            </div>
                                           

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">Brand logo design</a></h5>
                                                <p class="text-muted mb-4">To achieve it would be necessary</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-warning">Pending</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-calendar me-1"></i> 22 Oct, 19
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-comment-dots me-1"></i> 183
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="assets/images/companies/img-3.png" alt="" height="30">
                                                    </span>
                                                </div>
                                            </div>
                                            

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">New Landing Design</a></h5>
                                                <p class="text-muted mb-4"> For science, music, sport, etc</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                                    K
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-danger">Delay</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-calendar me-1"></i> 13 Oct, 19
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-comment-dots me-1"></i> 175
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="assets/images/companies/img-4.png" alt="" height="30">
                                                    </span>
                                                </div>
                                            </div>
                                            

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">Redesign - Landing page</a></h5>
                                                <p class="text-muted mb-4">If several languages coalesce</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-success">Completed</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-calendar me-1"></i> 14 Oct, 19
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-comment-dots me-1"></i> 202
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="assets/images/companies/img-5.png" alt="" height="30">
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">Skote Dashboard UI</a></h5>
                                                <p class="text-muted mb-4">Separate existence is a myth</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                                    3+
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-success">Completed</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-calendar me-1"></i> 13 Oct, 19
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-comment-dots me-1"></i> 194
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="assets/images/companies/img-6.png" alt="" height="30">
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">Blog Template UI</a></h5>
                                                <p class="text-muted mb-4"> For science, music, sport, etc</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-warning">Pending</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-calendar me-1"></i> 24 Oct, 19
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-comment-dots me-1"></i> 122
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="assets/images/companies/img-3.png" alt="" height="30">
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">Multipurpose Landing</a></h5>
                                                <p class="text-muted mb-4">It will be as simple as Occidental</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-warning text-white font-size-16">
                                                                    R
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-danger">Delay</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-calendar me-1"></i> 15 Oct, 19
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-comment-dots me-1"></i> 214
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="assets/images/companies/img-4.png" alt="" height="30">
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">App Landing UI</a></h5>
                                                <p class="text-muted mb-4">To achieve it would be necessary</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-pink text-white font-size-16">
                                                                    L
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-success">Completed</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-calendar me-1"></i> 11 Oct, 19
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-comment-dots me-1"></i> 185
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <img src="assets/images/companies/img-2.png" alt="" height="30">
                                                    </span>
                                                </div>
                                            </div>
                                            

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">New admin Design</a></h5>
                                                <p class="text-muted mb-4"> Their most common words.</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                                    A
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-success">Completed</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-calendar me-1"></i> 12 Oct, 19
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <i class= "bx bx-comment-dots me-1"></i> 106
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="pagination pagination-rounded justify-content-center mt-2 mb-5">
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
                        <!-- end row -->
                        
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

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/projects-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:35 GMT -->
</html>
