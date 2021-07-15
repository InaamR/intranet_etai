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
    if (file_exists("../../../config/" . $page) && $page != 'index.php') {
        include "../../../config/" . $page;
    } else {
        echo "Page inexistante !";
    }
}
if(empty($_SESSION['id'])){

    ProtectEspace::administrateur("", "", "");

}else{

    ProtectEspace::administrateur($_SESSION['id'], $_SESSION['jeton'], $_SESSION['niveau']);

}
if(!empty($_GET["id"])){$id_comm = $_GET["id"];}else{$id_comm = "";}


$PDO_query_comm_unique = Bdd::connectBdd()->prepare("SELECT * FROM etai_intranet_comm WHERE etai_intranet_comm_id = :id ORDER BY etai_intranet_comm_id ASC");
$PDO_query_comm_unique->bindParam(":id", $id_comm, PDO::PARAM_INT);
$PDO_query_comm_unique->execute();
$communication = $PDO_query_comm_unique->fetch();
$PDO_query_comm_unique->closeCursor();
?>

<!DOCTYPE html>
<html class="loading bordered-layout" lang="Fr" data-layout="bordered-layout" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title><?php if(!empty($_GET["id"])){echo'Communication | Modification - Infopro-Digital';}else{echo'Communication | Ajout - Infopro-Digital';} ?></title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/ui-feather.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-blog.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-blog.min.css">
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">    
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
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
		if (file_exists("../../include/".$page) && $page != 'index.php') {
		   include("../../include/".$page); 
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
		if (file_exists("../../include/".$page) && $page != 'index.php') {
		   include("../../include/".$page); 
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
                <div class="content-header-left col-9 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ACCEUIL</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="liste_comm.php">Communications Générales</a></li>
                                    <li class="breadcrumb-item active">Direction Générale</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-3 ">
                    <div class="form-group breadcrumb-right">
                        <a style="font-size: 1.8rem !important;" class="btn waves-effect waves-float waves-light" href="liste_comm.php"><i class="bi bi-reply"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Begin : main content -->
        <div class="content-body">
            <section id="card-images">
                <h5 class="mt-3 mb-2">Images</h5>
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card mb-3">
                            <img class="card-img-top" src="../../../app-assets/images/slider/logo_18.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">CHAHIA</h4>
                                <!-- <p class="card-text">
                                    <ul class="card-info pl-1">
                                        <li>Adresse :</li>
                                        <li>Tel :</li>
                                        <li>Localisation :</li>
                                        <li>Site Web :</li>
                                    </ul>
                                </p> -->
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="card mb-3">
                            <img class="card-img-top" src="../../../app-assets/images/slider/luzina.png" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">L'UZ.INA</h4>
                                <!-- <p class="card-text">
                                    <ul class="card-info pl-1">
                                        <li>Adresse :</li>
                                        <li>Tel :</li>
                                        <li>Localisation :</li>
                                        <li>Site Web :</li>
                                    </ul>
                                </p> -->
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="card mb-3">
                            <img class="card-img-top" src="../../../app-assets/images/slider/logo_18.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">CHAHIA</h4>
                                <!-- <p class="card-text">
                                    <ul class="card-info pl-1">
                                        <li>Adresse : Lorem ipsum dolor sit amet consectetur.</li>
                                        <li>Tel :</li>
                                        <li>Localisation :</li>
                                        <li>Site Web :</li>
                                    </ul>
                                </p> -->
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="card mb-3">
                            <img class="card-img-top" src="../../../app-assets/images/slider/logo_18.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">CHAHIA</h4>
                                <!-- <p class="card-text">
                                    <ul class="card-info pl-1">
                                        <li>Adresse :</li>
                                        <li>Tel :</li>
                                        <li>Localisation :</li>
                                        <li>Site Web :</li>
                                    </ul>
                                </p> -->
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>
        <!-- End : main content -->
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
		if (file_exists("../../include/".$page) && $page != 'index.php') {
		   include("../../include/".$page); 
		}
	
		else {
			echo "Page inexistante !";
		}
	}
	
	?> 
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/page-blog-edit.js"></script>
    <script src="../../../app-assets/js/scripts/forms/form-validation.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/ext-component-blockui.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page JS-->


<script>
        
        

        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });
        

    </script>

    <script src="https://kit.fontawesome.com/7791373c6a.js" crossorigin="anonymous"></script>
</body>
<!-- END: Body-->

</html>