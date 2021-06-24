<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/page/module/administrateur/index.php">
                    <span class="brand-logo">
                        <img src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/images/logo/favicon-48x48.png" alt="petit-logo" class="">
                    </span>
                    <span class="brand-logo-big">
                        <img src="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/app-assets/images/logo/Infopro-logo-216x94.png" alt="">
                    </span>
                </a>
            </li>

            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>

        </ul>

    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item">
                <a class="nav-lik d-flex" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/page/module/administrateur/index.php">
                    <i class="fas fa-home"></i>
                    <span class="menu-title text-truncate" data-i18n="Accueil">Accueil</span>
                </a>
            </li>
            <li class="navigation-header"><span data-i18n="Communication">Section communautaire</span><i data-feather="more-horizontal"></i>

            <li class="nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i class="far fa-comments" aria-hidden="true"></i>
                    <span class="menu-title text-truncate" data-i18n="Communication Générale" id="Communication Générale">Com.Générale</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/page/module/administrateur/communication/liste_comm.php">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Gestion des communications">Gestion Comm.</span>
                        </a>
                    </li>                    
                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-shield-virus" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Hygiène & Santé">Hygiène & Santé </span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="COVID-19">COVID-19</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Vie interne">Vie interne</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Planning du medecin">Planning du medecin</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="far fa-handshake" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Vie Social">Vie Social</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Info service">Info service</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Events">Events</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Animation">Animation</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Quiz">Quiz</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Jeux">Jeux</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Conventions">Conventions</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Suggestions">Suggestions</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Sondage">Sondage</span></a>
                    </li>
                </ul>
            </li>            

            <li class=" nav-item"><a class="d-flex align-items-center" href="app-email.html"><i class="fas fa-link" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Liens Utiles">Liens Utiles</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-shield-virus" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Dir. des Systèmes d'information">Dir. Systèmes Information </span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">COVID-19</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Vie interne</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Knowledge Base">Planning du medecin</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-users" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Res. Humaines">Res. Humaines</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Service et Employé">Service et Employé</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Organigramme">Organigramme</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Map interne">Map interne</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-user-cog" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Admin">Admin</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" title="Gestion du personnel" href="http://<?php echo $_SERVER['SERVER_NAME']?>/intranet_etai/page/module/administrateur/admin/listeMembre.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="G.Personnel">G.Personnel</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" title="Gestion de l'application" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Gestion de l'application">Gestion de l'application</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" title="Gestion des modules" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Gestion des modules">Gestion des modules</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>