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
    <title><?php echo $website_name; ?> - Staff Training Videos</title>
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
                                            <h3 class="nk-block-title page-title">Training Videos</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total 3 videos.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content" style="display: none;">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtered By</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Open</span></a></li>
                                                                        <li><a href="#"><span>Closed</span></a></li>
                                                                        <li><a href="#"><span>Onhold</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Project</span></a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="project">
                                                        <div class="project-head">
                                                            <a href="html/apps-kanban.html" class="project-title">
                                                                <div class="project-info">
                                                                    <h6 class="title">New Sink Cleaning</h6>
                                                                    <span class="sub-text">JK Admin</span>
                                                                </div>
                                                            </a>
                                                            <div class="drodown">
                                                            </div>
                                                        </div>
                                                        <div class="project-details">
                                                            <p>Training to clean New Sink.</p>
                                                        </div>
                                                        <div class="project-progress">
                                                            <video width="100%" height="255" poster="placeholder.png" controls>
                                                                        <source src="<?php echo $tvideo; ?>new-3-sink-cleaning.mp4#t=3.0" type="video/mp4">
                                                                        <source src="<?php echo $tvideo; ?>new-3-sink-cleaning.ogg" type="video/ogg">
                                                                        <source src="<?php echo $tvideo; ?>new-3-sink-cleaning.webm" type="video/webm">
                                                                        <object data="<?php echo $tvideo; ?>new-3-sink-cleaning.mp4" width="100%" height="255">
                                                                        </object>
                                                            </video>
                                                        </div>
                                                        <div class="project-meta">
                                                            <span class="badge badge-dim badge-light text-gray"><em class="icon ni ni-clock"></em><span>16 Days ago posted</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="project">
                                                        <div class="project-head">
                                                            <a href="html/apps-kanban.html" class="project-title">
                                                                <div class="project-info">
                                                                    <h6 class="title">Mumbai Masala JK</h6>
                                                                    <span class="sub-text">JK Admin</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="project-details">
                                                            <p>Mumbai Masala prepartion in JK.</p>
                                                        </div>
                                                        <div class="project-progress">
                                                            <video width="100%" height="255" poster="placeholder.png" controls>
                                                                        <source src="<?php echo $tvideo; ?>mumbai-masala-JK.mp4#t=9.0" type="video/mp4">
                                                                        <source src="<?php echo $tvideo; ?>mumbai-masala-JK.ogg" type="video/ogg">
                                                                        <source src="<?php echo $tvideo; ?>mumbai-masala-JK.webm" type="video/webm">
                                                                        <object data="<?php echo $tvideo; ?>mumbai-masala-JK.mp4" width="100%" height="255">
                                                                        </object>
                                                            </video>
                                                        </div>
                                                        <div class="project-meta">
                                                            <span class="badge badge-dim badge-light text-gray"><em class="icon ni ni-clock"></em><span>21 Days ago posted</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="project">
                                                        <div class="project-head">
                                                            <a href="html/apps-kanban.html" class="project-title">
                                                                <div class="project-info">
                                                                    <h6 class="title">Chemical Dilution New</h6>
                                                                    <span class="sub-text">JK Admin</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="project-details">
                                                            <p>Process for Chemical Dilution in JK.</p>
                                                        </div>
                                                        <div class="project-progress">
                                                            <video width="100%" height="255" poster="placeholder.png" controls>
                                                                        <source src="<?php echo $tvideo; ?>chemical-dilution-new.mp4#t=8.0" type="video/mp4">
                                                                        <source src="<?php echo $tvideo; ?>chemical-dilution-new.ogg" type="video/ogg">
                                                                        <source src="<?php echo $tvideo; ?>chemical-dilution-new.webm" type="video/webm">
                                                                        <object data="<?php echo $tvideo; ?>chemical-dilution-new.mp4" width="100%" height="255">
                                                                        </object>
                                                            </video>
                                                        </div>
                                                        <div class="project-meta">
                                                            <span class="badge badge-dim badge-light text-gray"><em class="icon ni ni-clock"></em><span>34 Days ago posted</span></span>
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
    <script src="./assets/js/bundle.js?ver=2.4.0"></script>
    <script src="./assets/js/scripts.js?ver=2.4.0"></script>
</body>

</html>