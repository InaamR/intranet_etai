<?php

session_start();
$connect = 'config.php';


if (empty($page)) {
    $page = "function";
    // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
    // On supprime également d'éventuels espaces
    $page = trim($page . ".php");
}

// On évite les caractères qui permettent de naviguer dans les répertoires
$page = str_replace("../", "protect", $page);
$page = str_replace(";", "protect", $page);
$page = str_replace("%", "protect", $page);

// On interdit l'inclusion de dossiers protégés par htaccess
if (preg_match("/config/", $page)) {
    echo $page;
} else {
    // On vérifie que la page est bien sur le serveur
    if (file_exists("config/" . $page) && $page != 'index.php') {
        include "config/" . $page;
    } else {
        echo "Page inexistante !";
    }
}

?>
<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="author" content="PIXINVENT">
    <title>Connexion - Infopro-Digital</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

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
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <?php

                            if(!empty($_POST['connect'])) {

                                if(Connexion::connexionCreate()) {

                                    echo '';
                                    redirection(URLSITE.'/index.php', $time=10);

                                }
                                else{
                                    echo'
                                        <!-- Login v1 -->
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <a href="javascript:void(0);" class="brand-logo">
                                                    <img src="app-assets/images/logo/Infopro-logo-216x94.png" alt="" width="50%">
                                                </a>
                                                ';
                                                
                                                if(!empty($_POST['login']) || !empty($_POST['pass'])) {
                                                    extract($_POST);
                                                    if(Connexion::verifLogin($login) == 0) {
                                                        echo '<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-danger" data-v-aa799a9e=""><!----><h4 class="alert-heading"> Attention </h4><div class="alert-body"><span>Identifiant erroné</span></div></div>';
                                                    }
                                                }
    
                                                if(!empty($_POST['login']) || !empty($_POST['pass'])) {
                                                    extract($_POST);
                                                    if(Connexion::verifPass($pass, $login) == 0) {
                                                        echo '<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-danger" data-v-aa799a9e=""><!----><h4 class="alert-heading"> Attention </h4><div class="alert-body"><span>Mot de passe erroné</span></div></div>';
                                                    }
                                                }

                                                echo'
                                                <h4 class="card-title mb-1">Bienvenue</h4>
                                                <p class="card-text mb-2">Connectez-vous à votre compte s\'il vous plaît</p>

                                                <form class="auth-login-form mt-2" action="" method="POST">
                                                    <div class="form-group">
                                                        <label for="login-email" class="form-label">Identifiant *:</label>
                                                        <input type="text" class="form-control" id="login-email" name="login" placeholder="Votre identifiant ..." aria-describedby="login-email" tabindex="1" autofocus />
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="d-flex justify-content-between">
                                                            <label for="login-password">Mot de passe *:</label>
                                                            <a href="oublie.php">
                                                                <small>Mot de passe oublié ?</small>
                                                            </a>
                                                        </div>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" class="form-control form-control-merge" id="login-password" name="pass" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="remember-me" tabindex="3" />
                                                            <label class="custom-control-label" for="remember-me"> Souviens-toi de moi</label>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary btn-block" tabindex="4"  value="Connexion" name="connect" type="submit">S\'identifier</button>
                                                </form>

                                                

                                                <!-- <div class="divider my-2">
                                                    <div class="divider-text">or</div>
                                                </div>

                                                <div class="auth-footer-btn d-flex justify-content-center">
                                                    <a href="javascript:void(0)" class="btn btn-facebook">
                                                        <i data-feather="facebook"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-twitter white">
                                                        <i data-feather="twitter"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-google">
                                                        <i data-feather="mail"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-github">
                                                        <i data-feather="github"></i>
                                                    </a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- /Login v1 -->
                                    ';
                                }
                            }else {
                                echo'
                                        <!-- Login v1 -->
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <a href="javascript:void(0);" class="brand-logo">
                                                    <img src="app-assets/images/logo/Infopro-logo-216x94.png" alt="" width="50%">
                                                </a>
                                                ';
                                                
                                                if(!empty($_POST['login']) || !empty($_POST['pass'])) {
                                                    extract($_POST);
                                                    if(Connexion::verifLogin($login) == 0) {
                                                        echo '<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-danger" data-v-aa799a9e=""><!----><h4 class="alert-heading"> Attention </h4><div class="alert-body"><span>Identifiant erroné</span></div></div>';
                                                    }
                                                }
    
                                                if(!empty($_POST['login']) || !empty($_POST['pass'])) {
                                                    extract($_POST);
                                                    if(Connexion::verifPass($pass, $login) == 0) {
                                                        echo '<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-danger" data-v-aa799a9e=""><!----><h4 class="alert-heading"> Attention </h4><div class="alert-body"><span>Mot de passe erroné</span></div></div>';
                                                    }
                                                }
                                                echo'
                                                <h4 class="card-title mb-1">Bienvenue</h4>
                                                <p class="card-text mb-2">Connectez-vous à votre compte s\'il vous plaît</p>

                                                <form class="auth-login-form mt-2" action="" method="POST">
                                                    <div class="form-group">
                                                        <label for="login-email" class="form-label">Identifiant *:</label>
                                                        <input type="text" class="form-control" id="login-email" name="login" placeholder="Votre identifiant ..." aria-describedby="login-email" tabindex="1" autofocus />
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="d-flex justify-content-between">
                                                            <label for="login-password">Mot de passe *:</label>
                                                            <a href="oublie.php">
                                                                <small>Mot de passe oublié ?</small>
                                                            </a>
                                                        </div>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" class="form-control form-control-merge" id="login-password" name="pass" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="remember-me" tabindex="3" />
                                                            <label class="custom-control-label" for="remember-me"> Souviens-toi de moi</label>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary btn-block" tabindex="4"  value="Connexion" name="connect" type="submit">S\'identifier</button>
                                                </form>

                                                

                                                <!-- <div class="divider my-2">
                                                    <div class="divider-text">or</div>
                                                </div>

                                                <div class="auth-footer-btn d-flex justify-content-center">
                                                    <a href="javascript:void(0)" class="btn btn-facebook">
                                                        <i data-feather="facebook"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-twitter white">
                                                        <i data-feather="twitter"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-google">
                                                        <i data-feather="mail"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-github">
                                                        <i data-feather="github"></i>
                                                    </a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- /Login v1 -->
                                    ';
                            }
                            ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/page-auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>