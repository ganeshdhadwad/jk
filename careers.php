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
      <style>
    /** popup content starts **/
    .lightbox {

          position:fixed;

          top:0;

          left:0;

          width:100%;

          height:100%;

          background:rgba(0, 0, 0, .8);

          z-index: 999999;

       }
       .lightbox_table {

        width:100%;

        height:100%;
    }



    .lightbox_table_cell {

        vertical-align:middle;

    }
    .popupbox{
        width:400px; background-color:#fff; border:1px solid #e0e0e0; border-radius: 3px;
    }
    /** transparent popup ends **/
    </style>
   </head>
   <body class="faq">
      <?php
            include("includes/common/pop-up/lightbox.php"); 
         ?>
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" >
            <div class="col-full">
               <div class="pizzaro-breadcrumb">
                  <nav class="woocommerce-breadcrumb" ><a href="<?php echo $path; ?>">Home</a><span class="delimiter"><i class="po po-arrow-right-slider"></i></span><a href="<?php echo $path.'careers'; ?>">Career's page</a></nav>
               </div>
               <!-- .woocommerce-breadcrumb -->
               <div id="primary" class="content-area">
                  <main id="main" class="site-main" >
                     <div id="post-375" class="post-375 page type-page status-publish hentry">
                        <header class="entry-header">
                           <h1 class="entry-title">Looking for Career with us</h1>
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                           <div class="kc-elm kc-css-550442 kc_row">
                              <div class="kc-row-container  kc-container">
                                 <div class="kc-wrap-columns">
                                    <div class="kc-elm kc-css-248013 kc_col-sm-12 col-md-12 kc_column kc_col-sm-12">
                                       <div class="kc-col-container">
                                          <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="gy-3">
                                                   <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">First Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="first-name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Last Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="last-name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Email id</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="emailid">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Phone number</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="phone-number">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Applying for Position</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-control" id="applyingposition">
                                                                        <option value="" class="form-label form-control">--Please choose an position--</option>
                                                                        <option value="Executive – Business Development">Executive – Business Development</option><option value="Executive – Legal">Executive – Legal</option><option value="Executive – Project">Executive – Project</option><option value="Executive – Real Estate">Executive – Real Estate</option><option value="Executive -  Franchisee Recruitment &amp; Lead Management">Executive -  Franchisee Recruitment &amp; Lead Management</option><option value="Executive – Accounts">Executive – Accounts</option><option value="Executive – Systems">Executive – Systems</option><option value="Executive –Operations">Executive –Operations</option><option value="Executive – Supply Chain">Executive – Supply Chain</option><option value="Executive – Marketing">Executive – Marketing</option><option value="Executive – Trainee">Executive – Trainee</option><option value="Manager – Business Development">Manager – Business Development</option><option value="Manager – Legal">Manager – Legal</option><option value="Manager – Project">Manager – Project</option><option value="Manager – Real Estate">Manager – Real Estate</option><option value="Manager – Accounts">Manager – Accounts</option><option value="Manager – Systems">Manager – Systems</option><option value="Manager –Operations">Manager –Operations</option><option value="Manager – Supply Chain">Manager – Supply Chain</option><option value="Manager – Marketing">Manager – Marketing</option><option value="Manager – Trainee">Manager – Trainee</option><option value="Others">Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Upload CV</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <form id="cropimage" method="post" class="form-control" style="padding: 10px;" enctype="multipart/form-data" action="<?php echo $path; ?>uploadcv-ajax.php">
                                                                        <div id="preview">
                                                                        </div>
                                                                        <a href="#" onclick="document.getElementById('photoimg').click(); return false;" style="margin-left: -10px; margin-top: -4px; position: absolute; width: 100%; text-align: center;" id="browsebt">Browse to upload CV</a>
                                                                            <input type="file" name="photoimg" id="photoimg" style="visibility: hidden;">
                                                                        </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Message</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control" id="applicant-message"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row g-3">
                                                        <div class="col-lg-7" style="float: right;">
                                                            <div class="form-group mt-2">
                                                                <div class="wpcf7-form-control wpcf7-submit button" id="add-application" inform="addapplication">Submit Application</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
      <a href="javascript:" id="return-to-top" style="display: none;"><i class="fa fa-chevron-up"></i></a>
      <script type="text/javascript" src="<?php echo $assets; ?>js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/tether.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/owl.carousel.min.js"></script>
      <script src="<?php echo $assets; ?>js/jquery-1.11.1.js?ver=1.0.0"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/jquery-form.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/default.js"></script>
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
