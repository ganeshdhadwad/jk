<?php
    error_reporting(E_ALL);
    include("../includes/db/database.php");
    session_start();
    $userid = $_SESSION['userid'];
    if($userid > 0){

    }else{
        header('location: '.$path.'login');
    }

    //get details from the db 
    $staffd = $db->prepare("SELECT * FROM consumer WHERE consumerid = :consumerid AND status = :status");
    $staffd->bindParam(":consumerid", $userid);
    $staffd->bindParam(":status", $status);
    $staffd->execute();

    //fetch detail
    $fetchstaff = $staffd->fetch(PDO::FETCH_ASSOC);
    $consumerfname = $fetchstaff['consumerfname'];
    $consumerlname = $fetchstaff['consumerlname'];
    $consumeruniqueid = $fetchstaff['uniqueid'];
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
    <link rel="shortcut icon" href="<?php echo $path; ?>images/favicon.png">
    <!-- Page Title  -->
    <title><?php echo $website_name; ?> User List</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=1.4.0">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=1.4.0">
    <script src="<?php echo $path; ?>js/jquery-1.11.1.js"></script>
    <script src="<?php echo $path; ?>js/default.js"></script>
</head>
<?php
    $getuserlist = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid AND status = :status");
    $getuserlist->bindParam(":nomineeid", $consumeruniqueid);
    $getuserlist->bindParam(":status", $status);
    $getuserlist->execute();
    //count 
    $usercount = $getuserlist->rowCount(); 

    $usercode = $db->prepare("SELECT * FROM consumer WHERE uniqueid = :consumerid AND status = :status");
    $usercode->bindParam(":consumerid", $consumeruniqueid);
    $usercode->bindParam(":status", $status);
    $usercode->execute();
    //check count 
    $ucount = $usercode->rowCount();
    $fetchcount0 = $usercode->fetch(PDO::FETCH_ASSOC);
    $fname0 = $fetchcount0['consumerfname'];
    $funiqueid0 = $fetchcount0['uniqueid'];
    $fsponsorida0 = $fetchcount0['nomineeid'];
    $crea0 = $fetchcount0['created'];
    $created0 = gmdate("d/m/Y", $crea0);
    $level0 = '0';
    if($fsponsorida0 == ''){
        $fsponsorid0 = 'MAIN';
    }else{
        $fsponsorid0 = $fsponsorida0;
    }


    $usercode2 = $db->prepare("SELECT * FROM treed WHERE treeuniquecode = :treeuniquecode");
    $usercode2->bindParam(":treeuniquecode", $consumeruniqueid);
    $usercode2->execute();
    //check count 
    $ucount2 = $usercode2->rowCount();
