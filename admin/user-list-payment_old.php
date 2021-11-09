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
    <title><?php echo $website_name; ?> User List</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=<?php echo $version; ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=<?php echo $version; ?>">
</head>
<?php
    //get user list
    $userlist = $db->prepare("SELECT * FROM consumer order by consumerid DESC limit 0,10");
    $userlist->bindParam(":status", $status);
    $userlist->execute();

    //count 
    $usercount = $userlist->rowCount(); 
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
                                            <h3 class="nk-block-title page-title">Users Lists</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total <?php echo $usercount; ?> users.</p>
                                            </div>
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
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <div class="col-md-12">
                                                                <div>
                                                                    <table class="table table-bordered table-condensed" cellspacing="0" rules="all" border="1" style="width:100%;border-collapse:collapse;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="col">Sr. No.</th>
                                                                                <th scope="col">Member ID</th>
                                                                                <th scope="col">Member Name</th>
                                                                                <th scope="col">Activation Date</th>
                                                                                <th scope="col">Sponsor ID</th>
                                                                                <th scope="col">Sponsor Name</th>
                                                                                <th scope="col">Package Name</th>
                                                                                <th scope="col">Joining Date</th>
                                                                                <th scope="col">Update Payment</th>
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                            <!-- result starts -->
                                                                            <!-- user list ends -->
                                                                            <?php
                                                                            //level one starts 
                                                                            // $checkdtnow1 = $db->prepare("SELECT * FROM consumer order by consumerid DESC");
                                                                            // $checkdtnow1->execute();
                                                                            $in = '1';
                                                                            // $count1 = $checkdtnow1->rowCount();
                                                                            while($fetchcount1 = $userlist->fetch(PDO::FETCH_ASSOC)){
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
                                                                                        $facttime1 = gmdate("g:i a", $factdate1);
                                                                                    }
                                                                                //fetch dt 
                                                                                $sponsorname1 = $cex->checkSponsorName($fsponsorid1);
                                                                                echo '<!-- result starts -->
                                                                                                <tr>
                                                                                                    <td>
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
                                                                                                    <td>
                                                                                                        up pay
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        ac | de-ac | ban
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <!-- user list ends -->';
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
                                                </div><!-- .nk-tb-list -->
                                            </div><!-- .card-inner -->
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
    <script src="./assets/js/bundle.js?ver=1.4.0"></script>
    <script src="./assets/js/scripts.js?ver=1.4.0"></script>
</body>

</html>