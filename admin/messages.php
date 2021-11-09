<?php
    error_reporting(E_ALL);
    include("../includes/db/database.php");
    session_start();
    $staffid = $_SESSION['staffid'];
    if($staffid > 0){

    }else{
        header('location: '.$path.'staff/login');
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
    <title><?php echo $website_name; ?> Messages - Support Ticket</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo $path; ?>assets/css/dashlite.css?ver=1.4.0">
    <link id="skin-default" rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css?ver=1.4.0">
    <script src="<?php echo $path; ?>js/jquery-1.12.0.min.js"></script>
    <script src="<?php echo $path; ?>js/default.js"></script>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="html/general/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            <span class="nio-version">General</span>
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="html/general/index.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                        <span class="nk-menu-text">Default Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/general/index-crypto.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                        <span class="nk-menu-text">Crypto Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/general/index-analytics.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                        <span class="nk-menu-text">Analytics Dashboard</span>
                                        <span class="nk-menu-badge">v1.2</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/general/index-invest.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Invest Dashboard</span>
                                        <span class="nk-menu-badge">v1.2</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Exclusive Panel</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/covid/index.html" class="nk-menu-link" target="_blank">
                                        <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                        <span class="nk-menu-text">Coronavirus (COVID-19)</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/subscription/index.html" class="nk-menu-link" target="_blank">
                                        <span class="nk-menu-icon"><em class="icon ni ni-calendar-booking"></em></span>
                                        <span class="nk-menu-text">Subscription - SaaS</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/crypto/index.html" class="nk-menu-link" target="_blank">
                                        <span class="nk-menu-icon"><em class="icon ni ni-wallet-saving"></em></span>
                                        <span class="nk-menu-text">Crypto - Buy Sell</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/invest/index.html" class="nk-menu-link" target="_blank">
                                        <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                                        <span class="nk-menu-text">Crypto - Investment</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/apps/messages/index.html" class="nk-menu-link" target="_blank">
                                        <span class="nk-menu-icon"><em class="icon ni ni-question"></em></span>
                                        <span class="nk-menu-text">Messages</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/apps/inbox/index.html" class="nk-menu-link" target="_blank">
                                        <span class="nk-menu-icon"><em class="icon ni ni-inbox"></em></span>
                                        <span class="nk-menu-text">Inbox / Mail</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link is-disable">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-circle"></em></span>
                                        <span class="nk-menu-text">Chats</span>
                                        <span class="nk-menu-badge">Soon</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Applications</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">User Manage</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">User List - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/user-list-compact.html" class="nk-menu-link"><span class="nk-menu-text">User List - Compact</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Details - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/user-profile-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Profile - Regular</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">AML / KYCs</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/kyc-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC List - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/kyc-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC Details - Regular</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                        <span class="nk-menu-text">Transactions</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/transaction-basic.html" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Basic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/transaction-crypto.html" class="nk-menu-link"><span class="nk-menu-text">Tranx List - Crypto</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
                                        <span class="nk-menu-text">Applications</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/apps-messages.html" class="nk-menu-link"><span class="nk-menu-text">Messages</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/apps-inbox.html" class="nk-menu-link"><span class="nk-menu-text">Inbox / Mail</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Misc Pages</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-signin"></em></span>
                                        <span class="nk-menu-text">Auth Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/auths/auth-login.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/auths/auth-register.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/auths/auth-reset.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/auths/auth-success.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                        <span class="nk-menu-text">Error Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/errors/404-classic.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">404 Classic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/errors/504-classic.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">504 Classic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/errors/404-s1.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">404 Modern</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/errors/504-s1.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">504 Modern</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                        <span class="nk-menu-text">Other Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/_blank.html" class="nk-menu-link"><span class="nk-menu-text">Blank / Startup</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/faqs.html" class="nk-menu-link"><span class="nk-menu-text">Faqs / Help</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/terms-policy.html" class="nk-menu-link"><span class="nk-menu-text">Terms / Policy</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/regular-v1.html" class="nk-menu-link"><span class="nk-menu-text">Regular Page - v1</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/pages/regular-v2.html" class="nk-menu-link"><span class="nk-menu-text">Regular Page - v2</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Components</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                        <span class="nk-menu-text">Ui Elements</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/alerts.html" class="nk-menu-link"><span class="nk-menu-text">Alerts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/accordions.html" class="nk-menu-link"><span class="nk-menu-text">Accordions</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/badges.html" class="nk-menu-link"><span class="nk-menu-text">Badges</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/buttons.html" class="nk-menu-link"><span class="nk-menu-text">Buttons</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/buttons-group.html" class="nk-menu-link"><span class="nk-menu-text">Button Group</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/breadcrumb.html" class="nk-menu-link"><span class="nk-menu-text">Breadcrumb</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/cards.html" class="nk-menu-link"><span class="nk-menu-text">Cards</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/carousel.html" class="nk-menu-link"><span class="nk-menu-text">Carousel</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/modals.html" class="nk-menu-link"><span class="nk-menu-text">Modals</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/pagination.html" class="nk-menu-link"><span class="nk-menu-text">Pagination</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/popover.html" class="nk-menu-link"><span class="nk-menu-text">Popovers</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/progress.html" class="nk-menu-link"><span class="nk-menu-text">Progress</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/spinner.html" class="nk-menu-link"><span class="nk-menu-text">Spinner</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/tabs.html" class="nk-menu-link"><span class="nk-menu-text">Tabs</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/toast.html" class="nk-menu-link"><span class="nk-menu-text">Toasts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/tooltip.html" class="nk-menu-link"><span class="nk-menu-text">Tooltip</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/elements/typography.html" class="nk-menu-link"><span class="nk-menu-text">Typography</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Utilities</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item"><a href="html/general/components/elements/util-border.html" class="nk-menu-link"><span class="nk-menu-text">Border</span></a></li>
                                                <li class="nk-menu-item"><a href="html/general/components/elements/util-colors.html" class="nk-menu-link"><span class="nk-menu-text">Colors</span></a></li>
                                                <li class="nk-menu-item"><a href="html/general/components/elements/util-display.html" class="nk-menu-link"><span class="nk-menu-text">Display</span></a></li>
                                                <li class="nk-menu-item"><a href="html/general/components/elements/util-embeded.html" class="nk-menu-link"><span class="nk-menu-text">Embeded</span></a></li>
                                                <li class="nk-menu-item"><a href="html/general/components/elements/util-flex.html" class="nk-menu-link"><span class="nk-menu-text">Flex</span></a></li>
                                                <li class="nk-menu-item"><a href="html/general/components/elements/util-text.html" class="nk-menu-link"><span class="nk-menu-text">Text</span></a></li>
                                                <li class="nk-menu-item"><a href="html/general/components/elements/util-sizing.html" class="nk-menu-link"><span class="nk-menu-text">Sizing</span></a></li>
                                                <li class="nk-menu-item"><a href="html/general/components/elements/util-spacing.html" class="nk-menu-link"><span class="nk-menu-text">Spacing</span></a></li>
                                                <li class="nk-menu-item"><a href="html/general/components/elements/util-others.html" class="nk-menu-link"><span class="nk-menu-text">Others</span></a></li>
                                            </ul><!-- .nk-menu-sub -->
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dot-box"></em></span>
                                        <span class="nk-menu-text">Crafted Icons</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/misc/svg-icons.html" class="nk-menu-link">
                                                <span class="nk-menu-text">SVG Icon - Exclusive</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/misc/nioicon.html" class="nk-menu-link">
                                                <span class="nk-menu-text">Nioicon - HandCrafted</span>
                                            </a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-table-view"></em></span>
                                        <span class="nk-menu-text">Tables</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/tables/table-basic.html" class="nk-menu-link"><span class="nk-menu-text">Basic Tables</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/tables/table-special.html" class="nk-menu-link"><span class="nk-menu-text">Special Tables</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/tables/table-datatable.html" class="nk-menu-link"><span class="nk-menu-text">DataTables</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                        <span class="nk-menu-text">Forms</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/forms/form-elements.html" class="nk-menu-link"><span class="nk-menu-text">Form Elements</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/forms/form-layouts.html" class="nk-menu-link"><span class="nk-menu-text">Form Layouts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/forms/form-validation.html" class="nk-menu-link"><span class="nk-menu-text">Form Validation</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link is-disable">
                                                <span class="nk-menu-text">Wizard Basic</span> <span class="nk-menu-badge">Soon</span>
                                            </a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-pie"></em></span>
                                        <span class="nk-menu-text">Charts</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/charts/chartjs.html" class="nk-menu-link"><span class="nk-menu-text">Chart JS</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/general/components/charts/knob.html" class="nk-menu-link"><span class="nk-menu-text">Knob JS</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/general/components/misc/toastr.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-alert-circle"></em></span>
                                        <span class="nk-menu-text">Toastr</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/general/components/misc/sweet-alert.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-caution"></em></span>
                                        <span class="nk-menu-text">Sweet Alert</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/general/email-templates.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-text-rich"></em></span>
                                        <span class="nk-menu-text">Email Template</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/crypto/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                    <span class="nio-version">General</span>
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
                                    <a class="nk-news-item" href="#">
                                        <div class="nk-news-icon">
                                            <em class="icon ni ni-card-view"></em>
                                        </div>
                                        <div class="nk-news-text">
                                            <p>Do you know the latest update of 2019? <span> A overview of our is now available on YouTube</span></p>
                                            <em class="icon ni ni-external"></em>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Administrator</div>
                                                    <div class="user-name dropdown-indicator">Abu Bin Ishityak</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">Abu Bin Ishtiyak</span>
                                                        <span class="sub-text">info@softnio.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/general/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="html/general/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="html/general/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown mr-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-msg nk-msg-boxed">
                                    <div class="nk-msg-aside">
                                        <div class="nk-msg-nav">
                                            <ul class="nk-msg-menu">
                                                <li class="nk-msg-menu-item active"><a href="">Active</a></li>
                                                <li class="nk-msg-menu-item"><a href="">Closed</a></li>
                                                <li class="nk-msg-menu-item"><a href="">Stared</a></li>
                                                <li class="nk-msg-menu-item"><a href="">All</a></li>
                                                <li class="nk-msg-menu-item ml-auto"><a href="" class="search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a></li>
                                            </ul><!-- .nk-msg-menu -->
                                            <div class="search-wrap" data-search="search">
                                                <div class="search-content">
                                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or message">
                                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                </div>
                                            </div><!-- .search-wrap -->
                                        </div><!-- .nk-msg-nav -->
                                        <div class="nk-msg-list" data-simplebar>
                                            <div class="nk-msg-item current" data-msg-id="1">
                                                <div class="nk-msg-media user-avatar">
                                                    <span>AB</span>
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Abu Bin Ishtiyak</div>
                                                            <div class="lable-tag dot bg-pink"></div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="attchment"><em class="icon ni ni-clip-h"></em></div>
                                                            <div class="date">12 Jan</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">Unable to select currency when order.</h6>
                                                            <p>Hello team, I am facing problem as i can not select currency on buy order page.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item" data-msg-id="2">
                                                <div class="nk-msg-media user-avatar">
                                                    <img src="./images/avatar/b-sm.jpg" alt="">
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Jackelyn Dugas</div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">15 Jan</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">Have not received bitcoin yet.</h6>
                                                            <p>Hey! I recently bitcoin from you. But still have not received yet.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a class="active" href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item is-unread" data-msg-id="3">
                                                <div class="nk-msg-media user-avatar bg-purple">
                                                    <span>MJ</span>
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Mayme Johnston</div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">11 Jan</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">I can not submit kyc application</h6>
                                                            <p>Hello support! I can not upload my documents on kyc application.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="unread"><span class="badge badge-primary">2</span></div>
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item" data-msg-id="133">
                                                <div class="nk-msg-media user-avatar">
                                                    <img src="./images/avatar/c-sm.jpg" alt="">
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Jake Smityh</div>
                                                            <div class="lable-tag dot bg-pink"></div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">30 Dec, 2019</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">Have not received bitcoin yet.</h6>
                                                            <p>Hey! I recently bitcoin from you. But still have not received yet.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item" data-msg-id="12">
                                                <div class="nk-msg-media user-avatar">
                                                    <img src="./images/avatar/d-sm.jpg" alt="">
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Amanda Moore</div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">28 Dec, 2019</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">Wallet needs to verify.</h6>
                                                            <p>Hello, I already varified my Wallet but it still showing needs to verify alert.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item" data-msg-id="1">
                                                <div class="nk-msg-media user-avatar bg-blue">
                                                    <span>RV</span>
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Rebecca Valdez</div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">26 Dec, 2019</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">I want my money back.</h6>
                                                            <p>Hey! I don't want to stay as your subscriber any more, Also i want my mony back.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item" data-msg-id="1">
                                                <div class="nk-msg-media user-avatar bg-orange">
                                                    <span>CG</span>
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Charles Greene</div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">21 Dec, 2019</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">Have not received bitcoin yet.</h6>
                                                            <p>Hey! I recently bitcoin from you. But still have not received yet.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item" data-msg-id="1">
                                                <div class="nk-msg-media user-avatar bg-success">
                                                    <span>EA</span>
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Ethan Anderson</div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">16 Dec, 2019</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">Unable to select currency when order.</h6>
                                                            <p>Hello team, I am facing problem as i can not select currency on buy order page.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item" data-msg-id="1">
                                                <div class="nk-msg-media user-avatar">
                                                    <img src="./images/avatar/c-sm.jpg" alt="">
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Jose Peterson</div>
                                                            <div class="lable-tag dot bg-pink"></div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">14 Dec, 2019</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">Have not received bitcoin yet.</h6>
                                                            <p>Hey! I recently bitcoin from you. But still have not received yet.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item" data-msg-id="12">
                                                <div class="nk-msg-media user-avatar">
                                                    <img src="./images/avatar/d-sm.jpg" alt="">
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Amanda Moore</div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">12 Dec, 2019</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">Wallet needs to verify.</h6>
                                                            <p>Hello, I already varified my Wallet but it still showing needs to verify alert.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                            <div class="nk-msg-item" data-msg-id="3">
                                                <div class="nk-msg-media user-avatar bg-purple">
                                                    <span>MJ</span>
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Mayme Johnston</div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">09 Dec, 2019</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">I can not submit kyc application</h6>
                                                            <p>Hello support! I can not upload my documents on kyc application.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-msg-item -->
                                        </div><!-- .nk-msg-list -->
                                    </div><!-- .nk-msg-aside -->
                                    <div class="nk-msg-body bg-white profile-shown">
                                        <div class="nk-msg-head">
                                            <h4 class="title d-none d-lg-block">Unable to select currency when order</h4>
                                            <div class="nk-msg-head-meta">
                                                <div class="d-none d-lg-block">
                                                    <ul class="nk-msg-tags">
                                                        <li><span class="label-tag"><em class="icon ni ni-flag-fill"></em> <span>Technical Problem</span></span></li>
                                                    </ul>
                                                </div>
                                                <div class="d-lg-none"><a href="#" class="btn btn-icon btn-trigger nk-msg-hide ml-n1"><em class="icon ni ni-arrow-left"></em></a></div>
                                                <ul class="nk-msg-actions">
                                                    <li><a href="#" class="btn btn-dim btn-sm btn-outline-light"><em class="icon ni ni-check"></em><span>Mark as Closed</span></a></li>
                                                    <!-- <li><span class="badge badge-dim badge-success badge-sm"><em class="icon ni ni-check"></em><span>Closed</span></span></li> -->
                                                    <li class="d-lg-none"><a href="#" class="btn btn-icon btn-sm btn-white btn-light profile-toggle"><em class="icon ni ni-info-i"></em></a></li>
                                                    <li class="dropdown">
                                                        <a href="#" class="btn btn-icon btn-sm btn-white btn-light dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-user-add"></em><span>Assign To Member</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-archive"></em><span>Move to Archive</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-done"></em><span>Mark as Close</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="#" class="nk-msg-profile-toggle profile-toggle active"><em class="icon ni ni-arrow-left"></em></a>
                                        </div><!-- .nk-msg-head -->
                                        <div class="nk-msg-reply nk-reply" data-simplebar>
                                            <div class="nk-msg-head py-4 d-lg-none">
                                                <h4 class="title">Unable to select currency when order</h4>
                                                <ul class="nk-msg-tags">
                                                    <li><span class="label-tag"><em class="icon ni ni-flag-fill"></em> <span>Technical Problem</span></span></li>
                                                </ul>
                                            </div>
                                            <div class="nk-reply-item">
                                                <div class="nk-reply-header">
                                                    <div class="user-card">
                                                        <div class="user-avatar sm bg-blue">
                                                            <span>AB</span>
                                                        </div>
                                                        <div class="user-name">Abu Bin Ishtiyak</div>
                                                    </div>
                                                    <div class="date-time">14 Jan, 2020</div>
                                                </div>
                                                <div class="nk-reply-body">
                                                    <div class="nk-reply-entry entry">
                                                        <p>Hello team,</p>
                                                        <p>I am facing problem as i can not select currency on buy order page. Can you guys let me know what i am doing doing wrong? Please check attached files.</p>
                                                        <p>Thank you <br> Ishityak</p>
                                                    </div>
                                                    <div class="attach-files">
                                                        <ul class="attach-list">
                                                            <li class="attach-item">
                                                                <a class="download" href="#"><em class="icon ni ni-img"></em><span>error-show-On-order.jpg</span></a>
                                                            </li>
                                                            <li class="attach-item">
                                                                <a class="download" href="#"><em class="icon ni ni-img"></em><span>full-page-error.jpg</span></a>
                                                            </li>
                                                        </ul>
                                                        <div class="attach-foot">
                                                            <span class="attach-info">2 files attached</span>
                                                            <a class="attach-download link" href="#"><em class="icon ni ni-download"></em><span>Download All</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-reply-item -->
                                            <div class="nk-reply-item">
                                                <div class="nk-reply-header">
                                                    <div class="user-card">
                                                        <div class="user-avatar sm bg-pink">
                                                            <span>ST</span>
                                                        </div>
                                                        <div class="user-name">Support Team <span>(You)</span></div>
                                                    </div>
                                                    <div class="date-time">14 Jan, 2020</div>
                                                </div>
                                                <div class="nk-reply-body">
                                                    <div class="nk-reply-entry entry">
                                                        <p>Hello Ishtiyak,</p>
                                                        <p>We are really sorry to hear that, you have face an unexpected experience. Our team urgently look this matter and get back to you asap. </p>
                                                        <p>Thank you very much. </p>
                                                    </div>
                                                    <div class="nk-reply-from"> Replied by <span>Iliash Hossain</span> at 11:32 AM </div>
                                                </div>
                                            </div><!-- .nk-reply-item -->
                                            <div class="nk-reply-meta">
                                                <div class="nk-reply-meta-info"><span class="who">Iliash Hossian</span> assigned user: <span class="whom">Saiful Islam</span> at 14 Jan, 2020 at 11:34 AM</div>
                                            </div><!-- .nk-reply-meta -->
                                            <div class="nk-reply-item">
                                                <div class="nk-reply-header">
                                                    <div class="user-card">
                                                        <div class="user-avatar sm bg-purple">
                                                            <span>IH</span>
                                                        </div>
                                                        <div class="user-name">Iliash Hossain <span>added a note</span></div>
                                                    </div>
                                                    <div class="date-time">14 Jan, 2020</div>
                                                </div>
                                                <div class="nk-reply-body">
                                                    <div class="nk-reply-entry entry note">
                                                        <p>Devement Team need to check out the issues.</p>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-reply-item -->
                                            <div class="nk-reply-meta">
                                                <div class="nk-reply-meta-info"><strong>15 January 2020</strong></div>
                                            </div><!-- .nk-reply-meta -->
                                            <div class="nk-reply-item">
                                                <div class="nk-reply-header">
                                                    <div class="user-card">
                                                        <div class="user-avatar sm bg-pink">
                                                            <span>ST</span>
                                                        </div>
                                                        <div class="user-name">Support Team <span>(You)</span></div>
                                                    </div>
                                                    <div class="date-time">15 Jan, 2020</div>
                                                </div>
                                                <div class="nk-reply-body">
                                                    <div class="nk-reply-entry entry">
                                                        <p>Hello Ishtiyak,</p>
                                                        <p>Thanks for waiting for us. Our team solved the issues. So check now on our website. Hopefuly you can order now.</p>
                                                        <p>Thank you very much once again.</p>
                                                    </div>
                                                    <div class="nk-reply-from"> Replied by <span>Noor Parvez</span> at 11:32 AM </div>
                                                </div>
                                            </div><!-- .nk-reply-item -->
                                            <div class="nk-reply-form">
                                                <div class="nk-reply-form-header">
                                                    <ul class="nav nav-tabs-s2 nav-tabs nav-tabs-sm">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#reply-form">Reply</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#note-form">Private Note</a>
                                                        </li>
                                                    </ul>
                                                    <div class="nk-reply-form-title">
                                                        <div class="title">Reply as:</div>
                                                        <div class="user-avatar xs bg-purple">
                                                            <span>IH</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="reply-form">
                                                        <div class="nk-reply-form-editor">
                                                            <div class="nk-reply-form-field">
                                                                <textarea class="form-control form-control-simple no-resize" placeholder="Hello"></textarea>
                                                            </div>
                                                            <div class="nk-reply-form-tools">
                                                                <ul class="nk-reply-form-actions g-1">
                                                                    <li class="mr-2"><button class="btn btn-primary" type="submit">Reply</button></li>
                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <a class="btn btn-icon btn-sm btn-tooltip" data-toggle="dropdown" title="Templates" href="#"><em class="icon ni ni-hash"></em></a>
                                                                            <div class="dropdown-menu">
                                                                                <ul class="link-list-opt no-bdr link-list-template">
                                                                                    <li class="opt-head"><span>Quick Insert</span></li>
                                                                                    <li><a href="#"><span>Thank you message</span></a></li>
                                                                                    <li><a href="#"><span>Your issues solved</span></a></li>
                                                                                    <li><a href="#"><span>Thank you message</span></a></li>
                                                                                    <li class="divider">
                                                                                    <li><a href="#"><em class="icon ni ni-file-plus"></em><span>Save as Template</span></a></li>
                                                                                    <li><a href="#"><em class="icon ni ni-notes-alt"></em><span>Manage Template</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <a class="btn btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="Upload Attachment" href="#"><em class="icon ni ni-clip-v"></em></a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="btn btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="Insert Emoji" href="#"><em class="icon ni ni-happy"></em></a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="btn btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="Upload Images" href="#"><em class="icon ni ni-img"></em></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle btn-trigger btn btn-icon mr-n2" data-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="#"><span>Another Option</span></a></li>
                                                                            <li><a href="#"><span>More Option</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .nk-reply-form-tools -->
                                                        </div><!-- .nk-reply-form-editor -->
                                                    </div>
                                                    <div class="tab-pane" id="note-form">
                                                        <div class="nk-reply-form-editor">
                                                            <div class="nk-reply-form-field">
                                                                <textarea class="form-control form-control-simple no-resize" placeholder="Type your private note, that only visible to internal team."></textarea>
                                                            </div>
                                                            <div class="nk-reply-form-tools">
                                                                <ul class="nk-reply-form-actions g-1">
                                                                    <li class="mr-2"><button class="btn btn-primary" type="submit">Add Note</button></li>
                                                                    <li>
                                                                        <a class="btn btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="Upload Attachment" href="#"><em class="icon ni ni-clip-v"></em></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle btn-trigger btn btn-icon mr-n2" data-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="#"><span>Another Option</span></a></li>
                                                                            <li><a href="#"><span>More Option</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .nk-reply-form-tools -->
                                                        </div><!-- .nk-reply-form-editor -->
                                                    </div>
                                                </div>
                                            </div><!-- .nk-reply-form -->
                                        </div><!-- .nk-reply -->
                                        <div class="nk-msg-profile visible" data-simplebar>
                                            <div class="card">
                                                <div class="card-inner-group">
                                                    <div class="card-inner">
                                                        <div class="user-card user-card-s2 mb-2">
                                                            <div class="user-avatar md bg-primary">
                                                                <span>AB</span>
                                                            </div>
                                                            <div class="user-info">
                                                                <h5>Abu Bin Ishtiyak</h5>
                                                                <span class="sub-text">Customer</span>
                                                            </div>
                                                            <div class="user-card-menu dropdown">
                                                                <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><em class="icon ni ni-eye"></em><span>View Profile</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-na"></em><span>Ban From System</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-repeat"></em><span>View Orders</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-center g-1">
                                                            <div class="col-4">
                                                                <div class="profile-stats">
                                                                    <span class="amount">23</span>
                                                                    <span class="sub-text">Total Order</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="profile-stats">
                                                                    <span class="amount">20</span>
                                                                    <span class="sub-text">Complete</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="profile-stats">
                                                                    <span class="amount">3</span>
                                                                    <span class="sub-text">Progress</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    <div class="card-inner">
                                                        <div class="aside-wg">
                                                            <h6 class="overline-title-alt mb-2">User Information</h6>
                                                            <ul class="user-contacts">
                                                                <li>
                                                                    <em class="icon ni ni-mail"></em><span>info@softnio.com</span>
                                                                </li>
                                                                <li>
                                                                    <em class="icon ni ni-call"></em><span>+938392939</span>
                                                                </li>
                                                                <li>
                                                                    <em class="icon ni ni-map-pin"></em><span>1134 Ridder Park Road <br>San Fransisco, CA 94851</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="aside-wg">
                                                            <h6 class="overline-title-alt mb-2">Additional</h6>
                                                            <div class="row gx-1 gy-3">
                                                                <div class="col-6">
                                                                    <span class="sub-text">Ref ID: </span>
                                                                    <span>TID-049583</span>
                                                                </div>
                                                                <div class="col-6">
                                                                    <span class="sub-text">Requested:</span>
                                                                    <span>Abu Bin Ishtiak</span>
                                                                </div>
                                                                <div class="col-6">
                                                                    <span class="sub-text">Status:</span>
                                                                    <span class="lead-text text-success">Open</span>
                                                                </div>
                                                                <div class="col-6">
                                                                    <span class="sub-text">Last Reply:</span>
                                                                    <span>Abu Bin Ishtiak</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="aside-wg">
                                                            <h6 class="overline-title-alt mb-2">Assigned Account</h6>
                                                            <ul class="align-center g-2">
                                                                <li>
                                                                    <div class="user-avatar bg-purple">
                                                                        <span>IH</span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="user-avatar bg-pink">
                                                                        <span>ST</span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="user-avatar bg-gray">
                                                                        <span>SI</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div>
                                        </div><!-- .nk-msg-profile -->
                                    </div><!-- .nk-msg-body -->
                                </div><!-- .nk-msg -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="#">Softnio</a>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo $path; ?>assets/js/bundle.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>assets/js/scripts.js?ver=<?php echo $version; ?>"></script>
    <script src="<?php echo $path; ?>assets/js/apps/messages.js?ver=1.4.0"></script>
</body>

</html>