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

    Message::lu($_GET['id']);

    if(!empty($_POST['delete'])) {
        Message::efface($_POST['id']);
        redirection('messagerie.php');
    }
    /*if(!empty($_POST['repondre'])) {
        redirection('message_new.php?id='.Membre::info(Message::info($_GET['id'], 'id_expediteur'), 'id'));
    }*/

?>
<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="ltr">
  <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <title>Lecture message reçu | <?php echo $PARAM_nom_site; ?></title>
        <link rel="apple-touch-icon" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="https://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/images/ico/favicon-16x16.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

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

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- BEGIN: Content-->
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
<div class="app-content content ">
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
                                <li class="breadcrumb-item"><a href="messagerie.php">Messagerie</a></li>
                                <li class="breadcrumb-item active">Message reçu</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-6 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">

                    <a href="messagerie.php"  class="btn-icon btn btn-dark btn-sm">&nbsp;Messages réçus</a>

                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">               
                    <section id="blockquotes-default" class="row match-height">
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo 'Le message de '.Membre::info(Message::info($_GET['id'], 'id_expediteur'), 'nom').' '.Membre::info(Message::info($_GET['id'], 'id_expediteur'), 'prenom'); ?> <small class="text-muted"> --- Reçu le : <?php echo date('d/m/Y', Message::info($_GET['id'], 'timestamp'));?></small></h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                    <?php echo Message::info($_GET['id'], 'titre');?>
                                    </p>
                                    <hr>
                                    <blockquote class="blockquote">
                                    <p class="mb-0">
                                        <?php echo Message::info($_GET['id'], 'message');?>
                                    </p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="multiple-column-form">
                        <div class="row">
                            <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                <form class="form" action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                    <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-primary mr-1" data-toggle="modal" data-target="#modals-slide-in-repondre" id="id_repondre" data-id="<?php echo Membre::info(Message::info($_GET['id'], 'id_expediteur'), 'id'); ?>">R&eacute;pondre au message</a>
                                        <button type="submit" class="btn btn-outline-secondary" value="Effacer" name="delete">Effacer le message</button>
                                    </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </section>
                    
                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in-repondre">
                        <div class="modal-dialog sidebar-lg">
                        <?php
                        /*if(!empty($_POST['envoie_message'])) {
                            extract($_POST);
                            echo '<tr><td colspan="2">';
                            echo Message::messageEnvoi($_SESSION['id'], $destinataire, $titre, $message);
                            echo '</tr></td>';
                        }*/
                        ?>
                        <form class="add-new-record modal-content pt-0" id="form_message_repondre" data-id="">
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

                            <div class="modal-header mb-1">

                            <h5 class="modal-title" id="exampleModalLabel">Répondre au message</h5>

                            </div>

                            <div class="modal-body flex-grow-1">
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Selectionner Destinataire *:</label>
                                <?php
                                    
                                    if(!empty($_GET['id'])) {
                                        echo '
                                        <input type="hidden" value="'.Message::info($_GET['id'], 'id_expediteur').'" name="destinataire" />
                                        <input
                                        type="text"
                                        name="titre" 
                                        size="50"
                                        value="'.Membre::info(Message::info($_GET['id'], 'id_expediteur'), 'nom').' '.Membre::info(Message::info($_GET['id'], 'id_expediteur'), 'prenom').'"
                                        id="basic-icon-default-post"
                                        class="form-control dt-post"
                                        placeholder="Titre du Message"
                                        aria-label="Titre du Message"
                                        readonly
                                        />';
                                        
                                        
                                        }
                                        else {
                                        echo '<select name="destinataire"  class="select2 form-control form-control-lg" required>
                                        <option>Choisir destinataire</option>
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
                                <textarea class="form-control" name="message" cols="60" rows="10" id="editor" required></textarea>
                                <small class="form-text text-muted"> Vous pouvez utiliser des lettres, des chiffres et des points </small>
                            </div>
                            
                            <button type="submit" class="btn btn-primary data-submit mr-1" name="envoie_message" id="btn_envoie_message_single">Envoyer le message</button>
                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal" id="btn_envoie_message_single_annule">Annuler</button>
                            </div>
                        </form>
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
    <script charset="utf-8"  src="<?php echo Admin::menuadmin();?>table/js/webapp_liste_message.js"></script>

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

    <script src="ckeditor/js/sf.js"></script>
    <script src="ckeditor/js/tree-a.js"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <script>
        CKEDITOR.disableAutoInline = true;
		CKEDITOR.addCss( 'img {max-width:100%; height: auto;}' );
		var editor = CKEDITOR.replace( 'editor', {
			extraPlugins: 'uploadimage,image2',
			removePlugins: 'image',
			height:250
		} );
        CKFinder.setupCKEditor( editor );
        $(window).on('load',  function(){
            if (feather) {
            feather.replace({ width: 14, height: 14 });
            }
        })
    </script>
    <script src="https://kit.fontawesome.com/7791373c6a.js" crossorigin="anonymous"></script>
</body>
<!-- END: Body-->
</html>

