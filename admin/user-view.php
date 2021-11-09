<?php
    error_reporting(E_ALL);
    include("../includes/db/database.php");
    session_start();
    $staffid = $_SESSION['staffid'];
    $userveiwid = $_GET['d'];
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
    echo $userveiwid;
    //get all details from user 
    $getuserd = $db->prepare("SELECT * FROM consumer WHERE uniqueid = :userid");
    $getuserd->bindParam(":userid", $userveiwid);
    $getuserd->execute();

    //fetch details
    $fetchuserd = $getuserd->fetch(PDO::FETCH_ASSOC);
    $firstname = $fetchuserd['consumerfname'];
    $lastname = $fetchuserd['consumerlname'];
    $emailid = $fetchuserd['consumeremail'];
    $mobile = $fetchuserd['consumermobile'];
    $plan = $fetchuserd['consumerplan'];
    $nomineename = $fetchuserd['consumernominee'];
    $nomineeid = $fetchuserd['nomineeid'];
    $pancard = $fetchuserd['pancard'];
    $bankaccountnumber = $fetchuserd['bankaccountnumber'];
    $bankaccountname = $fetchuserd['bankaccountname'];
    $bankname = $fetchuserd['bankname'];
    $ifsccode = $fetchuserd['ifsccode'];
    $branchname = $fetchuserd['branchname'];
    $paytmid = $fetchuserd['paytmid'];
    echo $paytmid.'--this is test paytm id';
    if($paytmid == '' OR $paytmid == null){
        $paytmidn = 'NA';
    }
    $gpayid = $fetchuserd['gpayid'];
    if($gpayid == ''){
        $gpayidn = 'NA';
    }
    $phonepayid = $fetchuserd['phonepayid'];
    if($phonepayid == ''){
        $phonepayidn = 'NA';
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
    <title><?php echo $website_name; ?> - View User Profile</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=<?php echo $version; ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=<?php echo $version; ?>">
    <script src="<?php echo $path; ?>js/jquery-1.12.0.min.js?ver=<?php echo $version; ?>"></script>
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
                                                <div class="nk-block-head-sub"><a class="back-to" href="<?php echo $path.'staff/user-list'; ?>"><em class="icon ni ni-arrow-left"></em><span>User List</span></a></div>
                                            <h2 class="nk-block-title fw-normal">User Details</h2>
                                            <div class="nk-block-des">
                                                <p class="lead">Basic Description</p>
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
                                                                    <input type="text" class="form-control" id="firstname" placeholder="Write first name" value="<?php echo $firstname; ?>" disabled>
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
                                                                    <input type="text" class="form-control" id="lastname" placeholder="Write last name" value="<?php echo $lastname; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Consumer ID</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="customerid" value="<?php echo $userveiwid; ?>" disabled>
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
                                                                    <input type="password" class="form-control" id="password" placeholder="Write password" disabled value="** hidden password **">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Phone Number</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="mobile" placeholder="Write phone number" value="<?php echo $mobile; ?>" disabled>
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
                                                                    <input type="text" class="form-control" id="email" placeholder="Write email id" value="<?php echo $emailid; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Choose Plan</label>
                                                                <div class="form-control-wrap ">
                                                                    <input type="text" class="form-control" id="consumerplan" placeholder="Write email id" value="<?php echo $plan; ?>" disabled>
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
                                                                    <input type="text" class="form-control" id="nomineename" placeholder="Write nominee name"  value="<?php echo $nomineename; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        if($nomineeid == ''){

                                                        } else{
                                                    ?>
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
                                                                    <input type="text" class="form-control" id="nomineeid" placeholder="Write nominee id" value="<?php echo $nomineeid; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        } 
                                                    ?>
                                                    <hr class="preview-hr">
                                                    <span class="preview-title-lg overline-title">User Bank Details </span>
                                                    <div class="row gy-4 align-center">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Pan Number</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="pancardnumber" placeholder="Write Pancard number"  value="<?php echo $pancard; ?>" disabled>
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
                                                                    <input type="text" class="form-control" id="bankaccount" placeholder="Write Bank Account number"  value="<?php echo $bankaccountnumber; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Bank Account Holder Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="bankaccountholdername" placeholder="Write bank account holder name"  value="<?php echo $bankaccountname; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Bank Name</label>
                                                                <div class="form-control-wrap ">
                                                                    <input type="text" class="form-control" id="bankname" placeholder="Input placeholder"  value="<?php echo $bankname; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                <label class="form-label" for="default-01">IFSC Code</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="ifsccode" placeholder="Write Bank IFSC code"  value="<?php echo $ifsccode; ?>" disabled>
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
                                                                    <input type="text" class="form-control" id="bankbranchname" placeholder="Write Bank branch name"  value="<?php echo $branchname; ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                <label class="form-label" for="default-01">PAYTM ID</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="paytmidn" placeholder="Write paytm id" value="<?php echo $paytmidn; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                <label class="form-label" for="default-01">GPAY ID</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="gpayidn" placeholder="Write GPAY id"  value="<?php echo $gpayidn; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                <label class="form-label" for="default-01">PHONEPAY ID</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="phonepayid" placeholder="Write Phonepay id"  value="<?php echo $phonepayidn; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div>

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