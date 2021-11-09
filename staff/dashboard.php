<?php
    error_reporting(E_ALL);
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

    if($staffidd == '3'){
        $stafftype = 'Administrator';
    }else if($staffidd == '2'){
        $stafftype = 'Staff';
    }
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
    <title><?php echo $website_name; ?> - Staff Dashboard</title>
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
                                            <h3 class="nk-block-title page-title">Overview</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to <?php echo $website_name; ?> Staff panel.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content" style="display: none;">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-xxl-6"  style="display: none;">
                                            <div class="row g-gs">
                                                <div class="col-lg-6 col-xxl-12"  style="display: none;">
                                                    <div class="card card-bordered">
                                                        <div class="card-inner">
                                                            <div class="card-title-group align-start mb-2">
                                                                <div class="card-title">
                                                                    <h6 class="title">Sales Revenue</h6>
                                                                    <p>In last 30 days revenue from subscription.</p>
                                                                </div>
                                                                <div class="card-tools">
                                                                    <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Revenue from subscription"></em>
                                                                </div>
                                                            </div>
                                                            <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                                                <div class="nk-sale-data-group flex-md-nowrap g-4">
                                                                    <div class="nk-sale-data">
                                                                        <span class="amount">14,299.59 <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>16.93%</span></span>
                                                                        <span class="sub-title">This Month</span>
                                                                    </div>
                                                                    <div class="nk-sale-data">
                                                                        <span class="amount">7,299.59 <span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>4.26%</span></span>
                                                                        <span class="sub-title">This Week</span>
                                                                    </div>
                                                                </div>
                                                                <div class="nk-sales-ck sales-revenue">
                                                                    <canvas class="sales-bar-chart" id="salesRevenue"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-lg-6 col-xxl-12"  style="display: none;">
                                                    <div class="row g-gs">
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                            <div class="card card-bordered">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title">Active Subscriptions</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total active subscription"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">9.69K</span>
                                                                            <span class="sub-title"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>since last month</span>
                                                                        </div>
                                                                        <div class="nk-sales-ck">
                                                                            <canvas class="sales-bar-chart" id="activeSubscription"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card -->
                                                        </div><!-- .col -->
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6"  style="display: none;">
                                                            <div class="card card-bordered">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title">Avg Subscriptions</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Daily Avg. subscription"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">346.2</span>
                                                                            <span class="sub-title"><span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>2.45%</span>since last week</span>
                                                                        </div>
                                                                        <div class="nk-sales-ck">
                                                                            <canvas class="sales-bar-chart" id="totalSubscription"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card -->
                                                        </div><!-- .col -->
                                                    </div><!-- .row -->
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-6"  style="display: none;">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start gx-3 mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Sales Overview</h6>
                                                            <p>In 30 days sales of product subscription. <a href="#">See Details</a></p>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="dropdown">
                                                                <a href="#" class="btn btn-primary btn-dim d-none d-sm-inline-flex" data-toggle="dropdown"><em class="icon ni ni-download-cloud"></em><span><span class="d-none d-md-inline">Download</span> Report</span></a>
                                                                <a href="#" class="btn btn-icon btn-primary btn-dim d-sm-none" data-toggle="dropdown"><em class="icon ni ni-download-cloud"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Download Mini Version</span></a></li>
                                                                        <li><a href="#"><span>Download Full Version</span></a></li>
                                                                        <li class="divider"></li>
                                                                        <li><a href="#"><em class="icon ni ni-opt-alt"></em><span>More Options</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                                                        <div class="nk-sale-data">
                                                            <span class="amount">$82,944.60</span>
                                                        </div>
                                                        <div class="nk-sale-data">
                                                            <span class="amount sm">1,937 <small>Subscribers</small></span>
                                                        </div>
                                                    </div>
                                                    <div class="nk-sales-ck large pt-4">
                                                        <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-8"  style="display: none;">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title"><span class="mr-2">Transaction</span> <a href="#" class="link d-none d-sm-inline">See History</a></h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <ul class="card-tools-nav">
                                                                <li><a href="#"><span>Paid</span></a></li>
                                                                <li><a href="#"><span>Pending</span></a></li>
                                                                <li class="active"><a href="#"><span>All</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-inner p-0 border-top">
                                                    <div class="nk-tb-list nk-tb-orders">
                                                        <div class="nk-tb-item nk-tb-head">
                                                            <div class="nk-tb-col"><span>Order No.</span></div>
                                                            <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                                            <div class="nk-tb-col tb-col-lg"><span>Ref</span></div>
                                                            <div class="nk-tb-col"><span>Amount</span></div>
                                                            <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                                            <div class="nk-tb-col"><span>&nbsp;</span></div>
                                                        </div>
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><a href="#">#95954</a></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <div class="user-card">
                                                                    <div class="user-avatar user-avatar-sm bg-purple">
                                                                        <span>AB</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">02/11/2020</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary">SUB-2309232</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub tb-amount">4,596.75 <span>USD</span></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-action">
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                        <ul class="link-list-plain">
                                                                            <li><a href="#">View</a></li>
                                                                            <li><a href="#">Invoice</a></li>
                                                                            <li><a href="#">Print</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><a href="#">#95850</a></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <div class="user-card">
                                                                    <div class="user-avatar user-avatar-sm bg-azure">
                                                                        <span>DE</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Desiree Edwards</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">02/02/2020</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary">SUB-2309154</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub tb-amount">596.75 <span>USD</span></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge badge-dot badge-dot-xs badge-danger">Canceled</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-action">
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                        <ul class="link-list-plain">
                                                                            <li><a href="#">View</a></li>
                                                                            <li><a href="#">Remove</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><a href="#">#95812</a></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <div class="user-card">
                                                                    <div class="user-avatar user-avatar-sm bg-warning">
                                                                        <img src="./images/avatar/b-sm.jpg" alt="">
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Blanca Schultz</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">02/01/2020</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary">SUB-2309143</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub tb-amount">199.99 <span>USD</span></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-action">
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                        <ul class="link-list-plain">
                                                                            <li><a href="#">View</a></li>
                                                                            <li><a href="#">Invoice</a></li>
                                                                            <li><a href="#">Print</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><a href="#">#95256</a></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <div class="user-card">
                                                                    <div class="user-avatar user-avatar-sm bg-purple">
                                                                        <span>NL</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Naomi Lawrence</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">01/29/2020</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary">SUB-2305684</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-action">
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                        <ul class="link-list-plain">
                                                                            <li><a href="#">View</a></li>
                                                                            <li><a href="#">Invoice</a></li>
                                                                            <li><a href="#">Print</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><a href="#">#95135</a></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <div class="user-card">
                                                                    <div class="user-avatar user-avatar-sm bg-success">
                                                                        <span>CH</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Cassandra Hogan</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">01/29/2020</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary">SUB-2305564</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="badge badge-dot badge-dot-xs badge-warning">Due</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-action">
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                        <ul class="link-list-plain">
                                                                            <li><a href="#">View</a></li>
                                                                            <li><a href="#">Invoice</a></li>
                                                                            <li><a href="#">Notify</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-inner-sm border-top text-center d-sm-none">
                                                    <a href="#" class="btn btn-link btn-block">See History</a>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-4"  style="display: none;">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Recent Activities</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <ul class="card-tools-nav">
                                                                <li><a href="#"><span>Cancel</span></a></li>
                                                                <li class="active"><a href="#"><span>All</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nk-activity">
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-success"><img src="./images/avatar/c-sm.jpg" alt=""></div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Keith Jensen requested to Widthdrawl.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-warning">HS</div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Harry Simpson placed a Order.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-azure">SM</div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Stephanie Marshall got a huge bonus.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-purple"><img src="./images/avatar/d-sm.jpg" alt=""></div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Nicholas Carr deposited funds.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-activity-item">
                                                        <div class="nk-activity-media user-avatar bg-pink">TM</div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">Timothy Moreno placed a Order.</div>
                                                            <span class="time">2 hours ago</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-4"  style="display: none;">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner-group">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">New Users</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <a href="html/general/user-list-regular.html" class="link">View All</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner card-inner-md">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-primary-dim">
                                                                <span>AB</span>
                                                            </div>
                                                            <div class="user-info">
                                                                <span class="lead-text">Abu Bin Ishtiyak</span>
                                                                <span class="sub-text">info@softnio.com</span>
                                                            </div>
                                                            <div class="user-action">
                                                                <div class="drodown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner card-inner-md">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-pink-dim">
                                                                <span>SW</span>
                                                            </div>
                                                            <div class="user-info">
                                                                <span class="lead-text">Sharon Walker</span>
                                                                <span class="sub-text">sharon-90@example.com</span>
                                                            </div>
                                                            <div class="user-action">
                                                                <div class="drodown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner card-inner-md">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-warning-dim">
                                                                <span>GO</span>
                                                            </div>
                                                            <div class="user-info">
                                                                <span class="lead-text">Gloria Oliver</span>
                                                                <span class="sub-text">gloria_72@example.com</span>
                                                            </div>
                                                            <div class="user-action">
                                                                <div class="drodown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner card-inner-md">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-success-dim">
                                                                <span>PS</span>
                                                            </div>
                                                            <div class="user-info">
                                                                <span class="lead-text">Phillip Sullivan</span>
                                                                <span class="sub-text">phillip-85@example.com</span>
                                                            </div>
                                                            <div class="user-action">
                                                                <div class="drodown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="nk-block nk-block-lg">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="row g-gs">
                                                    <div class="col-sm-6">
                                                        <div class="card text-white" style="background-color: #b81f24;">
                                                            <div class="card-header">Training Materials</div>
                                                            <div class="card-inner">
                                                                <h5 class="card-title">Video Material</h5>
                                                                <p class="card-text">to view video's, Please press read more button.</p>
                                                                <p><a href="<?php echo $path; ?>staff/training-videos"><span style="color: #fff;">> Read more</span></a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="card text-white" style="background-color: #b81f24;">
                                                            <div class="card-header">Training Materials</div>
                                                            <div class="card-inner">
                                                                <h5 class="card-title">Photo Material</h5>
                                                                <p class="card-text">to view photo's, Please press read more button.</p>
                                                                <p><a href="<?php echo $path; ?>staff/training-videos"><span style="color: #fff;">> Read more</span></a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="card bg-light">
                                                            <div class="card-header">Important Documents</div>
                                                            <div class="card-inner">
                                                                <h5 class="card-title">Privacy Policy</h5>
                                                                <p class="card-text">Some content for privacy policy.</p>
                                                                <p><a href="<?php echo $path; ?>staff/policy"><span>> Read more</span></a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="card bg-light">
                                                            <div class="card-header">Important Documents</div>
                                                            <div class="card-inner">
                                                                <h5 class="card-title">Terms &amp; Conditions</h5>
                                                                <p class="card-text">Some content for terms and conditions.</p>
                                                                <p><a href="<?php echo $path; ?>staff/training-videos"><span>> Read more</span></a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div>
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
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