<?php include_once 'head.php';
  if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
} elseif($_SESSION['loggedin'] != true){
    header("Location:auth-lock-screen.php");
}
?>
<link rel="stylesheet" href="style.css">
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <body>
        
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
            <div class="header bg-primary text-light p3" style='position:absolute; top:0; width:80%'>
          <h1 class="text-center p-3 font-weight-light">Student Information Management System</h1>
      </div>
         <?php if(isset($_POST['submit'])){
             include 'staff-reg-process.php';
         }
         ?>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Staff Registration</h5>
                                            <p>Kindly provide the required details</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.php">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="needs-validation" novalidate action="auth-register.php" method='post' id='myform' enctype="multipart/form-data ">
            
                                        <div class="form-group mb-3">
                                           <label for="firstname">First Name:</label>
                                             <input type="text" class="form-control" placeholder="Enter your first name" id="firstname" name='firstname'>
                                             <div class="invalid-feedback">
                                                Please Enter First Name
                                            </div>
                                         </div>
                                            
                
                                        <div class="form-group invisi mb-3">
                                          <label for="lastname">Last Name:</label>
                                          <input type="text" class="form-control" placeholder="Enter your last name" id="lastname" name='lastname'>
                                          <div class="invalid-feedback">
                                                Please Enter Last Name
                                            </div>
                                        </div>
                                        <div class="form-group invisi mb-3">
                                          <label for="preferredname">User Name:</label>
                                          <input type="text" class="form-control" placeholder="Enter your preferred name" id="username" name='username'>
                                          </div>
                                        <div class="form-group invisi mb-3">
                                           <label for="email">Email address:</label>
                                           <input type="email" class="form-control" placeholder="Enter email" id="email" name='email'>
                                           <span class="error" id="email-err"></span>
                                        </div>
                                        <div class="form-group invisi mb-3">
                                           <label for="email">Phone Number:</label>
                                           <input type="text" class="form-control" placeholder="Enter phone number" id="phone" name='phone'>
                                           <span class="error" id="phone-err"></span>
                                        </div>

                                        <div class="form-group invisi mb-3">
                                        <label for="role">Staff Role:</label>
                                            <select name="role" id="role" class='form-control'>
                                                <option value="">---</option>
                                                <option value="admin">Admin</option>
                                                <option value="staff">Staff</option>
                                            </select>
                                        </div>
                                        <div class="form-group invisi mb-3">
                                              <label for="formrow-school" class="form-label">Staff School</label>
                                                    <select id="formrow-school" class="form-select" name='school'>
                                                        <option value='uniosun'>Choose...</option>
                                                                <!-- <option value='uniosun'>University of Osun State</option>
                                                                <option value='unn'>University of Nigeria Nssuka</option> -->
                
                                                        </select>
                                        </div>
                                        <div class="form-group invisi mb-3">
                                        <label for="img">Staff Address:</label>
                                           <textarea name="address" id="address" cols="30" rows="10" class='form-control'></textarea>
                                           <span class="error" id="add-err"></span>
                                        </div>

                                        <div class="form-group invisi mb-3">
                                        <label for="img">Staff image:</label>
                                           <input type="file" class="form-control" placeholder="Enter your profile picture" id="img" name='files'>
                                           <span class="error" id="img-err"></span>
                                        </div>
                                        
                                        <div class="form-group invisi mb-3">
                                           <label for="pwd">Password:</label>
                                           <input type="password" class="form-control" placeholder="Enter password" id="pwd" name='pass'>
                                           <span class="error" id="psw-err"></span>
                                        </div>
                                        <div class="form-group invisi mb-3">
                                           <label for="cpwd"> Confirm Password:</label>
                                           <input type="password" class="form-control" placeholder="Confrim your password" id="cpwd" name='cpass'>
                                        <span class="error" id="cpsw-err"></span>
                                       </div>
                                       <div class="form-group invisi mb-3">
                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" id='submit' name='submit'>Register</button>
                                        </div>
                                    </div>
                                        <div class="mt-4 text-center">
                                            <h5 class="font-size-14 mb-3">Sign up using</h5>
            
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                        <i class="mdi mdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                
                                        <div class="mt-4 text-center">
                                            <p></p>
                                            <p class="mb-0">By registering you agree to the SIMS <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </form>
                                    <!-- <form action="" method='post'> -->
                                    <a class="btn btn-primary waves-effect waves-light" type="submit" name='btn' href='dashboard-saas.php'>Back to Dashboard</a>

                                    <!-- </form> -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                                <div class="p-3">
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-success" style='position:relative; left:-1000px'>Click me</button>
                                                </div>
                                            </div>
                                </div>
                                        <figure class="image" style='position:fixed; top:15%; left:20px'>
                                           <div class="placeholder" id="placeholder">Image Here</div>
                                           <img src="" alt="" class="myImage rounded img-fluid">
                                           <!-- <button id="btn" class="btn btn-secondary shadow">click Me</button> -->
                                        </figure>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>Already have an account ? <a href="auth-login.html" class="fw-medium text-primary"> Login</a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> SIMS. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <meta property="og:locale" content="en_US" />
 <meta property="og:type" content="article" />
 <meta property="og:title" content="<?php echo $title ?> - Pamdrive" />
 <meta property="og:description" content="<?php echo $title ?> - Pamdrive" />
 <meta property="og:site_name" content="pamdrive.com"/>
 <meta property="article:published_time" content="<?php echo $dqte ?>" />
 <meta property="og:image" content="https://pamdrive/<?php echo $myimg ?>.jpg" />
 <meta property="og:image:width" content="412" />
 <meta property="og:image:height" content="285" />

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>


        <!-- validation init -->
        <script src="assets/js/pages/validation.init.js"></script>

           <!-- Sweet Alerts js -->
           <!-- <script src="assets/js/pages/sweet-alerts.init.js"></script> -->
           <!-- <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>  -->

<!-- Sweet alert init js-->
          <script src="assets/js/pages/sweet-alerts.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script src="bootstrap4/js/jquery-3.6.0.min.js"></script>
        <script src="bootstrap4/js/popper.min.js"></script>
        <script src="script.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:44 GMT -->
</html>
