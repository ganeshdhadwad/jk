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
    <link rel="stylesheet" href="<?php echo $path; ?>css/custom-css.css?ver=<?php echo $version; ?>">
    <script src="<?php echo $path; ?>js/jquery-1.11.1.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>js/default.js?ver=<?php echo $version; ?>"></script>
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
    <?php 
        include("../includes/extra/light_box.php");
    ?>
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
                                            <h3 class="nk-block-title page-title">Direct List</h3>
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
                                                <div class="row">
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
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                            <!-- result starts -->
                                                        <?php
                                                        //level one starts 
                                                        $checkdtnow1 = $db->prepare("SELECT * FROM nomineedirect WHERE nomineeid = :nomineeid AND status = :status order by nomineedirectid DESC");
                                                        $checkdtnow1->bindParam(":nomineeid", $userid);
                                                        $checkdtnow1->bindParam(":status", $status);
                                                        $checkdtnow1->execute();
                                                        $i= 1;
                                                        while($fetchcount1 = $checkdtnow1->fetch(PDO::FETCH_ASSOC)){
                                                            $fetchotheruserid = $fetchcount1['userid'];
                                                            //fetch dt 
                                                            $fetchdr = $db->prepare("SELECT * FROM consumer WHERE consumerid = :consumerid");
                                                            $fetchdr->bindParam(":consumerid", $fetchotheruserid);
                                                            $fetchdr->execute();
                                                            $getdt = $fetchdr->fetch(PDO::FETCH_ASSOC);
                                                            $fname1 = $getdt['consumerfname'];
                                                            $funiqueid1 = $getdt['uniqueid'];
                                                            $factdate = $getdt['activationdate'];
                                                            $fsponsorid1 = $getdt['nomineeid'];
                                                            $fstatus1 = $getdt['status'];
                                                            $crea1 = $getdt['created'];
                                                            $created1 = gmdate("d/m/Y", $crea1);
                                                            $factdate1 = gmdate("d/m/Y", $factdate);
                                                            $facttime1 = gmdate("g:i a", $factdate);
                                                            $level1 = '1';
                                                            $plann1 = $getdt['consumerplan'];
                                                            if($plann1 == '1'){
                                                                $plan1 = 'Plan 100';
                                                            }elseif($plann1 == '2'){
                                                                $plan1 = 'Plan 500';
                                                            }else{
                                                                $plan1 = 'No Plan';
                                                            }
                                                            $status1n = $getdt['requestpaid'];
                                                            //echo $status1n;
                                                            if($status1n == '0'){
                                                                $status1m = 'Not paid';
                                                                $bgname1b = 'badge-warning';
                                                                $idname1 = 'requestactivateuser';
                                                            }else if($status1n == '1'){
                                                                $status1m = 'Requested';
                                                                $bgname1b = 'badge-gray';
                                                            }else if($status1n == '2'){
                                                                $status1m = 'Paid';
                                                                $bgname1b = 'badge-success';
                                                                $idname1 = 'requestdeactivateuser';
                                                            }else{}
                                                            //fetch dt 
                                                            $sponsorname1 = $cex->checkSponsorName($fsponsorid1);
                                                            ?>
                                                           <!-- result starts -->
                                                                            <tr>
                                                                                <td style="display: none;">
                                                                                    <?php echo $in; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub text-primary"><?php echo $funiqueid1; ?></span><br/>
                                                                                    <span style="clear: both;" class="tb-sub text-primary">level <?php echo $level1; ?>
                                                                                </td>
                                                                                <td>
                                                                                     <?php echo ucfirst($fname1); ?>
                                                                                </td>
                                                                                <td>
                                                                                     <?php 
                                                                                        if($factdate == 0){
                                                                                            echo '<div style="font-size: 11px; text-align: center;">Not Activated!</div>';
                                                                                        }else{
                                                                                            echo '<div style="font-size: 11px; text-align: center;">'.$factdate1.'<br/>'.$facttime1.'</div>';
                                                                                        } 
                                                                                     ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $fsponsorid1; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $sponsorname1; ?>
                                                                                </td>
                                                                                <td> 
                                                                                    <?php echo $plan1; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $created1; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <span style="clear: both;" class="tb-sub text-primary"><div class="<?php echo $bgname1b; ?>" style="border-radius: 3px;"><div style="font-size: 11px; border-radius: 3px; color: #fff; padding: 0px 5px; text-align: center;" class="<?php echo $idname1; ?>" data-spon="<?php echo $fsponsorid1; ?>" data-userid="<?php echo $funiqueid1; ?>" data-rel="<?php echo $idname1; ?>"><?php echo $status1m; ?></div></div></span>
                                                                                </td>
                                                                            </tr>
                                                                            <!-- user list ends -->
                                                                            <?php 
                                                            //level one ends
                                                            
                                                            $i++;
                                                              }
                                                        ?>
                                                        
                                                    </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div>
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
    <script src="<?php echo $path; ?>assets/js/bundle.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>assets/js/scripts.js?ver=<?php echo $version; ?>"></script>
</body>

</html>