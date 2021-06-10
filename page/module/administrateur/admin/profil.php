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

if(!empty($_POST['changeNaissance'])) {
	Membre::profilVisibilite($_SESSION['id'], 'naissance');
}
if(!empty($_POST['changeGenre'])) {
	Membre::profilVisibilite($_SESSION['id'], 'genre');
}
if(!empty($_POST['changeNom'])) {
	Membre::profilVisibilite($_SESSION['id'], 'nom');
}
if(!empty($_POST['changePrenom'])) {
	Membre::profilVisibilite($_SESSION['id'], 'prenom');
}
if(!empty($_POST['changeEmail'])) {
	Membre::profilVisibilite($_SESSION['id'], 'email');
}

if(!empty($_POST['changeTel'])) {
	Membre::profilVisibilite($_SESSION['id'], 'tel');
}
if(!empty($_POST['changeAdresse'])) {
	Membre::profilVisibilite($_SESSION['id'], 'adresse');
}
if(!empty($_POST['changeCp'])) {
	Membre::profilVisibilite($_SESSION['id'], 'cp');
}
if(!empty($_POST['changeVille'])) {
	Membre::profilVisibilite($_SESSION['id'], 'ville');
}
if(!empty($_POST['maj'])) {
	extract($_POST);
	if(Message::interdit($description)) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			Membre::majProfil($_SESSION['id'], $naissance, $genre, $nom, $prenom, $email, $tel, $adresse, $cp, $ville, $mailing, $description);
		}
		else {
			$err = 'Votre adresse email n\'est pas conforme,<br />veuillez recommencer la mise &agrave; jour de votre profil.';
		}
	}
	else {
		$err = 'Votre description contient du language sms ou des mots interdits,<br />veuillez recommencer la mise &agrave; jour de votre profil.';
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
    <title>Cube | Profil</title>
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
	<link rel="stylesheet" type="text/css" href="../../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
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
                                    <li class="breadcrumb-item"><a href="#">Profil</a>
                                    </li>
                                    <li class="breadcrumb-item active">Profil
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
								<div class="card-header">
                                    <h4 class="card-title"><?php echo 'Votre Profil '.Membre::info($_SESSION['id'], 'pseudo'); ?></h4>
                                </div>
                                <div class="card-content">
                                
                                    <div class="card-body">
										<?php 
										if(!empty($err)) {
											echo '<div class="alert alert-danger mt-1 alert-validation-msg" role="alert"><i class="feather icon-info mr-1 align-middle"></i><span>'.$err.'</span></div>';
										}
										?>
										<div class="divider">
												<div class="divider-text">Gestion du module</div>
											</div>
										<form class="form form-horizontal" action="" method="post">
                                            <div class="form-body">
                                                <div class="row">


													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre Prénom</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="fname-icon" class="form-control" name="prenom" value="<?php echo Membre::info($_SESSION['id'], 'prenom');?>" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="col-md-2">
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'prenom'); ?>" name="changePrenom" class="btn btn-info">
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre Nom</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="lname-icon" class="form-control" name="nom" value="<?php echo Membre::info($_SESSION['id'], 'nom');?>" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="col-md-2">
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'nom'); ?>" name="changeNom" class="btn btn-info">
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre Genre </span>
                                                            </div>
                                                            <div class="col-md-8">
															<ul class="list-unstyled mb-0">
                                            					<li class="d-inline-block mr-2">
																<fieldset>
																	<div class="vs-checkbox-con vs-checkbox-primary">
																		<input type="checkbox" <?php if(Membre::info($_SESSION['id'], 'genre')=='3') { echo 'checked'; }?> name="genre" value="3">
																		<span class="vs-checkbox">
																			<span class="vs-checkbox--check">
																				<i class="vs-icon feather icon-check"></i>
																			</span>
																		</span>
																		<span class="">Femme</span>
																	</div>
																</fieldset>
																</li>
																<li class="d-inline-block mr-2">
																<fieldset>
																	<div class="vs-checkbox-con vs-checkbox-info">
																		<input type="checkbox" <?php if(Membre::info($_SESSION['id'], 'genre')=='1') { echo 'checked'; }?> name="genre" value="1">
																		<span class="vs-checkbox">
																			<span class="vs-checkbox--check">
																				<i class="vs-icon feather icon-check"></i>
																			</span>
																		</span>
																		<span class="">Homme</span>
																	</div>
																</fieldset>
																</li>
															</ul>
                                                            </div>
															<div class="col-md-2">
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'genre'); ?>" name="changeGenre" class="btn btn-info" >
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre Date de Naissance</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="fname-icon" class="form-control pickadate-months-year" name="naissance" value="<?php echo Membre::info($_SESSION['id'], 'naissance');?>" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="col-md-2">
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'naissance'); ?>" name="changeNaissance" class="btn btn-info">
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre Email</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="mail-icon" class="form-control" name="email" placeholder="@" value="<?php echo Membre::info($_SESSION['id'], 'email');?>" >
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-mail"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="col-md-2">
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'email'); ?>" name="changeEmail" class="btn btn-info">
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre N° de téléphone</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="phone-icon" class="form-control" name="tel" placeholder="XX XXX XXX" value="<?php echo Membre::info($_SESSION['id'], 'tel');?>">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-phone"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="col-md-2">
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'tel'); ?>" name="changeTel" class="btn btn-info">
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre Adresse</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="compass-icon" class="form-control" name="adresse" value="<?php echo Membre::info($_SESSION['id'], 'adresse');?>">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-compass"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="col-md-2">
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'adresse'); ?>" name="changeAdresse" class="btn btn-info">
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre Code Postal</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="inbox-icon" class="form-control" name="cp" value="<?php echo Membre::info($_SESSION['id'], 'cp');?>">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-inbox"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="col-md-2">
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'cp'); ?>" name="changeCp" class="btn btn-info">
                                                            </div>
                                                        </div>
                                                    </div>


													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre Ville</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="globe-icon" class="form-control" name="ville" value="<?php echo Membre::info($_SESSION['id'], 'ville');?>">
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-globe"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="col-md-2">
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'ville'); ?>" name="changeVille" class="btn btn-info">
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-2">
                                                                <span>Votre Description</span>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="position-relative has-icon-left">
																	<textarea class="form-control" id="basicTextarea" rows="3" name="description" placeholder="Textarea"><?php echo str_replace('<br />', "\n",Membre::info($_SESSION['id'], 'description')); ?></textarea>
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-globe"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															
                                                        </div>
                                                    </div>



													<div class="col-md-8 offset-md-4">
														<input type="submit" class="btn btn-info mr-1 mb-1" value="Mettre &agrave; jour le Profil" name="maj" class="input">
                                                    </div>


												</div>
                                            </div>
                                        </form>

                                        <div class="row">
                                            <div class="col-12">

											
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 id="titre_h4"></h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>

							<form class="form add" id="form_company" data-id="">

                                <div class="data-items pb-3">
                                    <div class="data-fields px-2 mt-3">
                                        <div class="row">
                                        
                                            <div class="col-sm-12 data-field-col">
                                            

                                                <label for="nom_socle">Nom du socle*</label>
                                                <div class="field_container">
                                                <input type="text" class="form-control" id="nom_socle" name="nom_socle" required>
                                                </div>
                                                
    
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                    <div class="add-data-btn">
                                        <button class="btn btn-primary" type="submit" id="btn_ok"></button>
                                    </div>
                                    <div class="cancel-data-btn">
                                        <button class="btn btn-outline-danger" type="reset">Annuler</button>
                                    </div>
                                </div>
							
                            </form>
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

    <!-- BEGIN: Page JS -->
    <script src="../../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="../../../../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <!-- END: Page JS-->
    
    
    <!-- BEGIN: Page JS-->
    <script src="../../../../app-assets/js/scripts/ui/data-list-view.js"></script>
    <script src="../../../../app-assets/js/scripts/extensions/toastr.js"></script>
    <script src="../../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="../../../../app-assets/js/scripts/forms/validation/form-validation.js"></script>
    <!-- END: Page JS-->

    <script charset="utf-8" src="js/webapp_liste_membre.js"></script>
    <script src="../../../../app-assets/js/scripts/modal/components-modal.js"></script>
	<script src="../../../../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>


</body>
<!-- END: Body-->

</html>




