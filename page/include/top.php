<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">

        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                            data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="app-email.html"data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon" data-feather="mail"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="app-chat.html"data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon" data-feather="message-square"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="app-calendar.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon" data-feather="calendar"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
                    <div class="bookmark-input search-input">
                        <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                        <ul class="search-list search-list-bookmark"></ul>
                    </div>
                </li>
            </ul>
        </div>

        <ul class="nav navbar-nav align-items-center ml-auto">

            <!-- menu dropdown language -->
            <!-- <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon flag-icon-fr"></i>
                    <span class="selected-language">French</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="javascript:void(0);" data-language="en"><i
                            class="flag-icon flag-icon-us"></i> English</a>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="fr"><i
                            class="flag-icon flag-icon-fr"></i> French</a>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a>
                </div>
            </li> -->
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
                    <span class="badge badge-pill badge-danger badge-up">5</span>
                </a>

                <!-- menu notifications list -->
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                            <div class="badge badge-pill badge-light-primary">6 New</div>
                        </div>
                    </li>

                    <li class="scrollable-container media-list">
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">

                                <div class="media-left">
                                    <div class="avatar">
                                        <img src="../../../../app-assets/images/portrait/small/man.png" alt="avatar" width="32" height="32">
                                    </div>
                                </div>

                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Congratulation Sam 🎉</span>winner!</p>
                                    <small class="notification-text"> Won the monthly best seller badge.</small>
                                </div>
                            </div>
                        </a>
                        
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar">
                                        <img src="../../../../app-assets/images/portrait/small/man.png" alt="avatar" width="32" height="32">
                                    </div>
                                </div>

                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">New message</span>&nbsp;received</p>
                                    <small class="notification-text"> You have 10 unread messages</small>
                                </div>
                            </div>
                        </a>
                        
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content">MD</div>
                                    </div>
                                </div>

                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Revised Order 👋</span>&nbsp;checkout</p>
                                    <small class="notification-text"> MD Inc. order updated</small>
                                </div>
                            </div>
                        </a>

                        <div class="media d-flex align-items-center">
                            <h6 class="font-weight-bolder mr-auto mb-0">System Notifications</h6>

                            <div class="custom-control custom-control-primary custom-switch">
                                <input class="custom-control-input" id="systemNotification" type="checkbox"checked="">
                                <label class="custom-control-label" for="systemNotification"></label>
                            </div>

                        </div>
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Serverdown</span>&nbsp;registered</p>
                                    <small class="notification-text"> USA Server is down due to hight CPU usage</small>
                                </div>
                            </div>
                        </a>
                        
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-success">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Sales report</span>&nbsp;generated</p>
                                    <small class="notification-text"> Last month sales report generated</small>
                                </div>
                            </div>
                        </a>
                        
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-warning">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading">
                                        <span class="font-weight-bolder">High memory</span>&nbsp;usage</p>
                                        <small class="notification-text"> BLR Server using high memory</small>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block"
                            href="javascript:void(0)">Voir toutes les notifications</a></li>
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
                        <img  class="round" src="../../../../app-assets/images/portrait/small/man.png" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="page-profile.html"><i class="mr-50" data-feather="user"></i>Profile</a>
                    <!-- <a class="dropdown-item" href="app-email.html"><i class="mr-50" data-feather="mail"></i> Inbox</a>
                    <a class="dropdown-item" href="app-todo.html"><i class="mr-50" data-feather="check-square"></i> Task</a>
                    <a class="dropdown-item" href="app-chat.html"><i class="mr-50" data-feather="message-square"></i> Chats</a> -->

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="page-account-settings.html"><i class="mr-50" data-feather="settings"></i> Settings</a>
                    <a class="dropdown-item" href="page-faq.html"><i class="mr-50" data-feather="help-circle"></i> FAQ</a>
                    <a class="dropdown-item" href="bye"><i class="mr-50" data-feather="power"></i> Logout</a>
                </div>
            </li>
            <!-- End Profile menu -->

        </ul>
    </div>
</nav>