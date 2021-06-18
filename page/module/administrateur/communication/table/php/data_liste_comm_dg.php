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
    if (file_exists("../../../../../../config/" . $page) && $page != 'index.php') {
        include "../../../../../../config/" . $page;
    } else {
        echo "Page inexistante !";
    }
}
/*page_protect();
if (!checkAdmin()) {
    die("Secured");
    exit();
}*/

$job = '';
$id = '';
$st = '';

if (isset($_GET['job'])) {
    $job = $_GET['job'];

    if ($job == 'get_liste_comm' || $job == 'add_comm' || $job == 'get_niveau_edit' || $job == 'niveau_edit' || $job == 'del_com') {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (!is_numeric($id)) {
                $id = '';
            }
        }

        if (isset($_GET['st'])) {
            $st = $_GET['st'];
            if (!is_numeric($st)) {
                $st = '';
            }
        }

        if (isset($_GET['mdp'])) {
            $mdp = $_GET['mdp'];
            if (!is_numeric($mdp)) {
                $mdp = '';
            }
        }

    } else {
        $job = '';
    }

}

$mysql_data = [];

if ($job != '') {
    if ($job == 'get_liste_comm') {

        $PDO_query_comm = Bdd::connectBdd()->prepare("SELECT * FROM etai_intranet_comm ORDER BY etai_intranet_comm_id ASC");
        $PDO_query_comm->execute();

        while ($communication = $PDO_query_comm->fetch()) {

            $functions = '<div class="d-inline-flex">
                            <a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu font-large-1"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a><div class="dropdown-menu dropdown-menu-right" style=""><a href="javascript:;" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text font-small-4 mr-50"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>Valider</a><a href="javascript:;" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive font-small-4 mr-50"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>Archiver</a><a href="#" data-id="' .
                            $communication['etai_intranet_comm_id'] .
                            '" class="dropdown-item delete-record"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Supprimer</a></div></div>
                            <a href="modif_comm.php?id='.$communication['etai_intranet_comm_id'].'" style="font-size: 0.9rem !important;" class="btn btn-info btn-sm waves-effect waves-float waves-light">Modifier</a>';

            $statut = '<div class="badge badge-warning">En attente</div>';       

            $date = date_create($communication['etai_intranet_comm_date']);
            $name_user = Membre::info($_SESSION['id'], 'nom').' '.Membre::info($_SESSION['id'], 'prenom');
            $titre = $communication['etai_intranet_comm_titre'];
            $id = $communication['etai_intranet_comm_id'];
            $email = $communication['etai_intranet_comm_email_user'];

            switch($communication['etai_intranet_comm_cat'])
            {
                case '1':
                    $cat = '<div class="badge badge-light-success">Direction générale</div>';
                break;
                case '2':
                    $cat = '<div class="badge badge-light-info">Ressources Humaines</div>';
                break;  
                case '3':
                    $cat = '<div class="badge badge-light-info">Services généraux</div>';
                break; 
                case '4':
                    $cat = '<div class="badge badge-light-danger">DSI</div>';
                break; 
                case '5':
                    $cat = '<div class="badge badge-light-secoinfondary">CCE</div>';
                break;                            
                default:
                    $cat = '<div class="badge badge-light-info">Attente de catégorie</div>';
            }

            $mysql_data[] = [
                "responsive_id" => "",
                "id" => $id,
                "full_name" => $name_user,
                "post" => $titre,
                "titre" => $titre,
                "cat" => $cat,
                "email" => $email,
                "city" => "Krasnosilka",
                "start_date" => date_format($date, "d/m/Y"),
                "age" => "61",
                "experience" => "1 Year",
                "status" => $statut,
                "Actions" => $functions
            ];
        }

        $PDO_query_comm->closeCursor();
        $result = 'success';
        $message = 'Succès de requête';

        $bdd = null;
        $PDO_query_comm = null;


    } elseif ($job == 'add_comm') {
        try {
            $query = Bdd::connectBdd()->prepare("INSERT INTO etai_intranet_comm (`etai_intranet_comm_titre`, `etai_intranet_comm_sous_titre`, `etai_intranet_comm_date`, `etai_intranet_comm_desc`, `etai_intranet_comm_img`, `etai_intranet_comm_statut`, `etai_intranet_comm_cat`, `etai_intranet_comm_email_user`, `etai_intranet_comm_user`)
			 VALUES (:comm_titre, :comm_sous_titre, now(), :desc, :img, :statu, :cat, :email, :user)");

            $query->bindParam(":comm_titre", $_GET['titre'], PDO::PARAM_STR);
            $query->bindParam(":comm_sous_titre", $_GET['stitre'], PDO::PARAM_STR);
            $query->bindParam(":desc", $_GET['desc'], PDO::PARAM_STR);
            $query->bindParam(":img", $_FILES['file']['name'], PDO::PARAM_STR);
            $query->bindParam(":statu", $_GET['statu'], PDO::PARAM_INT);
            $query->bindParam(":cat", $_GET['cat'], PDO::PARAM_INT);
            $query->bindParam(":email", $_GET['email'], PDO::PARAM_STR);
            $query->bindParam(":user", $_GET['user'], PDO::PARAM_STR);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Niveau ajouté avec succés';
            
        } catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;
        $bdd = null;
    } elseif ($job == 'del_com') {
        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {
            try {
                $query_del = Bdd::connectBdd()->prepare("DELETE FROM etai_intranet_comm WHERE etai_intranet_comm_id = :id");
                $query_del->bindParam(":id", $id, PDO::PARAM_INT);
                $query_del->execute();
                $query_del->closeCursor();
                $result = 'success';
                $message = 'Succès de requête';
            } catch (PDOException $x) {
                die("Secured");
                $result = 'error';
                $message = 'Échec de requête';
            }
            $query_del = null;
            $bdd = null;
        }
    } elseif ($job == 'get_niveau_edit') {
        if ($id == '') {
            $result = 'error';
            $message = 'Échec id';
        } else {
            try {
                $query_select_add = Bdd::connectBdd()->prepare("SELECT * FROM user_niveau_methode WHERE niveau_id = :id");
                $query_select_add->bindParam(":id", $id, PDO::PARAM_INT);
                $query_select_add->execute();

                while ($traitement_edit = $query_select_add->fetch()) {
                    $mysql_data[] = [
                        "nom_niveau" => $traitement_edit['niveau_name'],
                    ];
                }

                $query_select_add->closeCursor();

                $result = 'success';
                $message = 'Succès de requête';
            } catch (PDOException $x) {
                die("Secured");
                $result = 'error';
                $message = 'Échec de requête';
            }
            $query_del = null;
            $bdd = null;
        }
    } elseif ($job == 'niveau_edit') {
        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {
            $query = Bdd::connectBdd()->prepare("UPDATE user_niveau_methode SET niveau_name = :niveau_name WHERE niveau_id = :niveau_id");
            $query->bindParam(":niveau_id", $id, PDO::PARAM_INT);
            $query->bindParam(":niveau_name", $_GET['nom_niveau'], PDO::PARAM_STR);
            $query->execute();
            $query->closeCursor();
            $result = 'success';
            $message = 'Succès de requête';
        }
    }
}

$data = [
    "result" => $result,
    "message" => $message,
    "data" => $mysql_data,
];

$json_data = json_encode($data, JSON_UNESCAPED_UNICODE);
print $json_data;
?>
