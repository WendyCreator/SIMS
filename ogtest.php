<?php 
                     $title = $_SESSION['title'];
                     $dqte = $_SESSION['dqte'];
                     $myimg = $_SESSION['blogimg'] ;
          if(isset($_GET['blog_title'])){ ?>
         <?php $blog = $conn->query("SELECT * FROM blog WHERE dtitle='$blog'"); ?>
               
           <meta property="og:locale" content="en_US" />
 <meta property="og:type" content="article" />
 <meta property="og:title" content="<?php echo $row['dtitle']; ?> - Pamdrive" />
 <meta property="og:description" content="<?php echo $row['dtitle']; ?> - Pamdrive" />
 <meta property="og:site_name" content="pamdrive.com"/>
 <meta property="article:published_time" content="<?php echo date("M d, Y", strtotime($row['ddate'])) ?>" />
 <meta property="og:image" content="https://pamdrive/<?php echo "_slide_blog/".$row['dimg'] ?>.jpg" />
 <meta property="og:image:width" content="412" />
 <meta property="og:image:height" content="285" />




 <?php 
                     $title = $_SESSION['title'];
                     $dqte = $_SESSION['dqte'];
                     $myimg = $_SESSION['blogimg'] ;
          if(isset($_GET['blog_title'])){ ?>
           <meta property="og:locale" content="en_US" />
 <meta property="og:type" content="article" />
 <meta property="og:title" content="<?php echo $title ?> - Pamdrive" />
 <meta property="og:description" content="<?php echo $title; ?> - Pamdrive" />
 <meta property="og:site_name" content="pamdrive.com"/>
 <meta property="article:published_time" content="<?php echo $dqte ?>" />
 <meta property="og:image" content="https://pamdrive/<?php echo $myimg ?>.jpg" />
 <meta property="og:image:width" content="412" />
 <meta property="og:image:height" content="285" />