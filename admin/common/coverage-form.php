<div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="gy-3">
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Coverage Type</label>
                                                                <span class="form-note">Specify the type of coverage.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-control" id="maincoveragetypeid">
                                                                        <option value="" class="form-label form-control">--Please choose an option--</option>
                                                                        <?php
                                                                        $blank = '0';
                                                                        //get menu
                                                                        $getmenu = $db->prepare("SELECT * FROM coverage_type WHERE status = :status ORDER BY ctypeid ASC"); 
                                                                        $getmenu->bindParam(':status', $status);
                                                                        $getmenu->execute();
                                                                        //now count
                                                                        $menucount = $getmenu->rowCount();
                                                                        if($menucount > 0){
                                                                            $i = '1';
                                                                            while($rowc = $getmenu->fetch(PDO::FETCH_ASSOC)){
                                                                                $menuname = $rowc['coveragetypename'];
                                                                                $statusnn = $rowc['status'];
                                                                                $menuid = $rowc['ctypeid'];
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
                                                                <label class="form-label" for="site-name">Coverage Heading</label>
                                                                <span class="form-note">Specify the heading of your coverage.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="coverage-name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Coverage Description</label>
                                                                <span class="form-note">Specify the Description of your coverage.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control" id="coverage-description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Coverage Image</label>
                                                                <span class="form-note">Add Image / Screenshot of your coverage.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <form id="cropimage" method="post" class="form-control" style="height: 200px; padding: 10px;" enctype="multipart/form-data" action='<?php echo $path; ?>admin/coverageimage-ajax.php'>
                                                                        <div id='preview'>
                                                                        </div>
                                                                        <a href="#" onclick="document.getElementById('photoimg').click(); return false;" style="margin-left: -10px; margin-top: -11px; height: 200px; position: absolute; width: 100%; padding: 90px 10px; text-align: center;" id="browsebt">Browse to upload product image</a>
                                                                            <input type="file" name="photoimg" id="photoimg" style="visibility: hidden;" />
                                                                        </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Coverage URL</label>
                                                                <span class="form-note">Specify the URL of your coverage.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="coverage-url"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-lg-7 offset-lg-5">
                                                            <div class="form-group mt-2">
                                                                <div class="btn btn-lg btn-primary" id="add-coverage" inform="addcoverage">Add Coverage</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- card -->
                                    </div><!-- .nk-block -->