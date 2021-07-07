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
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Inscription - Infopro-Digital</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><div class="auth-wrapper auth-v1 px-2">
    <div class="auth-inner py-2">
    <!-- Register v1 -->
    <div class="card mb-0">
        <div class="card-body">
            <a href="index.php" class="brand-logo">
                <img src="app-assets/images/logo/Infopro-logo-216x94.png" alt="" width="60%">
            </a>

        <h4 class="card-title mb-1">Inscription</h4>
        <p class="card-text mb-2">Rendez la gestion de votre application simple et amusante !</p>


        <?php

            if(!empty($_POST['inscription'])) {

                extract($_POST);

                echo'
                    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                        <div class="alert-body">
                        <i data-feather="info" class="mr-50 align-middle"></i>
                        <span>'.Inscription::inscrire($identifiant, $email, $passeUn, $passeDe).'</span>
                        </div>
                    </div>
                    ';
            }


            echo'
                <form action="" method="post" name="" id="" novalidate>
                    
                        
                        <div class="form-group">
                            <label for="user-name"><b>Choisir un identifiant *:</b></label>   
                            <div class="controls">
                            
                                <input type="text" name="identifiant" class="form-control" id="user-name" data-validation-required-message="Le champ est obligatoire et doit contenir au moins 3 caractères." minlength="3" placeholder="Entrez au minimum 3 caractères" data-validation-regex-regex="^[-a-zA-Z_\d]+$" data-validation-regex-message="Doit entrer un caractère, un nombre, un tiret ou Uderscore" required>
                            </div>
                        </div>
                                                                                
                    
                        <div class="form-group">
                        <label for="user-name"><b>Choisir une adresse EMAIL *:</b></label>   
                        <div class="controls">

                        <input type="email" name="email" class="form-control" id="user-email" placeholder="Veulliez saisir votre adresse mail Pro" data-validation-required-message="Ce champ est obligatoire" required>
                        
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="user-name"><b>Saisir un Mot de Passe (Min 3 Caractéres) *:</b></label>   
                        <div class="controls">

                        <input type="password"  name="passeUn" class="form-control" id="user-password" required data-validation-required-message="Ce champ est obligatoire"  data-validation-required-message="Le champ min doit contenir au moins 3 caractères." minlength="3">
                        
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="user-name"><b>Confirmer le Mot de passe *:</b></label>   
                        <div class="controls">

                        <input type="password" name="passeDe" class="form-control" id="user-password" required data-validation-match-match="passeUn" data-validation-required-message="Le mot de passe de confirmation doit correspondre au mot de passe">
                        
                        </div>
                        </div>

                        <button name="inscription" type="submit" class="btn btn-primary float-right btn-inline" value="Valider Inscription">Valider Inscription</button>
                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Effacer</button>			

                </form>

            ';
        ?>
		<p class="text-center mt-2">
            <span>Vous avez déjà un compte ?</span><br>
            <a href="index.php">
                <span>Connectez-vous à la place</span>
            </a>
        </p>
      </div>
    </div>
    <!-- /Register v1 -->
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/page-auth-register.min.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
  <!-- END: Body-->
</html>