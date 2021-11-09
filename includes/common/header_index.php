<header id="masthead" class="site-header header-v1"  style="background-color: #81B622 !important; ">
            <div class="col-full">
               <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
               <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
               <div class="header-wrap" style="margin-top: -23px;">
                  <div class="site-branding">
                     <a href="<?php echo $path; ?>" class="custom-logo-link" rel="home">
                        <img src="<?php echo $assets; ?>images/jumboking-logo-white.png"/>
                     </a>
                  </div>
                  <nav id="site-navigation" class="main-navigation"  aria-label="Primary Navigation" style="margin-right: -17%;">
                     <button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span class="close-icon"><i class="po po-close-delete"></i></span><span class="menu-icon"><i class="po po-menu-icon"></i></span><span class=" screen-reader-text">Menu</span></button>
                     <div class="primary-navigation">
                        <ul id="menu-main-menu" class="menu nav-menu" aria-expanded="false">
                           <?php
                              //get menu from db
                              $getmenu = $db->prepare("SELECT * FROM main_menu WHERE status = :status AND submenu = '0' ORDER BY sort_order ASC");
                              $getmenu->bindParam(":status", $status);
                              $getmenu->execute();
                              //row count
                              $countm = $getmenu->rowCount();
                              //fetch
                              $i='1';
                              while($mfetch = $getmenu->fetch(PDO::FETCH_ASSOC)){
                                 $menuname = $mfetch['menu_name'];
                                 $menuseoname = $mfetch['menu_seo_name'];
                                 $submenu = $mfetch['submenu'];
                                 $menuid = $mfetch['menuid'];
                                 $submenu2relid = $mfetch['submenu2_rel'];
                                 $submenurelidn = $mfetch['submenu_rel_id'];
                                 $getsubmenu = $db->prepare('SELECT * FROM main_menu WHERE status = :status AND submenu_rel_id = :menuid ORDER BY sort_order ASC');
                                 $getsubmenu->bindParam(":status", $status);
                                 $getsubmenu->bindParam(":menuid", $menuid);
                                 $getsubmenu->execute();
                                 $smfetch = $getsubmenu->fetch(PDO::FETCH_ASSOC);
                                 $submenurelid = $smfetch['submenu_rel_id'];
                                 
                                 //echo $menuid.'--';
                                 //echo $submenurelid;
                                 if($submenu2relid > 0){

                                 }else if($submenurelidn > 0){

                                 }else{
                                   if($menuid == $submenurelid){
                                 ?>
                                 <li class="yamm-fw menu-item menu-item-has-children">
                              <a href="#"><?php echo $menuname; ?></a>
                              <ul class="sub-menu">
                                 <li class="menu-item">
                                    <div class="yamm-content">
                                       <div class="kc-elm kc-css-4169277 kc_row">
                                          <div class="kc-row-container  kc-container">
                                             <div class="kc-wrap-columns">
                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                                                   <div class="kc-col-container">
                                                      <div class="widget widget_nav_menu kc-elm kc-css-1908114">
                                                         <div class="menu-pages-menu-1-container">
                                                            <ul id="menu-pages-menu-5" class="menu">
                                                               <?php
                                                               $getsubmenus = $db->prepare('SELECT * FROM main_menu WHERE submenu_rel_id = :menuid AND status = :status ORDER BY sort_order ASC');
                                                               $getsubmenus->bindParam(":status", $status);
                                                               $getsubmenus->bindParam(":menuid", $menuid);
                                                               $getsubmenus->execute();
                                                               $n = '1';
                                                                  while($smfetchw = $getsubmenus->fetch(PDO::FETCH_ASSOC)){
                                                                     $smenuname = $smfetchw['menu_name'];
                                                                     $smenuseoname = $smfetchw['menu_seo_name'];
                                                                     $smenuid = $smfetchw['menuid'];
                                                                     $submenu2 = $smfetchw['submenu2'];
                                                                     $submenu2rel = $smfetchw['submenu2_rel'];
                                                                     if($submenu2rel > 0){
                                                               ?>
                                                               <?php 
                                                                     }else if($submenu2 == 1){
                                                                        //get submenu 2 
                                                                        $getsubmenu2 = $db->prepare("SELECT * FROM main_menu WHERE submenu2_rel = :menu2 AND status = :status ORDER BY sort_order ASC");
                                                                        $getsubmenu2->bindParam(":menu2", $smenuid);
                                                                        $getsubmenu2->bindParam(":status", $status);
                                                                        $getsubmenu2->execute();
                                                                        //count this
                                                                        $getsubmenu2count = $getsubmenu2->rowCount();
                                                               ?>
                                                               <li class="nav-title menu-item" style="margin-top: 1px;float: left; color: #b81f24; margin-right: 76px;"><?php echo $smenuname; ?>
                                                               <?php
                                                                  if($getsubmenu2count > 0){ 
                                                               ?>
                                                                  <ul id="menu-pages-menu-5">
                                                                     <li class="nav-title menu-item"> 
                                                                        <?php
                                                                           $t = '1';
                                                                           while($submenu2fetch = $getsubmenu2->fetch(PDO::FETCH_ASSOC)){
                                                                              $smenu2name = $submenu2fetch['menu_name'];
                                                                              $smenu2seoname = $submenu2fetch['menu_seo_name'];
                                                                              $smenu2id = $submenu2fetch['menuid'];
                                                                        ?><a href="<?php echo $path.$smenu2seoname; ?>" style="color: #333e48;margin-top: 5px;font-size: 0.95em;"><?php echo $smenu2name; ?></a>
                                                                        <?php 
                                                                           $t++;
                                                                           } 
                                                                        ?>
                                                                     </li>
                                                                  </ul>
                                                                  <?php
                                                                     } 
                                                                  ?>
                                                               </li>
                                                               <?php
                                                                     }else{
                                                               ?>
                                                               <li class="nav-title menu-item" style="float: left; margin-right: 76px;"><a href="<?php echo $path.$smenuseoname; ?>"><?php echo $smenuname; ?></a></li>
                                                               <?php 
                                                                     } 
                                                                  $n++;
                                                                  } 
                                                               ?>
                                                               
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </li>
                                 <?php 
                                 }else{
                                 ?>
                                 <li class="menu-item"><a href="<?php echo $path.$menuseoname; ?>"><?php echo $menuname; ?></a></li>
                                 <?php 
                                 }  
                                 }
                                 
                              }
                           ?>
                        </ul>
                     </div>
                     <div class="handheld-navigation">
                        <span class="phm-close">Close</span>
                        <ul  class="menu">
                           <?php
                              //get menu from db
                              $getmenu = $db->prepare("SELECT * FROM main_menu WHERE status = :status AND submenu = '0' ORDER BY sort_order ASC");
                              $getmenu->bindParam(":status", $status);
                              $getmenu->execute();
                              //row count
                              $countm = $getmenu->rowCount();
                              //fetch
                              $i='1';
                              while($mfetch = $getmenu->fetch(PDO::FETCH_ASSOC)){
                                 $menuname = $mfetch['menu_name'];
                                 $menuseoname = $mfetch['menu_seo_name'];
                                 $submenu = $mfetch['submenu'];
                                 $menuid = $mfetch['menuid'];
                                 $submenu2relid = $mfetch['submenu2_rel'];
                                 $submenurelidn = $mfetch['submenu_rel_id'];
                                 $getsubmenu = $db->prepare('SELECT * FROM main_menu WHERE status = :status AND submenu_rel_id = :menuid ORDER BY sort_order ASC');
                                 $getsubmenu->bindParam(":status", $status);
                                 $getsubmenu->bindParam(":menuid", $menuid);
                                 $getsubmenu->execute();
                                 $smfetch = $getsubmenu->fetch(PDO::FETCH_ASSOC);
                                 $submenurelid = $smfetch['submenu_rel_id'];
                                 
                                 //echo $menuid.'--';
                                 //echo $submenurelid;
                                   if($menuid == $submenurelid){
                                 ?>
                                 <li class="yamm-fw menu-item menu-item-has-children">
                              <a href="#"><?php echo $menuname; ?></a>
                              <ul class="sub-menu">
                                 <li class="menu-item">
                                    <div class="yamm-content">
                                       <div class="kc-elm kc-css-4169277 kc_row">
                                          <div class="kc-row-container  kc-container">
                                             <div class="kc-wrap-columns">
                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                                                   <div class="kc-col-container">
                                                      <div class="widget widget_nav_menu kc-elm kc-css-1908114">
                                                         <div class="menu-pages-menu-1-container">
                                                            <ul id="menu-pages-menu-5" class="menu">
                                                               <?php
                                                               $getsubmenus = $db->prepare('SELECT * FROM main_menu WHERE submenu_rel_id = :menuid AND status = :status ORDER BY sort_order ASC');
                                                               $getsubmenus->bindParam(":status", $status);
                                                               $getsubmenus->bindParam(":menuid", $menuid);
                                                               $getsubmenus->execute();
                                                               $n = '1';
                                                                  while($smfetchw = $getsubmenus->fetch(PDO::FETCH_ASSOC)){
                                                                     $smenuname = $smfetchw['menu_name'];
                                                                     $smenuseoname = $smfetchw['menu_seo_name'];
                                                                     $smenuid = $smfetchw['menuid'];
                                                                     $submenu2 = $smfetchw['submenu2'];
                                                                     $submenu2rel = $smfetchw['submenu2_rel'];
                                                                     if($submenu2rel > 0){
                                                               ?>
                                                               <li class="menu-item" style="float: left; margin-right: 76px;"><a href="<?php echo $path.$smenuseoname; ?>"><?php echo $smenuname; ?></a></li>
                                                               <?php 
                                                                     }else if($submenu2 == 1){
                                                                        //get submenu 2 
                                                                        $getsubmenu2 = $db->prepare("SELECT * FROM main_menu WHERE submenu2_rel = :menu2 ORDER BY sort_order ASC");
                                                                        $getsubmenu2->bindParam(":menu2", $smenuid);
                                                                        $getsubmenu2->execute();
                                                                        //count this
                                                                        $getsubmenu2count = $getsubmenu2->rowCount();
                                                               ?>
                                                               <li class="menu-item" style="margin-top: 1px;float: left; color: #b81f24; margin-right: 76px;"><?php echo $smenuname; ?>
                                                               <?php
                                                                  if($getsubmenu2count > 0){ 
                                                               ?>
                                                                  <ul id="menu-pages-menu-5">
                                                                     <li class="nav-title menu-item"> 
                                                                        <?php
                                                                           $t = '1';
                                                                           while($submenu2fetch = $getsubmenu2->fetch(PDO::FETCH_ASSOC)){
                                                                              $smenu2name = $submenu2fetch['menu_name'];
                                                                              $smenu2seoname = $submenu2fetch['menu_seo_name'];
                                                                              $smenu2id = $submenu2fetch['menuid'];
                                                                        ?><a href="<?php echo $path.$smenu2seoname; ?>" style="color: #333e48;margin-top: 5px;font-size: 0.95em;"><?php echo $smenu2name; ?></a>
                                                                        <?php 
                                                                           $t++;
                                                                           } 
                                                                        ?>
                                                                     </li>
                                                                  </ul>
                                                                  <?php
                                                                     } 
                                                                  ?>
                                                               </li>
                                                               <?php
                                                                     }else{
                                                               ?>
                                                               <li class="menu-item" style="float: left; margin-right: 76px;"><a href="<?php echo $path.$smenuseoname; ?>"><?php echo $smenuname; ?></a></li>
                                                               <?php 
                                                                     } 
                                                                  $n++;
                                                                  } 
                                                               ?>
                                                               
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </li>
                                 <?php 
                                 }else{
                                 ?>
                                 <li class="menu-item"><a href="<?php echo $path.$menuseoname; ?>"><?php echo $menuname; ?></a></li>
                                 <?php 
                                 }
                                 
                              }
                           ?>
                        </ul>
                     </div>
                  </nav>
                  <!-- #site-navigation -->
                  <div class="header-info-wrapper">
                     <div class="header-phone-numbers" style="display: none;">
                        <span class="intro-text">Call and Order</span>
                        <select class="select-city-phone-numbers" name="city-phone-numbers" id="city-phone-numbers">
                           <option value="<?php echo $jumbokingcustomercarenumber; ?>"></option>
                        </select>
                        <span id="city-phone-number-label" class="phone-number"><?php echo $jumbokingcustomercarenumber; ?></span>
                     </div>
                     <ul class="site-header-cart-v2 menu" style="display: none;">
                        <img src="<?php echo $assets; ?>images/trust-white.png" style="float: right;"/>
                     </ul>
                  </div>
               </div>
               <div class="pizzaro-secondary-navigation" style="display: none;">
                  <nav class="secondary-navigation"  aria-label="Secondary Navigation">
                     <ul  class="menu">
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
                  </nav>
                  <!-- #secondary-navigation -->
               </div>
            </div>
         </header>