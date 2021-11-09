<?php
   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
    .resendotp {
  padding: 6px 10px; font-sie: 15px; float: left;
}
#
    /** transparent popup ends **/
    </style>
   </head>
   <body class="page home page-template-default">
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
                  <nav class="woocommerce-breadcrumb" ><a href="<?php echo $path; ?>">Home</a><span class="delimiter"><i class="po po-arrow-right-slider"></i></span><a href="<?php echo $path; ?>own-a-jumboking-franchise">Own a Jumboking Franchise</a></nav>
               </div>
               <!-- .woocommerce-breadcrumb -->
               <div id="primary" class="content-area">
                  <main id="main" class="site-main" >
                     <div id="post-403" class="post-403 page type-page status-publish hentry">
                        <header class="entry-header">
                           <h1 class="entry-title">Apply For Franchisee</h1>
                           <p>At Jumboking, we are on a mission to create a World Class Franchising System by hand-holding like-minded entrepreneurs like you and empowering your growth and success</p>
                        </header>
                        <!-- .entry-header -->
                        <div class="container" style="margin-top: 30px;">
                           <div class="row">
                              <div class="blocks">
                                       <div class="block col-xs-12 col-sm-8">
                                          <h2 class="border-radius-11 h2-background">Eligibility criteria for a Unit Franchise</h2>
                                          <p style="margin-top: -30px;">
                                             <h3>Time Commitment</h3>
                                             <p>- Applicant should be willing to invest 100% of his time to the business</p>
                                          </p>
                                          <p>
                                             <h3>Prior Business experience</h3>
                                             <p>- We encourage applicants with prior business experience of 1-2 years.</p>
                                          </p>
                                          <p>
                                             <h3>Investment</h3>
                                             <p><ul>
                                             <li class="nc-bullet-o">
                                                <p>Investment</p>
                                                <ul class="nc-lineheight nc-margin  " style="list-style: initial;">
                                                   <li style="font-weight:bold;">Total setup cost- INR 25 lacs (QSR)</li>
                                                   <ul class="nc-lineheight nc-margin  " style="list-style: initial;">
                                                      <li style="font-weight:bold;">Cost Break-up:</li>
                                                      <ul class="nc-lineheight nc-margin" style="list-style: initial;">
                                                         <li>Franchisee Fee- INR 4 lacs + taxes (non-refundable)</li>
                                                         <li>Refundable security deposit- INR 50,000/-</li>
                                                         <li>Store setup cost - INR 20 lacs for a 250 sq. ft. carpet outlet</li>
                                                         <li>Property deposit – as applicable, (will depend upon the property size &amp; location)</li>
                                                      </ul>
                                                   </ul>
                                                </ul>
                                                <br>
                                                <ul class="nc-lineheight nc-margin  " style="list-style: initial;">
                                                   <li style="font-weight:bold;">Total setup cost- INR 30 lacs (Dine-in)- Outside Maharashtra</li>
                                                   <ul class="nc-lineheight nc-margin  " style="list-style: initial;">
                                                      <li style="font-weight:bold;">Cost Break-up:</li>
                                                      <ul class="nc-lineheight nc-margin" style="list-style: initial;">
                                                         <li>Franchisee Fee- INR 4 lacs + taxes (non-refundable)</li>
                                                         <li>Refundable security deposit- INR 50,000/-</li>
                                                         <li>Store setup cost - INR 26 lacs for a 500 sq. ft. carpet outlet</li>
                                                         <li>Property deposit – as applicable, (will depend upon the property size &amp; location)</li>
                                                      </ul>
                                                   </ul>
                                                </ul>
                                             </li>
                                          </ul>
   </p>
                                          </p>
                                       </div>
                                       <div class="block col-xs-12 col-sm-4">
                                          <div class="entry-content">
                                             <div class="woocommerce">
                                                <div  class="register-for-franchise">
                                                   <h2 class="border-radius-11 h2-background">Personal Details</h2>
                                                   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                      <label for="select-your-state">Select your State <span class="required">*</span></label>
                                                      <select id="select-your-state" inform="citieslist">
                                                         <option value="">Select your State</option>
                                                         <?php
                                                            //get state's
                                                            $getstate = $db->prepare("SELECT * FROM state WHERE status > 0 ORDER BY stateid ASC");
                                                            $getstate->execute();
                                                            //count row
                                                            $getscount = $getstate->rowCount();
                                                            $is = '1';
                                                            while($getsgfetch = $getstate->fetch(PDO::FETCH_ASSOC)){
                                                               $statueid = $getsgfetch['stateid'];
                                                               $statename = ucfirst($getsgfetch['statename']);
                                                               ?>
                                                               <option value="<?php echo $statueid; ?>"><?php echo $statename; ?></option>
                                                               <?php
                                                               $is++;
                                                            } 
                                                         ?>
                                                      </select>
                                                   </p>
                                                   <!-- states code added start -->
                                                   <div id="cities-check" style="display: none;">
                                                      <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                      <label for="select-your-cities">Select your Cities <span class="required">*</span></label>
                                                      <select id="select-your-cities">
                                                      </select>
                                                  </div>
                                                  <!-- states code added ends -->
                                                   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                      <label for="reg_name">Name <span class="required">*</span></label>
                                                      <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name" id="reg_name" value="">
                                                   </p>
                                                   <div class="clear"></div>
                                                   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                      <label for="reg_email">Email ID <span class="required">*</span></label>
                                                      <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="">
                                                   </p>
                                                   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                      <label for="reg_stay">Where do you stay <span class="required">*</span></label>
                                                      <div id="where_do_stay" class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                         <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="where-do-you-stay" id="reg_stay" value="">
                                                      </div>
                                                      <div id="where_do_stayn" style="display: none;" class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                         <select id="select-your-city-stay" inform="subcitieslist">
                                                         </select>
                                                      </div>
                                                   </p>
                                                   <div class="clear"></div>
                                                   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                      <label for="how-you-know-jumboking">How you got to know about Jumboking? <span class="required">*</span></label>
                                                      <select id="how-you-know-jumboking" class="rsform-select-box"><option value="">Select your choice --</option><option value="Website">Website</option><option value="Visited a JK Store">Visited a JK Store</option><option value="Our Advertisement">Our Advertisement</option><option value="Referred by a friend">Referred by a friend</option><option value="Our Email campaign">Our Email campaign</option><option value="Our SMS campaign">Our SMS campaign</option><option value="Social Media">Social Media</option><option value="Others">Others</option></select>
                                                   </p>
                                                   <div class="clear"></div>
                                                   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                      <label for="reg_callbackdate">Preferred call back date <span class="required">*</span></label>
                                                      <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="prefferedd-call-back-date" id="reg_callbackdate" value="">
                                                   </p>
                                                   <div class="clear"></div>
                                                   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                      <label for="reg_callbacktime">Preferred call back time <span class="required">*</span></label>
                                                      <select id="prefferedd-call-back-time" id="reg_callbacktime" class="rsform-select-box"><option value="">Select Your Time --</option><option value="11:00 AM">11:00 AM</option><option value="12:00 PM">12:00 PM</option><option value="02:00 PM">02:00 PM</option><option value="03:00 PM">03:00 PM</option><option value="04:00 PM">04:00 PM</option><option value="05:00 PM">05:00 PM</option></select>
                                                   </p>
                                                   <div class="clear"></div>
                                                   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                      <label for="reg_mobile">Mobile no <span class="required">*</span></label>
                                                      <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="mobile" id="reg_mobile" value="">
                                                   </p>
                                                   <p class="form-row" id="verify_mobile_box" style="display: none;">
                                                      <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="mobileverify" id="reg_mobile_verify" value="" placeholder="Write OTP here..">
                                                   </p>
                                                   <p class="form-row">
                                                      <div class="button resendotp" inform="sendotp" id="sendotp" style="display: none;">Resend OTP</div>
                                                      <div class="button sendotp" inform="sendotp" id="sendotp" style="padding: 6px 10px; font-sie: 15px; float: right;">Send OTP</div>
                                                   </p>
                                                   <div class="clear"></div>
                                                   <p class="form-row">
                                                      <div class="button" inform="submitfranchise" id="submitfranchise" mobileverified="0" style="width: 100%; text-align: center;">Submit</div>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
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
            include("includes/common/whatsapp-chat.php"); 
            include("includes/common/footer.php"); 
         ?>
         <!-- #colophon -->
      </div>
      <!-- Return to Top -->
      <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
      <script type="text/javascript" src="<?php echo $assets; ?>js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/default.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/tether.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/owl.carousel.min.js"></script>
      
      <script type="text/javascript" src="<?php echo $assets; ?>js/social.share.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/scripts.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <!-- Plugin JS file -->
   <script src="<?php echo $assets; ?>plugin/components/moment/moment.min.js"></script>
   <!--<script src="<?php echo $assets; ?>plugin/components/moment/moment-timezone-with-data.min.js"></script>-->
   <script src="<?php echo $assets; ?>plugin/components/moment/moment-timezone-with-data-10-year-range.min.js"></script>
   <script src="<?php echo $assets; ?>plugin/whatsapp-chat-support.js"></script>
   <script>

      $('#jumboking-whatsapp-chat').whatsappChatSupport({
         defaultMsg : '',
      });

      $( function() {
       $( "#reg_callbackdate" ).datepicker({ minDate: 1, maxDate: "+0M +7D", dateFormat: 'dd MM, yy' });
     } );

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
