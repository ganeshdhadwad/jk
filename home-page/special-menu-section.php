<div class="section-tabs">
   <ul class="nav nav-tabs pizzaro-nav-tabs" >
      <?php
         //get featured menu 
         $fmenu = $db->prepare("SELECT * FROM secondary_menu WHERE feature_on_homepage = :featureonhome ORDER BY sort_order ASC limit 3");
         $fmenu->bindParam(":featureonhome", $status);
         $fmenu->execute();
         //now count row 
         $frow = $fmenu->rowCount(); 
         //echo $frow;
         $i = '1';
         //now fetch
         while($ffetch = $fmenu->fetch(PDO::FETCH_ASSOC)){
            $menucat = $ffetch['smenuid'];
            $smenuname = ucfirst($ffetch['secondary_menu_name']);
            if($i == 1){
            ?>
            <li class="nav-item">
               <a href="#h1-tab-products-<?php echo $menucat; ?>" data-toggle="tab"><?php echo $smenuname; ?></a>
            </li>
            <?php
            }
            if($i == 2){
            ?>
            <li class="nav-item active">
                <a href="#h1-tab-products-<?php echo $menucat; ?>" class="active" data-toggle="tab"><?php echo $smenuname; ?></a>
            </li>
            <?php   
            }
            if($i == 3){
            ?>
            <li class="nav-item">
               <a href="#h1-tab-products-<?php echo $menucat; ?>" data-toggle="tab"><?php echo $smenuname; ?></a>
            </li>
            <?php
            }
         $i++; 
         }
      ?>
   </ul>
   <div class="tab-content">
      <?php
         //get result of products of feature home
         //get featured menu 
         $fsmenu = $db->prepare("SELECT * FROM secondary_menu WHERE feature_on_homepage = :featureonhome ORDER BY sort_order ASC limit 3");
         $fsmenu->bindParam(":featureonhome", $status);
         $fsmenu->execute();
         //echo $frow;
         $i = '1';
         //now fetch
         while($fsfetch = $fsmenu->fetch(PDO::FETCH_ASSOC)){
            $menucat = $fsfetch['smenuid'];
            //now enter this is product page
            $getpro = $db->prepare("SELECT * FROM products WHERE product_category = :pcat ORDER BY productid DESC limit 3");
            $getpro->bindParam(":pcat", $menucat);
            $getpro->execute();
            if($i == 1){
               $active = '';
            }else if($i == 2){
               $active = 'active';
            }else if($i == 3){
               $active = '';
            }
            ?>
            <div class="tab-pane <?php echo $active; ?>" id="h1-tab-products-<?php echo $menucat; ?>" checki="<?php echo $i; ?>">
                     <div class="section-products">
                        <div class="woocommerce columns-3">
                                    <div class="columns-3">
                                       <ul class="products">
                                       <?php
                                       $rowcount = $getpro->rowCount();
                                       $n == 1;
                                       while($pfetch = $getpro->fetch(PDO::FETCH_ASSOC)){
                                          if($n == 1){
                                                   $first = 'first';
                                                }else if($n == 2){
                                                   $first = '';
                                                }else if($n == 3){
                                                   $first = 'last';
                                                }
                                           if($rowcount == '0'){
                                                echo 'No Products to show';
                                             }else{
                                                
                                       ?>
                                       <li class="product <?php echo $first; ?>" checkid="<?php echo $n; ?>">
                                             <div class="product-outer">
                                                <div class="product-inner">
                                                   <div class="product-image-wrapper">
                                                      <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                                      <img src="assets/images/products/IMG-20210616-WA0026.jpg" class="img-responsive border-radius-11" alt="">
                                                      </a>
                                                   </div>
                                                   <div class="product-content-wrapper">
                                                      <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                                         <h3>Crispy Veg Wrap</h3>
                                                         <div itemprop="description">
                                                            <p style="max-height: none;">Extra-virgin olive oil, garlic, mozzarella, mushrooms and olives.</p>
                                                         </div>
                                                         <div  class="yith_wapo_groups_container">
                                                            <div  class="ywapo_group_container ywapo_group_container_radio form-row form-row-wide " data-requested="1" data-type="radio" data-id="1" data-condition="">
                                                               <h3><span>Pick Size</span></h3>
                                                               <div class="ywapo_input_container ywapo_input_container_radio">


                                                                  <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">22 cm</span></span><span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span>19</span></span>
                                                               </div>
                                                               <div class="ywapo_input_container ywapo_input_container_radio">

                                                                  <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">29 cm</span></span>
                                                                  <span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span>25</span></span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </a>
                                                      <div class="hover-area">
                                                         <a rel="nofollow" href="single-product-v1.html" data-quantity="1" data-product_id="51" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- /.product-outer -->
                                          </li>
                                          <!-- /.products -->
                                       <?php 
                                             $n++;
                                             }
                                       }
                                       
                                       ?>
                                       </ul>
                                    </div>
                        </div>
                     </div>
            </div>
            <?php
            $i++; 
         }
      ?>
      <!-- /.panel -->
      </div>
      <div style="clear: both;"></div>
   </div>