<!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">All Career Message's</h3>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list nk-tb-ulist">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span class="sub-text">Sr. No.</span></div>
                                                        <div class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Email ID</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Phone Number</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Position</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">CV</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Message</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Applied on</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></div>
                                                        <div class="nk-tb-col nk-tb-col-tools text-right">
                                                            Action
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <?php
                                                        $blank = '0';
                                                        //get menu
                                                        $getmenu = $db->prepare("SELECT * FROM careers ORDER BY careerid DESC");
                                                        $getmenu->execute();
                                                        //now count
                                                        $menucount = $getmenu->rowCount();

                                                        if($menucount > 0){
                                                            //echo $menucount;
                                                            $i = '1';
                                                            while($rowc = $getmenu->fetch(PDO::FETCH_ASSOC)){
                                                                $firstname = $rowc['firstname'];
                                                                $lastname = $rowc['lastname'];
                                                                $emailid = $rowc['emailid'];
                                                                $phonenumber = $rowc['phonenumber'];
                                                                $applyposition = $rowc['applyposition'];
                                                                $uploadcv = $rowc['uploadcv'];
                                                                $message = $rowc['message'];
                                                                $created = $rowc['created'];
                                                                $statusnn = $rowc['status'];
                                                                $careerid    = $rowc['careerid'];
                                                                $date = date("jS F, g:i A", $created);
                                                            ?>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <?php echo $i; ?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                           <?php echo $firstname.'&nbsp;'.$lastname; ?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                            <span class="tb-amount"><?php echo $emailid; ?></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                            <?php echo $phonenumber; ?>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span><?php echo $applyposition; ?></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                            <span><a href="<?php echo $path.'uploads/'.$uploadcv; ?>" target="_blank">Link</a></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span><?php echo $message; ?></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span><?php echo $date; ?></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <?php
                                                                if($statusnn == 1){
                                                                    echo '<span class="tb-status text-danger">Not Seen</span>';
                                                                }else if($statusnn == 2){
                                                                    echo '<span class="tb-status text-success">Seen</span>';
                                                                }else{
                                                                    echo '<span class="tb-status text-warning">--NA--</span>';
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1">
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <?php
                                                                                    if($statusnn == 1){
                                                                                ?>
                                                                                <li><a href="<?php echo $path; ?>admin/common/career-action-btn-code.php?valt=s&mid=<?php echo $careerid; ?>"><em class="icon ni ni-na"></em><span>Seen</span></a></li>
                                                                                <?php 
                                                                                    }else if($statusnn == 2){
                                                                                ?>
                                                                                <li><a href="<?php echo $path; ?>admin/common/career-action-btn-code.php?valt=n&mid=<?php echo $careerid; ?>"><em class="icon ni ni-na"></em><span>Not Seen</span></a></li>
                                                                                <?php 
                                                                                    }else{
                                                                                ?>
                                                                                <li><a href="<?php echo $path; ?>admin/common/career-action-btn-code.php?valt=d&mid=<?php echo $careerid; ?>"><em class="icon ni ni-shield-star"></em><span>Delete</span></a></li>
                                                                                <?php        
                                                                                    }
                                                                                ?>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div><!-- .nk-tb-item -->
                                                            <?php 
                                                            $i++;    
                                                            } 
                                                        }else{
                                                        ?>
                                                        <div>Nothing</div>
                                                        <?php 
                                                        }
                                                    ?>
                                                </div><!-- .nk-tb-list -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner" style="display: none;">
                                                <div class="nk-block-between-md g-3">
                                                    <div class="g">
                                                        <ul class="pagination justify-content-center justify-content-md-start">
                                                            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                        </ul><!-- .pagination -->
                                                    </div>
                                                    <div class="g">
                                                        <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                            <div>Page</div>
                                                            <div>
                                                                <select class="form-select form-select-sm" data-search="on" data-dropdown="xs center">
                                                                    <option value="page-1">1</option>
                                                                    <option value="page-2">2</option>
                                                                    <option value="page-4">4</option>
                                                                    <option value="page-5">5</option>
                                                                    <option value="page-6">6</option>
                                                                    <option value="page-7">7</option>
                                                                    <option value="page-8">8</option>
                                                                    <option value="page-9">9</option>
                                                                    <option value="page-10">10</option>
                                                                    <option value="page-11">11</option>
                                                                    <option value="page-12">12</option>
                                                                    <option value="page-13">13</option>
                                                                    <option value="page-14">14</option>
                                                                    <option value="page-15">15</option>
                                                                    <option value="page-16">16</option>
                                                                    <option value="page-17">17</option>
                                                                    <option value="page-18">18</option>
                                                                    <option value="page-19">19</option>
                                                                    <option value="page-20">20</option>
                                                                </select>
                                                            </div>
                                                            <div>OF 102</div>
                                                        </div>
                                                    </div><!-- .pagination-goto -->
                                                </div><!-- .nk-block-between -->
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->