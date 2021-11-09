<?php
   include("includes/db/database.php"); 
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
   
<!-- Mirrored from transvelo.github.io/pizzaro-html/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jun 2021 06:05:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
      <?php
         include("includes/common/meta.php"); 
      ?>
   </head>
   <body class="error404 group-blog full-width woocommerce-active">
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" >
            <div class="col-full">
               <div class="pizzaro-breadcrumb">
                  <nav class="woocommerce-breadcrumb" >
                     <a href="index.html">Home</a>
                     <span class="delimiter"><i class="po po-arrow-right-slider"></i></span>Error 404
                  </nav>
               </div>
               <!-- .woocommerce-breadcrumb -->
               <div id="primary" class="content-area">
                  <main id="main" class="site-main">
                     <div class="error-404 not-found">
                        <div class="page-content">
                           <header class="page-header">
                              <h1 class="page-title" style="text-align: center;">Oops! That page can&rsquo;t be found.</h1>
                           </header>
                           <!-- .page-header -->
                           <p style="text-align: center;">Nothing was found at this location. Try searching, or check out the links below.</p>
                           <section aria-label="Search">
                              <div class="widget woocommerce widget_product_search">
                                 <form role="search" method="get" class="woocommerce-product-search" >
                                    <label class="screen-reader-text" for="woocommerce-product-search-field">Search for:</label>
                                    <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="Search Products&hellip;" value="" name="s" title="Search for:" />
                                    <input type="submit" value="Search" />
                                    <input type="hidden" name="post_type" value="product" />
                                 </form>
                              </div>
                           </section>
                        </div>
                        <!-- .page-content -->
                     </div>
                     <!-- .error-404 -->
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
</html>
