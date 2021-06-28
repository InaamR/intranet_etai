<?php 

session_start();


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

if(empty($_SESSION['id'])){

    ProtectEspace::administrateur("", "", "");

}else{

    ProtectEspace::administrateur($_SESSION['id'], $_SESSION['jeton'], $_SESSION['niveau']);

}
?>
<!DOCTYPE html>
<html class="loading bordered-layout" lang="Fr" data-layout="bordered-layout" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Communication - Infopro-Digital</title>
    <link rel="apple-touch-icon" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/images/ico/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/pages/ui-feather.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    
    
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

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
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ADMINISTRATION</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#communication">Communications</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="com_dg.php">Direction Générale</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-float waves-light" data-toggle="dropdown" type="button">Écrire un article</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="modif_comm.php"><i data-feather='plus-square'></i>&nbsp&nbsp<span class="align-middle">Ajouter</span></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Begin : main content -->
            <div class="content-body">
                <div class="row">
                    <div class="col-12">

                        

                        <!-- Basic table -->
                        <section id="basic-datatable">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <table class="datatables-basic table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>id</th>
                                                    <th>Nom et prénom</th>
                                                    <th>Catégorie</th>
                                                    <th>Titre de l'article</th>                                                    
                                                    <th>Date d'ajout</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal to add new record -->
                            <div class="modal modal-slide-in fade" id="modals-slide-in">
                                <div class="modal-dialog sidebar-sm">
                                    <form class="add-new-record modal-content pt-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <div class="form-group">
                                                <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                                <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-icon-default-post">Post</label>
                                                <input type="text" id="basic-icon-default-post" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-icon-default-email">Email</label>
                                                <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                                                <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-icon-default-date">Joining Date</label>
                                                <input type="text" class="form-control dt-date" id="basic-icon-default-date" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="form-label" for="basic-icon-default-salary">Salary</label>
                                                <input type="text" id="basic-icon-default-salary" class="form-control dt-salary" placeholder="$12000" aria-label="$12000" />
                                            </div>
                                            <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!--/ Basic table -->

                    </div>
                    
                </div>

            </div>
            <!-- End : main content -->

            
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
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/core/app-menu.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script charset="utf-8"  src="<?php echo Admin::menucomm();?>table/js/webapp_liste_comm.js"></script>

    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/scripts/ui/ui-feather.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
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