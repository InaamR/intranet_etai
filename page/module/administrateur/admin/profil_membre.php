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
switch(Membre::info($_GET['id'], 'niveau')) {
	case 1 : 
	$Niveau = 'Membre';
	break;
			
	case 2 : 
	$Niveau = 'Mod&eacute;rateur';
	break;
			
	case 3 : 
	$Niveau = 'Administrateur';
	break;
	
	case 4 : 
	$Niveau = 'Cr&eacute;ateur';
	break;
			
	case 5 :
	$Niveau = 'Banni';
	break;
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Profil : <?php echo Membre::info($_GET['id'], 'nom'); ?> <?php echo Membre::info($_GET['id'], 'prenom'); ?> | Expert Gaming</title>
    <link rel="apple-touch-icon" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/images/ico/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/pages/ui-feather.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
	  <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/pages/app-user.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css">
    
    
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click"
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
                                    <li class="breadcrumb-item"><a href="listeMembre.php">Gestion du Personnel</a></li>
									                  <li class="breadcrumb-item active">Gestion du profil</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <a class="btn-icon btn btn-success btn-round btn-sm" href="#">Ajouter un nouveau membre</a>
                    </div>
                </div>
            </div>
			<div class="content-body">
          <!-- users edit start -->
          <section class="app-user-edit">
            <div class="card">
              <div class="card-body">
                <ul class="nav nav-pills" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link d-flex align-items-center active"
                      id="account-tab"
                      data-toggle="tab"
                      href="#account"
                      aria-controls="account"
                      role="tab"
                      aria-selected="true"
                    >
                      <i data-feather="user"></i><span class="d-none d-sm-block">Details du compte</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link d-flex align-items-center"
                      id="information-tab"
                      data-toggle="tab"
                      href="#information"
                      aria-controls="information"
                      role="tab"
                      aria-selected="false"
                    >
                      <i data-feather="info"></i><span class="d-none d-sm-block">Informations relatives</span>
                    </a>
                  </li>
                </ul>
                <div class="tab-content">

                  <!-- Account Tab starts -->
                  <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

                    <!-- users edit media object start -->
                    <div class="media mb-2">
                      <img
                        src="<?php echo URLSITE.'/'.Avatar::membre(Membre::info($_GET['id'], 'id_avatar'));?>"
                        alt=""
                        class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"
                        height="90"
                        width="90"
                      />
                      <div class="media-body mt-50">

                        <h4><?php echo 'Profil de '.Membre::info($_GET['id'], 'pseudo').' : '. $Niveau; ?></h4>                 

                      </div>
                    </div>
                    <!-- users edit media object ends -->

                    <!-- users edit account form start -->
                    <form class="form-validate">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="pseudo">Pseudo :</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="pseudo"
                              value="<?php echo Membre::info($_GET['id'], 'pseudo'); ?>"
                              name="pseudo"
                              id="pseudo"
							  readonly
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="prenom">Nom et Prénom:</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Prenom ..."
                              value="<?php echo Membre::info($_GET['id'], 'nom'); ?> <?php echo Membre::info($_GET['id'], 'prenom'); ?>"
                              name="prenom"
                              id="prenom"
							  readonly
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="email">E-mail</label>
                            <input
                              type="email"
                              class="form-control"
                              placeholder="Email"
                              value="<?php echo Membre::info($_GET['id'], 'email'); ?>"
                              name="email"
                              id="email"
							  readonly
                            />
                          </div>
                        </div>                        
                        
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="niveau">Niveau :</label>
                            <select class="form-control" id="niveau" readonly>
								<?php
										switch(Membre::info($_GET['id'], 'niveau')) {
											case 1 :
											echo '<option>Membre</option>';											
											break;
											case 2 :
											echo '<option>Modérateur</option>';											
											break;
											case 3 :
											echo '<option>Administrateur</option>';
											break;
										}

								?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="activation">Company</label>
                            <input
                              type="text"
                              class="form-control"
                              value="<?php
										switch(Membre::info($_GET['id'], 'activation')) {
											case 1 :
											echo 'Compte Activé';											
											break;
											case 0 :
											echo 'Compte Inactif';											
											break;
										}

									?>"
                              placeholder="Company name"
                              id="activation"
							  readonly
                            />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="table-responsive border rounded mt-1">
                            <h6 class="py-1 mx-1 mb-0 font-medium-2">
                              <i data-feather="lock" class="font-medium-3 mr-25"></i>
                              <span class="align-middle">Pérmission</span>
                            </h6>
                            <table class="table table-striped table-borderless">
                              <thead class="thead-light">
                                <tr>
                                  <th>Module</th>
                                  <th>Lire</th>
                                  <th>Ecrire</th>
                                  <th>Ajouter</th>
                                  <th>Supprimer</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Admin</td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="admin-read" checked />
                                      <label class="custom-control-label" for="admin-read"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="admin-write" />
                                      <label class="custom-control-label" for="admin-write"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="admin-create" />
                                      <label class="custom-control-label" for="admin-create"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="admin-delete" />
                                      <label class="custom-control-label" for="admin-delete"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Marque</td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="staff-read" />
                                      <label class="custom-control-label" for="staff-read"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="staff-write" checked />
                                      <label class="custom-control-label" for="staff-write"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="staff-create" />
                                      <label class="custom-control-label" for="staff-create"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="staff-delete" />
                                      <label class="custom-control-label" for="staff-delete"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Navigation</td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="author-read" checked />
                                      <label class="custom-control-label" for="author-read"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="author-write" />
                                      <label class="custom-control-label" for="author-write"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="author-create" checked />
                                      <label class="custom-control-label" for="author-create"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="author-delete" />
                                      <label class="custom-control-label" for="author-delete"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Produit</td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="contributor-read" />
                                      <label class="custom-control-label" for="contributor-read"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="contributor-write" />
                                      <label class="custom-control-label" for="contributor-write"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="contributor-create" />
                                      <label class="custom-control-label" for="contributor-create"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="contributor-delete" />
                                      <label class="custom-control-label" for="contributor-delete"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Devis</td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="user-read" />
                                      <label class="custom-control-label" for="user-read"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="user-create" />
                                      <label class="custom-control-label" for="user-create"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="user-write" />
                                      <label class="custom-control-label" for="user-write"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="user-delete" checked />
                                      <label class="custom-control-label" for="user-delete"></label>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- users edit account form ends -->
                  </div>
                  <!-- Account Tab ends -->

                  <!-- Information Tab starts -->
                  <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                    <!-- users edit Info form start -->
                    <form class="form-validate">
                      <div class="row mt-1">
                        <div class="col-12">
                          <h4 class="mb-1">
                            <i data-feather="user" class="font-medium-4 mr-25"></i>
                            <span class="align-middle">Données Personnelles</span>
                          </h4>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <div class="form-group">
                            <label for="naissance">Date de naissance :</label>
                            <input
                              id="naissance"
                              type="text"
                              class="form-control birthdate-picker"
                              name="dob"
                              placeholder="...."
							  value="<?php echo Membre::info($_GET['id'], 'naissance');?>"
							  readonly
                            />
                          </div>
                        </div>
						<div class="col-md-4">
                          <div class="form-group">
                            <label for="genre">Genre :</label>
                            <select class="form-control" id="genre" readonly>
                              <?php
								if(Membre::info($_GET['id'], 'genre')=='3') { 
									echo '<option ="3" selected>Femme</option><option ="1">homme</option>'; 
								} 
								else { 
									echo '<option ="3">Femme</option><option ="1" selected>homme</option>omme'; 
								} 
							  ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                          <div class="form-group">
                            <label for="tel">Téléphone :</label>
                            <input id="tel" type="text" class="form-control" name="tel" value="<?php echo Membre::info($_GET['id'], 'tel');?>"
							  readonly/>
                          </div>
                        </div>
						<div class="col-12">
                          <h4 class="mb-1 mt-2">
                            <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
                            <span class="align-middle">Section Adresse :</span>
                          </h4>
                        </div>
                        <div class="col-lg-12 col-md-6">
                          <div class="form-group">
                            <label for="adresse">Adresse :</label>
                            <input
                              id="adresse"
                              type="text"
                              class="form-control"
                              placeholder="...."
                              value="<?php echo Membre::info($_GET['id'], 'adresse');?>"
                              name="adresse"
							  readonly
                            />
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <div class="form-group">
                            <label for="codepostal">Code postal :</label>
                            <input id="codepostal" type="text" class="form-control" placeholder="..." name="codepostal" value="<?php echo Membre::info($_GET['id'], 'cp')?>" readonly />
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <div class="form-group">
                            <label for="ville">Ville :</label>
                            <input id="ville" type="text" class="form-control" name="ville" value="<?php echo Membre::info($_GET['id'], 'ville')?>" readonly />
                          </div>
                        </div>
						<div class="col-12">
                          <h4 class="mb-1 mt-2">
                            <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
                            <span class="align-middle">Section Description :</span>
                          </h4>
                        </div>

						<div class="col-lg-12 col-md-6">
                          <div class="form-group">
                            <label for="desc">Description du compte :</label>
							<textarea class="form-control" id="desc" rows="3" placeholder="...." readonly><?php echo str_replace('<br />', "\n",Membre::info($_GET['id'], 'description'));?></textarea>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- users edit Info form ends -->
                  </div>
                  <!-- Information Tab ends -->

                </div>
              </div>
            </div>
          </section>
          <!-- users edit ends -->
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
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/core/app-menu.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script charset="utf-8"  src="<?php echo Admin::menuadmin();?>table/js/webapp_liste_membre.js"></script>

    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/ui/ui-feather.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/extensions/ext-component-blockui.js"></script>
	<script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/pages/app-user-edit.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/components/components-navs.min.js"></script>
    <!-- END: Page JS-->
    
	<script src="../ckfinder/ckfinder.js"></script>

    <script>
		button1 = document.getElementById( 'ckfinder-popup-1' );
        button1.onclick = function() {
            selectFileWithCKFinder( 'ckfinder-input-1' );
        };
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
		function selectFileWithCKFinder( elementId ) {
            CKFinder.modal( {
                chooseFiles: true,
                width: 1000,
                height: 800,
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
    </script>

    <script src="https://kit.fontawesome.com/7791373c6a.js" crossorigin="anonymous"></script>>
</body>
<!-- END: Body-->

</html>