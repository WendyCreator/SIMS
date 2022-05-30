<?php include_once 'head.php';
  if(!isset($_SESSION['loggedin'])){
    header("Location:index.php");
} elseif($_SESSION['loggedin'] != true){
    header("Location:auth-lock-screen.php");
}
?>
<!-- Sweet Alert-->
<!-- <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" /> -->


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
                <?php
           $matric = $_GET['matric'];
        //    $id = $_GET['id'];
        //    $school = $_GET['school'];
           $sql = formQuery("SELECT * FROM redflag WHERE matricNo = '$matric'");
           if($sql->num_rows > 0){
              
               $row= $sql->fetch_assoc(); 
                 $comments = explode('|',  $row['dcomment']);
                 $userids = explode('|',  $row['setBy']);
            //    echo var_dump($comments);
        //     foreach($comments as $comment){
        //         foreach($userids as $userid){
        //             $complete = array();
        //             array_push($complete, $comment[$userid]);
        //         }
        //     }
        //    echo var_dump($complete);

            // $complete = array(foreach($comments as $comment));
        //    foreach($complete as $user => $comm){
        //        echo "key: $user <br> value: $comm";
        //    }
?>
                <div class="card">
               

                        <div class="row">
                        <div class="col-xl-12">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14">Red flag comments...</h5>
                                                    <p class="card-title-desc">Click on each head to view red comments</p>

                                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                                        <?php
                                                        $num = 0;
                                                         foreach($comments as $comment){
                                                             $num++;
                                                        echo '<div class="accordion-item">
                                                        <h2 class="accordion-header" id="flush-headingOne">
                                                            <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                                            Red comment #'.$num.'
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body text-muted">'. $comment .'</div>
                                                        </div>
                                                    </div>';
                                                        }
                                    
                                                        ?>
                                                        <h3 class='mt-4'>Red flags Created by</h3>
                                                        <?php
                                                          $ids= 0;
                                                          foreach($userids as $userid){
                                                              $ids++;
                                                           echo "<p>Comment $ids by - $userid</p>";
                                                          }
                                                        ?>
                                                        
                                                        <!-- <div class="accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                                Accordion Item #2
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body text-muted">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore.</div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingThree">
                                                                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                                Accordion Item #3
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body text-muted">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</div>
                                                            </div>
                                                        </div>
                                                      </div> -->
                                                    <!-- end accordion -->
                                                </div>
                                            </div>
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
   <?php } 
   unset($_SESSION['redmsg']);
   ?>
  </div>
</div>