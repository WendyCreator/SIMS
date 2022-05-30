<?php include 'header.php' ?>  

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=835484216466882";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
       
      <!-- Breadcromb Area Start -->
      <section class="gauto-breadcromb-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="breadcromb-box">
                     <h3>Blog</h3>
                     <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li><a href="index">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Blog</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcromb Area End -->
       
		<?php
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
         $page_no = $_GET['page_no'];
         }else{
            $page_no = 1;
         } 
         $total_records_per_page = 20;

      ?>
      <!-- Blog Page Area Start -->
      <section class="gauto-blog-page-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="blog-page-left">
                  <?php 
                  if(isset($_GET['blog_id'])){
                     $blog = $conn->real_escape_string($_GET['blog_id']);
                     $blog = $conn->query("SELECT * FROM blog WHERE dblog_id='$blog'");
                     $blog_title = str_replace(' ', '-', $row['dtitle']);
                     $post_id = $row['dblog_id'];
                     while($row=$blog->fetch_assoc()):?>
                     <div class="single-blog">
                        <div class="blog-image">
                           <a href="blog?<?php echo $blog_title; ?>&&blog_id=<?php echo $row['dblog_id']; ?>">
                           <img src="_slide_blog/<?php echo $row['dimg']; ?>" alt="blog image" />
                           </a>
                        </div>
                        <div class="blog-text">
                           <h3><a href="blog?blog_title=<?php echo $row['dtitle']; ?>&&blog_id=<?php echo $row['dblog_id']; ?>"><?php echo $row['dtitle']; ?></a></h3>
                           
                              <p><?php echo date("M d, Y", strtotime($row['ddate'])) ?></p>
                              <div style="color:#333">
                              <p > <?php echo $row['ddesc']; ?></p>
                              </div>
                             
                        </div>
                     </div>

                     <?php endwhile; }else{

                        if(isset($_GET['search'])){
                           $search = $conn->real_escape_string($_GET['search']);
                           $sqls = $conn->query("SELECT * FROM blog WHERE dtitle LIKE '%$search%' OR ddesc LIKE '%$search%' ORDER BY id DESC ");
                           $total_records =$sqls->num_rows;
                           $total_no_of_pages = ceil($total_records / $total_records_per_page);
                           $start_from = ($page_no - 1) * $total_records_per_page;
      
                           $blog = $conn->query("SELECT * FROM blog WHERE dtitle LIKE '%$search%' OR ddesc LIKE '%$search%' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                        }else{
                           $sqls = $conn->query("SELECT * FROM blog ORDER BY id DESC ");
                           $total_records =$sqls->num_rows;
                           $total_no_of_pages = ceil($total_records / $total_records_per_page);
                           $start_from = ($page_no - 1) * $total_records_per_page;

                           $blog = $conn->query("SELECT * FROM blog ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                        }
                        if($blog->num_rows>0){
                     while($row=$blog->fetch_assoc()):?>
                     <div class="single-blog">
                        <div class="blog-image">
                           <a href="blog?blog_title=<?php echo $row['dtitle']; ?>&&blog_id=<?php echo $row['dblog_id']; ?>">
                           <img src="_slide_blog/<?php echo $row['dimg']; ?>" alt="blog image" />
                           </a>
                        </div>
                        <div class="blog-text">
                           <h3><a href="blog?blog_title=<?php echo $row['dtitle']; ?>&&blog_id=<?php echo $row['dblog_id']; ?>"><?php echo $row['dtitle']; ?></a></h3>
                          
                              <p><?php echo date("M d, Y", strtotime($row['ddate'])) ?></p>
                              <div style="color:#333">
                              <p style="color:#333"> <?php echo limit_text($row['ddesc'],50); ?></p>
                              </div>
                            
                           <a href="blog?blog_id=<?php echo $row['dblog_id']; ?>" class="gauto-btn">read more</a>
                        </div>
                     </div>
                     <?php  endwhile; }else{
                        echo "<p class='text-danger'>No result found <p>";
                     } } ?>
                     <div class="pagination-box-row">
                        <!-- <p>Page 1 of 6</p> -->
                        <ul class="pagination">
                           
                           <?php 
                           if(!isset($_GET['blog_id'])){
                          
                           for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                    echo "<li  class='page-items '><a class='page-links' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                 
                                 }
                              }

                          ?>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="blog-page-right">
                     <div class="sidebar-widget">
                        <form class="product_search" action="blog" method="GET">
                           <input type="search" name="search" required placeholder="Keywords..." />
                           <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                     </div>
                     <!-- <div class="sidebar-widget">
                        <h3>By Category</h3>
                        <ul class="service-menu">
                           <li class="active">
                              <a href="#">
                              headlamps <span>(2376)</span>
                              </a>
                           </li>
                          
                           <li>
                              <a href="#">
                              Shock Absorber <span>(23)</span>
                              </a>
                           </li>
                        </ul>
                     </div> -->
                     
                     <div class="sidebar-widget">
                        <h3>recent post</h3>
                        <ul class="top-products">
                        <?php 
                           $blog = $conn->query("SELECT * FROM blog ORDER BY id DESC LIMIT 10");
                           while($row=$blog->fetch_assoc()):?>
                           <li>
                              <div class="recent-img">
                                 <a href="#">
                                    <img src="_slide_blog/<?php echo $row['dimg']; ?>" alt="blog image" />
                                 </a>
                              </div>
                              <div class="recent-text">
                                 <h4>
                                 <a href="blog?blog_id=<?php echo $row['dblog_id']; ?>"><?php echo $row['dtitle']; ?></a>
                                 </h4>
                              </div>
                           </li>
                           <?php endwhile; ?>
                           
                        </ul>

                        <br><br>
                        <!-- widget tweet center -->
                        <div class="widget shadow widget-helping-center hider" id="desktopshow">
                              <h4 class="widget-title">Like Us On Facebook</h4>
                              <div class="widget-content">
                                 
                           <div class="fb-page" data-href="https://www.facebook.com/Pamdrive/" data-tabs="timeline" d data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Pamdrive/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Pamdrive/">Pamdriveng</a></blockquote></div>
                           
                           
                           
                                    
                              </div>
                        </div>
                        <!-- /widget tweet center -->
					
                        <!-- widget tweet center 
                        <div class="widget shadow widget-helping-center hider">
                              <h4 class="widget-title">Our Tweets</h4>
                              <div class="widget-content">
                                 
                           <a class="twitter-timeline" data-height="500" href="https://twitter.com/Pamdriveng">Tweets by Pamdriveng</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                    
                              </div>
                        </div>
                        /widget tweet center -->

                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Blog Page Area End -->
       
     
      <?php 
      include 'footer.php'; 
      // require 'text-limit.php'; 
      function limit_text($text,$limit){
    if(str_word_count($text, 0)>$limit){
        $word = str_word_count($text,2);
        $pos=array_keys($word);
        $text=substr($text,0,$pos[$limit]). '...';
    }
    return $text;
}
 ?>  
     