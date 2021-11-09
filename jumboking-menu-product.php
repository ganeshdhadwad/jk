<?php
   include("includes/db/database.php"); 
   $productseo = $_GET['vid'];
   //get cat id
   $productcat = $db->prepare("SELECT * FROM products_category WHERE pcatseourl = :seomenu AND status = :status");
   $productcat->bindParam(":seomenu", $productseo);
   $productcat->bindParam(":status", $status);
   $productcat->execute();
   //fetch cat id
   $pcatfetch = $productcat->fetch(PDO::FETCH_ASSOC);
   $pcatid = $pcatfetch['pcatid'];
   //product category seo from product
   // $productcat = $db->prepare("SELECT * FROM products WHERE product_category = :pcat WHERE status = :status");
   // $productcat->bindParam(":pcat", $pcatid);
   // $productcat->bindParam(":status", $status);
   // $productcat->execute();
   // //fetch product
   // $fetchproduct = $productcat->fetch(PDO::FETCH_ASSOC);
   // $productname = $fetchproduct['product_name'];
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
      <?php
         include("includes/common/meta.php"); 
      ?>
   </head>
   <body class="left-sidebar grid-view columns-3 archive woocommerce-page lite">
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" style="margin-top: -45px;">
            <div class="col-full">
               <div class="pizzaro-breadcrumb" style="display: none;">
                  <nav class="woocommerce-breadcrumb" ><a href="<?php echo $path; ?>">Home</a><span class="delimiter"><i class="po po-arrow-right-slider"></i></span><a href="<?php echo $path; ?>jumboking-menu">Menu</a></nav>
               </div>
                <?php
                  //include("includes/common/jumboking-sorting.php"); 
               ?>
               <div id="primary" class="content-area">
                  <main id="main" class="site-main" >
                     <div class="columns-3">
                        <ul class="products">
                           <?php
                              //get products 
                              $getproducts = $db->prepare("SELECT * FROM products WHERE status = :status AND product_category = :pcat ORDER BY productid DESC limit 0,9");
                              $getproducts->bindParam(":status", $status);
                              $getproducts->bindParam(":pcat", $pcatid);
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
                                    // $imagename = $fetchuim['imagename'];
                                    if($n == 1){
                                    ?>
                                    <li class="product first">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                             <img src="<?php echo $path.$uploads.$imagename; ?>" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                                <h3><?php echo $productname; ?></h3>
                                                <div itemprop="description" style="display: none">
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area" style="display: none">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <!-- /.products -->
                              <?php
                                 }
                                 if($n == 2){
                                    ?>
                                    <li class="product ">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                             <img src="<?php echo $path.$uploads.$imagename; ?>" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                                <h3><?php echo $productname; ?></h3>
                                                <div itemprop="description" style="display: none">
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area" style="display: none">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <!-- /.products -->
                              <?php
                                 }
                                 if($n == 3){
                                    ?>
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
                                                <h3><?php echo $productname; ?></h3>
                                                <div itemprop="description" style="display: none">
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area" style="display: none">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <!-- /.products -->
                              <?php
                                 }
                                 if($n == 4){
                                    ?>
                                    <li class="product first">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                             <img src="<?php echo $path.$uploads.$imagename; ?>" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                                <h3><?php echo $productname; ?></h3>
                                                <div itemprop="description" >
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area" style="display: none">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <!-- /.products -->
                              <?php
                                 }
                                 if($n == 5){
                                    ?>
                                    <li class="product ">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                             <img src="<?php echo $path.$uploads.$imagename; ?>" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                                <h3><?php echo $productname; ?></h3>
                                                <div itemprop="description" style="display: none">
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area" style="display: none">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <!-- /.products -->
                              <?php
                                 }
                                 if($n == 6){
                                    ?>
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
                                                <h3><?php echo $productname; ?></h3>
                                                <div itemprop="description">
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area" style="display: none">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <!-- /.products -->
                              <?php
                                 }
                                 if($n == 7){
                                    ?>
                                    <li class="product first">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                             <img src="<?php echo $path.$uploads.$imagename; ?>" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                                <h3><?php echo $productname; ?></h3>
                                                <div itemprop="description">
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area" style="display: none">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <!-- /.products -->
                              <?php
                                 }
                                 if($n == 8){
                                    ?>
                                    <li class="product ">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                             <img src="<?php echo $path.$uploads.$imagename; ?>" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="<?php echo $path.'product/'.$productseoname; ?>" class="woocommerce-LoopProduct-link">
                                                <h3><?php echo $productname; ?></h3>
                                                <div itemprop="description">
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area" style="display: none">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <!-- /.products -->
                              <?php
                                 }
                                 if($n == 9){
                                    ?>
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
                                                <h3><?php echo $productname; ?></h3>
                                                <div itemprop="description">
                                                   <p style="max-height: none;"><?php echo $productdescription; ?></p>
                                                </div>
                                             </a>
                                             <div class="hover-area">
                                                <a rel="nofollow" href="<?php echo $path.'product/'.$productseoname; ?>" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">View Details</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- /.product-outer -->
                                 </li>
                                 <!-- /.products -->
                              <?php
                                 }
                                 $n++;  
                                 }
                              } else {
                                 echo 'No Products';
                              }
                           ?>
                        </ul>
                     </div>
                     <?php
                        if($countp > 9){
                     ?>
                     <nav class="woocommerce-pagination">
                        <ul class="page-numbers">
                           <li><span class="page-numbers current">1</span></li>
                           <li><a class="page-numbers" href="#">2</a></li>
                           <li><a class="page-numbers" href="#">3</a></li>
                           <li><a class="next page-numbers" href="#">Next Page &nbsp;&nbsp;&nbsp;→</a></li>
                        </ul>
                     </nav>
                     <?php 
                        } 
                     ?>
                  </main>
                  <!-- #main -->
               </div>
               <!-- #primary -->
               <div id="secondary" class="widget-area" role="complementary">
                  <div id="nav_menu-2" class="widget widget_nav_menu">
                     <div class="menu-food-menu-container">
                        <ul id="menu-food-menu-2" class="menu">
                           <?php
                              //get secondary menu
                              $smenu = $db->prepare("SELECT * FROM products_category WHERE status = :status ORDER BY sort_order ASC"); 
                              $smenu->bindParam(":status", $status);
                              $smenu->execute();
                              $i = '1';
                              while($sfetch = $smenu->fetch(PDO::FETCH_ASSOC)){
                                 $smenuname = $sfetch['pcatname'];
                                 $slink = $sfetch['pcatseourl'];
                                 $sicon = $sfetch['pcaticon'];
                              ?>
                              <li class="menu-item"><a href="<?php echo $path.'menu/'.$slink; ?>"><i class="po <?php echo $sicon; ?>"></i><?php echo $smenuname; ?></a></li>
                              <?php 
                                 $i++;
                              }
                           ?>
                        </ul>
                     </div>
                  </div>
                  <div id="search-2" class="widget widget_search" style="display: none;">
                     <form role="search" method="get" class="search-form" action="https://transvelo.github.io/pizzaro-html/blog-single.html">
                        <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                        </label>
                        <input type="submit" class="search-submit" value="Search" />
                     </form>
                  </div>
                  <div id="woocommerce_price_filter-3" class="widget woocommerce widget_price_filter" style="display: none;">
                     <span class="gamma widget-title">Filter by price</span>
                     <form method="get" action="#">
                        <div class="price_slider_wrapper">
                           <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="">
                              <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                              <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span>
                           </div>
                           <div class="price_slider_amount">


                              <button type="submit" class="button">Filter</button>
                              <div class="price_label" style="">
                                 Price: <span class="from"><?php echo $currency; ?>1</span> — <span class="to"><?php echo $currency; ?>59</span>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- best deals starts -->
                  <?php
                     //include("includes/common/best-deals.php"); 
                  ?>
                  <!-- best deals ends -->
               </div>
               <!-- #secondary -->
            </div>
            <!-- .col-full -->
         </div>
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
