<?php
   include("includes/db/database.php"); 

   //get product seo name
   $productseo = $_GET['vid'];
   //fetch details from product
   $productd = $db->prepare("SELECT * FROM products WHERE productseoname = :seoname AND status = :status");
   $productd->bindParam(":seoname", $productseo);
   $productd->bindParam(":status", $status);
   $productd->execute();
   //count 
   $count = $productd->rowCount();
   if($count > 0){
      //fetch product
      $fproduct = $productd->fetch(PDO::FETCH_ASSOC);
      $productname = $fproduct['product_name'];
      $productdescription = $fproduct['product_description'];
      $productcategory = $fproduct['product_category'];
      $uniquecode = $fproduct['unique_code'];
      $productseoname = $fproduct['productseoname'];
      $pimage = $fproduct['product_img'];
      //get product image
      // $pimg = $db->prepare("SELECT * FROM upload_image WHERE uniqueid = :uniqueid");
      // $pimg->bindParam(":uniqueid", $uniquecode);
      // $pimg->execute();
      // //fetch
      // $fpimg = $pimg->fetch(PDO::FETCH_ASSOC);
      // $pimage = $fpimg['imagename'];
      //get product cat
      $pcat = $db->prepare("SELECT * FROM products_category WHERE pcatid = :menuid");
      $pcat->bindParam(":menuid", $productcategory);
      $pcat->execute();
      //fetch
      $fpcat = $pcat->fetch(PDO::FETCH_ASSOC);
      $pcatname = $fpcat['pcatname'];
      $pcatseoname = $fpcat['pcatseourl'];
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
      <?php
         include("includes/common/meta.php"); 
      ?>
   </head>
   <body class="single-product style-2">
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" >
            <div class="col-full">
               <div class="pizzaro-breadcrumb">
                  <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                     <a href="<?php echo $path; ?>">Home</a><span class="delimiter"><i class="po po-arrow-right-slider"></i></span>
                     <a href="<?php echo $path; ?>jumboking-menu">Products</a>
                     <span class="delimiter"><i class="po po-arrow-right-slider"></i></span><?php echo $productname; ?>
                  </nav>
               </div>
               <!-- /.woocommerce-breadcrumb -->
               <div id="primary" class="content-area">
                  <main id="main" class="site-main" >
                     <div class="product type-product status-publish has-post-thumbnail product_cat-pizza pa_food-type-veg first instock shipping-taxable purchasable product-type-variable has-children">
                        <div class="single-product-wrapper">
                           <div class="product-images-wrapper">
                              <div class="images">
                                 <a href="<?php echo $path.$uploads.$pimage; ?>" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto[product-gallery]">
                                 <img width="600" height="600" src="<?php echo $path.$uploads.$pimage; ?>" class="attachment-shop_single size-shop_single wp-post-image" alt=""/>
                                 </a>
                              </div>
                           </div>
                           <!-- /.product-images-wrapper -->
                           <div class="summary entry-summary">
                              <h1 itemprop="name" class="product_title entry-title"><?php echo $productname; ?><span class="food-type-icon"><i class="po po-veggie-icon"></i></span></h1>
                              <div itemprop="offers" style="display: none;">
                                 <p class="price">
                                    <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"><?php echo $currency; ?></span>39.80</span>&ndash;<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo $currency; ?><</span>59.90</span>
                                 </p>
                              </div>
                              <div itemprop="description">
                                 <p><?php echo $productdescription; ?></p>
                              </div>
                              <!-- AddToAny BEGIN -->
                          	<div class="social-share-btn a2a_kit a2a_kit_size_32 a2a_default_style">
                          		<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                          		<a class="a2a_button_facebook"></a>
                          		<a class="a2a_button_twitter"></a>
                          		<a class="a2a_button_google_plus"></a>
                          		<a class="a2a_button_pinterest"></a>
                          	</div>
                          	<!-- AddToAny END -->
                              <div class="thumbnails columns-4">
                                 <a href="<?php echo $path.$uploads.$pimage; ?>" class="zoom first" title="" data-rel="prettyPhoto[product-gallery]">
                                 <img width="180" height="180" src="<?php echo $path.$uploads.$pimage; ?>" class="attachment-shop_thumbnail size-shop_thumbnail" alt=""/>
                                 </a>
                                 </a>
                              </div>
                           </div>
                           <!-- .summary -->
                        </div>
                        <!-- /.single-product-wrapper -->
                        <div class="product-form-wrapper" style="display: none;">
                           <div class="delivery-time">Delivery: <span>35 minutes</span></div>
                           <form class="variations_form cart"  enctype='multipart/form-data' data-product_id="116" data-product_variations="[{&quot;variation_id&quot;:117,&quot;variation_is_visible&quot;:true,&quot;variation_is_active&quot;:true,&quot;is_purchasable&quot;:true,&quot;display_price&quot;:41.9,&quot;display_regular_price&quot;:41.9,&quot;attributes&quot;:{&quot;attribute_select-crust&quot;:&quot;Double Crust&quot;,&quot;attribute_select-size&quot;:&quot;Small - 22cm&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;image_caption&quot;:&quot;&quot;,&quot;image_srcset&quot;:&quot;&quot;,&quot;image_sizes&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-amount amount\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-currencySymbol\&quot;&gt;&amp;#36;&lt;\/span&gt;41.90&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:null,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;variation_description&quot;:&quot;&quot;},{&quot;variation_id&quot;:118,&quot;variation_is_visible&quot;:true,&quot;variation_is_active&quot;:true,&quot;is_purchasable&quot;:true,&quot;display_price&quot;:39.8,&quot;display_regular_price&quot;:39.8,&quot;attributes&quot;:{&quot;attribute_select-crust&quot;:&quot;Thin Crust without sause&quot;,&quot;attribute_select-size&quot;:&quot;Small - 22cm&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;image_caption&quot;:&quot;&quot;,&quot;image_srcset&quot;:&quot;&quot;,&quot;image_sizes&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-amount amount\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-currencySymbol\&quot;&gt;&amp;#36;&lt;\/span&gt;39.80&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:null,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;variation_description&quot;:&quot;&quot;},{&quot;variation_id&quot;:119,&quot;variation_is_visible&quot;:true,&quot;variation_is_active&quot;:true,&quot;is_purchasable&quot;:true,&quot;display_price&quot;:40.9,&quot;display_regular_price&quot;:40.9,&quot;attributes&quot;:{&quot;attribute_select-crust&quot;:&quot;Thick Crust&quot;,&quot;attribute_select-size&quot;:&quot;Small - 22cm&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;image_caption&quot;:&quot;&quot;,&quot;image_srcset&quot;:&quot;&quot;,&quot;image_sizes&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-amount amount\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-currencySymbol\&quot;&gt;&amp;#36;&lt;\/span&gt;40.90&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:null,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;variation_description&quot;:&quot;&quot;},{&quot;variation_id&quot;:120,&quot;variation_is_visible&quot;:true,&quot;variation_is_active&quot;:true,&quot;is_purchasable&quot;:true,&quot;display_price&quot;:39.8,&quot;display_regular_price&quot;:39.8,&quot;attributes&quot;:{&quot;attribute_select-crust&quot;:&quot;Original Crust&quot;,&quot;attribute_select-size&quot;:&quot;Small - 22cm&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;image_caption&quot;:&quot;&quot;,&quot;image_srcset&quot;:&quot;&quot;,&quot;image_sizes&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-amount amount\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-currencySymbol\&quot;&gt;&amp;#36;&lt;\/span&gt;39.80&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:null,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;variation_description&quot;:&quot;&quot;},{&quot;variation_id&quot;:121,&quot;variation_is_visible&quot;:true,&quot;variation_is_active&quot;:true,&quot;is_purchasable&quot;:true,&quot;display_price&quot;:49.9,&quot;display_regular_price&quot;:49.9,&quot;attributes&quot;:{&quot;attribute_select-crust&quot;:&quot;&quot;,&quot;attribute_select-size&quot;:&quot;Medium - 29cm&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;image_caption&quot;:&quot;&quot;,&quot;image_srcset&quot;:&quot;&quot;,&quot;image_sizes&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-amount amount\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-currencySymbol\&quot;&gt;&amp;#36;&lt;\/span&gt;49.90&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:null,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;variation_description&quot;:&quot;&quot;},{&quot;variation_id&quot;:122,&quot;variation_is_visible&quot;:true,&quot;variation_is_active&quot;:true,&quot;is_purchasable&quot;:true,&quot;display_price&quot;:59.9,&quot;display_regular_price&quot;:59.9,&quot;attributes&quot;:{&quot;attribute_select-crust&quot;:&quot;&quot;,&quot;attribute_select-size&quot;:&quot;Large - 35cm&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;image_caption&quot;:&quot;&quot;,&quot;image_srcset&quot;:&quot;&quot;,&quot;image_sizes&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-amount amount\&quot;&gt;&lt;span class=\&quot;woocommerce-Price-currencySymbol\&quot;&gt;&amp;#36;&lt;\/span&gt;59.90&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:null,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;variation_description&quot;:&quot;&quot;}]">
                              <table class="variations" >
                                 <tbody>
                                    <tr>
                                       <td class="label"><label for="select-crust">Select Crust</label></td>
                                       <td class="value">
                                          <select id="select-crust" class="" name="attribute_select-crust" data-attribute_name="attribute_select-crust">
                                             <option value="">Choose an option</option>
                                             <option value="Original Crust" >Original Crust</option>
                                             <option value="Thick Crust" >Thick Crust</option>
                                             <option value="Thin Crust without sause" >Thin Crust without sause</option>
                                             <option value="Double Crust" >Double Crust</option>
                                          </select>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="label"><label for="select-size">Select Size</label></td>
                                       <td class="value">
                                          <select id="select-size" class="" name="attribute_select-size" data-attribute_name="attribute_select-size">
                                             <option value="">Choose an option</option>
                                             <option value="Small - 22cm" >Small - 22cm</option>
                                             <option value="Medium - 29cm" >Medium - 29cm</option>
                                             <option value="Large - 35cm"  selected='selected'>Large - 35cm</option>
                                          </select>
                                          <a class="reset_variations" href="#">Clear</a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              <div class="single_variation_wrap">
                                 <div class="woocommerce-variation single_variation"></div>
                                 <div class="woocommerce-variation-add-to-cart variations_button">
                                    <div class="qty-btn">
                                       <label>Quantity</label>
                                       <div class="quantity">
                                          <input type="number" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" />
                                       </div>
                                    </div>
                                    <button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>
                                    <input type="hidden" name="add-to-cart" value="116" />
                                    <input type="hidden" name="product_id" value="116" />
                                    <input type="hidden" name="variation_id" class="variation_id" value="0" />
                                 </div>
                              </div>
                           </form>
                        </div>
                        <!-- /.product-images-wrapper -->
                        <div class="woocommerce-tabs wc-tabs-wrapper">
                           <ul class="nav nav-tabs pizzaro-nav-tabs tabs wc-tabs" >
                              <li class="nav-item description_tab active">
                                 <a href="#tab-description" class="active" data-toggle="tab">Description</a>
                              </li>
                              <li class="nav-item additional_information_tab">
                                 <a href="#tab-additional_information" data-toggle="tab">Additional Information</a>
                              </li>
                              <li class="nav-item nutrition_tab">
                                 <a href="#tab-nutrition" data-toggle="tab">Nutritions</a>
                              </li>
                              <li class="nav-item reviews_tab">
                                 <a href="#tab-reviews" data-toggle="tab">Reviews</a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane panel active entry-content wc-tab" id="tab-description">
                                 <div class="tab-description">
                                    <p><?php echo $productdescription; ?></p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                 </div>
                              </div>
                              <div class="tab-pane in panel entry-content wc-tab" id="tab-additional_information">
                                 <div class="tab-additional_information">
                                    <table class="shop_attributes">
                                       <tr class="">
                                          <th>Food Type</th>
                                          <td>
                                             <p>Veg</p>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>
                              <div class="tab-pane panel entry-content wc-tab" id="tab-nutrition">
                                 <div class="tab-nutrition">
                                    <h3 class="table-version">Nutrition Informations Version 2</h3>
                                    <div class="table-responsive">
                                       <table class="table-style-02" style="height: 118px">
                                          <thead>
                                             <tr>
                                                <th>Size</th>
                                                <th>Energy/Kj</th>
                                                <th>energy/kcal</th>
                                                <th>fat/g</th>
                                                <th>carbohydrate/g</th>
                                                <th>sugar/g</th>
                                                <th>protein/g</th>
                                                <th>salt</th>
                                                <th>lactose/g</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <th scope="row">28 cm</th>
                                                <td>728</td>
                                                <td>1054</td>
                                                <td>68</td>
                                                <td>25</td>
                                                <td>25</td>
                                                <td>548</td>
                                                <td>9</td>
                                                <td>15</td>
                                             </tr>
                                             <tr>
                                                <th scope="row">35 cm</th>
                                                <td>923</td>
                                                <td>1352</td>
                                                <td>98</td>
                                                <td>48</td>
                                                <td>75</td>
                                                <td>846</td>
                                                <td>9</td>
                                                <td>27</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <!-- /.panel -->
                              <div class="tab-pane panel entry-content wc-tab" id="tab-reviews">
                                 <div class="tab-reviews">
                                    <div id="reviews" class="woocommerce-Reviews">
                                       <div id="review_form_wrapper">
                                          <div id="review_form">
                                             <div id="respond" class="comment-respond">
                                                <h3 id="reply-title" class="comment-reply-title">Be the first to review &ldquo;<?php echo $productname; ?>&rdquo;
                                                   <small>
                                                   <a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a>
                                                   </small>
                                                </h3>
                                                <form action="#"  id="commentform" class="comment-form" novalidate>
                                                   <p class="comment-notes">
                                                      <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                   </p>
                                                   <p class="comment-form-rating">
                                                      <label>Your Rating</label>
                                                  </p>
                                                   <p class="stars">
                                                      <span>
                                                      <a class="star-1" href="#">1</a>
                                                      <a class="star-2" href="#">2</a>
                                                      <a class="star-3" href="#">3</a>
                                                      <a class="star-4" href="#">4</a>
                                                      <a class="star-5" href="#">5</a>
                                                      </span>
                                                   </p>

                                                   <p class="comment-form-comment">
                                                      <label for="comment">Your Review <span class="required">*</span></label>
                                                      <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                   </p>
                                                   <p class="comment-form-author">
                                                      <label for="author">Name <span class="required">*</span></label>
                                                      <input id="author" name="author" type="text" value="" size="30" aria-required="true" required />
                                                   </p>
                                                   <p class="comment-form-email">
                                                      <label for="email">Email <span class="required">*</span></label>
                                                      <input id="email" name="email" type="email" value="" size="30" aria-required="true" required />
                                                   </p>
                                                   <p class="form-submit">
                                                      <input name="submit" type="submit" id="submit" class="submit" value="Submit" />
                                                      <input type='hidden' name='comment_post_ID' value='50' id='comment_post_ID' />
                                                      <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                                   </p>
                                                </form>
                                             </div>
                                             <!-- #respond -->
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                 </div>
                              </div>
                              <!-- /.panel -->
                           </div>
                        </div>
                        <div class="section-products" style="display: none;">
                           <h2 class="section-title">This Goes Great Withh</h2>
                           <div class="columns-4">
                              <ul class="products">
                                 <li class="product first">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                             <img src="assets/images/products/p9.jpg" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                                <h3>Trio Cheese</h3>
                                                <div itemprop="description">
                                                   <p style="max-height: none;">Extra-virgin olive oil, garlic, mozzarella, mushrooms and olives.</p>
                                                </div>
                                                <div  class="yith_wapo_groups_container">
                                                   <div  class="ywapo_group_container ywapo_group_container_radio form-row form-row-wide " data-requested="1" data-type="radio" data-id="1" data-condition="">
                                                      <h3><span>Pick Size</span></h3>
                                                      <div class="ywapo_input_container ywapo_input_container_radio">


                                                         <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">22 cm</span></span><span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>19</span></span>
                                                      </div>
                                                      <div class="ywapo_input_container ywapo_input_container_radio">

                                                         <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">29 cm</span></span>
                                                         <span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>25</span></span>
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
                                 <li class="product ">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                             <img src="assets/images/products/p10.jpg" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                                <h3>Trio Cheese</h3>
                                                <div itemprop="description">
                                                   <p style="max-height: none;">Extra-virgin olive oil, garlic, mozzarella, mushrooms and olives.</p>
                                                </div>
                                                <div  class="yith_wapo_groups_container">
                                                   <div  class="ywapo_group_container ywapo_group_container_radio form-row form-row-wide " data-requested="1" data-type="radio" data-id="1" data-condition="">
                                                      <h3><span>Pick Size</span></h3>
                                                      <div class="ywapo_input_container ywapo_input_container_radio">


                                                         <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">22 cm</span></span><span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>19</span></span>
                                                      </div>
                                                      <div class="ywapo_input_container ywapo_input_container_radio">

                                                         <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">29 cm</span></span>
                                                         <span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>25</span></span>
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
                                 <li class="product ">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                             <img src="assets/images/products/p2.jpg" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                                <h3>Trio Cheese</h3>
                                                <div itemprop="description">
                                                   <p style="max-height: none;">Extra-virgin olive oil, garlic, mozzarella, mushrooms and olives.</p>
                                                </div>
                                                <div  class="yith_wapo_groups_container">
                                                   <div  class="ywapo_group_container ywapo_group_container_radio form-row form-row-wide " data-requested="1" data-type="radio" data-id="1" data-condition="">
                                                      <h3><span>Pick Size</span></h3>
                                                      <div class="ywapo_input_container ywapo_input_container_radio">


                                                         <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">22 cm</span></span><span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>19</span></span>
                                                      </div>
                                                      <div class="ywapo_input_container ywapo_input_container_radio">

                                                         <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">29 cm</span></span>
                                                         <span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>25</span></span>
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
                                 <li class="product last">
                                    <div class="product-outer">
                                       <div class="product-inner">
                                          <div class="product-image-wrapper">
                                             <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                             <img src="assets/images/products/p1.jpg" class="img-responsive" alt="">
                                             </a>
                                          </div>
                                          <div class="product-content-wrapper">
                                             <a href="single-product-v1.html" class="woocommerce-LoopProduct-link">
                                                <h3>Trio Cheese</h3>
                                                <div itemprop="description">
                                                   <p style="max-height: none;">Extra-virgin olive oil, garlic, mozzarella, mushrooms and olives.</p>
                                                </div>
                                                <div  class="yith_wapo_groups_container">
                                                   <div  class="ywapo_group_container ywapo_group_container_radio form-row form-row-wide " data-requested="1" data-type="radio" data-id="1" data-condition="">
                                                      <h3><span>Pick Size</span></h3>
                                                      <div class="ywapo_input_container ywapo_input_container_radio">


                                                         <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">22 cm</span></span><span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>19</span></span>
                                                      </div>
                                                      <div class="ywapo_input_container ywapo_input_container_radio">

                                                         <span class="ywapo_label_tag_position_after"><span class="ywapo_option_label ywapo_label_position_after">29 cm</span></span>
                                                         <span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>25</span></span>
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
                              </ul>
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
<?php 
}else{
   header("location: ".$path."404");
}
?>
