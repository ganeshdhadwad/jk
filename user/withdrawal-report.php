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
    <script src="<?php echo $path; ?>js/jquery-1.11.1.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>js/default.js?ver=1.4.0?ver=<?php echo $version; ?>"></script>
</head>
<?php
    $getuserlist = $db->prepare("SELECT * FROM consumer WHERE nomineeid = :nomineeid AND status != 2");
    $getuserlist->bindParam(":nomineeid", $consumeruniqueid);
    $getuserlist->execute();
    //count 
    $usercount = $getuserlist->rowCount(); 

    $usercode = $db->prepare("SELECT * FROM consumer WHERE uniqueid = :consumerid AND status != 2");
    $usercode->bindParam(":consumerid", $consumeruniqueid);
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


    $usercode2 = $db->prepare("SELECT * FROM walletdt WHERE walletuserid = :treeuniquecode");
    $usercode2->bindParam(":treeuniquecode", $userid);
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
                                        <div style="float: left; margin-left: 15px;">
                                                <h3 class="nk-block-title page-title">Wallet Report</h3>
                                            </div>
                                            <div style="float: right; margin-right: 15px;">
                                                <?php
                                                    //echo $userid; 
                                                    $claimedyet = '0';
                                                    $checkcountn = $db->prepare("SELECT sum(amount) as rate_sum FROM walletdt WHERE walletuserid = :nomineeid AND claimedyet = :claimedyet");
                                                        $checkcountn->bindParam(":nomineeid", $userid);
                                                        $checkcountn->bindParam(":claimedyet", $claimedyet);
                                                        $checkcountn->execute();
                                                        $rown = $checkcountn->fetch(PDO::FETCH_ASSOC);
                                                        $sumn = $rown['rate_sum'];
                                                        if($sumn == ''){
                                                            $sum = '0';
                                                        }else{
                                                            $sum = $sumn;
                                                        }
                                                        //echo $sum;
                                                ?>
                                                <div style="float: left; text-align: center; ">
                                                    <h3 class="nk-block-title page-title" style="width: 100%; text-align: center; "><?php echo $currencysymbol.'&nbsp;'.$sum; ?></h3>
                                                </div>
                                                <?php
                                                    if($sum >= $minpayment){ 
                                                ?>
                                                <div class="wallet_claim_payment" inform="walletclaimpay" data-rel="<?php echo $userid; ?>" tamount="<?php echo $sum; ?>">
                                                    <div style="float: left;" id="walleticon">
                                                    </div>
                                                    <div style="float: left; margin-left: -11px;">
                                                        claim now
                                                    </div>
                                                </div>
                                                <?php
                                                    }else{ 
                                                ?>
                                                <div style="clear: both; margin-top: 5px;">
                                                    min pay <?php echo $currencysymbol.''.$minpayment; ?>
                                                </div>
                                                <?php
                                                    } 
                                                ?>
                                            </div>
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="col-xxl-8">
                                            <div class="card card-bordered card-full" style="padding: 35px;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <div class="col-md-12">
                                                                <div>
                                                                    <table class="table table-bordered table-condensed" cellspacing="0" rules="all" border="1" style="width:100%;border-collapse:collapse;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="col">Sr. No.</th>
                                                                                <th scope="col">Transaction id</th>
                                                                                <th scope="col">Requested Date</th>
                                                                                <th scope="col">Member ID</th>
                                                                                <th scope="col">Claimed Amount</th>
                                                                                <th scope="col">Status</th>
                                                                            </tr>
                                                                            <!-- result starts -->
                                                        <?php
                                                        //level one starts 
                                                        $checkdtnow1 = $db->prepare("SELECT * FROM wallettoclaim WHERE userid = :userid order by walletclaimid DESC");
                                                        $checkdtnow1->bindParam(":userid", $userid);
                                                        $checkdtnow1->execute();
                                                        //check count 
                                                        $countn = $checkdtnow1->rowCount();
                                                        $i = '1';
                                                        while($fetchcount1 = $checkdtnow1->fetch(PDO::FETCH_ASSOC)){
                                                            $tid = $fetchcount1['transactionid'];
                                                            $tuserid = $fetchcount1['userid'];
                                                            $trequestdate = $fetchcount1['requestdate'];
                                                            $tamount = $fetchcount1['totalamount'];
                                                            $tstatus = $fetchcount1['status'];
                                                            $created1 = gmdate("d/m/Y", $trequestdate);
                                                            $time1 = gmdate("g:i a", $trequestdate);
                                                            $fetchdr = $db->prepare("SELECT * FROM consumer WHERE consumerid = :consumerid");
                                                            $fetchdr->bindParam(":consumerid", $tuserid);
                                                            $fetchdr->execute();
                                                            $getdt = $fetchdr->fetch(PDO::FETCH_ASSOC);
                                                            //echo $fetchmoneyreuid;
                                                            $fname1 = $getdt['consumerfname'];
                                                            $funiqueid1 = $getdt['uniqueid'];
                                                            if($tstatus == '0'){
                                                                $status1 = 'Pending';
                                                                $bgname1 = 'badge-warning';
                                                            }else if($tstatus == '1'){
                                                                $status1 = 'Approved';
                                                                $bgname1 = 'badge-success';
                                                            }else if($tstatus == '2'){
                                                                $status1 = 'Rejected';
                                                                $bgname1 = 'badge-danger';
                                                            }else{}
                                                            ?>
                                                            <!-- result starts -->
                                                                            <tr>
                                                                                <td>
                                                                                    <?php echo $i; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="tb-sub"><?php echo $tid; ?></span>
                                                                                </td>
                                                                                <td>
                                                                                     <div class="tb-sub" style="font-size: 11px;"><?php echo $created1; ?></div><div class="tb-sub" style="clear: both; font-size: 11px; padding-top: -10px;"><?php echo $time1; ?></div>
                                                                                </td>
                                                                                <td>
                                                                                     <?php echo $funiqueid1; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $currencysymbol.''.$tamount; ?>
                                                                                </td>
                                                                                <td> 
                                                                                    <div class="<?php echo $bgname1; ?>" style="border-radius: 3px; margin-top: 5px;" data-rel=""><?php echo $status1; ?></div>
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