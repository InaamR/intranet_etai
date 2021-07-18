<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content align-items-center">

            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>

        <ul class="nav navbar-nav align-items-center ml-auto">

            <!-- menu dropdown language -->
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon flag-icon-fr"></i>
                    <span class="selected-language">Français</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="javascript:void(0);" data-language="en"><i
                            class="flag-icon flag-icon-us"></i> English</a>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="fr"><i
                            class="flag-icon flag-icon-fr"></i> Français</a>
                </div>
            </li>
            <!-- End menu dropdown  language -->

            <!-- moon dark mode switch -->
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
            </li>
            <!-- End moon dark mode switch -->

            <!-- barre de recherche -->
            <li class="nav-item nav-search">
                <a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>

                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Recherche..." tabindex="-1" data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            <!-- End barre de recherche -->

            <!-- menu dropdown notifications -->
            <li class="nav-item dropdown dropdown-notification mr-25">
                <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                    <i class="ficon" data-feather="bell"></i>
                    <span class="badge badge-pill badge-danger badge-up"><?php echo Message::nouveauNb($_SESSION['id']);?></span>
                </a>

                <!-- menu notifications list -->
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                            <div class="badge badge-pill badge-light-primary"><?php echo Message::nouveauNb($_SESSION['id']);?> Nouveaux</div>
                        </div>
                    </li>
                    
                    <li class="scrollable-container media-list">
                        <?php echo Message::nouveauNbnotif($_SESSION['id']);?>                                               
                    </li>

                    <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block"
                            href="http://<?php echo $_SERVER['SERVER_NAME'];?>/intranet_etai/page/module/administrateur/admin/messagerie.php">Voir toutes les messages</a></li>
                </ul>
                <!--End menu notifications list -->

            </li>
            <!-- End menu dropdown notifications -->

            <!-- Profile menu -->
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder"><?php echo Membre::info($_SESSION['id'], 'nom').' '.Membre::info($_SESSION['id'], 'prenom');?></span>
                        <span class="user-status">
                            <?php
                            $query = Bdd::connectBdd()->prepare("SELECT nom_niveau FROM etai_intranet_niveau WHERE id = :niveau_id");
                            $niveau_user = Membre::info($_SESSION['id'], 'niveau');
                            $query->bindParam(":niveau_id", $niveau_user, PDO::PARAM_INT);
                            $query->execute();
                            $query_niveau = $query->fetch();
                            echo ''.$query_niveau['nom_niveau'].'';	
                            $query->closeCursor();							
                            ?>    


                        </span>
                    </div>
                    <span class="avatar">
                        <img  class="round" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/intranet_etai/app-assets/images/portrait/small/man.png" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/intranet_etai/page/module/administrateur/admin/profil.php"><i class="mr-50" data-feather="user"></i>Profile</a>
                    <a class="dropdown-item" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/intranet_etai/page/module/administrateur/admin/messagerie.php"><i class="mr-50" data-feather="mail"></i> Messagerie</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="page-faq.html"><i class="mr-50" data-feather="help-circle"></i> FAQ</a>
                    <a class="dropdown-item" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/intranet_etai/page/module/administrateur/admin/deconnexion.php"><i class="mr-50" data-feather="power"></i> Déconnexion</a>
                </div>
            </li>
            <!-- End Profile menu -->

        </ul>
    </div>
</nav>