<?php 

session_start();

$page = "";
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
    if (file_exists("../../../../config/" . $page) && $page != 'index.php') {
        include "../../../../config/" . $page;
    } else {
        echo "Page inexistante !";
    }
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Boite d'envoie | <?php echo $PARAM_nom_site; ?></title>
    <link rel="apple-touch-icon" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/images/ico/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/pages/ui-feather.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    
    
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- END: Custom CSS-->
	
    
    
 

</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


    <!-- BEGIN: Header-->
    <?php
    
        $page = '';
        if (empty($page)) {
        $page = "top";
        // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
        // On supprime également d'éventuels espaces
        $page = trim($page.".php");
        
        }
        
        // On évite les caractères qui permettent de naviguer dans les répertoires
        $page = str_replace("../","protect",$page);
        $page = str_replace(";","protect",$page);
        $page = str_replace("%","protect",$page);
        
        // On interdit l'inclusion de dossiers protégés par htaccess
        if (preg_match("/include/",$page)) {
        echo "Vous n'avez pas accès à ce répertoire";
        }
        
        else {
        
            // On vérifie que la page est bien sur le serveur
            if (file_exists("../../../include/".$page) && $page != 'index.php') {
            include("../../../include/".$page); 
            }
        
            else {
                echo "Page inexistante !";
            }
        }
	
	?> 
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <?php
        $page = '';
        if (empty($page)) {
        $page = "menu";
        // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
        // On supprime également d'éventuels espaces
        $page = trim($page.".php");
        
        }
        
        // On évite les caractères qui permettent de naviguer dans les répertoires
        $page = str_replace("../","protect",$page);
        $page = str_replace(";","protect",$page);
        $page = str_replace("%","protect",$page);
        
        // On interdit l'inclusion de dossiers protégés par htaccess
        if (preg_match("/include/",$page)) {
        echo "Vous n'avez pas accès à ce répertoire";
        }
        
        else {
        
            // On vérifie que la page est bien sur le serveur
            if (file_exists("../../../include/".$page) && $page != 'index.php') {
            include("../../../include/".$page); 
            }
        
            else {
                echo "Page inexistante !";
            }
        }
	
	?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Profile</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Messagerie</li>
                                    <li class="breadcrumb-item active">Boite d'envoie</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-6 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">

                        <a href="messagerie.php"  class="btn-icon btn btn-dark btn-sm">&nbsp;Messages reçus</a>

                    </div>
                </div>

            </div>

            <div class="content-body">      

                <div class="row">                        
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table" id="datatable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>id</th>
                                                <th>Expéditeur</th>
                                                <th>Destinataire</th>   
                                                <th>État</th>                                                     
                                                <th>Date de récéption</th>
                                                <th>Titre du message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal modal-slide-in fade" id="modals-slide-in">
                    <div class="modal-dialog sidebar-sm">
                    <?php
                    /*if(!empty($_POST['envoie_message'])) {
                        extract($_POST);
                        echo '<tr><td colspan="2">';
                        echo Message::messageEnvoi($_SESSION['id'], $destinataire, $titre, $message);
                        echo '</tr></td>';
                    }*/
                    ?>
                    <form class="add-new-record modal-content pt-0" id="form_message" data-id="">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

                        <div class="modal-header mb-1">

                        <h5 class="modal-title" id="exampleModalLabel">Nouveau Message</h5>

                        </div>

                        <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-fullname">Selectionner Destinataire *:</label>
                            <?php
                                if(!empty($_GET['id'])) {
                                    echo '<input type="hidden" value="'.$_GET['id'].'" name="destinataire"/>
                                    <input type="text" value="'.Membre::info($_GET['id'], 'pseudo').'"  class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" required/>';
                                }else {
                                    echo '<select name="destinataire"  class="select2 form-control form-control-lg" required>
                                    <option value="">Choisir un destinataire</option>
                                    '.Message::choixDestinataire($_SESSION['id']).'
                                    </select>';
                                } 
                            ?>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-post">Titre du Message *:</label>
                            <input
                            type="text"
                            name="titre" size="50"
                            id="basic-icon-default-post"
                            class="form-control dt-post"
                            placeholder="Titre du Message"
                            aria-label="Titre du Message"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-email">Message *:</label>
                            <textarea class="form-control" name="message" cols="60" rows="10" required></textarea>
                            <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary data-submit mr-1" name="envoie_message">Envoyer le Message</button>
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    </div>
                </div>

                <div class="modal modal-slide-in fade" id="modals-slide-in-1">
                    <div class="modal-dialog sidebar-sm">
                    <?php
                    /*if(!empty($_POST['envoie_message'])) {
                        extract($_POST);
                        echo '<tr><td colspan="2">';
                        echo Message::messageEnvoi($_SESSION['id'], $destinataire, $titre, $message);
                        echo '</tr></td>';
                    }*/
                    ?>
                    <form class="add-new-record modal-content pt-0" id="form_message_all" data-id="">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

                        <div class="modal-header mb-1">

                        <h5 class="modal-title" id="exampleModalLabel">Nouveau Message général</h5>

                        </div>

                        <div class="modal-body flex-grow-1">

                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-post">Titre du Message *:</label>
                            <input
                            type="text"
                            name="titre" size="50"
                            id="basic-icon-default-post"
                            class="form-control dt-post"
                            placeholder="Titre du Message"
                            aria-label="Titre du Message"
                            required
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-email">Message *:</label>
                            <textarea class="form-control" name="message" cols="60" rows="10" required></textarea>
                            <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary data-submit mr-1" name="envoie_message">Envoyer le Message</button>
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    </div>
                </div>


            </div>
            
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php
        $page = '';
        if (empty($page)) {
        $page = "footer";
        // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
        // On supprime également d'éventuels espaces
        $page = trim($page.".php");
        
        }
        
        // On évite les caractères qui permettent de naviguer dans les répertoires
        $page = str_replace("../","protect",$page);
        $page = str_replace(";","protect",$page);
        $page = str_replace("%","protect",$page);
        
        // On interdit l'inclusion de dossiers protégés par htaccess
        if (preg_match("/include/",$page)) {
        echo "Vous n'avez pas accès à ce répertoire";
        }
        
        else {
        
            // On vérifie que la page est bien sur le serveur
            if (file_exists("../../../include/".$page) && $page != 'index.php') {
            include("../../../include/".$page); 
            }
        
            else {
                echo "Page inexistante !";
            }
        }
	
	?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/core/app-menu.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script charset="utf-8"  src="<?php echo Admin::menuadmin();?>table/js/webapp_liste_message_send.js"></script>

    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/scripts/ui/ui-feather.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/scripts/extensions/ext-component-blockui.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/scripts/forms/form-select2.min.js"></script>
    <!-- END: Page JS-->
    
    <script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            $.blockUI({
                message: '<div class="spinner-border text-white" role="status"></div>',
                timeout: 1000,
                css: {
                backgroundColor: 'transparent',
                border: '0'
                },
                overlayCSS: {
                opacity: 0.5
                }
            });
        })
    </script>
    <script src="https://kit.fontawesome.com/7791373c6a.js" crossorigin="anonymous"></script>


</body>
<!-- END: Body-->
</html>