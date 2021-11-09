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
                                                <h4 class="title nk-block-title">ADD USER</h4>
                                                <div class="nk-block-des">
                                                    <p>some description</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <span class="preview-title-lg overline-title">User Details</span>
                                                    <div class="row gy-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">First Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="firstname" placeholder="Write first name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-05">Last Name</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-text-hint" style="display: none;">
                                                                        <span class="overline-title">Usd</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="lastname" placeholder="Write last name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Consumer ID</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="customerid" value="<?php echo 'GGI'.$token; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-05">Password</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-text-hint" style="display: none;">
                                                                        <span class="overline-title">Usd</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="password" placeholder="Write password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Phone Number</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="mobile" placeholder="Write phone number">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-05">Email ID</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-text-hint" style="display: none;">
                                                                        <span class="overline-title">Usd</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="email" placeholder="Write email id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Choose Plan</label>
                                                                <div class="form-control-wrap ">
                                                                    <div class="form-control-select">
                                                                        <select class="form-control" id="plan">
                                                                            <option value="0">Choose Matrix Plan </option>
                                                                            <?php
                                                                               //get plan name and id from db 
                                                                               $getplan = $db->prepare("SELECT * FROM pland WHERE status = :status");
                                                                               $getplan->bindParam(":status", $status);
                                                                               $getplan->execute();

                                                                                $i = '1';
                                                                                while($fetchplan = $getplan->fetch(PDO::FETCH_ASSOC)){ 
                                                                                    $planname = $fetchplan['planname'];
                                                                                    $planid = $fetchplan['planid'];
                                                                            ?>
                                                                            <option value="<?php echo $planid; ?>"><?php echo $planname; ?></option>
                                                                            <?php
                                                                                $i++;
                                                                                } 
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-05">Nominee Name</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-text-hint" style="display: none;">
                                                                        <span class="overline-title">Usd</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="nomineename" placeholder="Write nominee name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="preview-hr">
                                                    <span class="preview-title-lg overline-title">Sponsor Details</span>
                                                    <div class="row gy-4">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-05">Nominee ID</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-text-hint">
                                                                        <span class="overline-title">ID</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="nomineeid" placeholder="Write nominee id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="preview-hr">
                                                    <span class="preview-title-lg overline-title">User Bank Details </span>
                                                    <div class="row gy-4 align-center">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Pan Number</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="pancardnumber" placeholder="Write Pancard number">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-05">Bank Account Number</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-text-hint" style="display: none;">
                                                                        <span class="overline-title">Usd</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="bankaccount" placeholder="Write Bank Account number">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Bank Account Holder Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="bankaccountholdername" placeholder="Write bank account holder name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Bank Name</label>
                                                                <div class="form-control-wrap ">
                                                                    <input type="text" class="form-control" id="bankname" placeholder="Input placeholder">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                <label class="form-label" for="default-01">IFSC Code</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="ifsccode" placeholder="Write Bank IFSC code">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-05">Bank Branch Name</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-text-hint" style="display: none;">
                                                                        <span class="overline-title">Usd</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="bankbranchname" placeholder="Write Bank branch name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                <label class="form-label" for="default-01">PAYTM ID</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="paytmid" placeholder="Write paytm id">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                <label class="form-label" for="default-01">GPAY ID</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="gpayid" placeholder="Write GPAY id">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                <label class="form-label" for="default-01">PHONEPAY ID</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="phonepayid" placeholder="Write Phonepay id">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div>
                                        <div class="code-block">
                                            <div class="form-group" >
                                                <button type="submit" class="btn btn-lg btn-primary" id="add-user" inform="adduser" style="background-color: #6576ff;">Generate Account</button>
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
    <script src="<?php echo $path; ?>assets/js/bundle.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>assets/js/scripts.js?ver=<?php echo $version; ?>"></script>
</body>

</html>