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
                    <h4 class="mb-sm-0 font-size-18">Edit Staff Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Editable Table</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <?php
           $userid = $_GET['userid'];
           $id = $_GET['id'];
           $sql = formQuery("SELECT * FROM staffs WHERE duserid = $userid AND id = $id");
                        $row= $sql->fetch_assoc();
        //    echo $row['firstName'];
        ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Staffs' Details</h4>
                        <p class="card-title-desc">All staffs editable details are provided below... Edit wih care</p>

                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <!-- <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>last Name</th>
                                        <th>User Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Adress</th>
                                        <th>School</th>
                                        <th>Image</th>
                                    </tr> -->
                                    <?php if(isset( $_SESSION['checker'])){?>
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-bullseye-arrow me-2"></i>
                                               <?=$_SESSION['checker']?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php } ?>
                                </thead>
                                <tbody>
                                    <form action="staff-edit-process.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" value=<?=$userid?> name='user'>
                                        <input type="hidden" value=<?=$id?> name='id'>
                                    <!-- <tr data-id="1D">
                                        <td data-field="i" style="width: 80px">1</td>
                                      <tr> -->
                                      <td>
                                          <div>
                                          <label for="firstname">First Name</label>
                                          </div>
                                            <input type="text" value='<?=$row['firstName']?>' data-field="name" name='firstname'>
                                        </td> 
                                        <td>
                                        <div>
                                          <label for="firstname">Last Name</label>
                                          </div>
                                            <input type="text" value='<?=$row['lastName']?>' data-field="name" name='lastname'>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">User Name</label>
                                          </div>
                                            <input type="text" value='<?=$row['userName']?>' data-field="name" name='username'>
                                        </td>
                                      </tr>
                                      <tr>

                                          <td>
                                          <div>
                                          <label for="firstname">Phone Number</label>
                                          </div>
                                              <input type="text" value='<?=$row['dphone']?>' data-field="name" name='phone'>
                                          </td>
                                          <td>
                                          <div>
                                          <label for="firstname">Email</label>
                                          </div>
                                              <input type="email" value='<?=$row['demail']?>' data-field="name" name='email' readonly>
                                          </td>
                                          <td>
                                          <div>
                                          <label for="firstname">Address</label>
                                          </div>
                                              <input type="text" value='<?=$row['daddress']?>' data-field="name" name='address'>
                                          </td>
                                      </tr>
                                        <td>
                                        <div>
                                          <label for="firstname">School</label>
                                          </div>
                                            <input type="text" value='<?=$row['dschool']?>' data-field="name" name='school' readonly>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">Profile Image</label>
                                          </div>
                                            <input type="file" data-field="name" name='files'>
                                        </td>
                                        <!-- <td data-field="age">24</td> -->
                                        
                                        <td data-field="gender">Male</td>
                                        <td style="width: 100px">
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="mt-5"></div>
                                    <!-- <tr data-id="2">
                                        <td data-field="id">2</td>
                                        <td data-field="name">Frank Kirk</td>
                                        <td data-field="age">22</td>
                                        <td data-field="gender">Male</td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-id="3">
                                        <td data-field="id">3</td>
                                        <td data-field="name">Rafael Morales</td>
                                        <td data-field="age">26</td>
                                        <td data-field="gender">Male</td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-id="4">
                                        <td data-field="id">4</td>
                                        <td data-field="name">Mark Ellison</td>
                                        <td data-field="age">32</td>
                                        <td data-field="gender">Male</td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-id="5">
                                        <td data-field="id">5</td>
                                        <td data-field="name">Minnie Walter</td>
                                        <td data-field="age">27</td>
                                        <td data-field="gender">Female</td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr> -->
                                    <button type="submit" class="btn btn-primary w-lg waves-effect waves-light" name='update' style='padding:12px;'>Update</button>

                                    </form>
                                </tbody>
                                </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

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

<!-- Table Editable plugin -->
<script src="assets/libs/table-edits/build/table-edits.min.js"></script>

<script src="assets/js/pages/table-editable.int.js"></script> 

<script src="assets/js/app.js"></script>

</body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/tables-editable.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:06:19 GMT -->
</html>
