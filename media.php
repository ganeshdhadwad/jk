<?php
   include("includes/db/database.php");
   $onlinetag = $_GET['vid'];
   //echo $onlinetag;
   //get cat id
   $mediacatid = $db->prepare("SELECT * FROM coverage_type WHERE coveragetypeseoname = :coveragetypeseoname");
   $mediacatid->bindParam(":coveragetypeseoname", $onlinetag);
   $mediacatid->execute();
   //fetch id
   $fid = $mediacatid->fetch(PDO::FETCH_ASSOC);
   $catid = $fid['ctypeid'];
   echo $catid;
   $coveragetypename = $fid['coveragetypename'];
   //now get post from the table
   $getcpost = $db->prepare("SELECT * FROM coverage WHERE coverage_type = :coveragetype AND status = :status ORDER BY created DESC");
   $getcpost->bindParam(":coveragetype", $catid);
   $getcpost->bindParam(":status", $status);
   $getcpost->execute();
   //count 
   $postcount = $getcpost->rowCount();
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
      <?php
         include("includes/common/meta.php"); 
      ?>
   </head>
   <body class="blog blog-grid right-sidebar">
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" >
            <div class="col-full">
               <div class="pizzaro-breadcrumb">
                  <nav class="woocommerce-breadcrumb" >
                     <a href="<?php echo $path; ?>">Home</a><span class="delimiter"><i class="po po-arrow-right-slider"></i></span>Media<span class="delimiter"><i class="po po-arrow-right-slider"></i></span><a href="<?php echo $path.'media/'.$onlinetag; ?>"><?php echo $coveragetypename; ?></a>
                  </nav>
               </div>
               <!-- .woocommerce-breadcrumb -->
               <div id="primary" class="content-area">
                  <main id="main" class="site-main" >
                     <div class="posts">
                        <?php
                           if($postcount > 0){
                              //fetch post
                           $i = '1';
                           while($rowf = $getcpost->fetch(PDO::FETCH_ASSOC)){
                              $coverageid = $rowf['coverageid'];
                              $coverage_head = $rowf['coverage_head'];
                              $coverage_desc = $rowf['coverage_desc'];
                              $coverage_img = $rowf['coverage_img'];
                              $created = $rowf['created'];
                              $datef = date('F j, Y', $created);
                              $coverage_seo_url = $rowf['coverage_seo_url'];
                              $newdesc = short_str($coverage_desc, 150);
                              ?>
                              <article id="post-<?php echo $coverageid; ?>" class="post-<?php echo $coverageid; ?> post type-post status-publish format-image has-post-thumbnail sticky hentry category-technology tag-event tag-festival tag-music tag-woocommerce post_format-post-format-image">
                           <header class="entry-header">
                              <div class="media-attachment">
                                 <div class="post-thumbnail">
                                    <a href="<?php echo $path.'media/'.$onlinetag.'/'.$coverage_seo_url; ?>">
                                    <img width="1619" height="827" src="<?php echo $path.'uploads/'.$coverage_img; ?>" class="attachment-full size-full wp-post-image" alt="" />
                                    </a>
                                 </div>
                              </div>
                              <h1 class="alpha entry-title">
                                 <a href="<?php echo $path.'media/'.$onlinetag.'/'.$coverage_seo_url; ?>"><?php echo ucfirst($coverage_head); ?></a>
                              </h1>
                              <div class="entry-meta">
                                 <div class="cat-links">
                                    <a href="<?php echo $path.'media/'.$onlinetag; ?>" rel="category tag"><?php echo $onlinetag; ?></a>
                                 </div>
                                 <span class="posted-on">
                                 <a href="<?php echo $path.'media/'.$onlinetag.'/'.$coverage_seo_url; ?>" rel="bookmark">
                                 <time class="entry-date published" datetime="<?php echo $created; ?>"><?php echo $datef; ?></time>
                                 </a>
                                 </span>
                                 <div class="author" style="display: none;">
                                    <div class="label">Posted by:</div>
                                    <a href="<?php echo $path.'media/'.$onlinetag.'/'.$coverage_seo_url; ?>" title="Posts by Jumboking" rel="author">Jumboking</a>
                                 </div>
                              </div>
                           </header>
                           <!-- .entry-header -->
                           <div class="entry-content">
                              <p><?php echo $newdesc; ?></p>
                              <div class="post-readmore">
                                 <a href="<?php echo $path.'media/'.$onlinetag.'/'.$coverage_seo_url; ?>" class="read-more-text">Read More</a>
                              </div>
                              <span class="comments-link" style="display: none;">
                              <a href="#">Leave a comment</a>
                              </span>
                           </div>
                        </article>
                              <?php 
                              $i++;
                              } 
                           }else{
                        ?>
                           <div>
                              No Post to show
                           </div>
                        <?php 
                           }
                        ?>
                        
                     </div>
                     <!-- /.posts -->
                     <nav id="post-navigation" class="navigation pagination"  aria-label="Post Navigation" style="display: none;">
                        <span class="screen-reader-text">Posts navigation</span>
                        <div class="nav-links">
                           <ul class='page-numbers'>
                              <li><span class='page-numbers current'>1</span></li>
                              <li><a class='page-numbers' href='#'>2</a></li>
                              <li><a class="next page-numbers" href="#">Next Page &nbsp;&nbsp;&nbsp;&rarr;</a></li>
                           </ul>
                        </div>
                     </nav>
                  </main>
                  <!-- #main -->
               </div>
               <!-- #primary -->
               <?php
                  include("includes/common/blog-right-sidebar.php");
               ?>
               <!-- #secondary -->
            </div>
            <!-- .col-full -->
         </div>
         <!-- #content -->
         <?php
            include("includes/common/whatsapp-chat.php"); 
            include("includes/common/footer.php"); 
         ?>
         <!-- #colophon -->
      </div>
      <!-- Return to Top -->
      <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
      <script type="text/javascript" src="<?php echo $assets; ?>js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/tether.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/owl.carousel.min.js"></script>
      
      <script type="text/javascript" src="<?php echo $assets; ?>js/social.share.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/scripts.min.js"></script>

   <!-- Plugin JS file -->
   <script src="<?php echo $assets; ?>plugin/components/moment/moment.min.js"></script>
   <!--<script src="<?php echo $assets; ?>plugin/components/moment/moment-timezone-with-data.min.js"></script>-->
   <script src="<?php echo $assets; ?>plugin/components/moment/moment-timezone-with-data-10-year-range.min.js"></script>
   <script src="<?php echo $assets; ?>plugin/whatsapp-chat-support.js"></script>
   <script>

      $('#jumboking-whatsapp-chat').whatsappChatSupport({
         defaultMsg : '',
      });

      // ===== Scroll to Top ==== 
      $(window).scroll(function() {
          if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
              $('#return-to-top').fadeIn(200);    // Fade in the arrow
          } else {
              $('#return-to-top').fadeOut(200);   // Else fade out the arrow
          }
      });
      $('#return-to-top').click(function() {      // When arrow is clicked
          $('body,html').animate({
              scrollTop : 0                       // Scroll to top of body
          }, 500);
      });
   </script>
   </body>
</html>
