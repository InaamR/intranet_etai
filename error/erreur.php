<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    
    <title>Error - 404</title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/page-misc.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
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
                <!-- Error page-->
                <div class="misc-wrapper">
                    <a class="brand-logo" href="#">
                    <img src="../app-assets/images/logo/Infopro-logo-216x94.png" alt="" width="150px">
                    </a>  
                        <?php
                        switch($_GET['erreur'])
                        {
                            case '400':
                            echo 'Échec de l\'analyse HTTP.';
                            break;
                            case '401':
                            echo 'Le pseudo ou le mot de passe n\'est pas correct !';
                            break;
                            case '402':
                            echo 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
                            break;
                            case '403':
                            echo 'Requête interdite !';
                            break;


                            case '404':
                            echo '<div class="misc-inner p-2 p-sm-3"><div class="w-100 text-center">';
                            echo '<h2 class="mb-1">404 - Page n\'existe pas ou plus!</h2>';
                            echo '<p class="mb-2">Oops! 😖 L\'URL demandée n\'a pas été trouvée sur ce serveur.</p><a class="btn btn-primary mb-2 btn-sm-block" href="../index.php">De retour à l\'accueil
                            </a><img class="img-fluid" src="../app-assets/images/pages/error.svg" alt="Error page" />
                            </div>
                        </div>';
                            break;



                            case '405':
                            echo 'Méthode non autorisée.';
                            break;
                            case '500':
                            echo 'Erreur interne au serveur ou serveur saturé.';
                            break;
                            case '501':
                            echo 'Le serveur ne supporte pas le service demandé.';
                            break;
                            case '502':
                            echo 'Mauvaise passerelle.';
                            break;
                            case '503':
                            echo ' Service indisponible.';
                            break;
                            case '504':
                            echo 'Trop de temps à la réponse.';
                            break;
                            case '505':
                            echo 'Version HTTP non supportée.';
                            break;
                            default:
                            echo 'Erreur !';
                        }
                        ?>




                                    
                </div>
                <!-- / Error page-->
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
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