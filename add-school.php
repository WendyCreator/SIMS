<?php include_once 'head.php';
  if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
} elseif($_SESSION['loggedin'] != true){
    header("Location:auth-lock-screen.php");
}
?>

    <body data-sidebar="dark">
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />


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
                    <h4 class="mb-sm-0 font-size-18">Register a New School</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Add School</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
        <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Horizontal Form Layout</h4>
                                        <?php if(isset($_SESSION['create']) and !empty($_SESSION['create'])){ ?>
                            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                                <!-- <i class="mdi mdi-block-helper me-2"></i> -->
                                                <?php echo $_SESSION['create'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            
                            <!-- <span class='alert alert-danger my-2 d-block'></span> -->
                        <?php } ?>
                        

                                        <form id='school' method='post'>
                                            <div class="row mb-4">
                                                <label for="name-input" class="col-sm-3 col-form-label">School Fullname</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control form-val" id="name-input" placeholder="Enter The School Fullname please " name='schoolname'>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="alias-input" class="col-sm-3 col-form-label">School Alias</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-val" id="alias-input" placeholder="Enter The school alias.. eg uniosun" name='alias'>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="password-input" class="col-sm-3 col-form-label">Staff Password</label>
                                                <div class="col-sm-9">
                                                  <input type="password" class="form-control form-val" id="password-input" placeholder="Enter Your Password" name='pass'>
                                                </div>
                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">

                                                    <!-- <div class="form-check mb-4">
                                                        <input class="form-check-input" type="checkbox" id="horizontalLayout-Check">
                                                        <label class="form-check-label" for="horizontalLayout-Check">
                                                            Remember me
                                                        </label>
                                                    </div> -->

                                                    <div>
                                                        <!-- <button type="button" class="btn btn-primary w-md" id='save'>Save Data</button> -->
                                                        <button type="submit" class="btn btn-primary w-md" name='add' id='add'>Add School</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="p-3">
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-success" style='position:relative; left:-1000px'>Click me</button>
                                                </div>


                                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Delete A School</h4>
                                        <div>
                                            <a class="popup-form btn btn-danger btn-lg" href="#test-form">Delete School</a>
                                        </div>

                                        <div class="card mfp-hide mfp-popup-form mx-auto" id="test-form">
                                            <div class="card-body">
                                                <h4 class="mb-4 text-danger">You are About to Delete a School!! ... Are you Sure? School Data will be Permanently Deleted!</h4> 
                                                <form action='' method='post' id='delete-table'>
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
                                                                <label for="password" class="form-label">School Alias</label>
                                                                <input type="text" class="form-control" id="password" placeholder=" The school alias..." name='alias'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     

                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-danger btn-lg" name='delete'>Yes. Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                    </div>
                                    <!-- end card body -->


                                    
                                </div>
        </div>


        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>


         <!-- validation init -->
         <script src="assets/js/pages/validation.init.js"></script>

<!-- Sweet Alerts js -->
<!-- <script src="assets/js/pages/sweet-alerts.init.js"></script> -->
<!-- <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script> -->

<!-- Sweet alert init js-->
<script src="assets/js/pages/sweet-alerts.init.js"></script>

   <!-- Magnific Popup-->
   <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- lightbox init js-->
<script src="assets/js/pages/lightbox.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
<script src="bootstrap4/js/jquery-3.6.0.min.js"></script>
<script src="bootstrap4/js/popper.min.js"></script>
<!-- <script src="script.js"></script> -->

 

        <script>
           const school = document.querySelector('#school')
           const nameInput = document.querySelector('#name-input')
           const alias = document.querySelector('#alias-input')
           const add = document.querySelector('#add')
           const save = document.querySelector('#save')
           const allInput = document.querySelectorAll('.form-val')
           const schoolAlias = []
            const formSchools = document.querySelector('#formrow-school');
            const passAlias = document.querySelector('#password');
            const allSchools = JSON.parse(localStorage.getItem('schools'))??[];
            const aliases = JSON.parse(localStorage.getItem('aliases'))??[];
           
const storeData= (school)=>{
let schools;
schools = JSON.parse(localStorage.getItem('schools'))??[];
schools.push(school)
localStorage.setItem('schools', JSON.stringify(schools));

}
const storeData2 = (alias)=>{
let aliases;
aliases = JSON.parse(localStorage.getItem('aliases'))??[];
aliases.push(alias)
localStorage.setItem('aliases', JSON.stringify(aliases));
}

const deleteFromLocal = (ev)=>{
   let aliasIndex;
    aliases.forEach((al, i)=>{
        if(al == ev){
          aliasIndex = i;
        }
    })
    // console.log(aliasIndex)
    const newSchools = allSchools.filter((eachSchool, index)=>{
        return index != aliasIndex
    })
    
    const newAliases = aliases.filter(alias=>{
        return alias != ev;
    })
    localStorage.setItem('aliases', JSON.stringify(newAliases));
    localStorage.setItem('schools', JSON.stringify(newSchools));

}


for(i=0; i < allSchools.length; i++){
               
               schoolAlias.push({
                 school:allSchools[i],
                 alias: aliases[i]
               })
           }
        
           schoolAlias.forEach(school=>{
                   formSchools.innerHTML += ` 
                   <option value=${school.alias}>${school.school}</option>
                   `
           
           })
           formSchools.addEventListener('change',(e)=>{
           passAlias.value = e.target.value;
        //    deleteFromLocal(e.target.value);
        //    console.log(e.target.innerText.split('\n'))
           })

           
$(function(){
//    const btn = document.querySelector('#btn1');
   const saSuccess = document.querySelector('#sa-success');
   const deleteTable = document.querySelector('#delete-table');

    school.addEventListener('submit', function(e){
        const formData = new FormData(this);
        e.preventDefault();
       let report = true;
       allInput.forEach(input=>{
           if(input.value == ''){
               report = false;
           }
       })
        
        if(report){
            theSchool = nameInput.value;
            theAlias = alias.value;
           storeData(theSchool);
           storeData2(theAlias);

           $.ajax({
            url:'add-school-process.php',
            type:'post',
            data:formData,
            contentType: false,
            processData: false,
            success: function(data, status){
                saSuccess.click();
                setTimeout(() => {
                    document.location.reload(); 
                }, 1000);
                }
            })
        }

       
       
        
    })

    // delete a school...

    deleteTable.addEventListener('submit', function(e){
        const formData = new FormData(this);
        e.preventDefault();
        
        if(formSchools.value){
          // delete form local storage

          $.ajax({
            url:'delete-table.php',
            type:'post',
            data:formData,
            contentType: false,
            processData: false,
            success: function(data, status){
                //   console.log("Data: " + data + "\n Status: " + status);
                  deleteFromLocal(formSchools.value);
                  document.location.reload();
                }
            })
        }

       
        
    })



})


           
// localStorage.removeItem(school)
        </script>

        <!-- <?php# unset($_SESSION['create']) ?> -->