?>
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
                                            <h3 class="nk-block-title page-title">My Downline</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total <?php echo $ucount2; ?> users.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="col-xxl-8">
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
                                                            <div class="nk-tb-col tb-col-md"><span>Sr. no.</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span>Member Name</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span>Joined Date</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span>Member id</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span>Sponsor id</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span>Sponsor name</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span>Plan Name</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span class="d-none d-sm-inline">Status</span></div>
                                                        </div>
                                                        <!-- user list starts -->
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead">1</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><?php echo $fsponsorid0; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-lead"><?php echo ucfirst($fname0); ?></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub"><?php echo $created0; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary"><?php echo $funiqueid0; ?></span><br/>
                                                                <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level0; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                 <span class="tb-sub"><?php echo $created0; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                 <span class="tb-sub"><?php echo $created0; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-action">
                                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                            </div>
                                                        </div>
                                                        <!-- user list ends -->
                                                        <?php
                                                        //level one starts 
                                                        $checkdtnow1 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                        $checkdtnow1->bindParam(":nomineeid", $consumeruniqueid);
                                                        $checkdtnow1->execute();
                                                        //count 
                                                        $i = '2';
                                                       $checkcount1 = $checkdtnow1->rowCount();
                                                            while($fetchcount1 = $checkdtnow1->fetch(PDO::FETCH_ASSOC)){
                                                            $fname1 = $fetchcount1['consumerfname'];
                                                            $funiqueid1 = $fetchcount1['uniqueid'];
                                                            $fsponsorid1 = $fetchcount1['nomineeid'];
                                                            $crea1 = $fetchcount1['created'];
                                                            $created1 = gmdate("d/m/Y", $crea1);
                                                            $level1 = '1';
                                                        //level one design starts
                                                        ?>
                                                        <!-- user list starts -->
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><?php echo $i; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><?php echo $fsponsorid1; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-lead"><?php echo ucfirst($fname1); ?></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub"><?php echo $created1; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary"><?php echo $funiqueid1; ?></span><br/>
                                                                <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level1; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                 <span class="tb-sub"><?php echo $created1; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                 <span class="tb-sub"><?php echo $created1; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-action">
                                                                 <span class="badge badge-dot badge-dot-xs badge-warning">Pending</span>
                                                            </div>
                                                        </div>
                                                        <!-- user list ends -->
                                                        <?php 
                                                        //level one design ends
                                                        //level 2 coding starts
                                                        $checkdtnow2 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                        $checkdtnow2->bindParam(":nomineeid", $funiqueid1);
                                                        $checkdtnow2->execute();
                                                        //count 
                                                        $checkcount2 = $checkdtnow2->rowCount();
                                                        if($checkcount2 > 0){
                                                           while($fetchcount2 = $checkdtnow2->fetch(PDO::FETCH_ASSOC)){
                                                            $fname2 = $fetchcount2['consumerfname'];
                                                            $funiqueid2 = $fetchcount2['uniqueid'];
                                                            $fsponsorid2 = $fetchcount2['nomineeid'];
                                                            $crea2 = $fetchcount2['created'];
                                                            $created2 = gmdate("d/m/Y", $crea2);
                                                            $level2 = '2';
                                                            //level two design starts 
                                                            ?>
                                                            <!-- user list starts -->
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class="tb-lead"><?php echo $fsponsorid2; ?></span>
                                                                </div>
                                                                <div class="nk-tb-col tb-col-md">
                                                                    <span class="tb-lead"><?php echo ucfirst($fname2); ?></span>
                                                                </div>
                                                                <div class="nk-tb-col tb-col-md">
                                                                    <span class="tb-sub"><?php echo $created2; ?></span>
                                                                </div>
                                                                <div class="nk-tb-col tb-col-lg">
                                                                    <span class="tb-sub text-primary"><?php echo $funiqueid2; ?></span><br/>
                                                                    <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level2; ?></span>
                                                                </div>
                                                                <div class="nk-tb-col">
                                                                     <span class="tb-sub"><?php echo $created2; ?></span>
                                                                </div>
                                                                <div class="nk-tb-col">
                                                                     <span class="tb-sub"><?php echo $created2; ?></span>
                                                                </div>
                                                                <div class="nk-tb-col nk-tb-col-action">
                                                                     <span class="badge badge-dot badge-dot-xs badge-danger">Cancelled</span>
                                                                </div>
                                                            </div>
                                                            <!-- user list ends -->
                                                            <?php 
                                                            //level two design ends 
                                                            //level 3 coding starts
                                                            $checkdtnow3 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                            $checkdtnow3->bindParam(":nomineeid", $funiqueid2);
                                                            $checkdtnow3->execute();
                                                            //count 
                                                            $checkcount3 = $checkdtnow3->rowCount();
                                                            if($checkcount3 > 0){
                                                               while($fetchcount3 = $checkdtnow3->fetch(PDO::FETCH_ASSOC)){
                                                                $fname3 = $fetchcount3['consumerfname'];
                                                                $funiqueid3 = $fetchcount3['uniqueid'];
                                                                $fsponsorid3 = $fetchcount3['nomineeid'];
                                                                $crea3 = $fetchcount3['created'];
                                                                $created3 = gmdate("d/m/Y", $crea3);
                                                                $level3 = '3';
                                                                //level 3 design starts 
                                                                ?>
                                                                <!-- user list starts -->
                                                                <div class="nk-tb-item">
                                                                    <div class="nk-tb-col">
                                                                        <span class="tb-lead"><?php echo $fsponsorid3; ?></span>
                                                                    </div>
                                                                    <div class="nk-tb-col tb-col-md">
                                                                        <span class="tb-lead"><?php echo ucfirst($fname3); ?></span>
                                                                    </div>
                                                                    <div class="nk-tb-col tb-col-md">
                                                                        <span class="tb-sub"><?php echo $created3; ?></span>
                                                                    </div>
                                                                    <div class="nk-tb-col tb-col-lg">
                                                                        <span class="tb-sub text-primary"><?php echo $funiqueid3; ?></span><br/>
                                                                        <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level3; ?></span>
                                                                    </div>
                                                                    <div class="nk-tb-col">
                                                                         <span class="tb-sub"><?php echo $created3; ?></span>
                                                                    </div>
                                                                    <div class="nk-tb-col">
                                                                         <span class="tb-sub"><?php echo $created3; ?></span>
                                                                    </div>
                                                                    <div class="nk-tb-col nk-tb-col-action">
                                                                         <span class="badge badge-dot badge-dot-xs badge-danger">Cancelled</span>
                                                                    </div>
                                                                </div>
                                                                <!-- user list ends -->
                                                                <?php 
                                                                //level 3 design ends 
                                                                //level 4 coding starts
                                                                $checkdtnow4 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                $checkdtnow4->bindParam(":nomineeid", $funiqueid3);
                                                                $checkdtnow4->execute();
                                                                //count 
                                                                $checkcount4 = $checkdtnow4->rowCount();
                                                                if($checkcount4 > 0){
                                                                   while($fetchcount4 = $checkdtnow4->fetch(PDO::FETCH_ASSOC)){
                                                                    $fname4 = $fetchcount4['consumerfname'];
                                                                    $funiqueid4 = $fetchcount4['uniqueid'];
                                                                    $fsponsorid4 = $fetchcount4['nomineeid'];
                                                                    $crea4 = $fetchcount4['created'];
                                                                    $created4 = gmdate("d/m/Y", $crea4);
                                                                    $level4 = '4';
                                                                    //level 3 design starts 
                                                                    ?>
                                                                    <!-- user list starts -->
                                                                    <div class="nk-tb-item">
                                                                        <div class="nk-tb-col">
                                                                            <span class="tb-lead"><?php echo $fsponsorid4; ?></span>
                                                                        </div>
                                                                        <div class="nk-tb-col tb-col-md">
                                                                            <span class="tb-lead"><?php echo ucfirst($fname4); ?></span>
                                                                        </div>
                                                                        <div class="nk-tb-col tb-col-md">
                                                                            <span class="tb-sub"><?php echo $created4; ?></span>
                                                                        </div>
                                                                        <div class="nk-tb-col tb-col-lg">
                                                                            <span class="tb-sub text-primary"><?php echo $funiqueid4; ?></span><br/>
                                                                            <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level4; ?></span>
                                                                        </div>
                                                                        <div class="nk-tb-col">
                                                                             <span class="tb-sub"><?php echo $created4; ?></span>
                                                                        </div>
                                                                        <div class="nk-tb-col">
                                                                             <span class="tb-sub"><?php echo $created4; ?></span>
                                                                        </div>
                                                                        <div class="nk-tb-col nk-tb-col-action">
                                                                             <span class="badge badge-dot badge-dot-xs badge-danger">Cancelled</span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- user list ends -->
                                                                    <?php 
                                                                    //level 4 design ends 
                                                                    //level 5 coding starts
                                                                    $checkdtnow5 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                    $checkdtnow5->bindParam(":nomineeid", $funiqueid4);
                                                                    $checkdtnow5->execute();
                                                                    //count 
                                                                    $checkcount5 = $checkdtnow5->rowCount();
                                                                    if($checkcount5 > 0){
                                                                       while($fetchcount5 = $checkdtnow5->fetch(PDO::FETCH_ASSOC)){
                                                                        $fname5 = $fetchcount5['consumerfname'];
                                                                        $funiqueid5 = $fetchcount5['uniqueid'];
                                                                        $fsponsorid5 = $fetchcount5['nomineeid'];
                                                                        $crea5 = $fetchcount5['created'];
                                                                        $created5 = gmdate("d/m/Y", $crea5);
                                                                        $level5 = '5';
                                                                        //level 3 design starts 
                                                                        ?>
                                                                        <!-- user list starts -->
                                                                        <div class="nk-tb-item">
                                                                            <div class="nk-tb-col">
                                                                                <span class="tb-lead"><?php echo $fsponsorid5; ?></span>
                                                                            </div>
                                                                            <div class="nk-tb-col tb-col-sm">
                                                                                <div class="user-card">
                                                                                    <div class="user-avatar user-avatar-sm bg-purple">
                                                                                        <span>AB</span>
                                                                                    </div>
                                                                                    <div class="user-name">
                                                                                        <span class="tb-lead"><?php echo ucfirst($fname5); ?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="nk-tb-col tb-col-md">
                                                                                <span class="tb-sub"><?php echo $created5; ?></span>
                                                                            </div>
                                                                            <div class="nk-tb-col tb-col-lg">
                                                                                <span class="tb-sub text-primary"><?php echo $funiqueid5; ?></span><br/>
                                                                            <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level5; ?></span>
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
                                                                        <!-- user list ends -->
                                                                        <?php 
                                                                        //level 5 design ends
                                                                            //level 6 coding starts
                                                                            $checkdtnow6 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                            $checkdtnow6->bindParam(":nomineeid", $funiqueid5);
                                                                            $checkdtnow6->execute();
                                                                            //count 
                                                                            $checkcount6 = $checkdtnow6->rowCount();
                                                                            if($checkcount6 > 0){
                                                                               while($fetchcount6 = $checkdtnow6->fetch(PDO::FETCH_ASSOC)){
                                                                                $fname6 = $fetchcount6['consumerfname'];
                                                                                $funiqueid6 = $fetchcount6['uniqueid'];
                                                                                $fsponsorid6 = $fetchcount6['nomineeid'];
                                                                                $crea6 = $fetchcount6['created'];
                                                                                $created6 = gmdate("d/m/Y", $crea6);
                                                                                $level6 = '6';
                                                                                //level 3 design starts 
                                                                                ?>
                                                                                <!-- user list starts -->
                                                                                <div class="nk-tb-item">
                                                                                    <div class="nk-tb-col">
                                                                                        <span class="tb-lead"><?php echo $fsponsorid6; ?></span>
                                                                                    </div>
                                                                                    <div class="nk-tb-col tb-col-sm">
                                                                                        <div class="user-card">
                                                                                            <div class="user-avatar user-avatar-sm bg-purple">
                                                                                                <span>AB</span>
                                                                                            </div>
                                                                                            <div class="user-name">
                                                                                                <span class="tb-lead"><?php echo ucfirst($fname6); ?></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="nk-tb-col tb-col-md">
                                                                                        <span class="tb-sub"><?php echo $created6; ?></span>
                                                                                    </div>
                                                                                    <div class="nk-tb-col tb-col-lg">
                                                                                        <span class="tb-sub text-primary"><?php echo $funiqueid6; ?></span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level6; ?></span>
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
                                                                                <!-- user list ends -->
                                                                                <?php 
                                                                               //level 6 design ends
                                                                                //level 7 coding starts
                                                                                $checkdtnow7 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                $checkdtnow7->bindParam(":nomineeid", $funiqueid6);
                                                                                $checkdtnow7->execute();
                                                                                //count 
                                                                                $checkcount7 = $checkdtnow7->rowCount();
                                                                                if($checkcount7 > 0){
                                                                                   while($fetchcount7 = $checkdtnow7->fetch(PDO::FETCH_ASSOC)){
                                                                                    $fname7 = $fetchcount7['consumerfname'];
                                                                                    $funiqueid7 = $fetchcount7['uniqueid'];
                                                                                    $fsponsorid7 = $fetchcount7['nomineeid'];
                                                                                    $crea7 = $fetchcount7['created'];
                                                                                    $created7 = gmdate("d/m/Y", $crea7);
                                                                                    $level7 = '7';
                                                                                    //level 3 design starts 
                                                                                    ?>
                                                                                    <!-- user list starts -->
                                                                                    <div class="nk-tb-item">
                                                                                        <div class="nk-tb-col">
                                                                                            <span class="tb-lead"><?php echo $fsponsorid7; ?></span>
                                                                                        </div>
                                                                                        <div class="nk-tb-col tb-col-sm">
                                                                                            <div class="user-card">
                                                                                                <div class="user-avatar user-avatar-sm bg-purple">
                                                                                                    <span>AB</span>
                                                                                                </div>
                                                                                                <div class="user-name">
                                                                                                    <span class="tb-lead"><?php echo ucfirst($fname7); ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="nk-tb-col tb-col-md">
                                                                                            <span class="tb-sub"><?php echo $created7; ?></span>
                                                                                        </div>
                                                                                        <div class="nk-tb-col tb-col-lg">
                                                                                            <span class="tb-sub text-primary"><?php echo $funiqueid7; ?></span><br/>
                                                                                        <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level7; ?></span>
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
                                                                                    <!-- user list ends -->
                                                                                    <?php 
                                                                                    //level 7 design ends
                                                                                    //level 8 coding starts
                                                                                    $checkdtnow8 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                        $checkdtnow8->bindParam(":nomineeid", $funiqueid7);
                                                                                        $checkdtnow8->execute();
                                                                                        //count 
                                                                                        $checkcount8 = $checkdtnow8->rowCount();
                                                                                        if($checkcount8 > 0){
                                                                                           while($fetchcount8 = $checkdtnow8->fetch(PDO::FETCH_ASSOC)){
                                                                                            $fname8 = $fetchcount8['consumerfname'];
                                                                                            $funiqueid8 = $fetchcount8['uniqueid'];
                                                                                            $fsponsorid8 = $fetchcount8['nomineeid'];
                                                                                            $crea8 = $fetchcount8['created'];
                                                                                            $created8 = gmdate("d/m/Y", $crea8);
                                                                                            $level8 = '8';
                                                                                            //level 3 design starts 
                                                                                            ?>
                                                                                            <!-- user list starts -->
                                                                                            <div class="nk-tb-item">
                                                                                                <div class="nk-tb-col">
                                                                                                    <span class="tb-lead"><?php echo $fsponsorid8; ?></span>
                                                                                                </div>
                                                                                                <div class="nk-tb-col tb-col-sm">
                                                                                                    <div class="user-card">
                                                                                                        <div class="user-avatar user-avatar-sm bg-purple">
                                                                                                            <span>AB</span>
                                                                                                        </div>
                                                                                                        <div class="user-name">
                                                                                                            <span class="tb-lead"><?php echo ucfirst($fname8); ?></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="nk-tb-col tb-col-md">
                                                                                                    <span class="tb-sub"><?php echo $created8; ?></span>
                                                                                                </div>
                                                                                                <div class="nk-tb-col tb-col-lg">
                                                                                                    <span class="tb-sub text-primary"><?php echo $funiqueid8; ?></span><br/>
                                                                                                <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level8; ?></span>
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
                                                                                            <!-- user list ends -->
                                                                                            <?php 
                                                                                            //level 8 design ends
                                                                                            //level 9 coding starts
                                                                                            $checkdtnow9 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                                $checkdtnow9->bindParam(":nomineeid", $funiqueid8);
                                                                                                $checkdtnow9->execute();
                                                                                                //count 
                                                                                                $checkcount9 = $checkdtnow9->rowCount();
                                                                                                if($checkcount9 > 0){
                                                                                                   while($fetchcount9 = $checkdtnow9->fetch(PDO::FETCH_ASSOC)){
                                                                                                    $fname9 = $fetchcount9['consumerfname'];
                                                                                                    $funiqueid9 = $fetchcount9['uniqueid'];
                                                                                                    $fsponsorid9 = $fetchcount9['nomineeid'];
                                                                                                    $crea9 = $fetchcount9['created'];
                                                                                                    $created9 = gmdate("d/m/Y", $crea9);
                                                                                                    $level9 = '9';
                                                                                                    //level 3 design starts 
                                                                                                    ?>
                                                                                                    <!-- user list starts -->
                                                                                                    <div class="nk-tb-item">
                                                                                                        <div class="nk-tb-col">
                                                                                                            <span class="tb-lead"><?php echo $fsponsorid9; ?></span>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col tb-col-sm">
                                                                                                            <div class="user-card">
                                                                                                                <div class="user-avatar user-avatar-sm bg-purple">
                                                                                                                    <span>AB</span>
                                                                                                                </div>
                                                                                                                <div class="user-name">
                                                                                                                    <span class="tb-lead"><?php echo ucfirst($fname9); ?></span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col tb-col-md">
                                                                                                            <span class="tb-sub"><?php echo $created9; ?></span>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col tb-col-lg">
                                                                                                            <span class="tb-sub text-primary"><?php echo $funiqueid9; ?></span><br/>
                                                                                                        <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level9; ?></span>
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
                                                                                                    <!-- user list ends -->
                                                                                                    <?php 
                                                                                                    //level 9 design ends
                                                                                                    //level 10 coding starts
                                                                                                    $checkdtnow10 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                                        $checkdtnow10->bindParam(":nomineeid", $funiqueid9);
                                                                                                        $checkdtnow10->execute();
                                                                                                        //count 
                                                                                                        $checkcount10 = $checkdtnow10->rowCount();
                                                                                                        if($checkcount10 > 0){
                                                                                                           while($fetchcount10 = $checkdtnow10->fetch(PDO::FETCH_ASSOC)){
                                                                                                            $fname10 = $fetchcount10['consumerfname'];
                                                                                                            $funiqueid10 = $fetchcount10['uniqueid'];
                                                                                                            $fsponsorid10 = $fetchcount10['nomineeid'];
                                                                                                            $crea10 = $fetchcount10['created'];
                                                                                                            $created10 = gmdate("d/m/Y", $crea10);
                                                                                                            $level10 = '10';
                                                                                                            //level 3 design starts 
                                                                                                            ?>
                                                                                                            <!-- user list starts -->
                                                                                                            <div class="nk-tb-item">
                                                                                                                <div class="nk-tb-col">
                                                                                                                    <span class="tb-lead"><?php echo $fsponsorid10; ?></span>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col tb-col-sm">
                                                                                                                    <div class="user-card">
                                                                                                                        <div class="user-avatar user-avatar-sm bg-purple">
                                                                                                                            <span>AB</span>
                                                                                                                        </div>
                                                                                                                        <div class="user-name">
                                                                                                                            <span class="tb-lead"><?php echo ucfirst($fname10); ?></span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col tb-col-md">
                                                                                                                    <span class="tb-sub"><?php echo $created10; ?></span>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col tb-col-lg">
                                                                                                                    <span class="tb-sub text-primary"><?php echo $funiqueid9; ?></span><br/>
                                                                                                                <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level10; ?></span>
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
                                                                                                            <!-- user list ends -->
                                                                                                            <?php 
                                                                                                            //level 10 design ends
                                                                                                                }
                                                                                                            }
                                                                                                            //level 10 coding ends
                                                                                                        }
                                                                                                    }
                                                                                                //level 9 coding ends
                                                                                            }
                                                                                        }
                                                                                    //level 8 coding ends
                                                                                     }
                                                                                  }
                                                                                  //level 7 coding ends 
                                                                               }
                                                                             }
                                                                            //level 6 row count ends 
                                                                            }
                                                                        }
                                                                        //level 5 row count ends 
                                                                    }
                                                                  }
                                                                  //level 4 row count ends 
                                                                }
                                                                //level 4 coding ends 
                                                            }
                                                            //level 3 coding ends
                                                            $i++;  
                                                             }
                                                          } 
                                                        //level 2 coding ends  
                                                        }
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                                <div class="card-inner-sm border-top text-center d-sm-none">
                                                    <a href="#" class="btn btn-link btn-block">See History</a>
                                                </div>
                                            </div><!-- .card -->
                                        </div>
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
    <script src="<?php echo $path; ?>assets/js/bundle.js?ver=1.4.0"></script>
    <script src="<?php echo $path; ?>assets/js/scripts.js?ver=1.4.0"></script>
</body>

</html>