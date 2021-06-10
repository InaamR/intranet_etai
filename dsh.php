<!DOCTYPE html>
<html class="loading bordered-layout" lang="Fr" data-layout="bordered-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Acceuil Admin - Infopro-Digital</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">

            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="app-email.html"data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon" data-feather="mail"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="app-chat.html"data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon" data-feather="message-square"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="app-calendar.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon" data-feather="calendar"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
                        <div class="bookmark-input search-input">
                            <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                            <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                            <ul class="search-list search-list-bookmark"></ul>
                        </div>
                    </li>
                </ul>
            </div>

            <ul class="nav navbar-nav align-items-center ml-auto">

                <!-- menu dropdown language -->
                <!-- <li class="nav-item dropdown dropdown-language">
                    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flag-icon flag-icon-fr"></i>
                        <span class="selected-language">French</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                        <a class="dropdown-item" href="javascript:void(0);" data-language="en"><i
                                class="flag-icon flag-icon-us"></i> English</a>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="fr"><i
                                class="flag-icon flag-icon-fr"></i> French</a>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a>
                    </div>
                </li> -->
                <!-- End menu dropdown  language -->

                <!-- moon dark mode switch -->
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
                </li>
                <!-- End moon dark mode switch -->

                <!-- barre de recherche -->
                <li class="nav-item nav-search">
                    <a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>

                    <div class="search-input">
                        <div class="search-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Recherche..." tabindex="-1" data-search="search">
                        <div class="search-input-close"><i data-feather="x"></i></div>
                        <ul class="search-list search-list-main"></ul>
                    </div>
                </li>
                <!-- End barre de recherche -->

                <!-- menu dropdown notifications -->
                <li class="nav-item dropdown dropdown-notification mr-25">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                        <i class="ficon" data-feather="bell"></i>
                        <span class="badge badge-pill badge-danger badge-up">5</span>
                    </a>

                    <!-- menu notifications list -->
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                                <div class="badge badge-pill badge-light-primary">6 New</div>
                            </div>
                        </li>

                        <li class="scrollable-container media-list">
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">

                                    <div class="media-left">
                                        <div class="avatar">
                                            <img src="app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32">
                                        </div>
                                    </div>

                                    <div class="media-body">
                                        <p class="media-heading"><span class="font-weight-bolder">Congratulation Sam 🎉</span>winner!</p>
                                        <small class="notification-text"> Won the monthly best seller badge.</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left">
                                        <div class="avatar">
                                            <img src="app-assets/images/portrait/small/avatar-s-3.jpg" alt="avatar" width="32" height="32">
                                        </div>
                                    </div>

                                    <div class="media-body">
                                        <p class="media-heading"><span class="font-weight-bolder">New message</span>&nbsp;received</p>
                                        <small class="notification-text"> You have 10 unread messages</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content">MD</div>
                                        </div>
                                    </div>

                                    <div class="media-body">
                                        <p class="media-heading"><span class="font-weight-bolder">Revised Order 👋</span>&nbsp;checkout</p>
                                        <small class="notification-text"> MD Inc. order updated</small>
                                    </div>
                                </div>
                            </a>

                            <div class="media d-flex align-items-center">
                                <h6 class="font-weight-bolder mr-auto mb-0">System Notifications</h6>

                                <div class="custom-control custom-control-primary custom-switch">
                                    <input class="custom-control-input" id="systemNotification" type="checkbox"checked="">
                                    <label class="custom-control-label" for="systemNotification"></label>
                                </div>

                            </div>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="media-body">
                                        <p class="media-heading"><span class="font-weight-bolder">Serverdown</span>&nbsp;registered</p>
                                        <small class="notification-text"> USA Server is down due to hight CPU usage</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left">
                                        <div class="avatar bg-light-success">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading"><span class="font-weight-bolder">Sales report</span>&nbsp;generated</p>
                                        <small class="notification-text"> Last month sales report generated</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left">
                                        <div class="avatar bg-light-warning">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading">
                                            <span class="font-weight-bolder">High memory</span>&nbsp;usage</p>
                                            <small class="notification-text"> BLR Server using high memory</small>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block"
                                href="javascript:void(0)">Voir toutes les notifications</a></li>
                    </ul>
                    <!--End menu notifications list -->

                </li>
                <!-- End menu dropdown notifications -->

                <!-- Profile menu -->
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">John Doe</span>
                            <span class="user-status">Admin</span></div>
                            <span class="avatar">
                                <img  class="round" src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
                                <span class="avatar-status-online"></span>
                            </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="page-profile.html"><i class="mr-50" data-feather="user"></i>Profile</a>
                        <!-- <a class="dropdown-item" href="app-email.html"><i class="mr-50" data-feather="mail"></i> Inbox</a>
                        <a class="dropdown-item" href="app-todo.html"><i class="mr-50" data-feather="check-square"></i> Task</a>
                        <a class="dropdown-item" href="app-chat.html"><i class="mr-50" data-feather="message-square"></i> Chats</a> -->

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="page-account-settings.html"><i class="mr-50" data-feather="settings"></i> Settings</a>
                        <a class="dropdown-item" href="page-faq.html"><i class="mr-50" data-feather="help-circle"></i> FAQ</a>
                        <a class="dropdown-item" href="page-auth-login-v2.html"><i class="mr-50" data-feather="power"></i> Logout</a>
                    </div>
                </li>
                <!-- End Profile menu -->

            </ul>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="index.html">
                        <span class="brand-logo">
                            <img src="app-assets/images/logo/favicon-48x48.png" alt="petit-logo" class="">
                        </span>
                        <span class="brand-logo-big">
                            <img src="app-assets/images/logo/Infopro-logo-216x94.png" alt="">
                        </span>
                    </a>
                </li>

                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                    </a>
                </li>

            </ul>

        </div>

        <div class="shadow-bottom"></div>

        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a class="nav-lik d-flex" href="index.html">
                        <i class="fas fa-home"></i>
                        <span class="menu-title text-truncate" data-i18n="Home">Home</span>
                    </a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="far fa-comments" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Pages">Communication</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="page-account-settings.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">Direction Générale</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="page-profile.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Ressource Humaine</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="page-knowledge-base.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Knowledge Base">Service généraux</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="page-faq.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">DSI</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="page-pricing.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Pricing">CCE</span></a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="far fa-handshake" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Pages">Social</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">Info service</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Events</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Knowledge Base">Annimation</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">Quiz</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Pricing">Jeux</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Pricing">Conventions</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Pricing">Suggestions</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Pricing">Sondage</span></a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-users" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Pages">Ressources Humaines</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">Services et Employé</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Organigramme</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Knowledge Base">Localisation interne</span></a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="app-email.html"><i class="fas fa-link" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Email">Liens Utiles</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-shield-virus" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Pages">Hygiène & Santé </span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">COVID-19</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Vie interne</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Knowledge Base">Planning du medecin</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-user-cog" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Pages">Administration APP</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" title="Gestion du personnel" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">Gestion du Personnel</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" title="Gestion de l'application" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Gestion de l'application</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" title="Gestion des modules" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Knowledge Base">Gestion des modules</span></a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Home</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="content-body">
                <div class="row">
                    <div class="col-12">

                        <!-- carte de Bienvenue -->
                        <div class="col-lg-4 col-md-12 col-sm-12 p-0">
                            <div class="card card-congratulations">
                                <div class="card-body text-center">
                                    <img src="app-assets/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left">
                                    <img src="app-assets/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right">
                                    
                                    <div class="avatar avatar-xl bg-primary shadow">
                                        <div class="avatar-content">
                                            <img class="round" src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-1 text-white">Bienvenue <strong>Mohamed Zied</strong>,</h1>
                                        <p class="card-text m-auto w-75">
                                            You have done <strong>57.6%</strong> more sales today. Check your new badge
                                            in your profile.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="#" target="_blank">Infopro-Digital</a><span class="d-none d-sm-inline-block">,
                    All rights Reserved</span></span><span class="float-md-right d-none d-md-block"><i
                    data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script src="https://kit.fontawesome.com/7791373c6a.js" crossorigin="anonymous"></script>
</body>
<!-- END: Body-->

</html>