<?php
    error_reporting(E_ALL);
    include("../includes/db/database.php");
    include("../includes/functions/class.php");
    session_start();
    $cex = new cex($db);
    $userid = $_SESSION['userid'];
    if($userid > 0){

    }else{
        header('location: '.$path.'login');
    }
    $i = '1';
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
    $plann = $fetchcount0['consumerplan'];
    if($plann == '1'){
        $plan0 = 'Plan 100';
    }elseif($plann == '2'){
        $plan0 = 'Plan 500';
    }else{
        $plan0 = 'No Plan';
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
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title"><span class="mr-2">List</span></h6>
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
                                                                <span class="tb-lead"><?php echo $i; ?></span>
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
                                                                <span class="tb-lead"><?php echo $fsponsorid0; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                 <span class="tb-sub"><?php echo $fname0; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                 <span class="tb-sub"><?php echo $plan0; ?></span>
                                                            </div>
                                                            <div class="nk-tb-col" style="text-align: left;">
                                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                            </div>
                                                        </div>
                                                        <!-- user list ends -->
                                                        <?php
                                                        //level one starts 
                                                        $checkdtnow1 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                        $checkdtnow1->bindParam(":nomineeid", $consumeruniqueid);
                                                        $checkdtnow1->execute();
                                                        $in = $i+1;
                                                        while($fetchcount1 = $checkdtnow1->fetch(PDO::FETCH_ASSOC)){
                                                            $fname1 = $fetchcount1['consumerfname'];
                                                            $funiqueid1 = $fetchcount1['uniqueid'];
                                                            $fsponsorid1 = $fetchcount1['nomineeid'];
                                                            $crea1 = $fetchcount1['created'];
                                                            $created1 = gmdate("d/m/Y", $crea1);
                                                            $level1 = '1';
                                                            $plann1 = $fetchcount1['consumerplan'];
                                                            if($plann1 == '1'){
                                                                $plan1 = 'Plan 100';
                                                            }elseif($plann1 == '2'){
                                                                $plan1 = 'Plan 500';
                                                            }else{
                                                                $plan1 = 'No Plan';
                                                            }
                                                            //fetch dt 
                                                            $sponsorname1 = $cex->checkSponsorName($fsponsorid1);
                                                            echo '<div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead">'. $in .'</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-lead">'. ucfirst($fname1).'</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">'. $created1.'</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary">'. $funiqueid1.'</span><br/>
                                                                <span style="clear: both;" class="tb-sub text-primary">level '.$level1.'</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead">'. $fsponsorid1.'</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                 <span class="tb-sub">'. $sponsorname1.'</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                 <span class="tb-sub">'. $plan1.'</span>
                                                            </div>
                                                            <div class="nk-tb-col" style="text-align: left;">
                                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                            </div>
                                                           </div>';
                                                            //level one ends
                                                            //level two starts 
                                                            $checkdtnow2 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                            $checkdtnow2->bindParam(":nomineeid", $funiqueid1);
                                                            $checkdtnow2->execute();
                                                            $i2 = $in+1;
                                                            while($fetchcount2 = $checkdtnow2->fetch(PDO::FETCH_ASSOC)){
                                                                $fname2 = $fetchcount2['consumerfname'];
                                                                $funiqueid2 = $fetchcount2['uniqueid'];
                                                                $fsponsorid2 = $fetchcount2['nomineeid'];
                                                                $crea2 = $fetchcount2['created'];
                                                                $created2 = gmdate("d/m/Y", $crea2);
                                                                $level2 = '2';
                                                                $plann2 = $fetchcount2['consumerplan'];
                                                                if($plann2 == '1'){
                                                                    $plan2 = 'Plan 100';
                                                                }elseif($plann2 == '2'){
                                                                    $plan2 = 'Plan 500';
                                                                }else{
                                                                    $plan2 = 'No Plan';
                                                                }
                                                                $sponsorname2 = $cex->checkSponsorName($fsponsorid2);
                                                                echo '<div class="nk-tb-item">
                                                                <div class="nk-tb-col">
                                                                    <span class="tb-lead">'. $i2 .'</span>
                                                                </div>
                                                                <div class="nk-tb-col tb-col-md">
                                                                    <span class="tb-lead">'. ucfirst($fname2).'</span>
                                                                </div>
                                                                <div class="nk-tb-col tb-col-md">
                                                                    <span class="tb-sub">'. $created2.'</span>
                                                                </div>
                                                                <div class="nk-tb-col tb-col-lg">
                                                                    <span class="tb-sub text-primary">'. $funiqueid2.'</span><br/>
                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level2.'</span>
                                                                </div>
                                                                <div class="nk-tb-col">
                                                                    <span class="tb-lead">'. $fsponsorid2.'</span>
                                                                </div>
                                                                <div class="nk-tb-col">
                                                                     <span class="tb-sub">'. $sponsorname2.'</span>
                                                                </div>
                                                                <div class="nk-tb-col">
                                                                     <span class="tb-sub">'. $plan2.'</span>
                                                                </div>
                                                                <div class="nk-tb-col" style="text-align: left;">
                                                                    <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                </div>
                                                               </div>';
                                                               //level three starts 
                                                                $checkdtnow3 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                $checkdtnow3->bindParam(":nomineeid", $funiqueid2);
                                                                $checkdtnow3->execute();
                                                                $i3 = $i2+1;
                                                                while($fetchcount3 = $checkdtnow3->fetch(PDO::FETCH_ASSOC)){
                                                                    $fname3 = $fetchcount3['consumerfname'];
                                                                    $funiqueid3 = $fetchcount3['uniqueid'];
                                                                    $fsponsorid3 = $fetchcount2['nomineeid'];
                                                                    $crea3 = $fetchcount3['created'];
                                                                    $created3 = gmdate("d/m/Y", $crea3);
                                                                    $level3 = '3';
                                                                    $plann3 = $fetchcount3['consumerplan'];
                                                                    if($plann3 == '1'){
                                                                        $plan3 = 'Plan 100';
                                                                    }elseif($plann3 == '2'){
                                                                        $plan3 = 'Plan 500';
                                                                    }else{
                                                                        $plan3 = 'No Plan';
                                                                    }
                                                                    $sponsorname3 = $cex->checkSponsorName($fsponsorid3);
                                                                    echo '<div class="nk-tb-item">
                                                                    <div class="nk-tb-col">
                                                                        <span class="tb-lead">'. $i3 .'</span>
                                                                    </div>
                                                                    <div class="nk-tb-col tb-col-md">
                                                                        <span class="tb-lead">'. ucfirst($fname3).'</span>
                                                                    </div>
                                                                    <div class="nk-tb-col tb-col-md">
                                                                        <span class="tb-sub">'. $created3.'</span>
                                                                    </div>
                                                                    <div class="nk-tb-col tb-col-lg">
                                                                        <span class="tb-sub text-primary">'. $funiqueid3.'</span><br/>
                                                                        <span style="clear: both;" class="tb-sub text-primary">level '.$level3.'</span>
                                                                    </div>
                                                                    <div class="nk-tb-col">
                                                                        <span class="tb-lead">'. $fsponsorid3.'</span>
                                                                    </div>
                                                                    <div class="nk-tb-col">
                                                                         <span class="tb-sub">'. $sponsorname3.'</span>
                                                                    </div>
                                                                    <div class="nk-tb-col">
                                                                         <span class="tb-sub">'. $plan3.'</span>
                                                                    </div>
                                                                    <div class="nk-tb-col" style="text-align: left;">
                                                                        <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                    </div>
                                                                   </div>';
                                                                    //level four starts 
                                                                    $checkdtnow4 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                        $checkdtnow4->bindParam(":nomineeid", $funiqueid3);
                                                                        $checkdtnow4->execute();
                                                                        $i4 = $i3+1;
                                                                        while($fetchcount4 = $checkdtnow4->fetch(PDO::FETCH_ASSOC)){
                                                                            $fname4 = $fetchcount4['consumerfname'];
                                                                            $funiqueid4 = $fetchcount4['uniqueid'];
                                                                            $fsponsorid4 = $fetchcount4['nomineeid'];
                                                                            $crea4 = $fetchcount4['created'];
                                                                            $created4 = gmdate("d/m/Y", $crea4);
                                                                            $level4 = '4';
                                                                            $plann4 = $fetchcount4['consumerplan'];
                                                                            if($plann4 == '1'){
                                                                                $plan4 = 'Plan 100';
                                                                            }elseif($plann4 == '2'){
                                                                                $plan4 = 'Plan 500';
                                                                            }else{
                                                                                $plan4 = 'No Plan';
                                                                            }
                                                                            $sponsorname4 = $cex->checkSponsorName($fsponsorid4);
                                                                            echo '<div class="nk-tb-item">
                                                                            <div class="nk-tb-col">
                                                                                <span class="tb-lead">'. $i4 .'</span>
                                                                            </div>
                                                                            <div class="nk-tb-col tb-col-md">
                                                                                <span class="tb-lead">'. ucfirst($fname4).'</span>
                                                                            </div>
                                                                            <div class="nk-tb-col tb-col-md">
                                                                                <span class="tb-sub">'. $created4.'</span>
                                                                            </div>
                                                                            <div class="nk-tb-col tb-col-lg">
                                                                                <span class="tb-sub text-primary">'. $funiqueid4.'</span><br/>
                                                                                <span style="clear: both;" class="tb-sub text-primary">level '.$level4.'</span>
                                                                            </div>
                                                                            <div class="nk-tb-col">
                                                                                <span class="tb-lead">'. $fsponsorid4.'</span>
                                                                            </div>
                                                                            <div class="nk-tb-col">
                                                                                 <span class="tb-sub">'. $sponsorname4.'</span>
                                                                            </div>
                                                                            <div class="nk-tb-col">
                                                                                 <span class="tb-sub">'. $plan4.'</span>
                                                                            </div>
                                                                            <div class="nk-tb-col" style="text-align: left;">
                                                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                            </div>
                                                                           </div>';
                                                                            //level five starts 
                                                                            $checkdtnow5 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                            $checkdtnow5->bindParam(":nomineeid", $funiqueid4);
                                                                            $checkdtnow5->execute();
                                                                            $i5 = $i4+1;
                                                                            while($fetchcount5 = $checkdtnow5->fetch(PDO::FETCH_ASSOC)){
                                                                                $fname5 = $fetchcount5['consumerfname'];
                                                                                $funiqueid5 = $fetchcount5['uniqueid'];
                                                                                $fsponsorid5 = $fetchcount5['nomineeid'];
                                                                                $crea5 = $fetchcount5['created'];
                                                                                $created5 = gmdate("d/m/Y", $crea5);
                                                                                $level5 = '5';
                                                                                $plann5 = $fetchcount5['consumerplan'];
                                                                                if($plann5 == '1'){
                                                                                    $plan5 = 'Plan 100';
                                                                                }elseif($plann5 == '2'){
                                                                                    $plan5 = 'Plan 500';
                                                                                }else{
                                                                                    $plan5 = 'No Plan';
                                                                                }
                                                                                echo '<div class="nk-tb-item">
                                                                                <div class="nk-tb-col">
                                                                                    <span class="tb-lead">'. $i5 .'</span>
                                                                                </div>
                                                                                <div class="nk-tb-col tb-col-md">
                                                                                    <span class="tb-lead">'. ucfirst($fname5).'</span>
                                                                                </div>
                                                                                <div class="nk-tb-col tb-col-md">
                                                                                    <span class="tb-sub">'. $created5.'</span>
                                                                                </div>
                                                                                <div class="nk-tb-col tb-col-lg">
                                                                                    <span class="tb-sub text-primary">'. $funiqueid5.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level5.'</span>
                                                                                </div>
                                                                                <div class="nk-tb-col">
                                                                                    <span class="tb-lead">'. $fsponsorid5.'</span>
                                                                                </div>
                                                                                <div class="nk-tb-col">
                                                                                     <span class="tb-sub">'. $fname5.'</span>
                                                                                </div>
                                                                                <div class="nk-tb-col">
                                                                                     <span class="tb-sub">'. $plan5.'</span>
                                                                                </div>
                                                                                <div class="nk-tb-col" style="text-align: left;">
                                                                                    <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                </div>
                                                                               </div>';
                                                                               //level six starts 
                                                                               $checkdtnow6 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                $checkdtnow6->bindParam(":nomineeid", $funiqueid5);
                                                                                $checkdtnow6->execute();
                                                                                $i6 = $i5+1;
                                                                                while($fetchcount6 = $checkdtnow6->fetch(PDO::FETCH_ASSOC)){
                                                                                    $fname6 = $fetchcount6['consumerfname'];
                                                                                    $funiqueid6 = $fetchcount6['uniqueid'];
                                                                                    $fsponsorid6 = $fetchcount6['nomineeid'];
                                                                                    $crea6 = $fetchcount6['created'];
                                                                                    $created6 = gmdate("d/m/Y", $crea6);
                                                                                    $level6 = '6';
                                                                                    $plann6 = $fetchcount6['consumerplan'];
                                                                                    if($plann6 == '1'){
                                                                                        $plan6 = 'Plan 100';
                                                                                    }elseif($plann6 == '2'){
                                                                                        $plan6 = 'Plan 600';
                                                                                    }else{
                                                                                        $plan6 = 'No Plan';
                                                                                    }
                                                                                    echo '<div class="nk-tb-item">
                                                                                    <div class="nk-tb-col">
                                                                                        <span class="tb-lead">'. $i6 .'</span>
                                                                                    </div>
                                                                                    <div class="nk-tb-col tb-col-md">
                                                                                        <span class="tb-lead">'. ucfirst($fname6).'</span>
                                                                                    </div>
                                                                                    <div class="nk-tb-col tb-col-md">
                                                                                        <span class="tb-sub">'. $created6.'</span>
                                                                                    </div>
                                                                                    <div class="nk-tb-col tb-col-lg">
                                                                                        <span class="tb-sub text-primary">'. $funiqueid6.'</span><br/>
                                                                                        <span style="clear: both;" class="tb-sub text-primary">level '.$level6.'</span>
                                                                                    </div>
                                                                                    <div class="nk-tb-col">
                                                                                        <span class="tb-lead">'. $fsponsorid6.'</span>
                                                                                    </div>
                                                                                    <div class="nk-tb-col">
                                                                                         <span class="tb-sub">'. $fname6.'</span>
                                                                                    </div>
                                                                                    <div class="nk-tb-col">
                                                                                         <span class="tb-sub">'. $plan6.'</span>
                                                                                    </div>
                                                                                    <div class="nk-tb-col" style="text-align: left;">
                                                                                        <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                    </div>
                                                                                   </div>';
                                                                                   //level seven starts 
                                                                                   $checkdtnow7 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                    $checkdtnow7->bindParam(":nomineeid", $funiqueid6);
                                                                                    $checkdtnow7->execute();
                                                                                    $i7 = $i6+1;
                                                                                    while($fetchcount7 = $checkdtnow7->fetch(PDO::FETCH_ASSOC)){
                                                                                        $fname7 = $fetchcount7['consumerfname'];
                                                                                        $funiqueid7 = $fetchcount7['uniqueid'];
                                                                                        $fsponsorid7 = $fetchcount7['nomineeid'];
                                                                                        $crea7 = $fetchcount7['created'];
                                                                                        $created7 = gmdate("d/m/Y", $crea7);
                                                                                        $level7 = '7';
                                                                                        $plann7 = $fetchcount7['consumerplan'];
                                                                                        if($plann7 == '1'){
                                                                                            $plan7 = 'Plan 100';
                                                                                        }elseif($plann7 == '2'){
                                                                                            $plan7 = 'Plan 700';
                                                                                        }else{
                                                                                            $plan7 = 'No Plan';
                                                                                        }
                                                                                        echo '<div class="nk-tb-item">
                                                                                        <div class="nk-tb-col">
                                                                                            <span class="tb-lead">'. $i7 .'</span>
                                                                                        </div>
                                                                                        <div class="nk-tb-col tb-col-md">
                                                                                            <span class="tb-lead">'. ucfirst($fname7).'</span>
                                                                                        </div>
                                                                                        <div class="nk-tb-col tb-col-md">
                                                                                            <span class="tb-sub">'. $created7.'</span>
                                                                                        </div>
                                                                                        <div class="nk-tb-col tb-col-lg">
                                                                                            <span class="tb-sub text-primary">'. $funiqueid7.'</span><br/>
                                                                                            <span style="clear: both;" class="tb-sub text-primary">level '.$level7.'</span>
                                                                                        </div>
                                                                                        <div class="nk-tb-col">
                                                                                            <span class="tb-lead">'. $fsponsorid7.'</span>
                                                                                        </div>
                                                                                        <div class="nk-tb-col">
                                                                                             <span class="tb-sub">'. $fname7.'</span>
                                                                                        </div>
                                                                                        <div class="nk-tb-col">
                                                                                             <span class="tb-sub">'. $plan7.'</span>
                                                                                        </div>
                                                                                        <div class="nk-tb-col" style="text-align: left;">
                                                                                            <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                        </div>
                                                                                       </div>';
                                                                                       //level eight starts 
                                                                                       $checkdtnow8 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                        $checkdtnow8->bindParam(":nomineeid", $funiqueid7);
                                                                                        $checkdtnow8->execute();
                                                                                        $i8 = $i7+1;
                                                                                        while($fetchcount8 = $checkdtnow8->fetch(PDO::FETCH_ASSOC)){
                                                                                            $fname8 = $fetchcount8['consumerfname'];
                                                                                            $funiqueid8 = $fetchcount8['uniqueid'];
                                                                                            $fsponsorid8 = $fetchcount8['nomineeid'];
                                                                                            $crea8 = $fetchcount8['created'];
                                                                                            $created8 = gmdate("d/m/Y", $crea8);
                                                                                            $level8 = '8';
                                                                                            $plann8 = $fetchcount8['consumerplan'];
                                                                                            if($plann8 == '1'){
                                                                                                $plan8 = 'Plan 100';
                                                                                            }elseif($plann8 == '2'){
                                                                                                $plan8 = 'Plan 800';
                                                                                            }else{
                                                                                                $plan8 = 'No Plan';
                                                                                            }
                                                                                            echo '<div class="nk-tb-item">
                                                                                            <div class="nk-tb-col">
                                                                                                <span class="tb-lead">'. $i8 .'</span>
                                                                                            </div>
                                                                                            <div class="nk-tb-col tb-col-md">
                                                                                                <span class="tb-lead">'. ucfirst($fname8).'</span>
                                                                                            </div>
                                                                                            <div class="nk-tb-col tb-col-md">
                                                                                                <span class="tb-sub">'. $created8.'</span>
                                                                                            </div>
                                                                                            <div class="nk-tb-col tb-col-lg">
                                                                                                <span class="tb-sub text-primary">'. $funiqueid8.'</span><br/>
                                                                                                <span style="clear: both;" class="tb-sub text-primary">level '.$level8.'</span>
                                                                                            </div>
                                                                                            <div class="nk-tb-col">
                                                                                                <span class="tb-lead">'. $fsponsorid8.'</span>
                                                                                            </div>
                                                                                            <div class="nk-tb-col">
                                                                                                 <span class="tb-sub">'. $fname8.'</span>
                                                                                            </div>
                                                                                            <div class="nk-tb-col">
                                                                                                 <span class="tb-sub">'. $plan8.'</span>
                                                                                            </div>
                                                                                            <div class="nk-tb-col" style="text-align: left;">
                                                                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                            </div>
                                                                                           </div>';
                                                                                           //level four starts 
                                                                                           $checkdtnow9 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                            $checkdtnow9->bindParam(":nomineeid", $funiqueid8);
                                                                                            $checkdtnow9->execute();
                                                                                            $i9 = $i8+1;
                                                                                            while($fetchcount9 = $checkdtnow9->fetch(PDO::FETCH_ASSOC)){
                                                                                                $fname9 = $fetchcount9['consumerfname'];
                                                                                                $funiqueid9 = $fetchcount9['uniqueid'];
                                                                                                $fsponsorid9 = $fetchcount9['nomineeid'];
                                                                                                $crea9 = $fetchcount9['created'];
                                                                                                $created9 = gmdate("d/m/Y", $crea9);
                                                                                                $level9 = '9';
                                                                                                $plann9 = $fetchcount9['consumerplan'];
                                                                                                if($plann9 == '1'){
                                                                                                    $plan9 = 'Plan 100';
                                                                                                }elseif($plann9 == '2'){
                                                                                                    $plan9 = 'Plan 900';
                                                                                                }else{
                                                                                                    $plan9 = 'No Plan';
                                                                                                }
                                                                                                echo '<div class="nk-tb-item">
                                                                                                <div class="nk-tb-col">
                                                                                                    <span class="tb-lead">'. $i9 .'</span>
                                                                                                </div>
                                                                                                <div class="nk-tb-col tb-col-md">
                                                                                                    <span class="tb-lead">'. ucfirst($fname9).'</span>
                                                                                                </div>
                                                                                                <div class="nk-tb-col tb-col-md">
                                                                                                    <span class="tb-sub">'. $created9.'</span>
                                                                                                </div>
                                                                                                <div class="nk-tb-col tb-col-lg">
                                                                                                    <span class="tb-sub text-primary">'. $funiqueid9.'</span><br/>
                                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level9.'</span>
                                                                                                </div>
                                                                                                <div class="nk-tb-col">
                                                                                                    <span class="tb-lead">'. $fsponsorid9.'</span>
                                                                                                </div>
                                                                                                <div class="nk-tb-col">
                                                                                                     <span class="tb-sub">'. $fname9.'</span>
                                                                                                </div>
                                                                                                <div class="nk-tb-col">
                                                                                                     <span class="tb-sub">'. $plan9.'</span>
                                                                                                </div>
                                                                                                <div class="nk-tb-col" style="text-align: left;">
                                                                                                    <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                                </div>
                                                                                               </div>';
                                                                                                $checkdtnow10 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                                $checkdtnow10->bindParam(":nomineeid", $funiqueid9);
                                                                                                $checkdtnow10->execute();
                                                                                                $i10 = $i9+1;
                                                                                                while($fetchcount10 = $checkdtnow10->fetch(PDO::FETCH_ASSOC)){
                                                                                                    $fname10 = $fetchcount10['consumerfname'];
                                                                                                    $funiqueid10 = $fetchcount10['uniqueid'];
                                                                                                    $fsponsorid10 = $fetchcount10['nomineeid'];
                                                                                                    $crea10 = $fetchcount10['created'];
                                                                                                    $created10 = gmdate("d/m/Y", $crea10);
                                                                                                    $level10 = '10';
                                                                                                    $plann10 = $fetchcount10['consumerplan'];
                                                                                                    if($plann10 == '1'){
                                                                                                        $plan10 = 'Plan 100';
                                                                                                    }elseif($plann10 == '2'){
                                                                                                        $plan10 = 'Plan 1000';
                                                                                                    }else{
                                                                                                        $plan10 = 'No Plan';
                                                                                                    }
                                                                                                    echo '<div class="nk-tb-item">
                                                                                                    <div class="nk-tb-col">
                                                                                                        <span class="tb-lead">'. $i10 .'</span>
                                                                                                    </div>
                                                                                                    <div class="nk-tb-col tb-col-md">
                                                                                                        <span class="tb-lead">'. ucfirst($fname10).'</span>
                                                                                                    </div>
                                                                                                    <div class="nk-tb-col tb-col-md">
                                                                                                        <span class="tb-sub">'. $created10.'</span>
                                                                                                    </div>
                                                                                                    <div class="nk-tb-col tb-col-lg">
                                                                                                        <span class="tb-sub text-primary">'. $funiqueid10.'</span><br/>
                                                                                                        <span style="clear: both;" class="tb-sub text-primary">level '.$level10.'</span>
                                                                                                    </div>
                                                                                                    <div class="nk-tb-col">
                                                                                                        <span class="tb-lead">'. $fsponsorid10.'</span>
                                                                                                    </div>
                                                                                                    <div class="nk-tb-col">
                                                                                                         <span class="tb-sub">'. $fname10.'</span>
                                                                                                    </div>
                                                                                                    <div class="nk-tb-col">
                                                                                                         <span class="tb-sub">'. $plan10.'</span>
                                                                                                    </div>
                                                                                                    <div class="nk-tb-col" style="text-align: left;">
                                                                                                        <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                                    </div>
                                                                                                   </div>';
                                                                                                   //level four starts 
                                                                                                    $checkdtnow11 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                                    $checkdtnow11->bindParam(":nomineeid", $funiqueid10);
                                                                                                    $checkdtnow11->execute();
                                                                                                    $i11 = $i10+1;
                                                                                                    while($fetchcount11 = $checkdtnow11->fetch(PDO::FETCH_ASSOC)){
                                                                                                        $fname11 = $fetchcount11['consumerfname'];
                                                                                                        $funiqueid11 = $fetchcount11['uniqueid'];
                                                                                                        $fsponsorid11 = $fetchcount11['nomineeid'];
                                                                                                        $crea11 = $fetchcount11['created'];
                                                                                                        $created11 = gmdate("d/m/Y", $crea11);
                                                                                                        $level11 = '11';
                                                                                                        $plann11 = $fetchcount11['consumerplan'];
                                                                                                        if($plann11 == '1'){
                                                                                                            $plan11 = 'Plan 110';
                                                                                                        }elseif($plann11 == '2'){
                                                                                                            $plan11 = 'Plan 1100';
                                                                                                        }else{
                                                                                                            $plan11 = 'No Plan';
                                                                                                        }
                                                                                                        echo '<div class="nk-tb-item">
                                                                                                        <div class="nk-tb-col">
                                                                                                            <span class="tb-lead">'. $i11 .'</span>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col tb-col-md">
                                                                                                            <span class="tb-lead">'. ucfirst($fname11).'</span>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col tb-col-md">
                                                                                                            <span class="tb-sub">'. $created11.'</span>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col tb-col-lg">
                                                                                                            <span class="tb-sub text-primary">'. $funiqueid11.'</span><br/>
                                                                                                            <span style="clear: both;" class="tb-sub text-primary">level '.$level11.'</span>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col">
                                                                                                            <span class="tb-lead">'. $fsponsorid11.'</span>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col">
                                                                                                             <span class="tb-sub">'. $fname11.'</span>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col">
                                                                                                             <span class="tb-sub">'. $plan11.'</span>
                                                                                                        </div>
                                                                                                        <div class="nk-tb-col" style="text-align: left;">
                                                                                                            <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                                        </div>
                                                                                                       </div>';
                                                                                                       //level four starts 
                                                                                                        $checkdtnow12 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                                        $checkdtnow12->bindParam(":nomineeid", $funiqueid11);
                                                                                                        $checkdtnow12->execute();
                                                                                                        $i12 = $i11+1;
                                                                                                        while($fetchcount12 = $checkdtnow12->fetch(PDO::FETCH_ASSOC)){
                                                                                                            $fname12 = $fetchcount12['consumerfname'];
                                                                                                            $funiqueid12 = $fetchcount12['uniqueid'];
                                                                                                            $fsponsorid12 = $fetchcount12['nomineeid'];
                                                                                                            $crea12 = $fetchcount12['created'];
                                                                                                            $created12 = gmdate("d/m/Y", $crea12);
                                                                                                            $level12 = '12';
                                                                                                            $plann12 = $fetchcount12['consumerplan'];
                                                                                                            if($plann12 == '1'){
                                                                                                                $plan12 = 'Plan 120';
                                                                                                            }elseif($plann12 == '2'){
                                                                                                                $plan12 = 'Plan 1200';
                                                                                                            }else{
                                                                                                                $plan12 = 'No Plan';
                                                                                                            }
                                                                                                            echo '<div class="nk-tb-item">
                                                                                                            <div class="nk-tb-col">
                                                                                                                <span class="tb-lead">'. $i12 .'</span>
                                                                                                            </div>
                                                                                                            <div class="nk-tb-col tb-col-md">
                                                                                                                <span class="tb-lead">'. ucfirst($fname12).'</span>
                                                                                                            </div>
                                                                                                            <div class="nk-tb-col tb-col-md">
                                                                                                                <span class="tb-sub">'. $created12.'</span>
                                                                                                            </div>
                                                                                                            <div class="nk-tb-col tb-col-lg">
                                                                                                                <span class="tb-sub text-primary">'. $funiqueid12.'</span><br/>
                                                                                                                <span style="clear: both;" class="tb-sub text-primary">level '.$level12.'</span>
                                                                                                            </div>
                                                                                                            <div class="nk-tb-col">
                                                                                                                <span class="tb-lead">'. $fsponsorid12.'</span>
                                                                                                            </div>
                                                                                                            <div class="nk-tb-col">
                                                                                                                 <span class="tb-sub">'. $fname12.'</span>
                                                                                                            </div>
                                                                                                            <div class="nk-tb-col">
                                                                                                                 <span class="tb-sub">'. $plan12.'</span>
                                                                                                            </div>
                                                                                                            <div class="nk-tb-col" style="text-align: left;">
                                                                                                                <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                                            </div>
                                                                                                           </div>';
                                                                                                           //level four starts 
                                                                                                            $checkdtnow13 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                                            $checkdtnow13->bindParam(":nomineeid", $funiqueid12);
                                                                                                            $checkdtnow13->execute();
                                                                                                            $i13 = $i2+1;
                                                                                                            while($fetchcount13 = $checkdtnow13->fetch(PDO::FETCH_ASSOC)){
                                                                                                                $fname13 = $fetchcount13['consumerfname'];
                                                                                                                $funiqueid13 = $fetchcount13['uniqueid'];
                                                                                                                $fsponsorid13 = $fetchcount13['nomineeid'];
                                                                                                                $crea13 = $fetchcount13['created'];
                                                                                                                $created13 = gmdate("d/m/Y", $crea13);
                                                                                                                $level13 = '13';
                                                                                                                $plann13 = $fetchcount13['consumerplan'];
                                                                                                                if($plann13 == '1'){
                                                                                                                    $plan13 = 'Plan 130';
                                                                                                                }elseif($plann13 == '2'){
                                                                                                                    $plan13 = 'Plan 1300';
                                                                                                                }else{
                                                                                                                    $plan13 = 'No Plan';
                                                                                                                }
                                                                                                                echo '<div class="nk-tb-item">
                                                                                                                <div class="nk-tb-col">
                                                                                                                    <span class="tb-lead">'. $i13 .'</span>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col tb-col-md">
                                                                                                                    <span class="tb-lead">'. ucfirst($fname13).'</span>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col tb-col-md">
                                                                                                                    <span class="tb-sub">'. $created13.'</span>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col tb-col-lg">
                                                                                                                    <span class="tb-sub text-primary">'. $funiqueid13.'</span><br/>
                                                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level13.'</span>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col">
                                                                                                                    <span class="tb-lead">'. $fsponsorid13.'</span>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col">
                                                                                                                     <span class="tb-sub">'. $fname13.'</span>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col">
                                                                                                                     <span class="tb-sub">'. $plan13.'</span>
                                                                                                                </div>
                                                                                                                <div class="nk-tb-col" style="text-align: left;">
                                                                                                                    <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                                                </div>
                                                                                                               </div>';
                                                                                                               //level four starts 
                                                                                                               $checkdtnow14 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                                                $checkdtnow14->bindParam(":nomineeid", $funiqueid13);
                                                                                                                $checkdtnow14->execute();
                                                                                                                $i14 = $i13+1;
                                                                                                                while($fetchcount14 = $checkdtnow14->fetch(PDO::FETCH_ASSOC)){
                                                                                                                    $fname14 = $fetchcount14['consumerfname'];
                                                                                                                    $funiqueid14 = $fetchcount14['uniqueid'];
                                                                                                                    $fsponsorid14 = $fetchcount14['nomineeid'];
                                                                                                                    $crea14 = $fetchcount14['created'];
                                                                                                                    $created14 = gmdate("d/m/Y", $crea14);
                                                                                                                    $level14 = '14';
                                                                                                                    $plann14 = $fetchcount14['consumerplan'];
                                                                                                                    if($plann14 == '1'){
                                                                                                                        $plan14 = 'Plan 140';
                                                                                                                    }elseif($plann14 == '2'){
                                                                                                                        $plan14 = 'Plan 1400';
                                                                                                                    }else{
                                                                                                                        $plan14 = 'No Plan';
                                                                                                                    }
                                                                                                                    echo '<div class="nk-tb-item">
                                                                                                                    <div class="nk-tb-col">
                                                                                                                        <span class="tb-lead">'. $i14 .'</span>
                                                                                                                    </div>
                                                                                                                    <div class="nk-tb-col tb-col-md">
                                                                                                                        <span class="tb-lead">'. ucfirst($fname14).'</span>
                                                                                                                    </div>
                                                                                                                    <div class="nk-tb-col tb-col-md">
                                                                                                                        <span class="tb-sub">'. $created14.'</span>
                                                                                                                    </div>
                                                                                                                    <div class="nk-tb-col tb-col-lg">
                                                                                                                        <span class="tb-sub text-primary">'. $funiqueid14.'</span><br/>
                                                                                                                        <span style="clear: both;" class="tb-sub text-primary">level '.$level14.'</span>
                                                                                                                    </div>
                                                                                                                    <div class="nk-tb-col">
                                                                                                                        <span class="tb-lead">'. $fsponsorid14.'</span>
                                                                                                                    </div>
                                                                                                                    <div class="nk-tb-col">
                                                                                                                         <span class="tb-sub">'. $fname14.'</span>
                                                                                                                    </div>
                                                                                                                    <div class="nk-tb-col">
                                                                                                                         <span class="tb-sub">'. $plan14.'</span>
                                                                                                                    </div>
                                                                                                                    <div class="nk-tb-col" style="text-align: left;">
                                                                                                                        <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                                                    </div>
                                                                                                                   </div>';
                                                                                                                   //level four starts 
                                                                                                                   $checkdtnow15 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                                                                    $checkdtnow15->bindParam(":nomineeid", $funiqueid14);
                                                                                                                    $checkdtnow15->execute();
                                                                                                                    $i15 = $i14+1;
                                                                                                                    while($fetchcount15 = $checkdtnow15->fetch(PDO::FETCH_ASSOC)){
                                                                                                                        $fname15 = $fetchcount15['consumerfname'];
                                                                                                                        $funiqueid15 = $fetchcount15['uniqueid'];
                                                                                                                        $fsponsorid15 = $fetchcount15['nomineeid'];
                                                                                                                        $crea15 = $fetchcount15['created'];
                                                                                                                        $created15 = gmdate("d/m/Y", $crea15);
                                                                                                                        $level15 = '15';
                                                                                                                        $plann15 = $fetchcount15['consumerplan'];
                                                                                                                        if($plann15 == '1'){
                                                                                                                            $plan15 = 'Plan 150';
                                                                                                                        }elseif($plann15 == '2'){
                                                                                                                            $plan15 = 'Plan 1500';
                                                                                                                        }else{
                                                                                                                            $plan15 = 'No Plan';
                                                                                                                        }
                                                                                                                        echo '<div class="nk-tb-item">
                                                                                                                        <div class="nk-tb-col">
                                                                                                                            <span class="tb-lead">'. $i15 .'</span>
                                                                                                                        </div>
                                                                                                                        <div class="nk-tb-col tb-col-md">
                                                                                                                            <span class="tb-lead">'. ucfirst($fname15).'</span>
                                                                                                                        </div>
                                                                                                                        <div class="nk-tb-col tb-col-md">
                                                                                                                            <span class="tb-sub">'. $created15.'</span>
                                                                                                                        </div>
                                                                                                                        <div class="nk-tb-col tb-col-lg">
                                                                                                                            <span class="tb-sub text-primary">'. $funiqueid15.'</span><br/>
                                                                                                                            <span style="clear: both;" class="tb-sub text-primary">level '.$level15.'</span>
                                                                                                                        </div>
                                                                                                                        <div class="nk-tb-col">
                                                                                                                            <span class="tb-lead">'. $fsponsorid15.'</span>
                                                                                                                        </div>
                                                                                                                        <div class="nk-tb-col">
                                                                                                                             <span class="tb-sub">'. $fname15.'</span>
                                                                                                                        </div>
                                                                                                                        <div class="nk-tb-col">
                                                                                                                             <span class="tb-sub">'. $plan15.'</span>
                                                                                                                        </div>
                                                                                                                        <div class="nk-tb-col" style="text-align: left;">
                                                                                                                            <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                                                                                        </div>
                                                                                                                       </div>';
                                                                                                                    $i15++;
                                                                                                                    }
                                                                                                                $i14++;
                                                                                                                }
                                                                                                            $i13++;
                                                                                                            }
                                                                                                        $i12++;
                                                                                                        }
                                                                                                    $i11++;
                                                                                                    }
                                                                                                $i10++;
                                                                                                }
                                                                                            $i9++;
                                                                                            }
                                                                                        $i8++;
                                                                                        }
                                                                                    $i7++;
                                                                                    }
                                                                                $i6++;
                                                                                }
                                                                            $i5++;
                                                                            }                                                                           
                                                                        $i4++;
                                                                        }    
                                                                    $i3++;
                                                                      }
                                                                $i2++;
                                                                  }
                                                            $in++;
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