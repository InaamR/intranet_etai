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
    <title>Communication DG | Ajout - Infopro-Digital</title>
    <link rel="apple-touch-icon" href="../../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../../app-assets/images/ico/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/extensions/sample.css" media="screen" />
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
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/style.css">
    <!-- END: Custom CSS-->
    <script>
        /*async function uploadFile() {
            let formData = new FormData();           
            formData.append("file", fileupload.files[0]);
            await fetch('table/php/myscript.php', {
            method: "POST", 
            body: formData
            });    
        }*/
    </script>
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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ADMINISTRATION</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Communications</li>
                                    <li class="breadcrumb-item"><a href="com_dg.php">Direction Générale</a>
                                    </li>

                                    <li class="breadcrumb-item active">Ajout d'une communication</li>

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
                            <a class="dropdown-item" href="modif_comm.php"><i data-feather='plus-square'></i>&nbsp&nbsp<span class="align-middle">Comm DG</span></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Begin : main content -->
            <div class="content-body">
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar mr-75">
                                            <img src="../../../../app-assets/images/portrait/small/man.png" width="38" height="38" alt="Avatar" />
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-25"><?php echo Membre::info($_SESSION['id'], 'nom').' '.Membre::info($_SESSION['id'], 'prenom');?></h6>
                                            <p class="card-text"><?php echo $date = date("d-m-Y");?></p>
                                        </div>
                                    </div>
                                    <!-- Form -->
                                    <form method="post" class="mt-2 needs-validation <?php
                                                            if(!empty($id_comm))
                                                            {echo 'edit';}else{echo 'add';}                                                         
                                                            ?>" id="form_comm"  enctype="multipart/form-data" novalidate>
                                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'nom').' '.Membre::info($_SESSION['id'], 'prenom');?>">
                                                            <input name="email" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'email');?>">
                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Titre de la communication *:</label>
                                                    <input type="text" id="blog-edit-title" class="form-control" value="<?php
                                                            if(!empty($id_comm))
                                                            {echo $communication['etai_intranet_comm_titre'];}                                                           
                                                            ?>" name="titre" placeholder="Maximum 255 caractéres !" required/>
                                                    <div class="valid-feedback">Champs valider !</div>
                                                    <div class="invalid-feedback">Champs Obligatoire !</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-category">Catégories *:</label>
                                                    <select id="blog-edit-category" class="select2 form-control" name="cat" required>                                                        
                                                        <?php 
                                                            if($communication['etai_intranet_comm_cat'] == 1){ echo '<option value="1" selected>Direction générale</option>';}else{ echo '<option value="1">Direction générale</option>';}
                                                            if($communication['etai_intranet_comm_cat'] == 2){ echo '<option value="2" selected>RH</option>';}else{ echo '<option value="2">RH</option>';}
                                                            if($communication['etai_intranet_comm_cat'] == 3){ echo '<option value="3" selected>Services généraux</option>';}else{ echo '<option value="3">Services généraux</option>';}
                                                            if($communication['etai_intranet_comm_cat'] == 4){ echo '<option value="4" selected>DSI</option>';}else{ echo '<option value="4">DSI</option>';}
                                                            if($communication['etai_intranet_comm_cat'] == 5){ echo '<option value="4" selected>CCE</option>';}else{ echo '<option value="4">CCE</option>';}
                                                        ?>
                                                    </select>
                                                    <div class="valid-feedback">Champs valider !</div>
                                                    <div class="invalid-feedback">Champs Obligatoire !</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-slug">Sous-titre *:</label>
                                                    <input type="text" id="blog-edit-slug" class="form-control" name="stitre" value="<?php
                                                            if(!empty($id_comm))
                                                            {echo $communication['etai_intranet_comm_sous_titre'];}                                                           
                                                            ?>" placeholder="Maximum 255 caractéres !" required/>
                                                    <div class="valid-feedback">Champs valider !</div>
                                                    <div class="invalid-feedback">Champs Obligatoire !</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Status *:</label>
                                                    <select class="select2 form-control" id="blog-edit-status" name="statu">
                                                        <?php 
                                                            if($communication['etai_intranet_comm_statut'] == 1){ echo '<option value="1" selected>En attente de confirmation</option>';}else{ echo '<option value="1">En attente de confirmation</option>';}
                                                            if($communication['etai_intranet_comm_statut'] == 2){ echo '<option value="2" selected>Valider</option>';}else{ echo '<option value="2">Valider</option>';}
                                                            if($communication['etai_intranet_comm_statut'] == 3){ echo '<option value="3" selected>Archiver</option>';}else{ echo '<option value="3">Archiver</option>';}
                                                            if($communication['etai_intranet_comm_statut'] == 4){ echo '<option value="4" selected>Annuler</option>';}else{ echo '<option value="4">Annuler</option>';}
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group mb-2">
                                                    <label>Texte de l'article *:</label>
                                                    
                                                    <div id="blog-editor-wrapper">
                                                        <div id="blog-editor-container">
                                                            <textarea name ="desc" class="editor form-control" rows="3" id="editor">
                                                            <?php
                                                            if(!empty($id_comm))
                                                            {echo $communication['etai_intranet_comm_desc'];}                                                           
                                                            ?>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">Image principale de l'article *:</h4>
                                                    <div class="media flex-column flex-md-row">
                                                        <?php
                                                        if(!empty($id_comm))
                                                        {echo '<img src="uploads/'.$communication['etai_intranet_comm_img'].'" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />';}
                                                        else
                                                        {echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />';}
                                                        ?>
                                                        <div class="media-body">
                                                            <small class="text-muted">Résolution d'image requise 800x400.</small>
                                                            <p class="my-50">
                                                                <a id="blog-image-text">C:\fakepath\banner.jpg</a>
                                                            </p>
                                                            <div class="d-inline-block">
                                                                <div class="form-group mb-0">
                                                                    <div class="custom-file">
                                                                        <input name="fileupload" type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" required/>
                                                                        <label class="custom-file-label" for="blogCustomFile">Choisir un fichier</label>
                                                                        <div class="valid-feedback">Champs valider !</div>
                                                                        <div class="invalid-feedback">Champs Obligatoire !</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-50">
                                                <button type="submit" class="btn btn-primary mr-1">Enregistrement</button>
                                                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Blog Edit -->
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
    <!-- END: Page JS-->

    <script charset="utf-8"  src="<?php echo Admin::menucomm();?>table/js/webapp_liste_comm_dg_up.js"></script>
    <script src="../../../../app-assets/js/scripts/extensions/ckeditor.js"></script>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

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