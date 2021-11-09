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
   <body class="full-width grid-view columns-6 archive woocommerce-page">
      <div id="page" class="hfeed site">
          <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1">
            <div class="col-full">
               <div id="primary" class="content-area">
                  <main id="main" class="site-main" >
                     <div class="columns-6">
                        <ul class="products">
                        <?php
                              //get products 
                              $getproducts = $db->prepare("SELECT * FROM products WHERE status = :status ORDER BY productid DESC");
                              $getproducts->bindParam(":status", $status);
                              $getproducts->execute();
                              //fetch count
                              $countp = $getproducts->rowCount();
                              if($countp > 0){
                                 //fetch now
                                 $n = '1';
                                 while($productfetch = $getproducts->fetch(PDO::FETCH_ASSOC)){
                                    $productname = $productfetch['product_name'];
                                    $productdescription = $productfetch['product_description'];
                                    $uniquecode = $productfetch['unique_code'];
                                    $productseoname = $productfetch['productseoname'];
                                    $imagename = $productfetch['product_img'];
                                    //fetch now image
                                    // $fetchpim = $db->prepare("SELECT * FROM upload_image WHERE uniqueid = :uniquecode");
                                    // $fetchpim->bindParam(":uniquecode", $uniquecode);
                                    // $fetchpim->execute();
                                    // //fetch image
                                    // $fetchuim = $fetchpim->fetch(PDO::FETCH_ASSOC);
                                    // $imagename = $fetchuim['imagename'];?>
             <li class="product last">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                             <img src="<?php echo $path.$uploads.$imagename; ?>" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                                <div><?php echo $productname; ?></div>
                                                <div itemprop="description">
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area" style="display: none;">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <?php 
                                 $n++;  
                                 }
                              } else {
                                 echo 'No Products';
                              }
                           ?>
                        </ul>
                     </div>
                     <nav class="woocommerce-pagination" style="display: none;">
                        <ul class="page-numbers">
                           <li><span class="page-numbers current">1</span></li>
                           <li><a class="page-numbers" href="#">2</a></li>
                           <li><a class="page-numbers" href="#">3</a></li>
                           <li><a class="next page-numbers" href="#">Next Page &nbsp;&nbsp;&nbsp;→</a></li>
                        </ul>
                     </nav>
                  </main>
                  <!-- #main -->
               </div>
               <!-- #primary -->
            </div>
            <!-- .col-full -->
         </div>
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
