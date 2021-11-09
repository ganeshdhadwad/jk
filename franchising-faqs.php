<?php
   include("includes/db/database.php"); 
   //fetch
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
      <?php
         include("includes/common/meta.php"); 
      ?>
   </head>
   <body class="faq">
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" >
            <div class="col-full">
               <div class="pizzaro-breadcrumb">
                  <nav class="woocommerce-breadcrumb" ><a href="<?php echo $path; ?>">Home</a><span class="delimiter"><i class="po po-arrow-right-slider"></i></span><a href="<?php echo $path.'franchising-faqs'; ?>">Franchising FAQ's</a></nav>
               </div>
               <!-- .woocommerce-breadcrumb -->
               <div id="primary" class="content-area">
                  <main id="main" class="site-main" >
                     <div id="post-375" class="post-375 page type-page status-publish hentry">
                        <header class="entry-header">
                           <h1 class="entry-title">Franchising FAQ's</h1>
                           <p class="entry-subtitle">This Agreement was last modified on 18 December 2016.</p>
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                           <div class="kc-elm kc-css-550442 kc_row">
                              <div class="kc-row-container  kc-container">
                                 <div class="kc-wrap-columns">
                                    <div class="kc-elm kc-css-248013 kc_col-sm-12 col-md-12 kc_column kc_col-sm-12">
                                       <div class="kc-col-container">
                                          <div class="panel-group" id="accordion">
                                             <?php
                                                //get fqas
                                                $getfaq = $db->prepare("SELECT * FROM franchising_faq WHERE status = :status ORDER BY sort_order ASC");
                                                $getfaq->bindParam(":status", $status);
                                                $getfaq->execute();
                                                //while loop
                                                $i = '1';
                                                while($fetchfaq = $getfaq->fetch(PDO::FETCH_ASSOC)){
                                                   $faqquestion = $fetchfaq['question'];
                                                   $faqanswer = $fetchfaq['answer'];
                                                   $sortorder = $fetchfaq['sort_order'];
                                                ?>
                                                <div class="panel panel-default">
                                                   <div class="panel-heading">
                                                      <h3 class="panel-title">
                                                         <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $sortorder; ?>"><i class="fa fa-plus"></i> <?php echo $sortorder.'-&nbsp;'.$faqquestion; ?></a>
                                                      </h3>
                                                   </div>
                                                   <div id="collapse<?php echo $sortorder; ?>" class="panel-collapse collapse">
                                                      <div class="panel-body">
                                                         <p><?php echo $faqanswer; ?></p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <?php 
                                                   $i++;
                                                } 
                                             ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- .entry-content -->
                  </main><!-- #main -->
               </div>
               <!-- #post-## -->
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
