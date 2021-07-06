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

    if ($job == 'get_liste_comm' || $job == 'add_comm' || $job == 'comm_edit' || $job == 'del_com') {

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

        $PDO_query_comm = Bdd::connectBdd()->prepare("SELECT * FROM etai_intranet_comm WHERE etai_intranet_comm_statut = 3 ORDER BY etai_intranet_comm_id ASC");
        $PDO_query_comm->execute();

        while ($communication = $PDO_query_comm->fetch()) {

            $functions = '                            
            <a href="modif_comm_archive.php?id='.$communication['etai_intranet_comm_id'].'" style="font-size: 0.9rem !important;" class="btn btn-info btn-sm waves-effect waves-float waves-light">Modifier</a>
            <a href="prev_comm_archive.php?id='.$communication['etai_intranet_comm_id'].'" style="font-size: 0.9rem !important;" class="btn btn-dark btn-sm waves-effect waves-float waves-light">Preview</a>
            <a href="#" data-id="' .
            $communication['etai_intranet_comm_id'] .
            '" style="font-size: 0.9rem !important;" class="btn btn-danger btn-sm waves-effect waves-float waves-light delete-record">Supprimer</a>            
            ';


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
                case '5':
                    $cat = '<div class="badge badge-light-secondary">CCE</div>';
                break;                            
                default:
                    $cat = '<div class="badge badge-light-info">Attente de catégorie</div>';
            }


            switch($communication['etai_intranet_comm_statut'])
            {
                case '1':
                    $statut = '<div class="badge badge-light-warning">En attente de confirmation</div>';
                break;
                case '2':
                    $statut = '<div class="badge badge-light-success">Valider</div>';
                break;  
                case '3':
                    $statut = '<div class="badge badge-dark">Archiver</div>';
                break; 
                case '4':
                    $statut = '<div class="badge badge-light-danger">Annuler</div>';
                break;                           
                default:
                    $statut = '<div class="badge badge-light-info">Inactif</div>';
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
			 VALUES (:comm_titre, :comm_sous_titre, now(), :article, :img, :statut, :cat, :email, :user)");

            $query->bindParam(":comm_titre", $_GET['titre'], PDO::PARAM_STR);
            $query->bindParam(":comm_sous_titre", $_GET['stitre'], PDO::PARAM_STR);
            $query->bindParam(":article", $_GET['article'], PDO::PARAM_STR);
            $query->bindParam(":img", $_GET['img'], PDO::PARAM_STR);
            $query->bindParam(":statut", $_GET['statut'], PDO::PARAM_INT);
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
    } elseif ($job == 'comm_edit') {
        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {
            $query = Bdd::connectBdd()->prepare("UPDATE etai_intranet_comm SET etai_intranet_comm_user = :etai_intranet_comm_user, etai_intranet_comm_email_user = :etai_intranet_comm_email_user, etai_intranet_comm_date = NOW(), etai_intranet_comm_cat = :etai_intranet_comm_cat, etai_intranet_comm_titre = :etai_intranet_comm_titre, etai_intranet_comm_sous_titre = :etai_intranet_comm_sous_titre, etai_intranet_comm_desc = :etai_intranet_comm_desc, etai_intranet_comm_img = :etai_intranet_comm_img, etai_intranet_comm_statut = :etai_intranet_comm_statut  WHERE etai_intranet_comm_id = :etai_intranet_comm_id");
            $query->bindParam(":etai_intranet_comm_id", $id, PDO::PARAM_INT);
            $query->bindParam(":etai_intranet_comm_user", $_GET['user'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_email_user", $_GET['email'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_cat", $_GET['cat'], PDO::PARAM_INT);
            $query->bindParam(":etai_intranet_comm_titre", $_GET['titre'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_sous_titre", $_GET['stitre'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_desc", $_GET['article'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_img", $_GET['img'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_statut", $_GET['statut'], PDO::PARAM_INT);
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
