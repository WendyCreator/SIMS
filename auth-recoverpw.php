<?php include_once 'head.php';
  if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
} elseif($_SESSION['loggedin'] != true){
    header("Location:auth-lock-screen.php");
}
?>
<style>
    .error{
    background-color: rgba(255,30,30,0.2);
    display: block;
    margin: 10px 5px;
    color: rgba(255,30,30);
}

.success{
    background-color: rgba(30,255,30,0.2);
    display: block;
    margin: 10px 5px;
    color: rgb(12, 120, 12);
}
</style>
    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary"> Reset Password</h5>
                                            <p>Reset Password with Skote.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="p-2">
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        Enter your previous password and your new password please!
                                    </div>
                                    <?php if(isset($_SESSION['err']) and !empty($_SESSION['err'])){ ?>
                                    <span class='alert alert-primary my-2 d-block'><?= $_SESSION['err'] ?></span>
                                    <?php } ?>
                                    <form class="form-horizontal" action="change-password-process.php" method='post'>
            
                                        <div class="mb-3">
                                            <label for="oldpass" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="oldpass" placeholder="Enter old password" name='oldpass'>
                                            <div class="form-group my-2">
                                            <input type="password" class="form-control" id="newpass" placeholder="Enter new password" name='newpass'>
                                            <span class="error" id="psw-err"></span>
                                            </div>
                                            <input type="password" class="form-control" id="cnewpass" placeholder="Confirm new password" name='cnewpass'>
                                            <span class="error" id="cpsw-err"></span>
                                        </div>
                    
                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name='submit'>Reset</button>
                                            <a href="dashboard-saas.php" class="btn btn-primary w-md waves-effect waves-light" >back</a>
                                        </div>
    
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Remember It ? <a href="index.php" class="fw-medium text-primary"> Sign In here</a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> SIMS. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script>
const psw = document.querySelector('#newpass'),
      cpsw = document.querySelector('#cnewpass'),
      pswErr = document.querySelector('#psw-err'),
      cpswErr = document.querySelector('#cpsw-err')
            
const pattern1 = /[a-z]/,
      pattern2 = /[A-Z]/,
      pattern3 = /[0-9]/,
      pattern4 =/[!@#$%^&*]/

let isValid  = true;
cpsw.disabled = true;
            function passwordValidation(e){
    
       
        // Check for pattern validation
        if(!pattern1.test(e.target.value)){
            pswErr.innerHTML = `Password must include Lowercase`
            isValid = false;
        }
      
         else if(!pattern2.test(e.target.value)){
            pswErr.innerHTML = `Password must include Uppercase`
            isValid = false;
        }
         else if(!pattern3.test(e.target.value)){
            pswErr.innerHTML = `Password must include Number'`
            isValid = false;
        }
         else if(!pattern4.test(e.target.value)){
            pswErr.innerHTML = `Password must include special characters'`
            isValid = false;
        }
         else if(e.target.value.length < 8){
            pswErr.innerHTML = `Password must be at least 8 characters long`
            isValid = false;
        }
        else{
            isValid = true;
        }

        if(isValid){
            successClass(pswErr)
            pswErr.innerHTML = 'Password valid!'
            cpsw.disabled = false;
        } else{
            errorClass(pswErr)
            cpsw.disabled = true;
        }
    }

    function successClass(el){
    el.classList.remove('error')
    el.classList.add('success')
}

function errorClass(el){
    el.classList.add('error')
    el.classList.remove('success')
}

psw.addEventListener('input', (e)=>{
    passwordValidation(e)
    // displayInput(e)
})
        </script>
    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:44 GMT -->
</html>
