<?php include_once 'head.php';
  if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
} elseif($_SESSION['loggedin'] != true){
    header("Location:auth-lock-screen.php");
}
?>
<!-- Sweet Alert-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />


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
                    <h4 class="mb-sm-0 font-size-18">Edit Students Details</h4>
                    <?php
                    if(isset($_SESSION['redmsg'])){
                        include 'redflag.php';
                    }
                    ?>

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
           $matric = $_GET['matric'];
           $id = $_GET['id'];
           $school = $_GET['school'];
           $sql = formQuery("SELECT * FROM $school WHERE matricNo = '$matric' AND id = '$id'");
           if($sql->num_rows > 0){
              
               $row= $sql->fetch_assoc();
        
        // else{
        //     header('Location:student-view.php');
        // }
        //    echo $row['firstName'];
         
        ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Students' Details</h4>
                        <p class="card-title-desc">All students editable details are provided below... Edit wih care</p>

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
                                    
                                    <?php 
                                    // if(isset($_POST['update'])){
                                    //     include 'student-edit-process.php';
                                    // }
                                    if(isset( $_SESSION['schecker'])){?>
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-bullseye-arrow me-2"></i>
                                               <?=$_SESSION['schecker']?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <?php } ?>
                                </thead>
                                <tbody>
                                    <form action="student-edit-process.php" method="post" enctype="multipart/form-data" id='student-form'>
                                        <input type="hidden" value=<?=$matric?> name='matric'>
                                        <input type="hidden" value=<?=$id?> name='id'>
                                        <input type="hidden" value=<?=$school?> name='school'>
                                        
                                    <!-- <tr data-id="1D">
                                        <td data-field="i" style="width: 80px">1</td> -->
                                
                                        
                                    <tr> 
                                      <td>
                                          <h4>Personal information</h4>
                                          <div>
                                          <label for="firstname">First Name</label>
                                          </div>
                                            <input type="text" value='<?=$row['firstName']?>' data-field="name" name='firstname'>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">Middle Name</label>
                                          </div>
                                            <input type="text" value='<?=$row['middleName']?>' data-field="name" name='midname'>
                                        </td> 
                                        <td>
                                        <div>
                                          <label for="firstname">Last Name</label>
                                          </div>
                                            <input type="text" value='<?=$row['lastName']?>' data-field="name" name='lastname'>
                                        </td>
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
                                              <input type="email" value='<?=$row['demail']?>' data-field="name" name='email'>
                                          </td>
                                        
                                      </tr>
                                      <tr>
                                         
                                          <td>
                                          <div>
                                          <label for="firstname">Address</label>
                                          </div>
                                              <input type="text" value='<?=$row['daddress']?>' data-field="name" name='address'>
                                          </td>

                                          <td>
                                        <div>
                                          <label for="firstname">Matric Number</label>
                                          </div>
                                            <input type="text" value='<?=$row['matricNo']?>' data-field="name" name='matricNo' readonly>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">Date of Birth</label>
                                          </div>
                                            <input type="text" value='<?=$row['DOB']?>' data-field="name" name='dob'>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">Religion</label>
                                          </div>
                                            <input type="text" value='<?=$row['Religion']?>' data-field="name" name='religion' readonly>
                                        </td>

                                        <td>
                                        <div>
                                          <label for="firstname">Nationality</label>
                                          </div>
                                            <input type="text" value='<?=$row['dNationality']?>' data-field="name" name='nation' readonly>
                                        </td>
                                       
                                       
                                      </tr>
                                     
                                       
                                        <tr>
                                        <td>
                                        <div>
                                          <label for="firstname">State of Origin</label>
                                          </div>
                                            <input type="text" value='<?=$row['dState']?>' data-field="name" name='state' readonly>
                                        </td>
                                      <td>
                                        <div>
                                          <label for="firstname">Local Government Area</label>
                                          </div>
                                            <input type="text" value='<?=$row['lga']?>' data-field="name" name='lga' readonly>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">Marital Status</label>
                                          </div>
                                            <input type="text" value='<?=$row['dmarital']?>' data-field="name" name='marital' readonly>
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

                                   <!-- Health Related information -->

                                   <tr> 
                                      <td>
                                          <h4>Health information</h4>
                                          <div>
                                          <label for="firstname">Blood Group</label>
                                          </div>
                                            <input type="text" value='<?=$row['Bloodgroup']?>' data-field="name" name='bloodgroup'>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">Genotype</label>
                                          </div>
                                            <input type="text" value='<?=$row['genotype']?>' data-field="name" name='genotype'>
                                        </td> 
                                        <td>
                                        <div>
                                          <label for="firstname">Allergies</label>
                                          </div>
                                            <input type="text" value='<?=$row['Allergies']?>' data-field="name" name='allergy'>
                                        </td>
                                        <td>
                                          <div>
                                          <label for="firstname">Ailments</label>
                                          </div>
                                              <input type="text" value='<?=$row['Ailment']?>' data-field="name" name='ailment'>
                                          </td>
                                          <td>
                                          <div>
                                          <label for="firstname">Disabilities</label>
                                          </div>
                                              <input type="text" value='<?=$row['disabilities']?>' data-field="name" name='disable'>
                                          </td>
                                        
                                      </tr>
                                   <tr> 
                                      <td>
                                          <h4>Academic information</h4>
                                          <div>
                                          <label for="firstname">Year Admitted</label>
                                          </div>
                                            <input type="text" value='<?=$row['yearAdmitted']?>' data-field="name" name='yearadd'>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">Current Level</label>
                                          </div>
                                            <input type="text" value='<?=$row['currentLevel']?>' data-field="name" name='currentlevel'>
                                        </td> 
                                        <td>
                                        <div>
                                          <label for="firstname">Current CGPA</label>
                                          </div>
                                            <input type="text" value='<?=$row['currentCGPA']?>' data-field="name" name='currentcgpa'>
                                        </td>
                                        <td>
                                          <div>
                                          <label for="firstname">Course Duration</label>
                                          </div>
                                              <input type="text" value='<?=$row['courseDuration']?>' data-field="name" name='courseduration'>
                                          </td>
                                          <td>
                                          <div>
                                          <label for="firstname">Faculty</label>
                                          </div>
                                              <input type="text" value='<?=$row['dFaculty']?>' data-field="name" name='faculty'>
                                          </td>
                                        
                                      
                                    
                                    </tr>
                                   <tr> 
                                      <td>
                                    
                                          <div>
                                          <label for="firstname">Department</label>
                                          </div>
                                            <input type="text" value='<?=$row['ddepartment']?>' data-field="name" name='department'>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">Attendance Rate</label>
                                          </div>
                                            <input type="text" value='<?=$row['attendanceRate']?>' data-field="name" name='attendance'>
                                        </td> 
                                        <td>
                                        <div>
                                          <label for="firstname">Pending Project</label>
                                          </div>
                                            <input type="text" value='12' data-field="name" name='pend'>
                                        </td>
                                        <td>
                                          <div>
                                          <label for="firstname">Expected of year of Graduation</label>
                                          </div>
                                              <input type="text" value='<?=$row['yearGraduate']?>' data-field="name" name='yeargrad'>
                                          </td>
                                          <td>
                                          <div>
                                          <label for="firstname">Red Flag</label>
                                          </div>
                                          <select name="red" id="red">
                                              <option value="<?=$row['Redflag']?>"><?=$row['Redflag']?></option>
                                              <option value="0">0</option>
                                              <option value="1">1</option>
                                          </select>
                                              <!-- <input type="email" value='' data-field="name" name='faculty'> -->

                                              <div class='my-3'>
                                                  <a class="btn btn-danger btn-lg" href="setred.php?matric=<?=$row['matricNo']?>&id=<?=$row['id']?>&school=<?=$row['school']?>">Set Regflag</a>
                                              </div>
                                              
                                              

                                              <!-- red flag ends here -->
                                          </td>
                                        
                                      
                                    
                                    </tr>

                                    <tr> 
                                      <td>
                                          <h4>Parent/Guardian information</h4>
                                          <div>
                                          <label for="firstname">Fullname</label>
                                          </div>
                                            <input type="text" value='<?=$row['Gfullname']?>' data-field="name" name='gfullname'>
                                        </td>
                                        <td>
                                        <div>
                                          <label for="firstname">Email</label>
                                          </div>
                                            <input type="text" value='<?=$row['Gemail']?>' data-field="name" name='gemail'>
                                        </td> 
                                        <td>
                                        <div>
                                          <label for="firstname">Phone Number</label>
                                          </div>
                                            <input type="text" value='<?=$row['Gphone']?>' data-field="name" name='Gphone'>
                                        </td>
                                        <td>
                                          <div>
                                          <label for="firstname">Residential Address</label>
                                          </div>
                                              <input type="text" value='<?=$row['Gaddress']?>' data-field="name" name='Gaddress'>
                                          </td>
                                          <td>
                                          <div>
                                          <label for="firstname">Relationship</label>
                                          </div>
                                              <input type="text" value='<?=$row['Grelationship']?>' data-field="name" name='relation'>
                                          </td>
                                        
                                      </tr>

                                    
                                    <div class="mt-5"></div>
                                    <div class="p-3">
                                                    
                                                    <button type="button" class="btn btn-danger btn-lg waves-effect waves-light" id="sa-warning">Delete Data</button>
                                                </div>
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
                                    <button type="submit" class="btn btn-primary w-lg waves-effect waves-light" name='update' style='padding:12px;'>Update Data</button>

                                    </form>
                                </tbody>
                                </table>
                        </div>
                  <?php } ?>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?php unset($_SESSION['schecker']) ?>
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

