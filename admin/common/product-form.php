<div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="gy-3">
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Product Type</label>
                                                                <span class="form-note">Specify the type of product.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-control" id="mainproducttypeid">
                                                                        <option value="" class="form-label form-control">--Please choose an option--</option>
                                                                        <?php
                                                                        $blank = '0';
                                                                        //get menu
                                                                        $getmenu = $db->prepare("SELECT * FROM products_category WHERE status = :status ORDER BY pcatid ASC"); 
                                                                        $getmenu->bindParam(':status', $status);
                                                                        $getmenu->execute();
                                                                        //now count
                                                                        $menucount = $getmenu->rowCount();
                                                                        if($menucount > 0){
                                                                            $i = '1';
                                                                            while($rowc = $getmenu->fetch(PDO::FETCH_ASSOC)){
                                                                                $menuname = $rowc['pcatname'];
                                                                                $statusnn = $rowc['status'];
                                                                                $menuid = $rowc['pcatid'];
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
                                                                <label class="form-label" for="site-name">Product Name</label>
                                                                <span class="form-note">Specify the name of your product.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="product-name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Product Description</label>
                                                                <span class="form-note">Specify the Description of your product.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control" id="product-description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Product Image</label>
                                                                <span class="form-note">Add Image / Screenshot of your product.</span>
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
                                                    <div class="row g-3">
                                                        <div class="col-lg-7 offset-lg-5">
                                                            <div class="form-group mt-2">
                                                                <div class="btn btn-lg btn-primary" id="add-product" inform="addproduct">Add Product</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- card -->
                                    </div><!-- .nk-block -->