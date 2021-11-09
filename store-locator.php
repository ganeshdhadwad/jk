<?php
   include("includes/db/database.php"); 
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
      <?php
         include("includes/common/meta.php"); 
      ?>
   </head>
   <body class="store-locator-page">
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" >
            <div class="col-full">
               <div class="pizzaro-breadcrumb">
                  <nav class="woocommerce-breadcrumb" >
                     <a href="<?php echo $path; ?>">Home</a>
                     <span class="delimiter"><i class="po po-arrow-right-slider"></i></span>Store Locator
                  </nav>
               </div>
               <!-- .woocommerce-breadcrumb -->
               <div id="primary" class="content-area">
                  <main id="main" class="site-main" >
                     <div id="post-537" class="post-537 page type-page status-publish hentry">
                        <header class="entry-header">
                           <h1 class="entry-title">Store Locator</h1>
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                           <div id="wpsl-wrap">
                              <div class="wpsl-search wpsl-clearfix ">
                                 <div id="wpsl-search-wrap">
                                    <div class="wpsl-from">
                                       <div class="wpsl-input">
                                          <div>
                                             <label for="wpsl-search-input">Your location</label>
                                          </div>
                                          <input id="wpsl-search-input" type="text" value="" name="wpsl-search-input" placeholder="" aria-required="true" />
                                       </div>
                                       <div class="wpsl-select-wrap">
                                          <div class="wpsl-radius">
                                             <label for="wpsl-radius-dropdown">Search radius</label>
                                             <div class="wpsl-dropdown">
                                                <select id="wpsl-radius-dropdown" class="" name="wpsl-radius">
                                                   <option value="10">10 km</option>
                                                   <option value="25">25 km</option>
                                                   <option selected="selected" value="50">50 km</option>
                                                   <option value="100">100 km</option>
                                                   <option value="200">200 km</option>
                                                   <option value="500">500 km</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="wpsl-results">
                                             <label for="wpsl-results-dropdown">Results</label>
                                             <div class="wpsl-dropdown">
                                                <select id="wpsl-results-dropdown" class="" name="wpsl-results">
                                                   <option selected="selected" value="25">25</option>
                                                   <option value="50">50</option>
                                                   <option value="75">75</option>
                                                   <option value="100">100</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="wpsl-search-btn-wrap">
                                          <input id="wpsl-search-btn" type="submit" value="Search">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="wpsl-result-list" class="col-md-4 col-sm-6 col-lg-4 col-xs-12">
                                 <div id="wpsl-stores" >
                                    <ul>
                                       <li data-store-id="535">
                                          <div>
                                             <p>
                                                <strong>Jumboking Foods Pvt. Ltd.</strong>
                                                <span class="wpsl-street"><br/>73, Virwani Industrial Estate,</span>
                                                <span> W.E.Highway, Goregaon (East), Mumbai 400 063.</span>
                                                <span class="wpsl-country">India</span>
                                             </p>
                                          </div>
                                          <div class="wpsl-direction-wrap">2.9 km
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-md-8 col-sm-6 col-lg-8 col-xs-12 map">
                                 <!-- <div id="wpsl-gmap" class="wpsl-gmap-canvas"></div> -->
                                 <div class="contact-map" >
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30148.386726392826!2d72.83931793955078!3d19.171238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3c574d00077%3A0x6c4d2900f06bbb3d!2sJumboking%20-%20Head%20Office!5e0!3m2!1sen!2sin!4v1628016064511!5m2!1sen!2sin" height="462" allowfullscreen></iframe>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- .entry-content -->
                     </div>
                     <!-- #post-## -->
                  </main>
                  <!-- #main -->
               </div>
               <!-- #primary -->
            </div>
            <!-- .col-full -->
         </div>
         <!-- #content -->
         <?php
            //include("home-page/static-gallery.php"); 
         ?>
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
