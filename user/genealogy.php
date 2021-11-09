<?php
    error_reporting('0');
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
    //echo $userid.'--this is test for user id';
    //get details from the db 
    $staffd = $db->prepare("SELECT * FROM consumer WHERE consumerid = :consumerid AND status != 2");
    $staffd->bindParam(":consumerid", $userid);
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
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=<?php echo $version; ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=<?php echo $version; ?>">
    <script src="<?php echo $path; ?>js/jquery-1.11.1.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>js/default.js?ver=<?php echo $version; ?>"></script>
</head>
<?php
    //echo $consumeruniqueid.'--this is test';
    $getuserlist = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid");
    $getuserlist->bindParam(":nomineeid", $consumeruniqueid);
    $getuserlist->execute();
    //count 
    $usercount = $getuserlist->rowCount(); 

    $usercode = $db->prepare("SELECT * FROM consumer WHERE uniqueid = :consumerid");
    $usercode->bindParam(":consumerid", $consumeruniqueid);
    $usercode->execute();
    //check count 
    $ucount = $usercode->rowCount();
    $fetchcount0 = $usercode->fetch(PDO::FETCH_ASSOC);
    $fname0 = $fetchcount0['consumerfname'];
    $funiqueid0 = $fetchcount0['uniqueid'];
    //echo $funiqueid0.'--this is unique id';
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
    echo $ucount2;
    $i = '1';
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
                                <div class="row" style="background-color: #fff; padding: 30px 0px;">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <div class="col-md-12">
                                                                <div>
                                                                    <table class="table table-bordered table-condensed" cellspacing="0" rules="all" border="1" style="width:100%;border-collapse:collapse;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="col" style="display: none;">Sr. No.</th>
                                                                                <th scope="col">Member ID</th>
                                                                                <th scope="col">Member Name</th>
                                                                                <th scope="col">Activation Date</th>
                                                                                <th scope="col">Sponsor ID</th>
                                                                                <th scope="col">Sponsor Name</th>
                                                                                <th scope="col">Package Name</th>
                                                                                <th scope="col">Joining Date</th>
                                                                            </tr>
                                                                            <!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    <?php echo $i; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary"><?php echo $funiqueid0; ?></span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary"><?php echo 'level '.$level0; ?></span>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo ucfirst($fname0); ?> 
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $created0; ?> 
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $fsponsorid0; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $fname0; ?> 
                                                                                </td>
                                                                                <td> 
                                                                                    <?php echo $plan0; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $created0; ?> 
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->
                                                        <!-- user list ends -->
                                                        <?php
                                                        //level one starts 
                                                        $checkdtnow1 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by created DESC");
                                                        $checkdtnow1->bindParam(":nomineeid", $consumeruniqueid);
                                                        $checkdtnow1->execute();
                                                        $in = $i+1;
                                                        $count1 = $checkdtnow1->rowCount();
                                                        while($fetchcount1 = $checkdtnow1->fetch(PDO::FETCH_ASSOC)){
                                                            $fname1 = $fetchcount1['consumerfname'];
                                                            $funiqueid1 = $fetchcount1['uniqueid'];
                                                            $fsponsorid1 = $fetchcount1['nomineeid'];
                                                            $crea1 = $fetchcount1['created'];
                                                            //$status1n = $fetchcount1['status'];
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
                                                            $status1n = $fetchcount1['status'];
                                                            if($status1n == '1'){
                                                                $status1 = 'Not paid';
                                                                $bgname1 = 'badge-warning';
                                                            }else if($status1n == '0'){
                                                                $status1 = 'Not Active';
                                                                $bgname1 = 'badge--gray';
                                                            }else if($status1n == '2'){
                                                                $status1 = 'Banned';
                                                                $bgname1 = 'badge-danger';
                                                            }else if($status1n == '3'){
                                                                $status1 = 'Paid';
                                                                $bgname1 = 'badge-success';
                                                            }
                                                            $factdaten1 = $fetchcount1['activationdate'];
                                                            if($factdaten1 == 0){
                                                                    $factdate1 = 'NA';
                                                                    $facttime1 = '';
                                                                }else{
                                                                    $factdate1 = gmdate("d/m/Y", $factdaten1);
                                                                    $facttime1 = gmdate("g:i a", $factdaten1);
                                                                }
                                                            //fetch dt 
                                                            $sponsorname1 = $cex->checkSponsorName($fsponsorid1);
                                                            echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $in .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid1.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level1.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname1) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate1.'<br/>'.$facttime1.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid1 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname1 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan1 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created1 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
                                                            //level one ends
                                                            //level two starts 
                                                            $checkdtnow2 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by created DESC");
                                                            $checkdtnow2->bindParam(":nomineeid", $funiqueid1);
                                                            $checkdtnow2->execute();
                                                            $i2 = $in+1;
                                                            $count2 = $checkdtnow2->rowCount();
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
                                                                $status2n = $fetchcount2['status'];
                                                                if($status2n == '1'){
                                                                    $status2 = 'Not paid';
                                                                    $bgname2 = 'badge-warning';
                                                                }else if($status2n == '0'){
                                                                    $status2 = 'Not Active';
                                                                    $bgname2 = 'badge--gray';
                                                                }else if($status2n == '2'){
                                                                    $status2 = 'Banned';
                                                                    $bgname2 = 'badge-danger';
                                                                }else if($status2n == '3'){
                                                                    $status2 = 'Paid';
                                                                    $bgname2 = 'badge-success';
                                                                }
                                                                $factdaten2 = $fetchcount2['activationdate'];
                                                                if($factdaten2 == 0){
                                                                    $factdate2 = 'NA';
                                                                    $facttime2 = '';
                                                                }else{
                                                                    $factdate2 = gmdate("d/m/Y", $factdaten2);
                                                                    $facttime2 = gmdate("g:i a", $factdatenn2);
                                                                }
                                                                
                                                                $sponsorname2 = $cex->checkSponsorName($fsponsorid2);
                                                                echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i2 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid2.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level2.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname2) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate2.'<br/>'.$facttime2.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid2 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname2 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan2 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created2 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
                                                               //level three starts 
                                                                $checkdtnow3 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by created DESC");
                                                                $checkdtnow3->bindParam(":nomineeid", $funiqueid2);
                                                                $checkdtnow3->execute();
                                                                $i3 = $i2+1;
                                                                $count3 = $checkdtnow3->rowCount();
                                                                while($fetchcount3 = $checkdtnow3->fetch(PDO::FETCH_ASSOC)){
                                                                    $fname3 = $fetchcount3['consumerfname'];
                                                                    $funiqueid3 = $fetchcount3['uniqueid'];
                                                                    $fsponsorid3 = $fetchcount3['nomineeid'];
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
                                                                    $status3n = $fetchcount3['status'];
                                                                    if($status3n == '1'){
                                                                        $status3 = 'Not paid';
                                                                        $bgname3 = 'badge-warning';
                                                                    }else if($status3n == '0'){
                                                                        $status3 = 'Not Active';
                                                                        $bgname3 = 'badge--gray';
                                                                    }else if($status3n == '2'){
                                                                        $status3 = 'Banned';
                                                                        $bgname3 = 'badge-danger';
                                                                    }else if($status3n == '3'){
                                                                        $status3 = 'Paid';
                                                                        $bgname3 = 'badge-success';
                                                                    }
                                                                    $factdaten3 = $fetchcount3['activationdate'];
                                                                if($factdaten3 == 0){
                                                                    $factdate3 = 'NA';
                                                                    $facttime3 = '';
                                                                }else{
                                                                    $factdate3 = gmdate("d/m/Y", $factdaten3);
                                                                    $facttime3 = gmdate("g:i a", $factdaten3);
                                                                }
                                                                    $sponsorname3 = $cex->checkSponsorName($fsponsorid3);
                                                                    echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i3 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid3.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level3.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname3) .'
                                                                                </td>
                                                                                <td>
                                                                                   '.$factdate3.'<br/>'.$facttime3.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid3 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname3 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan3 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created3 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
                                                                    //level four starts 
                                                                    $checkdtnow4 = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid order by consumerid DESC");
                                                                        $checkdtnow4->bindParam(":nomineeid", $funiqueid3);
                                                                        $checkdtnow4->execute();
                                                                        $i4 = $i3+1;
                                                                        $count4 = $checkdtnow4->rowCount();
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
                                                                            $status4n = $fetchcount4['status'];
                                                                            if($status4n == '1'){
                                                                                $status4 = 'Not paid';
                                                                                $bgname4 = 'badge-warning';
                                                                            }else if($status4n == '0'){
                                                                                $status4 = 'Not Active';
                                                                                $bgname4 = 'badge--gray';
                                                                            }else if($status4n == '2'){
                                                                                $status4 = 'Banned';
                                                                                $bgname4 = 'badge-danger';
                                                                            }else if($status4n == '3'){
                                                                                $status4 = 'Paid';
                                                                                $bgname4 = 'badge-success';
                                                                            }
                                                                            $factdaten4 = $fetchcount4['activationdate'];
                                                                            if($factdaten4 == 0){
                                                                                $factdate4 = 'NA';
                                                                                $facttime4 = '';
                                                                            }else{
                                                                                $factdate4 = gmdate("d/m/Y", $factdaten4);
                                                                                $facttime4 = gmdate("g:i a", $factdaten4);
                                                                            }
                                                                            $sponsorname4 = $cex->checkSponsorName($fsponsorid4);
                                                                            echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i4 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid4.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level4.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname4) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate4.'<br/>'.$facttime4.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid4 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname4 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan4 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created4 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                $status5n = $fetchcount5['status'];
                                                                                if($status5n == '1'){
                                                                                    $status5 = 'Not paid';
                                                                                    $bgname5 = 'badge-warning';
                                                                                }else if($status5n == '0'){
                                                                                    $status5 = 'Not Active';
                                                                                    $bgname5 = 'badge--gray';
                                                                                }else if($status5n == '2'){
                                                                                    $status5 = 'Banned';
                                                                                    $bgname5 = 'badge-danger';
                                                                                }else if($status5n == '3'){
                                                                                    $status5 = 'Paid';
                                                                                    $bgname5 = 'badge-success';
                                                                                }
                                                                                $factdaten5 = $fetchcount5['activationdate'];
                                                                if($factdaten5 == 0){
                                                                                $factdate5 = 'NA';
                                                                                $facttime5 = '';
                                                                            }else{
                                                                                $factdate5 = gmdate("d/m/Y", $factdaten5);
                                                                                $facttime5 = gmdate("g:i a", $factdaten5);
                                                                            }
                                                                            $sponsorname5 = $cex->checkSponsorName($fsponsorid5);
                                                                                echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i5 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid5.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level5.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname5) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate5.'<br/>'.$facttime5.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid5 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname5 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan5 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created5 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                        $plan6 = 'Plan 500';
                                                                                    }else{
                                                                                        $plan6 = 'No Plan';
                                                                                    }
                                                                                    $status6n = $fetchcount6['status'];
                                                                                    if($status6n == '1'){
                                                                                        $status6 = 'Not paid';
                                                                                        $bgname6 = 'badge-warning';
                                                                                    }else if($status6n == '0'){
                                                                                        $status6 = 'Not Active';
                                                                                        $bgname6 = 'badge--gray';
                                                                                    }else if($status6n == '2'){
                                                                                        $status6 = 'Banned';
                                                                                        $bgname6 = 'badge-danger';
                                                                                    }else if($status6n == '3'){
                                                                                        $status6 = 'Paid';
                                                                                        $bgname6 = 'badge-success';
                                                                                    }
                                                                                    $factdaten6 = $fetchcount6['activationdate'];
                                                                if($factdaten6 == 0){
                                                                                $factdate6 = 'NA';
                                                                                $facttime6 = '';
                                                                            }else{
                                                                                $factdate6 = gmdate("d/m/Y", $factdaten6);
                                                                                $facttime6 = gmdate("g:i a", $factdaten6);
                                                                            }
                                                                            $sponsorname6 = $cex->checkSponsorName($fsponsorid6);
                                                                                    echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i6 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid6.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level6.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname6) .'
                                                                                </td>
                                                                                <td>
                                                                                   '.$factdate6.'<br/>'.$facttime6.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid6 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname6 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan6 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created6 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                            $plan7 = 'Plan 500';
                                                                                        }else{
                                                                                            $plan7 = 'No Plan';
                                                                                        }
                                                                                        $status7n = $fetchcount7['status'];
                                                                                        if($status7n == '1'){
                                                                                            $status7 = 'Not paid';
                                                                                            $bgname7 = 'badge-warning';
                                                                                        }else if($status7n == '0'){
                                                                                            $status7 = 'Not Active';
                                                                                            $bgname7 = 'badge--gray';
                                                                                        }else if($status7n == '2'){
                                                                                            $status7 = 'Banned';
                                                                                            $bgname7 = 'badge-danger';
                                                                                        }else if($status7n == '3'){
                                                                                            $status7 = 'Paid';
                                                                                            $bgname7 = 'badge-success';
                                                                                        }
                                                                                        $factdaten7 = $fetchcount7['activationdate'];
                                                                if($factdaten7 == 0){
                                                                                $factdate7 = 'NA';
                                                                                $facttime7 = '';
                                                                            }else{
                                                                                $factdate7 = gmdate("d/m/Y", $factdaten7);
                                                                                $facttime7 = gmdate("g:i a", $factdaten7);
                                                                            }
                                                                            $sponsorname7 = $cex->checkSponsorName($fsponsorid7);
                                                                                        echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i7 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid7.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level7.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname7) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate7.'<br/>'.$facttime7.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid7 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname7 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan7 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created7 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                                $plan8 = 'Plan 500';
                                                                                            }else{
                                                                                                $plan8 = 'No Plan';
                                                                                            }
                                                                                            $status8n = $fetchcount8['status'];
                                                                                            if($status8n == '1'){
                                                                                                $status8 = 'Not paid';
                                                                                                $bgname8 = 'badge-warning';
                                                                                            }else if($status8n == '0'){
                                                                                                $status8 = 'Not Active';
                                                                                                $bgname8 = 'badge--gray';
                                                                                            }else if($status8n == '2'){
                                                                                                $status8 = 'Banned';
                                                                                                $bgname8 = 'badge-danger';
                                                                                            }else if($status8n == '3'){
                                                                                                $status8 = 'Paid';
                                                                                                $bgname8 = 'badge-success';
                                                                                            }
                                                                                            $factdaten8 = $fetchcount8['activationdate'];
                                                                if($factdaten8 == 0){
                                                                                $factdate8 = 'NA';
                                                                                $facttime8 = '';
                                                                            }else{
                                                                                $factdate8 = gmdate("d/m/Y", $factdaten8);
                                                                                $facttime8 = gmdate("g:i a", $factdaten8);
                                                                            }
                                                                            $sponsorname8 = $cex->checkSponsorName($fsponsorid8);
                                                                                            echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i8 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid8.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level8.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname8) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate8.'<br/>'.$facttime8.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid8 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname8 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan8 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created8 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                                    $plan9 = 'Plan 500';
                                                                                                }else{
                                                                                                    $plan9 = 'No Plan';
                                                                                                }
                                                                                                $status9n = $fetchcount9['status'];
                                                                                                if($status9n == '1'){
                                                                                                    $status9 = 'Not paid';
                                                                                                    $bgname9 = 'badge-warning';
                                                                                                }else if($status9n == '0'){
                                                                                                    $status9 = 'Not Active';
                                                                                                    $bgname9 = 'badge--gray';
                                                                                                }else if($status9n == '2'){
                                                                                                    $status9 = 'Banned';
                                                                                                    $bgname9 = 'badge-danger';
                                                                                                }else if($status9n == '3'){
                                                                                                    $status9 = 'Paid';
                                                                                                    $bgname9 = 'badge-success';
                                                                                                }
                                                                                                $factdaten9 = $fetchcount9['activationdate'];
                                                                if($factdaten9 == 0){
                                                                                $factdate9 = 'NA';
                                                                                $facttime9 = '';
                                                                            }else{
                                                                                $factdate9 = gmdate("d/m/Y", $factdaten9);
                                                                                $facttime9 = gmdate("g:i a", $factdaten9);
                                                                            }
                                                                            $sponsorname9 = $cex->checkSponsorName($fsponsorid9);
                                                                                                echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i9 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid9.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level9.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname9) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate9.'<br/>'.$facttime9.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid9 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname9 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan9 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created9 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                                        $plan10 = 'Plan 500';
                                                                                                    }else{
                                                                                                        $plan10 = 'No Plan';
                                                                                                    }
                                                                                                    $status10n = $fetchcount10['status'];
                                                                                                    if($status10n == '1'){
                                                                                                        $status10 = 'Not paid';
                                                                                                        $bgname10 = 'badge-warning';
                                                                                                    }else if($status10n == '0'){
                                                                                                        $status10 = 'Not Active';
                                                                                                        $bgname10 = 'badge--gray';
                                                                                                    }else if($status10n == '2'){
                                                                                                        $status10 = 'Banned';
                                                                                                        $bgname10 = 'badge-danger';
                                                                                                    }else if($status10n == '3'){
                                                                                                        $status10 = 'Paid';
                                                                                                        $bgname10 = 'badge-success';
                                                                                                    }
                                                                                                    $factdaten10 = $fetchcount10['activationdate'];
                                                                if($factdaten10 == 0){
                                                                                $factdate10 = 'NA';
                                                                                $facttime10 = '';
                                                                            }else{
                                                                                $factdate10 = gmdate("d/m/Y", $factdaten10);
                                                                                $facttime10 = gmdate("g:i a", $factdaten10);
                                                                            }
                                                                            $sponsorname10 = $cex->checkSponsorName($fsponsorid10);
                                                                                                    echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i10 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid10.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level10.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname10) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate10.'<br/>'.$facttime10.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid10 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname10 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan10 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created10 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                                            $plan11 = 'Plan 100';
                                                                                                        }elseif($plann11 == '2'){
                                                                                                            $plan11 = 'Plan 500';
                                                                                                        }else{
                                                                                                            $plan11 = 'No Plan';
                                                                                                        }
                                                                                                        $status11n = $fetchcount11['status'];
                                                                                                        if($status11n == '1'){
                                                                                                            $status11 = 'Not paid';
                                                                                                            $bgname11 = 'badge-warning';
                                                                                                        }else if($status11n == '0'){
                                                                                                            $status11 = 'Not Active';
                                                                                                            $bgname11 = 'badge--gray';
                                                                                                        }else if($status11n == '2'){
                                                                                                            $status11 = 'Banned';
                                                                                                            $bgname11 = 'badge-danger';
                                                                                                        }else if($status11n == '3'){
                                                                                                            $status11 = 'Paid';
                                                                                                            $bgname11 = 'badge-success';
                                                                                                        }
                                                                                                        $factdaten11 = $fetchcount11['activationdate'];
                                                                if($factdaten11 == 0){
                                                                                $factdate11 = 'NA';
                                                                                $facttime11 = '';
                                                                            }else{
                                                                                $factdate11 = gmdate("d/m/Y", $factdaten11);
                                                                                $facttime11 = gmdate("g:i a", $factdaten11);
                                                                            }
                                                                            $sponsorname11 = $cex->checkSponsorName($fsponsorid11);
                                                                                                        echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i11 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid11.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level11.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname11) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate11.'<br/>'.$facttime11.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid11 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname11 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan11 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created11 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                                                $plan12 = 'Plan 100';
                                                                                                            }elseif($plann12 == '2'){
                                                                                                                $plan12 = 'Plan 500';
                                                                                                            }else{
                                                                                                                $plan12 = 'No Plan';
                                                                                                            }
                                                                                                            $status12n = $fetchcount12['status'];
                                                                                                            if($status12n == '1'){
                                                                                                                $status12 = 'Not paid';
                                                                                                                $bgname12 = 'badge-warning';
                                                                                                            }else if($status12n == '0'){
                                                                                                                $status12 = 'Not Active';
                                                                                                                $bgname12 = 'badge--gray';
                                                                                                            }else if($status12n == '2'){
                                                                                                                $status12 = 'Banned';
                                                                                                                $bgname12 = 'badge-danger';
                                                                                                            }else if($status12n == '3'){
                                                                                                                $status12 = 'Paid';
                                                                                                                $bgname12 = 'badge-success';
                                                                                                            }
                                                                                                            $factdaten12 = $fetchcount12['activationdate'];
                                                                if($factdaten12 == 0){
                                                                                $factdate12 = 'NA';
                                                                                $facttime12 = '';
                                                                            }else{
                                                                                $factdate12 = gmdate("d/m/Y", $factdaten12);
                                                                                $facttime12 = gmdate("g:i a", $factdaten12);
                                                                            }
                                                                            $sponsorname12 = $cex->checkSponsorName($fsponsorid12);
                                                                                                            echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i12 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid12.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level12.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname12) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate12.'<br/>'.$facttime12.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid12 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname12 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan12 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created12 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                                                    $plan13 = 'Plan 100';
                                                                                                                }elseif($plann13 == '2'){
                                                                                                                    $plan13 = 'Plan 500';
                                                                                                                }else{
                                                                                                                    $plan13 = 'No Plan';
                                                                                                                }
                                                                                                                $status13n = $fetchcount13['status'];
                                                                                                                if($status13n == '1'){
                                                                                                                    $status13 = 'Not paid';
                                                                                                                    $bgname13 = 'badge-warning';
                                                                                                                }else if($status13n == '0'){
                                                                                                                    $status13 = 'Not Active';
                                                                                                                    $bgname13 = 'badge--gray';
                                                                                                                }else if($status13n == '2'){
                                                                                                                    $status13 = 'Banned';
                                                                                                                    $bgname13 = 'badge-danger';
                                                                                                                }else if($status13n == '3'){
                                                                                                                    $status13 = 'Paid';
                                                                                                                    $bgname13 = 'badge-success';
                                                                                                                }
                                                                                                                $factdaten13 = $fetchcount13['activationdate'];
                                                                if($factdaten13 == 0){
                                                                                $factdate13 = 'NA';
                                                                                $facttime13 = '';
                                                                            }else{
                                                                                $factdate13 = gmdate("d/m/Y", $factdaten13);
                                                                                $facttime13 = gmdate("g:i a", $factdaten13);
                                                                            }
                                                                            $sponsorname13 = $cex->checkSponsorName($fsponsorid13);
                                                                                                                echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i13 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid13.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level13.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname13) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate13.'<br/>'.$facttime13.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid13 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname13 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan13 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created13 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                                                        $plan14 = 'Plan 100';
                                                                                                                    }elseif($plann14 == '2'){
                                                                                                                        $plan14 = 'Plan 500';
                                                                                                                    }else{
                                                                                                                        $plan14 = 'No Plan';
                                                                                                                    }
                                                                                                                    $status14n = $fetchcount14['status'];
                                                                                                                    if($status14n == '1'){
                                                                                                                        $status14 = 'Not paid';
                                                                                                                        $bgname14 = 'badge-warning';
                                                                                                                    }else if($status14n == '0'){
                                                                                                                        $status14 = 'Not Active';
                                                                                                                        $bgname14 = 'badge--gray';
                                                                                                                    }else if($status14n == '2'){
                                                                                                                        $status14 = 'Banned';
                                                                                                                        $bgname14 = 'badge-danger';
                                                                                                                    }else if($status14n == '3'){
                                                                                                                        $status14 = 'Paid';
                                                                                                                        $bgname14 = 'badge-success';
                                                                                                                    }
                                                                                                                    $factdaten14 = $fetchcount14['activationdate'];
                                                                if($factdaten14 == 0){
                                                                                $factdate14 = 'NA';
                                                                                $facttime14 = '';
                                                                            }else{
                                                                                $factdate14 = gmdate("d/m/Y", $factdaten14);
                                                                                $facttime14 = gmdate("g:i a", $factdaten14);
                                                                            }
                                                                            $sponsorname14 = $cex->checkSponsorName($fsponsorid14);
                                                                                                                    echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i14 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary">'. $funiqueid14.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level '.$level14.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname14) .'
                                                                                </td>
                                                                                <td>
                                                                                    '.$factdate14.'<br/>'.$facttime14.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid14 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname14 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan14 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created14 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                                                                            $plan15 = 'Plan 100';
                                                                                                                        }elseif($plann15 == '2'){
                                                                                                                            $plan15 = 'Plan 500';
                                                                                                                        }else{
                                                                                                                            $plan15 = 'No Plan';
                                                                                                                        }
                                                                                                                        $status15n = $fetchcount15['status'];
                                                                                                                        if($status15n == '1'){
                                                                                                                            $status15 = 'Not paid';
                                                                                                                            $bgname15 = 'badge-warning';
                                                                                                                        }else if($status15n == '0'){
                                                                                                                            $status15 = 'Not Active';
                                                                                                                            $bgname15 = 'badge--gray';
                                                                                                                        }else if($status15n == '2'){
                                                                                                                            $status15 = 'Banned';
                                                                                                                            $bgname15 = 'badge-danger';
                                                                                                                        }else if($status15n == '3'){
                                                                                                                            $status15 = 'Paid';
                                                                                                                            $bgname15 = 'badge-success';
                                                                                                                        }
                                                                                                                        $factdaten15 = $fetchcount15['activationdate'];
                                                                if($factdaten15 == 0){
                                                                                $factdate15 = 'NA';
                                                                                $facttime15 = '';
                                                                            }else{
                                                                                $factdate15 = gmdate("d/m/Y", $factdaten15);
                                                                                $facttime15 = gmdate("g:i a", $factdaten15);
                                                                            }
                                                                            $sponsorname15 = $cex->checkSponsorName($fsponsorid15);
                                                                                                                        echo '<!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    '. $i15 .'
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary" style="text-align: center;">'. $funiqueid15.'</span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary" style="text-align: center;">level '.$level15.'</span>
                                                                                </td>
                                                                                <td>
                                                                                    '. ucfirst($fname15) .'
                                                                                </td>
                                                                                <td>
                                                                                   '.$factdate15.'<br/>'.$facttime15.'
                                                                                </td>
                                                                                <td>
                                                                                    '. $fsponsorid15 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $sponsorname15 .'
                                                                                </td>
                                                                                <td> 
                                                                                    '. $plan15 .'
                                                                                </td>
                                                                                <td>
                                                                                    '. $created15 .'
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->';
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
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                                if($ucount2 > 10){
                                            ?>
                                            <div class="card-inner">
                                                <div class="nk-block-between-md g-3">
                                                    <div class="g">
                                                        <ul class="pagination justify-content-center justify-content-md-start">
                                                            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                        </ul><!-- .pagination -->
                                                    </div>
                                                    <div class="g">
                                                        <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                            <div>Page</div>
                                                            <div>
                                                                <select class="form-select form-select-sm" data-search="on" data-dropdown="xs center">
                                                                    <option value="page-1">1</option>
                                                                    <option value="page-2">2</option>
                                                                    <option value="page-4">4</option>
                                                                    <option value="page-5">5</option>
                                                                    <option value="page-6">6</option>
                                                                    <option value="page-7">7</option>
                                                                    <option value="page-8">8</option>
                                                                    <option value="page-9">9</option>
                                                                    <option value="page-10">10</option>
                                                                    <option value="page-11">11</option>
                                                                    <option value="page-12">12</option>
                                                                    <option value="page-13">13</option>
                                                                    <option value="page-14">14</option>
                                                                    <option value="page-15">15</option>
                                                                    <option value="page-16">16</option>
                                                                    <option value="page-17">17</option>
                                                                    <option value="page-18">18</option>
                                                                    <option value="page-19">19</option>
                                                                    <option value="page-20">20</option>
                                                                </select>
                                                            </div>
                                                            <div>OF 102</div>
                                                        </div>
                                                    </div><!-- .pagination-goto -->
                                                </div><!-- .nk-block-between -->
                                            </div><!-- .card-inner -->
                                            <?php
                                                } 
                                            ?>
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