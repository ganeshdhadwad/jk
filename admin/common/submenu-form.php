<div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="gy-3">
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Top Menu</label>
                                                                <span class="form-note">Specify the name of your top sub menu.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-control" id="mainmenuid">
                                                                        <option value="" class="form-label form-control">--Please choose an option--</option>
                                                                        <?php
                                                                        $blank = '0';
                                                                        //get menu
                                                                        $getmenu = $db->prepare("SELECT * FROM main_menu WHERE submenu_rel_id = :relid ORDER BY sort_order ASC"); 
                                                                        $getmenu->bindParam(':relid', $blank);
                                                                        $getmenu->execute();
                                                                        //now count
                                                                        $menucount = $getmenu->rowCount();
                                                                        if($menucount > 0){
                                                                            $i = '1';
                                                                            while($rowc = $getmenu->fetch(PDO::FETCH_ASSOC)){
                                                                                $menuname = $rowc['menu_name'];
                                                                                $menuseoname = $rowc['menu_seo_name'];
                                                                                $sortorder = $rowc['sort_order'];
                                                                                $statusnn = $rowc['status'];
                                                                                $menuid = $rowc['menuid'];
                                                                            ?>
                                                                        <option value="<?php echo $menuid; ?>" class="form-label form-control"><?php echo ucfirst($menuname); ?></option>
                                                                        <?php
                                                                            $i++;
                                                                            }
                                                                        } 
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Sub Menu Name</label>
                                                                <span class="form-note">Specify the name of your top sub menu.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="submenu-name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-off">Submenu Needed</label>
                                                                <span class="form-note">Enable to if you want to add submenu category.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" name="submenu-needed-sub" id="site-off" value="1">
                                                                    <label class="custom-control-label" for="site-off" value="1">Disable</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-lg-7 offset-lg-5">
                                                            <div class="form-group mt-2">
                                                                <div class="btn btn-lg btn-primary" id="add-top-submenu" inform="addtopsubmenu">Add Menu</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- card -->
                                    </div><!-- .nk-block -->