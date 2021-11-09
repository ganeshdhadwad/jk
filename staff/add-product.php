<?php
    error_reporting('0');
    include("../includes/db/database.php");
    session_start();
    $staffid = $_SESSION['staffid'];
    if($staffid > 0){

    }else{
        header('location: '.$path.'staff/login');
    }

    //get details from the db 
    $staffd = $db->prepare("SELECT * FROM staff WHERE staffid = :staffid AND status = :status");
    $staffd->bindParam(":staffid", $staffid);
    $staffd->bindParam(":status", $status);
    $staffd->execute();

    //fetch detail
    $fetchstaff = $staffd->fetch(PDO::FETCH_ASSOC);
    $staffname = $fetchstaff['username'];
    $staffidd = $fetchstaff['type'];

    if($staffidd == '2'){
        $stafftype = 'Administrator';
    }else if($staffidd == '2'){
        $stafftype = 'Staff';
    }

    //$randomt = _generateRandomString();
    //$token = $currenttime*3 . $randomt;
    $randomt = randomDigit();
    $token = $codepanel.''.$randomt; 
    //check in the db 
    $racheck = $db->prepare("SELECT * FROM consumer WHERE uniqueid = :uniqueid");
    $racheck->bindParam(":uniqueid", $randomt);
    $racheck->execute();

    //count 
    $racount = $racheck->rowCount();
    if($racount > 0){
        $random2 = randomDigit();
        $random = $codepanel.''.$random2;
    }else{
        $randomn = randomDigit();
        $random = $codepanel.''.$randomn;
    }
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="<?php echo $path; ?>">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo $path; ?>images/favicon.png">
    <!-- Page Title  -->
    <title><?php echo $website_name; ?> - Add User</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=<?php echo $version; ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=<?php echo $version; ?>">
    <script src="<?php echo $path; ?>js/jquery-1.11.1.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>js/default.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>js/jquery-form.js?ver=<?php echo $version; ?>"></script>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="<?php echo $path; ?>staff/dashboard" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="<?php echo $path; ?>images/logo.png" srcset="<?php echo $path; ?>images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="<?php echo $path; ?>images/logo-dark.png" srcset="<?php echo $path; ?>images/logo-dark2x.png 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <?php
                    include("common/sidebar.php");
                ?>
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php
                    include("common/header.php"); 
                ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">ADD Product</h4>
                                                <div class="nk-block-des">
                                                    <p>some description</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <span class="preview-title-lg overline-title">Product Details</span>
                                                    <div class="row gy-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Product Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="productname" placeholder="Write product name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-05">Product Description</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-text-hint" style="display: none;">
                                                                        <span class="overline-title">Usd</span>
                                                                    </div>
                                                                    <textarea class="form-control" id="productdescription">Write your product description</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="preview-hr">
                                                    <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-05">Product Image</label>
                                                                <div class="form-control-wrap">
                                                                    <form id="cropimage" method="post" style="border:1px solid #999; padding: 10px;" enctype="multipart/form-data" action='<?php echo $path; ?>staff/image-ajax.php'>
							<div id='preview'>
							</div>
							<a href="#" onclick="document.getElementById('photoimg').click(); return false;" style="color: #999; margin-left: 25px; margin-top: 4px; position: absolute;" id="browsebt">Browse to upload product image</a>
	                            <input type="file" name="photoimg" id="photoimg" style="visibility: hidden;" />
							</form>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div>
                                        <div class="code-block">
                                            <div class="form-group" >
                                                <button type="submit" class="btn btn-lg btn-primary" id="add-product" inform="addproduct" style="background-color: #6576ff;">Add Product</button>
                                            </div>
                                        </div><!-- .code-block -->

                                    </div><!-- .nk-block -->
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <?php
                    include("common/footer.php"); 
                ?>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
   <!-- <script src="<?php echo $path; ?>assets/js/bundle.js?ver=<?php echo $version; ?>"></script> -->
    <script src="<?php echo $path; ?>assets/js/scripts.js?ver=<?php echo $version; ?>"></script>
</body>

</html>