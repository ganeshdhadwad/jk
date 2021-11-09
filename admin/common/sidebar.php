<!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu" style="background-color: #b81f24 !important;">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="<?php echo $path; ?>admin/dashboard" class="logo-link nk-sidebar-logo">
                           <!-- <img class="logo-light logo-img" src="<?php echo $path; ?>images/logo.png" srcset="<?php echo $path; ?>images/logo2x.png 2x" alt="logo"> -->
                            <img class="logo-dark logo-img" style="opacity: 1; max-height: 26px !important;" src="<?php echo $path; ?>assets/images/jumboking-logo-white.png" srcset="<?php echo $path; ?>assets/images/jumboking-logo-white.png 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>admin/dashboard" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-dashlite"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">Dashboard</span>
                                    </a>
                                </li>
                                <!-- franchisee menu starts -->
                                <li class="nk-menu-heading" style="margin-top: -40px;">
                                    <h6 class="overline-title text-primary-alt" style="color: #f1c40f;">Franchisee's Details</h6>
                                </li>
                                 <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>staff/training-videos" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">All List</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <!-- franchisee menu starts -->
                                <!-- User menu starts -->
                                <li class="nk-menu-heading" style="margin-top: -20px;">
                                    <h6 class="overline-title text-primary-alt" style="color: #f1c40f;">Staff's Details</h6>
                                </li>
                                 <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>staff/training-videos" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">All List</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <!-- User menu starts -->
                                <!-- Website Content menu starts -->
                                <li class="nk-menu-heading" style="margin-top: -20px;">
                                    <h6 class="overline-title text-primary-alt" style="color: #f1c40f;">Website Content Details</h6>
                                </li>
                                 <li class="nk-menu-item" style="display: none;">
                                    <a href="<?php echo $path; ?>admin/top-menu" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">Top Menu</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>admin/franchisee-enquiries" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-question"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">Apply for Franchisee</span>
                                        <?php
                                                //get count
                                                $getfcount = $db->prepare("SELECT * FROM apply_for_franchisee WHERE status = :status"); 
                                                $getfcount->bindParam(":status", $status);
                                                $getfcount->execute();
                                                //fetch count
                                                $fcount = $getfcount->rowCount();
                                                if($fcount > 0){
                                            ?>
                                            <span style="width: 30px;
                                        height: 30px;
                                        background: #f1c40f;
                                        border-radius: 50%;
                                            top: 5px;
                                        right: 45px;
                                        position: absolute;
                                        box-shadow: 0 2px 5px rgb(0 0 0 / 50%);
                                        text-align: center;
                                        font-size: 15px;
                                        font-family: sans-serif;
                                        color: #000;
                                        line-height: 2;">
                                        <?php echo $fcount; ?>
                                        </span>
                                            <?php 
                                                }else{}
                                            ?>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>admin/career-messages" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-question"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">Career</span>
                                        <?php
                                                $checkst = '1';
                                                //get count
                                                $getfcount1 = $db->prepare("SELECT * FROM careers WHERE status = :status"); 
                                                $getfcount1->bindParam(":status", $checkst);
                                                $getfcount1->execute();
                                                //fetch count
                                                $fcount1 = $getfcount1->rowCount();
                                                if($fcount1 > 0){
                                            ?>
                                            <span style="width: 30px;
                                        height: 30px;
                                        background: #f1c40f;
                                        border-radius: 50%;
                                            top: 5px;
                                        right: 45px;
                                        position: absolute;
                                        box-shadow: 0 2px 5px rgb(0 0 0 / 50%);
                                        text-align: center;
                                        font-size: 15px;
                                        font-family: sans-serif;
                                        color: #000;
                                        line-height: 2;">
                                        <?php echo $fcount1; ?>
                                        </span>
                                            <?php 
                                                }else{}
                                            ?>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>admin/contact-messages" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-question"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">Contact us</span>
                                        <?php
                                                 $checkst2 = '0';
                                                //get count
                                                $getfcount2 = $db->prepare("SELECT * FROM contact_enquiry WHERE status = :status"); 
                                                $getfcount2->bindParam(":status", $checkst2);
                                                $getfcount2->execute();
                                                //fetch count
                                                $fcount2 = $getfcount2->rowCount();
                                                if($fcount2 > 0){
                                            ?>
                                            <span style="width: 30px;
                                        height: 30px;
                                        background: #f1c40f;
                                        border-radius: 50%;
                                            top: 5px;
                                        right: 45px;
                                        position: absolute;
                                        box-shadow: 0 2px 5px rgb(0 0 0 / 50%);
                                        text-align: center;
                                        font-size: 15px;
                                        font-family: sans-serif;
                                        color: #000;
                                        line-height: 2;">
                                        <?php echo $fcount2; ?>
                                        </span>
                                            <?php 
                                                }else{}
                                            ?>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>admin/all-feedbacks" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-question"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">Feedbacks</span>
                                        <?php
                                                 $checkst3 = '0';
                                                //get count
                                                $getfcount3 = $db->prepare("SELECT * FROM feedback_messages WHERE status = :status"); 
                                                $getfcount3->bindParam(":status", $checkst3);
                                                $getfcount3->execute();
                                                //fetch count
                                                $fcount3 = $getfcount3->rowCount();
                                                if($fcount3 > 0){
                                            ?>
                                            <span style="width: 30px;
                                        height: 30px;
                                        background: #f1c40f;
                                        border-radius: 50%;
                                            top: 5px;
                                        right: 45px;
                                        position: absolute;
                                        box-shadow: 0 2px 5px rgb(0 0 0 / 50%);
                                        text-align: center;
                                        font-size: 15px;
                                        font-family: sans-serif;
                                        color: #000;
                                        line-height: 2;">
                                        <?php echo $fcount3; ?>
                                        </span>
                                            <?php 
                                                }else{}
                                            ?>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>admin/products-list" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-question"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">All Products</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>admin/coverage-list" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-question"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">All Coverage's</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo $path; ?>admin/product-categories" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="color: #fff;"><em class="icon ni ni-question"></em></span>
                                        <span class="nk-menu-text" style="color: #fff;">Products category</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <div style="height: 100px;"></div>
                                <!-- Website Content menu starts -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->