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
    $staffuniqueid = $fetchstaff['uniqueid'];
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
    $getuserlist->bindParam(":nomineeid", $staffuniqueid);
    $getuserlist->bindParam(":status", $status);
    $getuserlist->execute();
    //count 
    $usercount = $getuserlist->rowCount(); 
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
                                            <h3 class="nk-block-title page-title">Genealogy</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total <?php echo $usercount; ?> users.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                	
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