<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Magnific Popup-->
<script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- lightbox init js-->
<script src="assets/js/pages/lightbox.init.js"></script>


<script src="assets/js/app.js"></script>
<script src="bootstrap4/js/jquery-3.6.0.min.js"></script>
<!-- <script src="bootstrap4/js/popper.min.js"></script> -->


<script>
    // const myForm = document.querySelector('#student-form')
    // myForm.addEventListener('submit',(e)=>{
    //     e.preventDefault();
    //     console.log('yex');
    // })
    $(function(){
        $("#sa-warning").click(function(){
            Swal.fire({title:"Are you sure?",
                text:"You won't be able to revert this!",
                icon:"warning",  
                showCancelButton:!0,
                confirmButtonColor:"#34c38f",
                cancelButtonColor:"#f46a6a",
                confirmButtonText:"Yes, delete it!"})
                .then(function(isConfirm){
                    if(isConfirm){
                        $.ajax({type:"GET",
                        url:'delete-student.php?matric=<?=$matric?>&id=<?=$id?>&school=<?=$school?>',
                        success: function(data,status){
                         console.log(data)
                        }
                    })   
                    }
                    })
                    .then(function(){Swal.fire({
                        title:"Deleted!",
                        text:"Your file has been deleted.",
                        icon:"success"})})})


                   
                    const redFlag = document.querySelector('#set-red')
                    // const matric = document.querySelector('#my-matric')
                    // const school = document.querySelector('#my-school')
                    // const myid = document.querySelector('#my-id')
                    // const comment = document.querySelector('#reason')
                    // const userid = document.querySelector('#my-userid')
                    // const fullname = document.querySelector('#my-fullname')
                    // console.log(comment);
                    {
            //     matric: matric.val(),
            //     school:school.val(),
            //     id: myid.val(),
            //     comment:comment.val(),
            //     userid: userid.val(),
            //     fullname:fullname.val()

            // },
<?php //unset($_SESSION['redmsg'])?>
                    redFlag.addEventListener('click',(e)=>{
                        e.preventDefault();
                        const formdata = {
                                   matric: $('#my-matric').val(),
                                   school: $('#my-school').val(),
                                   id: $('#my-id').val(),
                                   comment: $('#reason').val(),
                                   userid: $('#my-userid').val(),
                                   fullname: $('#my-fullname').val()
     
                                  }
                                  console.log(formdata);

                        $.ajax({
                           url:'redflag.php',
                           type:'post',
                           data:formdata,
                        //    contentType: false,
                        //    processData: false,
                           success: function(data, status){
                                     console.log("Data: " + data + "\n Status: " + status);
                                    //  console.log('yes');
                                    document.location.reload();
                                   }
                            })
                    //   document.location.reload();
                    })

               } })

    // t("#sa-warning").click(function(){Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(){$.ajax({type:"GET",url:'delete-student.php'})}).then(function(t){t.value&&Swal.fire("Deleted!","Your file has been deleted.","success")})})
</script>

</body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/tables-editable.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:06:19 GMT -->
</html>
