<?php session_start();


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
        echo "Page inexistante !!";
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
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Cube | Liste des utilisateurs</title>
    <link rel="apple-touch-icon" href="../../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/vendors.min.css">
	<link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/pages/data-list-view.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/plugins/forms/validation/form-validation.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/style.css">
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
		if (file_exists("../include/".$page) && $page != 'index.php') {
		   include("../include/".$page); 
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
		if (file_exists("../include/".$page) && $page != 'index.php') {
		   include("../include/".$page); 
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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ADMINISTRATION</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Activation des Membres</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
    			<!-- Column selectors with Export Options and print table -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <p>Mode d'Activation des Membres :</p>
                                                <div class="divider">
                                                    <div class="divider-text">Gestion du module</div>
                                                </div>
                                                <?php
                                                if(!empty($_POST['Activation'])) {
                                                    InfoSite::activationChange($_POST['mode']);
                                                }
                                                ?>
                                                <form action="" method="post">
                                                    <fieldset class="form-group">
                                                        <select class="custom-select" id="customSelect" name="mode">
                                                            <option selected>Choisir un mode d'activation</option>
                                                            <?php echo InfoSite::listeActivation(); ?>
                                                        </select>
                                                    </fieldset>
                                                    <button type="submit" class="btn btn-success action-edit float-right" name="Activation" value="Valider"><i class="fa fa-plus-circle mr-1"></i>Valider votre choix</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
		if (file_exists("../include/".$page) && $page != 'index.php') {
		   include("../include/".$page); 
		}
	
		else {
			echo "Page inexistante !";
		}
	}
	
	?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../../app-assets/vendors/js/jquery.validate.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../../app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="../../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="../../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../../app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="../../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../../../../app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="../../../../app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>  
    <script src="../../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="../../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="../../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../../app-assets/js/core/app.js"></script>
    <script src="../../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS
    <script src="../../../../app-assets/js/scripts/datatables/datatable.js"></script>-->
    <!-- END: Page JS-->
    <script charset="utf-8" src="module/socle/table/js/webapp_liste_socle.js"></script>
    
    
    <!-- BEGIN: Page JS-->
    <script src="../../../../app-assets/js/scripts/ui/data-list-view.js"></script>
    <script src="../../../../app-assets/js/scripts/extensions/toastr.js"></script>
    <script src="../../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="../../../../app-assets/js/scripts/forms/validation/form-validation.js"></script>
    <!-- END: Page JS-->

    <script charset="utf-8" src="js/webapp_liste_membre.js"></script>
    <script src="../../../../app-assets/js/scripts/modal/components-modal.js"></script>


</body>
<!-- END: Body-->

</html>