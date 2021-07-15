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
    <title>Profile utilisateur <?php echo ''.Membre::info($_SESSION['id'], 'pseudo'); ?> | Expert-gaming</title>
    <link rel="apple-touch-icon" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/images/ico/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/vendors.min.css">
	<link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/extensions/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/pages/data-list-view.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/forms/validation/form-validation.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/assets/css/style.css">
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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ADMINISTRATION</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Administration</li>
                                    <li class="breadcrumb-item active">Gestion du Personnel</li>
                                    <li class="breadcrumb-item active">Gestion du profile : <?php echo ''.Membre::info($_SESSION['id'], 'pseudo'); ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">

                    <a class="btn-icon btn btn-warning btn-round btn-sm" href="change_pass.php">Changement du mot de passe</a>
                        <a class="btn-icon btn btn-success btn-round btn-sm" href="listeMembre.php">Revenir à la liste</a>        

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
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'prenom'); ?>" name="changePrenom" class="btn btn-dark btn-sm">
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
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'nom'); ?>" name="changeNom" class="btn btn-dark btn-sm">
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
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'genre'); ?>" name="changeGenre" class="btn btn-dark btn-sm">
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
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'naissance'); ?>" name="changeNaissance" class="btn btn-dark btn-sm">
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
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'email'); ?>" name="changeEmail" class="btn btn-dark btn-sm">
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
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'tel'); ?>" name="changeTel" class="btn btn-dark btn-sm">
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
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'adresse'); ?>" name="changeAdresse" class="btn btn-dark btn-sm">
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
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'cp'); ?>" name="changeCp" class="btn btn-dark btn-sm">
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
																<input type="submit" value="<?php echo Membre::visibilite($_SESSION['id'], 'ville'); ?>" name="changeVille" class="btn btn-dark btn-sm">
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
																	<textarea class="form-control" id="basicTextarea" rows="3" name="description" placeholder="..."><?php echo str_replace('<br />', "\n",Membre::info($_SESSION['id'], 'description')); ?></textarea>
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-globe"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
															
                                                        </div>
                                                    </div>

													<div class="col-md-12">
														<input type="submit" class="btn btn-primary mr-1 mb-1" value="Mettre &agrave; jour le Profile" name="maj" class="input">
                                                        <button type="reset" class="btn btn-outline-secondary mr-1 mb-1">Annuler</button>
                                                    </div>


												</div>
                                                <div class="row">                           
                                                    <div class="col-12 mb-2">
                                                        <div class="border rounded p-2">
                                                            <h4 class="mb-1">Photo de profile *:</h4>                                                

                                                            <div class="media flex-column flex-md-row">

                                                                <?php
                                                                if(!empty($id_produit))
                                                                {
                                                                    echo '<img src="'.$img1['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                                ?>

                                                                <div class="media-body">

                                                                    <small class="text-muted">Aucune limite de taille et de poids pour les images !</small>

                                                                    <p class="my-50">
                                                                        <a id="blog-image-text-1">

                                                                            <?php 
                                                                            if(!empty($id_produit)){
                                                                                echo $img1['eg_image_produit_nom'];
                                                                            }else{
                                                                                echo 'C:\fakepath\image.jpg';
                                                                            }
                                                                            ?>
                                                                            
                                                                        </a>
                                                                    </p>

                                                                    <div class="d-inline-block col-12 ">
                                                                            <div class="custom-file">

                                                                                <div class="col-md-4 col-6">
                                                                                    <div class="form-group">
                                                                                    <input id="ckfinder-input-1" type="text" class="form-control" name="img1" value="<?php 
                                                                                        $photo = Membre::visibilite($_SESSION['id'], 'prenom');
                                                                                        if(!empty($id_produit)){
                                                                                            echo $img1['eg_image_produit_nom'];
                                                                                        }
                                                                                        ?>" required/> 
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4 col-6">
                                                                                    <div class="form-group">
                                                                                    <a id="ckfinder-popup-1" class="btn btn-dark waves-effect waves-float waves-light">
                                                                                        <i data-feather="upload" class="mr-25"></i>
                                                                                        <span>Choisir une premiere image</span>
                                                                                    </a> 
                                                                                    </div>
                                                                                </div>                                       
                                                                                

                                                                            </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-50">
                                                        <button type="submit" class="btn btn-primary mr-1">Enregistrement de votre photo</button>
                                                        <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
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
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/vendors.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/jquery.validate.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>  
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/core/app-menu.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/core/app.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS -->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <!-- END: Page JS-->
    
    
    <!-- BEGIN: Page JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/ui/data-list-view.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/extensions/toastr.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/forms/validation/form-validation.js"></script>
    <!-- END: Page JS-->

    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/ui/ui-feather.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/extensions/ext-component-blockui.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <script>
        button1 = document.getElementById( 'ckfinder-popup-1' );
        button1.onclick = function() {
            selectFileWithCKFinder( 'ckfinder-input-1' );
        };
        function selectFileWithCKFinder( elementId ) {
            CKFinder.modal( {
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function( finder ) {
                    finder.on( 'files:choose', function( evt ) {
                        var file = evt.data.files.first();
                        var output = document.getElementById( elementId );
                        output.value = file.getUrl();
                    } );

                    finder.on( 'file:choose:resizedImage', function( evt ) {
                        var output = document.getElementById( elementId );
                        output.value = evt.data.resizedUrl;
                    } );
                }
            } );
        }
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