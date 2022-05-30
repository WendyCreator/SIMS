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


            <div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Student's Enrollment Form</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Provide Students Details</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <?php if(isset($_POST['submit'])){
             include 'reg-student-process.php';
         } ?>
            <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="bag-img">
                                    <figure class="image" style='float:right; '>
                                               <div class="placeholder" id="placeholder">Image Here</div>
                                               <img src="" alt="" class="myImage rounded img-fluid" id='myImage'>
                                               <!-- <button id="btn" class="btn btn-secondary shadow">click Me</button> -->
                                            </figure>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Provide Students Details</h4>
                                       

                                        <form action='register-student.php' method='post' enctype="multipart/form-data">>
                                            <div class="mb-3">
                                                <fieldset>
                                                    <legend>Personal Information</legend>

                                                    <div class="mb-3">
                                                    <label for="formrow-firstname-input" class="form-label">First Name</label>
                                                     <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter Your First Name" name='firstname'>
                                                    </div>
                                                    <div class="mb-3">
                                                    <label for="formrow-lastname-input" class="form-label">Last Name</label>
                                                     <input type="text" class="form-control" id="formrow-lastname-input" placeholder="Enter Your last Name" name='lastname'>
                                                    </div>
                                                    <div class="mb-3">
                                                    <label for="formrow-midname-input" class="form-label">Middle Name</label>
                                                     <input type="text" class="form-control" id="formrow-midname-input" placeholder="Enter Your Middle Name" name='middlename'>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                      <label for="img">Student image:</label>
                                                      <input type="file" class="form-control" placeholder="Enter your profile picture" id="img" name='files'>
                                                      <span class="error" id="img-err"></span>
                                                    </div>

                                                <div class="row mt-3">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="formrow-email-input" placeholder="Enter Your Email ID" name='email'>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-phone-input" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" id="formrow-phone-input" placeholder="Enter Your Phone Number" name='phone'>
                                                    </div>
                                                </div>
                                               </div>
                                                <div class="mb-3">
                                                        <label for="formrow-inputState" class="form-label">Gender</label>
                                                        <select id="formrow-inputState" class="form-select" name='gender'>
                                                            <option value='male'>Male</option>
                                                            <option value='female'>Female</option>
                                                            <option value='other'>Other</option>
                                                        </select>
                                                    </div>
                                                <div class="mb-3">
                                                        <label for="formrow-inputState" class="form-label">Marital Status</label>
                                                        <select id="formrow-inputState" class="form-select"  name='marital'>
                                                            <option value='single'>Single</option>
                                                            <option value='married'>Married</option>
                                                            <option value='divorced'>Divorced</option>
                                                            <option value='widowed'>Widowed</option>
                                                        </select>
                                                    </div>
                                                <div class="mb-3">
                                                        <label for="formrow-inputState" class="form-label">Religion</label>
                                                        <select id="formrow-inputState" class="form-select" name='religion'>
                                                            <option value='christianity'>Christianity</option>
                                                            <option value='islamic'>Islamic</option>
                                                            <option value='buddaism'>Buddaism</option>
                                                            <option value='hinduism'>Hinduism</option>
                                                            <option value='atheist'>Atheist</option>
                                                            <option value='others'>Other</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="form-group row">
            <div class="col-md-4">
                <select name="day" id="" class="form-control">
                <option value="">Day</option> 
                <?php for($i=1; $i<=31; $i++){
                    if(strlen($i)==1){  $i= '0'.$i; }
                    ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>

                </select>
            </div>

            <div class="col-md-4">
                <select name="month" id="" class="form-control">
                <option value="">Month</option>  
                <option value="Jan">Jan</option>          
                <option value="Feb">Feb</option>          
                <option value="Mar">Mar</option>          
                <option value="Apr">Apr</option>          
                <option value="May">May</option>          
                <option value="Jun">Jun</option>          
                <option value="Jul">Jul</option>          
                <option value="Aug">Aug</option>          
                <option value="Sep">Sep</option>          
                <option value="Oct">Oct</option>          
                <option value="Nov">Nov</option>          
                <option value="Dec">Dec</option>          
                </select>
            </div>

            <div class="col-md-4">
                <select name="year" id="" class="form-control">
                <option value="">Year</option>  
                <?php for($i=2021; $i>=1970; $i--){ ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>          
                </select>
            </div>
        </div>


                                            <div class="row my-3">

                                            <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputState" class="form-label">Nationality</label>
                                                        <select id="formrow-inputState" class="form-select" name='nation'>
                                                            <option>Choose...</option>
                                                            <option value='Nigeria'>Nigeria</option>
                                                            <option value='Ghana'>Ghana</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputState" class="form-label">State of Origin</label>
                                                        <select id="formrow-inputState" class="form-select" name='stateO'>
                                                            <option selected>Choose...</option>
                                                            <option value= 'Enugu'>Enugu</option>
                                                            <option value= 'Imo'>Imo</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputCity" class="form-label">LGA</label>
                                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Local Government Area" name='lga'>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputZip" class="form-label">Zip</label>
                                                        <input type="text" class="form-control" id="formrow-inputZip" placeholder="Enter Your Zip Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">

                                            <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputState" class="form-label">Country of Residence</label>
                                                        <select id="formrow-inputState" class="form-select" name='residence'>
                                                            <option selected>Choose...</option>
                                                            <option value='Nigeria'>Nigeria</option>
                                                            <option value='Ghana'>Ghana</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputState" class="form-label">State of Residence</label>
                                                        <select id="formrow-inputState" class="form-select" name='SOresidence'>
                                                            <option>Choose...</option>
                                                            <option value= 'Enugu'>Enugu</option>
                                                            <option value= 'Imo'>Imo</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputCity" class="form-label">City</label>
                                                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputZip" class="form-label">Zip</label>
                                                        <input type="text" class="form-control" id="formrow-inputZip" placeholder="Enter The Zip Code">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                        <label for="img">Student Address:</label>
                                           <textarea name="address" id="address" cols="30" rows="10" class='form-control'></textarea>
                                           <span class="error" id="add-err"></span>
                                        </div>
                                                    
                                                </fieldset>


                                                <fieldset>
                                                <legend>Parent/Guardian Information</legend>

                                                    <div class="mb-3">
                                                      <label for="formrow-firstname-input" class="form-label">First Name</label>
                                                      <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter Your First Name" name='Gfirstname'>
                                                    </div>
                                                  <div class="mb-3">
                                                    <label for="formrow-lastname-input" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="formrow-lastname-input" placeholder="Enter Your last Name" name='Glastname'>
                                                 </div>

                                                 
                                                <div class="row mt-3">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="formrow-email-input" placeholder="Enter Your Email ID" name='Gemail'>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-phone-input" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" id="formrow-phone-input" placeholder="Enter Your Phone Number" name='Gphone'>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="mb-3">
                                                    <label for="formrow-occupation-input" class="form-label">Occupation</label>
                                                    <input type="text" class="form-control" id="formrow-occupation-input" placeholder="Enter Parent/Guardian Occupation" name='occupation'>
                                                 </div>

                                               <div class="form-group mb-3">
                                        <label for="address">Address:</label>
                                           <textarea name="Gaddress" id="address" cols="30" rows="10" class='form-control'></textarea>
                                           <span class="error" id="add-err"></span>
                                        </div>

                                        <div class="mb-3">
                                                        <label for="formrow-inputRel" class="form-label">Relationship</label>
                                                        <select id="formrow-inputRel" class="form-select" name=relationship>
                                                            <option>Choose...</option>
                                                            <option value='father'>Father</option>
                                                            <option value='mother'>Mother</option>
                                                            <option value='sister'>sister</option>
                                                            <option value='brother'>Brother</option>
                                                            <option value='Uncle'>Uncle</option>
                                                            <option value='aunty'>Aunty</option>
                                                            <option value='others'>Others</option>
                                                        </select>
                                                    </div>
                                                </fieldset>

                                                <fieldset>
                                                    <legend>Health Related Data</legend>
                                                    <div class="row mt-3">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-genotype" class="form-label">Genotype</label>
                                                        <select id="formrow-genotype" class="form-select" name='genotype'>
                                                            <option>Choose...</option>
                                                            <option value='AB+'>AB Positve</option>
                                                            <option value='O+'>O Positive</option>
                                                            <option value='O+'>A Positive</option>
                                                            <option value='B+'>B Positive</option>
                                                            <option value='AB-'>AB Negatve</option>
                                                            <option value='O-'>O Negative</option>
                                                            <option value='A-'>A Negative</option>
                                                            <option value='B-'>B Negative</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-bloodgroup" class="form-label">Blood Group</label>
                                                        <select id="formrow-bloodgroup" class="form-select" name='blood'>
                                                            <option>Choose...</option>
                                                            <option value='AA'>AA</option>
                                                            <option value='AS'>AS</option>
                                                            <option value='SS'>SS</option>
                                
                                                        </select>
                                                    </div>
                                                </div>
                                               </div>
                                                    <div class="row mt-3">
                                                
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                      <div class="form-group">
                                                      <label for="allergies">Allergies (comma seperated):</label>
                                                       <textarea name="allergies" id="allergies" cols="30" rows="10" class='form-control' value='Nil'></textarea>
                                                      <span class="error" id="all-err"></span>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                    <div class="form-group">
                                                      <label for="allergies">Ailments (comma seperated):</label>
                                                       <textarea name="ailment" id="ailment" cols="30" rows="10" class='form-control' value='Nil'></textarea>
                                                      <span class="error" id="ail-err"></span>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                    <div class="form-group">
                                                      <label for="disable">Disabilities (comma seperated):</label>
                                                       <textarea name="disable" id="disable" cols="30" rows="10" class='form-control' value='Nil'></textarea>
                                                      <span class="error" id="dis-err"></span>
                                                      </div>
                                                    </div>
                                                </div>
                                               </div>
                                                </fieldset>

                                                <fieldset>
                                                    <legend>Academic Information</legend>
                                                    <div class="row mb-3">

<div class="col-lg-3">
        <div class="mb-3">
            <label for="formrow-faculty" class="form-label">Faculty</label>
            <select id="formrow-faculty" class="form-select" name='faculty'>
                <option selected>Choose...</option>
                <option value='Art'>Art</option>
                <option value='Engineering'>Engineering</option>
                <option value='Physical Sciences'>Physical Science</option>
            </select>
        </div>
    </div>

<div class="col-lg-3">
        <div class="mb-3">
            <label for="formrow-dep" class="form-label">Department</label>
            <select id="formrow-dep" class="form-select" name='department'>
                <option>Choose...</option>
                <option value='Applied Art'>Applied Art</option>
                <option value='Electronic Engineering'>Electronic Engineering</option>
                <option value='Computer Sciences'>Computer Science</option>
            </select>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="mb-3">
            <label for="formrow-level" class="form-label">Current Level of Study</label>
            <select id="formrow-level" class="form-select" name='cls'>
                <option>Choose...</option>
                <option value='100'>100</option>
                <option value='200'>200</option>
                <option value='300'>300</option>
                <option value='400'>400</option>
                <option value='500'>500</option>
                <option value='600'>600</option>
            </select>
        </div>
    </div>
    
    
    <div class="col-lg-3">
        <div class="mb-3">
            <label for="formrow-inputZip" class="form-label">Year Admitted</label>
                <select name="yearAdd" id="year" class="form-control">
                <option value="">Year...</option>  
                <?php for($i=2021; $i>=1970; $i--){ ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>          
                </select>
        </div>
    </div>
</div>

                                            <div class="row mb-3">

                                            <div class="col-lg-3">
        <div class="mb-3">
            <label for="formrow-course" class="form-label">Course Duration</label>
            <select id="formrow-course" class="form-select" name='course'>
                <option value=''>Choose...</option>
                <option value='1'>1 year</option>
                <option value='2'>2 years</option>
                <option value='3'>3 years</option>
                <option value='4'>4 years</option>
                <option value='5'>5 years</option>
                <option value='6'>6 years</option>
            </select>
        </div>
    </div>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-year" class="form-label">Expected year of Graduation</label>
                                                        <input type="text" class="form-control" id="formrow-year" placeholder="Expected year of Graduation" readonly name='gradyear'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-att" class="form-label">Attendance Rate(100%)</label>
                                                        <input type="text" class="form-control" id="formrow-att" placeholder="Percentage rate of attendace" value='0%' name='attRate'>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-year" class="form-label">Current CGPA (Over 5)</label>
                                                        <input type="text" class="form-control" id="formrow-gp" placeholder="Current Grade Point Accumulative" name='cgpa'>
                                                    </div>
                                                </div>
                                             </div>
                                                </fieldset>
                                            </div>

                                           

                                           
                                 
                                            <div class="mb-3">
                                                
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                      Check me out
                                                    </label>
                                                </div>
                                               <!-- Generating Student Matriculation number  -->
                                                <div class="row mt-3">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <button class="btn btn-lg btn-primary" id="generate" type='button'>Generate Matric Number</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="mb-3">
                                                        <label for="formrow-phone-input" class="form-label">Matriculation Number</label>
                                                        <input type="text" class="form-control" id="matric" placeholder="2014/187452" name='matric' readonly>
                                                    </div>
                                                </div>
                                               </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" name='submit'>Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>

</div>
</div>
</div>



<?php include_once 'footer.php' ?>
<script src="student.js"></script>