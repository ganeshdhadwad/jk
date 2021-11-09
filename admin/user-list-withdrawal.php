<?php
    error_reporting('0');
    include("../includes/db/database.php");
    include("../includes/functions/class.php");
    session_start();
    $cex = new cex($db);
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
    <title><?php echo $website_name; ?> Withdrawal List</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=<?php echo $version; ?>">
    <link rel="stylesheet" href="<?php echo $path; ?>css/custom-css.css?ver=<?php echo $version; ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=<?php echo $version; ?>">
    <script src="<?php echo $path; ?>js/jquery-1.11.1.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>js/default.js?ver=<?php echo $version; ?>"></script>
</head>
<?php
    //get user list
    $userlist = $db->prepare("SELECT * FROM consumer WHERE requestpaid = 1 order by consumerid DESC limit 0,10");
    $userlist->bindParam(":status", $status);
    $userlist->execute();

    //count 
    $usercount = $userlist->rowCount(); 
?>
<body class="nk-body bg-lighter npc-general has-sidebar ">
    <?php
        include("../includes/extra/light_box_withdrawal.php"); 
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
                                            <h3 class="nk-block-title page-title">Total Withdrawal Lists</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li style="display: none;"><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                                                        <li class="nk-block-tools-opt">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="<?php echo $path; ?>staff/add-user"><span>Add User</span></a></li>
                                                                        <li><a href="#"><span>Add Team</span></a></li>
                                                                        <li><a href="#"><span>Import User</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
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
                                                        $checkdtnow1 = $db->prepare("SELECT * FROM wallettoclaim WHERE status = 0 order by walletclaimid DESC");
                                                        $checkdtnow1->execute();
                                                        //check count 
                                                        $countn = $checkdtnow1->rowCount();
                                                        $i = '1';
                                                        while($fetchcount1 = $checkdtnow1->fetch(PDO::FETCH_ASSOC)){
                                                             $walletclaimid = $fetchcount1['walletclaimid'];
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
                                                                                    <div style="width: 60%; margin: 0px auto;">
                                                                                        <div class="<?php echo $bgname1; ?> circle_tick" style="margin-top: 5px; float: left;" data-rel="<?php echo $walletclaimid; ?>"></div>
                                                                                    <div class="<?php echo $bgname1; ?> circle_false" style="margin-top: 5px; float: left; margin-left: 2px;" data-rel="<?php echo $walletclaimid; ?>"></div>
                                                                                        </div>
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
                                            <?php 
                                                if($count1 > 10){
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
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
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