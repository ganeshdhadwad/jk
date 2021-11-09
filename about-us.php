<?php
   include("includes/db/database.php"); 
   //get contenbt for about us
   $aboutus = $db->prepare("SELECT * FROM about_us WHERE status = :status");
   $aboutus->bindParam(":status", $status);
   $aboutus->execute();
   //fetch
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
      <?php
         include("includes/common/meta.php"); 
      ?>
   </head>
   <body class="about full-width page-template-template-aboutpage">
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" >
            <div class="col-full">
               <div id="primary" class="content-area">
                  <main id="main" class="site-main">
                     <div class="pizzaro-basics ">
                        <figure>
                           <img width="1920" height="418" src="assets/images/about-banner.jpg" alt="" />
                        </figure>
                        <div class="pizzaro-breadcrumb" style="margin-top: 29px;">
                           <nav class="woocommerce-breadcrumb"><a href="<?php echo $path; ?>">Home</a><span class="delimiter"><i class="po po-arrow-right-slider"></i></span><a href="<?php echo $path; ?>about-us">About us</a><span class="delimiter"><i class="po po-arrow-right-slider"></i></span>Brand Journey</nav>
                        </div>
                        <div class="container">
                           <div class="row">
                              
                                    <?php
                                    $i = '1';
                                    while($fetchabout = $aboutus->fetch(PDO::FETCH_ASSOC)){
                                       $aboutid = $fetchabout['aboutid'];
                                       $aboutheading = $fetchabout['content_heading'];
                                       $aboutcontent = nl2br($fetchabout['main_content']);
                                       $aboutimage = $fetchabout['content_image'];
                                       if($aboutid == 1){
                                    ?>
                                    <div class="blocks">
                                       <div class="block col-xs-12 col-sm-4">
                                          <h2><?php echo $aboutheading ; ?></h2>
                                       </div>
                                       <div class="block col-xs-12 col-sm-8">
                                          <p><?php echo $aboutcontent ; ?></p>
                                       </div>
                                    </div>
                                    <?php 
                                       } 
                                       if($aboutid == 2){
                                    ?>
                                    <div class="blocks">
                                       <div class="block col-xs-12 col-sm-4">
                                          <h2><?php echo $aboutheading ; ?></h2><br/>
                                          <img src="<?php echo $assets.'images/'.$aboutimage; ?>" class="border-radius-11"/>
                                       </div>
                                       <div class="block col-xs-12 col-sm-8">
                                          <p><?php echo $aboutcontent ; ?></p>
                                       </div>
                                    </div>
                                    <?php 
                                       }
                                       $i++;
                                    }
                                       
                                    ?>
                                    
                              
                           </div>
                        </div>
                     </div>
                  </main>
                  <!-- #main -->
               </div>
               <!-- #primary -->
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
      <a href="javascript:" id="return-to-top" style="display: none;"><i class="fa fa-chevron-up"></i></a>
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
