<?php
$connect = 'config.php';

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
    if (file_exists("config/" . $page) && $page != 'index.php') {
        include "config/" . $page;
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
    <title>Cube | ETAI-Tunisie</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->
	<style>
    body {
        margin:0;
        padding:0;
        <?php
        $numero = rand(1, 10);
        echo 'background: linear-gradient(
            rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)),
            
            url("images/home/' .
            $numero .
            '.jpg")

            no-repeat center fixed
          ;';
        ?>
        -webkit-background-size: cover;
        background-size: cover;

    }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  menu-collapsed blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="col-lg-6 card rounded-1 mb-0">
                            <div class="row m-0">                                
                                <div class="col-lg-12 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                            <img src="app-assets/img/CUBE-liv.png" alt="" title=""  />
                                            </div>
                                        </div>
                                        <p class="px-2">Récupération du mot de pass :</p>
										<div class="card-content">
										<div class="card-body pt-1">
											<form form action="" method="post" name="" id="" novalidate>

											<?php
											if(!empty($_POST['envoi'])) {
												extract($_POST);
												echo'<div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
												<i class="feather icon-info mr-1 align-middle"></i>
												<span>'.Connexion::passOubli($email).'</span>
												</div>';
											}
											echo '
											<div class="form-group">
											<label for="user-name"><b>Votre Email *:</b></label>   
											<div class="controls">

											<input type="email" name="email" class="form-control" placeholder="Veulliez saisir votre adresse mail Pro" data-validation-required-message="Ce champ est obligatoire" required>
											</div>
											</div>

											<button name="envoi" type="submit" class="btn btn-primary float-right btn-inline" value="Valider Inscription">Valider votre de demande</button>
											<button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Effacer</button>


											';
											?>
											</form>
										</div>
                                </div>
								<div class="login-footer p-1">
									<div class="divider">
										<div class="divider-text">Aide</div>
									</div>
									<div class="footer-btn d-inline">
									<div class="text-right"><a href="index.php" class="card-link">Revenir à la page de connexion</a></div>
									

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


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/forms/validation/form-validation.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>