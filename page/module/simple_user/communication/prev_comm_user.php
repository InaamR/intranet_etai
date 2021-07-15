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
    <link rel="apple-touch-icon" href="../../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../../app-assets/images/ico/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/pages/ui-feather.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/pages/page-blog.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/css/pages/page-blog.min.css">
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">    
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/style.css">
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
                        <a style="font-size: 1.8rem !important;" class="btn waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="left" title="Retour" href="liste_comm.php"><i class="bi bi-reply"></i></a>
                    </div>
                </div>
            </div>

            <!-- Begin : main content -->
            <div class="content-detached content-left">
                <div class="content-body">
                    <!-- Blog Detail -->
                    <div class="blog-detail-wrapper">
                        <div class="row">
                            <!-- Blog -->
                            <div class="col-12">
                                <div class="card">
                                    <img src="../../../../app-assets/images/banner/banner-12.jpg" class="img-fluid card-img-top" alt="Blog Detail Pic" />
                                    <div class="card-body">
                                        <h4 class="card-title">The Best Features Coming to iOS and Web design</h4>
                                        <div class="media">
                                            <div class="avatar mr-50">
                                                <img src="../../../../app-assets/images/portrait/small/man.png" alt="Avatar" width="24" height="24" />
                                            </div>
                                            <div class="media-body">
                                                <small class="text-muted mr-25">by</small>
                                                <small><a href="javascript:void(0);" class="text-body">Ghani Pradita</a></small>
                                                <span class="text-muted ml-50 mr-25">|</span>
                                                <small class="text-muted">Jan 10, 2020</small>
                                            </div>
                                        </div>
                                        <div class="my-1 py-25">
                                            <a href="javascript:void(0);">
                                                <div class="badge badge-pill badge-light-danger mr-50">Gaming</div>
                                            </a>
                                        </div>
                                        <p class="card-text mb-2">
                                            Before you get into the nitty-gritty of coming up with a perfect title, start with a rough draft: your
                                            working title. What is that, exactly? A lot of people confuse working titles with topics. Let's clear that
                                            Topics are very general and could yield several different blog posts. Think "raising healthy kids," or
                                            "kitchen storage." A writer might look at either of those topics and choose to take them in very, very
                                            different directions.A working title, on the other hand, is very specific and guides the creation of a
                                            single blog post. For example, from the topic "raising healthy kids," you could derive the following working
                                            title See how different and specific each of those is? That's what makes them working titles, instead of
                                            overarching topics.
                                        </p>
                                        <h4 class="mb-75">Unprecedented Challenge</h4>
                                        <ul class="p-0 mb-2">
                                            <li class="d-block">
                                                <span class="mr-25">-</span>
                                                <span>Preliminary thinking systems</span>
                                            </li>
                                            <li class="d-block">
                                                <span class="mr-25">-</span>
                                                <span>Bandwidth efficient</span>
                                            </li>
                                            <li class="d-block">
                                                <span class="mr-25">-</span>
                                                <span>Green space</span>
                                            </li>
                                            <li class="d-block">
                                                <span class="mr-25">-</span>
                                                <span>Social impact</span>
                                            </li>
                                            <li class="d-block">
                                                <span class="mr-25">-</span>
                                                <span>Thought partnership</span>
                                            </li>
                                            <li class="d-block">
                                                <span class="mr-25">-</span>
                                                <span>Fully ethical life</span>
                                            </li>
                                        </ul>
                                        <div class="media">
                                            <div class="avatar mr-2">
                                                <img src="../../../../app-assets/images/portrait/small/man.png" width="60" height="60" alt="Avatar" />
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-weight-bolder">Willie Clark</h6>
                                                <p class="card-text mb-0">
                                                    Based in London, Uncode is a blog by Willie Clark. His posts explore modern design trends through photos
                                                    and quotes by influential creatives and web designer around the world.
                                                </p>
                                            </div>
                                        </div>
                                        <hr class="my-2" />
                                        <div class="d-flex align-items-center justify-content-between float-right">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center mr-1">
                                                    <a href="javascript:void(0);" class="mr-50">
                                                        <i class="bi bi-hand-thumbs-up"></i>
                                                    </a>
                                                    <a href="javascript:void(0);">
                                                        <div class="text-body align-middle">19.1K</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Blog -->

                            <!-- Blog Comment -->
                            <!-- <div class="col-12 mt-1" id="blogComment">
                                <h6 class="section-label mt-25">Comment</h6>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="avatar mr-75">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" width="38" height="38" alt="Avatar" />
                                            </div>
                                            <div class="media-body">
                                                <h6 class="font-weight-bolder mb-25">Chad Alexander</h6>
                                                <p class="card-text">May 24, 2020</p>
                                                <p class="card-text">
                                                    A variation on the question technique above, the multiple-choice question great way to engage your
                                                    reader.
                                                </p>
                                                <a href="javascript:void(0);">
                                                    <div class="d-inline-flex align-items-center">
                                                        <i data-feather="corner-up-left" class="font-medium-3 mr-50"></i>
                                                        <span>Reply</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--/ Blog Comment -->

                            <!-- Leave a Blog Comment -->
                            <!-- <div class="col-12 mt-1">
                                <h6 class="section-label mt-25">Leave a Comment</h6>
                                <div class="card">
                                    <div class="card-body">
                                        <form action="javascript:void(0);" class="form">
                                            <div class="row">
                                                <div class="col-sm-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <input type="text" class="form-control" placeholder="Name" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <input type="email" class="form-control" placeholder="Email" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <input type="url" class="form-control" placeholder="Website" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <textarea class="form-control mb-2" rows="4" placeholder="Comment"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input type="checkbox" class="custom-control-input" id="blogCheckbox" />
                                                        <label class="custom-control-label" for="blogCheckbox">Save my name, email, and website in this browser for the next time I comment.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <!--/ Leave a Blog Comment -->
                        </div>
                    </div>
                    <!--/ Blog Detail -->

                </div>
            </div>
            <div class="sidebar-detached sidebar-right">
                <div class="sidebar">
                    <div class="blog-sidebar my-2 my-lg-0">
                        <!-- Search bar -->
                        <!-- <div class="blog-search">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" placeholder="Search here" />
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer">
                                        <i data-feather="search"></i>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <!--/ Search bar -->

                        <!-- Recent Posts -->
                        <div class="blog-recent-posts">
                            <h6 class="section-label">Recent Posts</h6>
                            <div class="mt-75">
                                <div class="media mb-2">
                                    <a href="page-blog-detail.html" class="mr-2">
                                        <img class="rounded" src="../../../../app-assets/images/banner/banner-22.jpg" width="100" height="70" alt="Recent Post Pic" />
                                    </a>
                                    <div class="media-body">
                                        <h6 class="blog-recent-post-title">
                                            <a href="page-blog-detail.html" class="text-body-heading">Why Should Forget Facebook?</a>
                                        </h6>
                                        <div class="text-muted mb-0">Jan 14 2020</div>
                                    </div>
                                </div>
                                <div class="media mb-2">
                                    <a href="page-blog-detail.html" class="mr-2">
                                        <img class="rounded" src="../../../../app-assets/images/banner/banner-27.jpg" width="100" height="70" alt="Recent Post Pic" />
                                    </a>
                                    <div class="media-body">
                                        <h6 class="blog-recent-post-title">
                                            <a href="page-blog-detail.html" class="text-body-heading">Publish your passions, your way</a>
                                        </h6>
                                        <div class="text-muted mb-0">Mar 04 2020</div>
                                    </div>
                                </div>
                                <div class="media mb-2">
                                    <a href="page-blog-detail.html" class="mr-2">
                                        <img class="rounded" src="../../../../app-assets/images/banner/banner-39.jpg" width="100" height="70" alt="Recent Post Pic" />
                                    </a>
                                    <div class="media-body">
                                        <h6 class="blog-recent-post-title">
                                            <a href="page-blog-detail.html" class="text-body-heading">The Best Ways to Retain More</a>
                                        </h6>
                                        <div class="text-muted mb-0">Feb 18 2020</div>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href="page-blog-detail.html" class="mr-2">
                                        <img class="rounded" src="../../../../app-assets/images/banner/banner-35.jpg" width="100" height="70" alt="Recent Post Pic" />
                                    </a>
                                    <div class="media-body">
                                        <h6 class="blog-recent-post-title">
                                            <a href="page-blog-detail.html" class="text-body-heading">Share a Shocking Fact or Statistic</a>
                                        </h6>
                                        <div class="text-muted mb-0">Oct 08 2020</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Recent Posts -->

                        <!-- Categories -->
                        <div class="blog-categories mt-3">
                            <h6 class="section-label">Categories</h6>
                            <div class="mt-1">
                                <div class="d-flex justify-content-start align-items-center mb-75">
                                    <a href="javascript:void(0);" class="mr-75">
                                        <div class="avatar bg-light-primary rounded">
                                            <div class="avatar-content">
                                                <i data-feather="watch" class="avatar-icon font-medium-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="blog-category-title text-body">Dir. Générale</div>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mb-75">
                                    <a href="javascript:void(0);" class="mr-75">
                                        <div class="avatar bg-light-success rounded">
                                            <div class="avatar-content">
                                                <i data-feather="shopping-cart" class="avatar-icon font-medium-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="blog-category-title text-body">Dir Systémes Info</div>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mb-75">
                                    <a href="javascript:void(0);" class="mr-75">
                                        <div class="avatar bg-light-danger rounded">
                                            <div class="avatar-content">
                                                <i data-feather="command" class="avatar-icon font-medium-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="blog-category-title text-body">Ressources Humaines</div>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mb-75">
                                    <a href="javascript:void(0);" class="mr-75">
                                        <div class="avatar bg-light-info rounded">
                                            <div class="avatar-content">
                                                <i data-feather="hash" class="avatar-icon font-medium-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="blog-category-title text-body">CCE</div>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start align-items-center">
                                    <a href="javascript:void(0);" class="mr-75">
                                        <div class="avatar bg-light-warning rounded">
                                            <div class="avatar-content">
                                                <i data-feather="video" class="avatar-icon font-medium-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="blog-category-title text-body">Video</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--/ Categories -->
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
    <script src="../../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    
    <script src="../../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../../app-assets/js/core/app.js"></script>
    <script src="../../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../../app-assets/js/scripts/pages/page-blog-edit.js"></script>
    <script src="../../../../app-assets/js/scripts/forms/form-validation.js"></script>
    <script src="../../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="../../../../app-assets/js/scripts/extensions/ext-component-blockui.js"></script>
    <script src="../../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
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