<?php
   include("includes/db/database.php"); 
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
   <body class="page-template-template-contactpage">
      <?php
            include("includes/common/pop-up/lightbox.php"); 
         ?>
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" >
            <div class="col-full">
               <div id="primary" class="content-area">
                  <main id="main" class="site-main">
                     <div class="contact-map" >
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30148.386726392826!2d72.83931793955078!3d19.171238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3c574d00077%3A0x6c4d2900f06bbb3d!2sJumboking%20-%20Head%20Office!5e0!3m2!1sen!2sin!4v1628016064511!5m2!1sen!2sin" height="462" allowfullscreen></iframe>
                     </div>
                     <div class="contact-form-with-address">
                        <div class="row">
                           <div class="col-md-9 col-sm-9 col-xs-12">
                              <div class="contact-form">
                                 <h2>Leave us a Message</h2>
                                 <div role="form" class="wpcf7" id="wpcf7-f425-o1" lang="en-US" dir="ltr">
                                    <div class="wpcf7-form" novalidate="novalidate">
                                       <div class="form-group row">
                                          <div class="col-xs-12 col-md-6">
                                             <label>First name*</label> <br/>
                                             <span class="wpcf7-form-control-wrap first-name">
                                             <input type="text" id="first-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" aria-required="true" aria-invalid="false" />
                                             </span>
                                          </div>
                                          <div class="col-xs-12 col-md-6">
                                             <label>Last name*</label><br />
                                             <span class="wpcf7-form-control-wrap last-name">
                                             <input type="text" id="last-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" aria-required="true" aria-invalid="false" />
                                             </span>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-xs-12 col-md-6">
                                             <label>Email id*</label> <br/>
                                             <span class="wpcf7-form-control-wrap first-name">
                                             <input type="text" id="emailid" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" aria-required="true" aria-invalid="false" />
                                             </span>
                                          </div>
                                          <div class="col-xs-12 col-md-6">
                                             <label>Phone no*</label><br />
                                             <span class="wpcf7-form-control-wrap last-name">
                                             <input type="text" id="phonenumber" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" aria-required="true" aria-invalid="false" />
                                             </span>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>Subject</label><br />
                                          <span class="wpcf7-form-control-wrap subject">
                                          <input type="text" id="subject" value="" size="40" class="wpcf7-form-control wpcf7-text input-text" aria-invalid="false" />
                                          </span>
                                       </div>
                                       <div class="form-group">
                                          <label>Your Message</label><br />
                                          <span class="wpcf7-form-control-wrap your-message">
                                          <textarea id="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea>
                                          </span>
                                       </div>
                                       <div class="form-group clearfix">
                                          <p><div class="wpcf7-form-control wpcf7-submit button" id="submit-contact-message" inform="addcontactmsg">Submit</div></p>
                                       </div>
                                       <div class="wpcf7-response-output wpcf7-display-none">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-3 col-xs-12">
                              <div class="store-info">
                                 <h2>Our Address</h2>
                                 <p>Jumboking Foods Pvt. Ltd.<br/>73, Virwani Industrial Estate, W.E.Highway, Goregaon (East), Mumbai 400 063.<br>Support (022) – 2927 1286 / 2927 1357<br>E-mail: mansi.p@jumboking.co.in</p>
                                 <div class="address">
                                    <h3>Careers.</h3>
                                    <div class="address-info">
                                       <p class="inner-right-md">If you are interested in employment opportunities at Jumboking, please email us: <a href="mailto:career@jumboking.co.in">career@jumboking.co.in</a></p>
                                    </div>
                                 </div>
                              </div>
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
      <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
      <script type="text/javascript" src="<?php echo $assets; ?>js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/tether.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/owl.carousel.min.js"></script>
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
