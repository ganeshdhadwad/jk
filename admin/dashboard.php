<?php
    //error_reporting(E_ALL);
    include("../includes/db/database.php");
    session_start();
    $staffid = $_SESSION['staffid'];
    if($staffid > 0){

    }else{
        header('location: '.$path.'admin/login');
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

    if($staffidd == '4'){
        $stafftype = 'Administrator';
    }

    //echo $stafftype;
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="<?php echo $path; ?>">
    <meta charset="utf-8">
    <meta name="author" content="Ajit Singh">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo $path; ?>assets/images/favicon.ico">
    <!-- Page Title  -->
    <title><?php echo $website_name; ?> - Admin Dashboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=<?php echo $version; ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=<?php echo $version; ?>">
    <script src="<?php echo $path; ?>assets/js/jquery-1.11.1.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>assets/js/default.js?ver=<?php echo $version; ?>"></script>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <?php
                include("common/sidebar.php"); 
            ?>
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <?php 
                    include("common/header.php");
                ?>
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Admin Dashboard</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to <?php echo $website_name; ?> Dashboard</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-4">
                                            <div class="card card-bordered card-full">
                                                <?php
                                                    //get vendor list 
                                                    //type 3
                                                    //$stype = '3';
                                                    $getv = $db->prepare("SELECT * FROM staff WHERE status = :status AND type = :type"); 
                                                    $getv->bindParam(":status", $status);
                                                    $getv->bindParam(":type", $vendor);
                                                    $getv->execute();
                                                    //row count
                                                    $srowcount = $getv->rowCount();
                                                    $currentmonth = date('m', time());
                                                    //echo $currentmonth;

                                                    //get this month vendor's
                                                    $getvd = $db->prepare("SELECT * FROM staff WHERE type = :type AND month = :mnth"); 
                                                    $getvd->bindParam(":mnth", $currentmonth);
                                                    $getvd->bindParam(":type", $vendor);
                                                    $getvd->execute();
                                                    $srowcountd = $getvd->rowCount();
                                                    //$fdate = $getv->fetch(PDO::FETCH_ASSOC);
                                                    //echo $srowcount;
                                                ?>
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total Franchisee's</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Franchisee's"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> <?php echo $srowcount; ?>
                                                        </span>
                                                        <span class="change up text-danger" style="display: none;"><em class="icon ni ni-arrow-long-up"></em>1.93%</span>
                                                    </div>
                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title">This Month</div>
                                                                <div class="amount"><?php echo $srowcountd; ?></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalDeposit"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-4">
                                            <div class="card card-bordered card-full">
                                                <?php
                                                    //get vendor list 
                                                    //type 3
                                                    //$stype = '3';
                                                    $getu = $db->prepare("SELECT * FROM staff WHERE status = :status AND type = :type"); 
                                                    $getu->bindParam(":status", $status);
                                                    $getu->bindParam(":type", $useru);
                                                    $getu->execute();
                                                    //row count
                                                    $srowcountu = $getu->rowCount();
                                                    $currentmonth = date('m', time());
                                                    //echo $currentmonth;

                                                    //get this month vendor's
                                                    $getvd = $db->prepare("SELECT * FROM staff WHERE type = :type AND month = :mnth"); 
                                                    $getvd->bindParam(":mnth", $currentmonth);
                                                    $getvd->bindParam(":type", $useru);
                                                    $getvd->execute();
                                                    $srowcountdu = $getvd->rowCount();
                                                    //$fdate = $getv->fetch(PDO::FETCH_ASSOC);
                                                    //echo $srowcount;
                                                ?>
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total User's</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total User's"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> <?php echo $srowcountu;  ?>
                                                        </span>
                                                        <span class="change down text-danger"></span>
                                                    </div>
                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title">This Month</div>
                                                                <div class="amount"><?php echo $srowcountdu; ?></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-4">
                                            <div class="card card-bordered  card-full">
                                                <?php
                                                    //get vendor list 
                                                    //type 3
                                                    //$stype = '3';
                                                    $getsu = $db->prepare("SELECT * FROM staff WHERE status = :status AND type = :type"); 
                                                    $getsu->bindParam(":status", $status);
                                                    $getsu->bindParam(":type", $staff);
                                                    $getsu->execute();
                                                    //row count
                                                    $srowcountsu = $getsu->rowCount();
                                                    $currentmonth = date('m', time());
                                                    //echo $currentmonth;

                                                    //get this month vendor's
                                                    $getsvd = $db->prepare("SELECT * FROM staff WHERE type = :type AND month = :mnth"); 
                                                    $getsvd->bindParam(":mnth", $currentmonth);
                                                    $getsvd->bindParam(":type", $staff);
                                                    $getsvd->execute();
                                                    $srowcountsdu = $getvd->rowCount();
                                                    //$fdate = $getv->fetch(PDO::FETCH_ASSOC);
                                                    //echo $srowcount;
                                                ?>
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total Staff's</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Staff's"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> <?php echo $srowcountsu; ?>
                                                        </span>
                                                    </div>
                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title">This Month</div>
                                                                <div class="amount"><?php echo $srowcountsdu; ?></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalBalance"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-4" style="display: none;">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group mb-1">
                                                        <div class="card-title">
                                                            <h6 class="title">Investment Overview</h6>
                                                            <p>The investment overview of your platform. <a href="#">All Investment</a></p>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#thisyear">This Year</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#alltime">All Time</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content mt-0">
                                                        <div class="tab-pane active" id="overview">
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Currently Actived Investment</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">49,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">56</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">49,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Paid Profit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Investment in this Month</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">49,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">23</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="thisyear">
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Currently Actived Investment</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">89,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">96</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">99,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Paid Profit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Investment in this Month</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">83</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="alltime">
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Currently Actived Investment</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">556</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Paid Profit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov gy-2">
                                                                <div class="subtitle">Investment in this Month</div>
                                                                <div class="invest-ov-details">
                                                                    <div class="invest-ov-info">
                                                                        <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                                                                        <div class="title">Amount</div>
                                                                    </div>
                                                                    <div class="invest-ov-stats">
                                                                        <div><span class="amount">223</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                                                        <div class="title">Plans</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-4" style="display: none;">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner d-flex flex-column h-100">
                                                    <div class="card-title-group mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Top Invested Plan</h6>
                                                            <p>In last 30 days top invested schemes.</p>
                                                        </div>
                                                        <div class="card-tools mt-n4 mr-n1">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                                        <li><a href="#" class="active"><span>30 Days</span></a></li>
                                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-list gy-3">
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Strater Plan</div>
                                                                <div class="progress-amount">58%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar" data-progress="58"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Silver Plan</div>
                                                                <div class="progress-amount">18.49%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-orange" data-progress="18.49"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Dimond Plan</div>
                                                                <div class="progress-amount">16%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-teal" data-progress="16"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Platinam Plan</div>
                                                                <div class="progress-amount">29%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-pink" data-progress="29"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Vibranium Plan</div>
                                                                <div class="progress-amount">33%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-azure" data-progress="33"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="invest-top-ck mt-auto">
                                                        <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                    </div>
                                </div>
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
    <script src="<?php echo $path; ?>assets/js/charts/gd-general.js?ver=<?php echo $version; ?>"></script>
</body>

</html>