<?php
    error_reporting(0);
    include("../includes/db/database.php");
    session_start();
    $staffid = $_SESSION['staffid'];

    if($staffid > 0){
        header('location: '.$path.'staff/dashboard');
    }
    //error if accessing all other pages directly
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="<?php echo $path; ?>">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo $path; ?>assets/images/favicon.ico">
    <!-- Page Title  -->
    <title><?php echo $website_name; ?> - Staff Login</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=<?php echo $version; ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=<?php echo $version; ?>">
    <script src="<?php echo $path; ?>assets/js/jquery-1.11.1.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>assets/js/default.js?ver=<?php echo $version; ?>"></script>
</head>

<body class="nk-body npc-crypto ui-clean pg-auth">
    <!-- app body @s -->
    <div class="nk-app-root">
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container" style="background-color: #b81f24">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="brand-logo pb-5">
                        <a href="<?php echo $path; ?>" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" style="opacity: 1" src="<?php echo $path; ?>assets/images/jumboking-logo-white.png" srcset="<?php echo $path; ?>assets/images/jumboking-logo-white.png 2x" alt="logo">
                            <!-- <img class="logo-dark logo-img logo-img-lg" src="<?php echo $path; ?>images/logo-dark.png" srcset="<?php echo $path; ?>images/logo-dark2x.png 2x" alt="logo-dark"> -->
                        </a>
                    </div>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title" style="color: #fff; text-align: center;">Staff Panel</h5>
                            <div class="nk-block-des">
                                <p style="color: #fff;  text-align: center;">Access the <?php echo $website_name; ?> - Staff Panel.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01" style="color: #fff;">Username</label>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="emailid" placeholder="Enter your username">
                        </div><!-- .foem-group -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password" style="color: #fff;">Password</label>
                            </div>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                            </div>
                        </div><!-- .foem-group -->
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" id="signin" inform="slogin" style="background-color: #f39c12 !important; border: 1px solid #f39c12;">Sign in</button>
                        </div>
                        <div id="msg-panel" style="display: none;">
                        </div>
                </div><!-- .nk-block -->
                <div class="nk-block nk-auth-footer">
                    <div class="mt-3">
                        <p style="color: #fff;">&copy; <?php echo date('Y'); ?> <?php echo $website_name; ?>. All Rights Reserved.</p>
                    </div>
                </div><!-- .nk-block -->
            </div><!-- .nk-split-content -->
            <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true" style="background-color: #f39c12 !important">
                <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                    <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="<?php echo $path; ?>upload/AdobeStock_96391741.jpg" srcset="<?php echo $path; ?>upload/AdobeStock_96391741.jpg 2x" alt="">
                                </div>
                                <div class="nk-feature-content py-4 p-sm-5">
                                    <h4 style="color: #fff;"><?php echo $website_name; ?></h4>
                                    <p style="color: #fff;">You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- .slider-init -->
                    <div class="slider-dots"></div>
                    <div class="slider-arrows"></div>
                </div><!-- .slider-wrap -->
            </div><!-- .nk-split-content -->
        </div><!-- .nk-split -->
    </div><!-- app body @e -->
    <!-- JavaScript -->
    <script src="<?php echo $path; ?>assets/js/bundle.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>assets/js/scripts.js?ver=<?php echo $version; ?>"></script>
</body>

</html>