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

    } else {
        $job = '';
    }

}

$mysql_data = [];

if ($job != '') {
    if ($job == 'get_liste_comm') {

        $PDO_query_comm = Bdd::connectBdd()->prepare("SELECT * FROM etai_intranet_comm WHERE etai_intranet_comm_statut <> 3 ORDER BY etai_intranet_comm_id ASC");
        $PDO_query_comm->execute();

        while ($communication = $PDO_query_comm->fetch()) {

            $functions = '

            <a href="modif_comm.php?id='.$communication['etai_intranet_comm_id'].'" style="font-size: 1.5rem !important;" class="btn waves-effect waves-float waves-light mr-25 mb-25 p-0">
                <i class="bi bi-pencil-square"></i>
            </a>
            <a href="prev_comm.php?id='.$communication['etai_intranet_comm_id'].'" style="font-size: 1.5rem !important;" class="btn waves-effect waves-float waves-light mr-25 mb-25 p-0">
                <i class="bi bi-arrows-fullscreen"></i>
            </a>
            <a href="#" id="delete-record" data-id="' .$communication['etai_intranet_comm_id'].'" data-name="' .$communication['etai_intranet_comm_titre'].'" style="font-size: 1.5rem !important;" class="btn waves-effect waves-float waves-light mr-25 mb-25 p-0">
                <i class="bi bi-trash"></i>
            </a>
            <a href="#" data-id="' .$communication['etai_intranet_comm_id'].'" style="font-size: 1.5rem !important;" class="btn waves-effect waves-float waves-light mr-25 mb-25 p-0">
                <i class="bi bi-person-lines-fill"></i>
            </a>
            
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
                    $statut = '<div class="badge badge-light-warning">En attente</div>';
                break;
                case '2':
                    $statut = '<div class="badge badge-light-success">Valider</div>';
                break;  
                case '3':
                    $statut = '<div class="badge badge-light-secondary">Archiver</div>';
                break; 
                case '4':
                    $statut = '<div class="badge badge-light-danger">Annuler</div>';
                break;                           
                default:
                    $statut = '<div class="badge badge-light-info">Inactif</div>';
            }
            $stitre = $communication['etai_intranet_comm_sous_titre'];

            $mysql_data[] = [
                "responsive_id" => "",
                "id" => $id,
                "full_name" => $name_user,
                "post" => $stitre,
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

            $query->bindParam(":comm_titre", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":comm_sous_titre", $_POST['stitre'], PDO::PARAM_STR);
            $query->bindParam(":article", $_POST['article'], PDO::PARAM_STR);
            $query->bindParam(":img", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":statut", $_POST['statut'], PDO::PARAM_INT);
            $query->bindParam(":cat", $_POST['cat'], PDO::PARAM_INT);
            $query->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
            $query->bindParam(":user", $_POST['user'], PDO::PARAM_STR);

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
            
                $query_select_del = Bdd::connectBdd()->prepare("DELETE FROM `etai_intranet_comm` WHERE etai_intranet_comm_id = :etai_intranet_comm_id");
                $query_select_del->bindParam(":etai_intranet_comm_id", $id, PDO::PARAM_INT);
                $query_select_del->execute(); 
                $query_select_del->closeCursor();

                $result = 'success';
                $message = 'Succès de requête';
           
        }
    } elseif ($job == 'comm_edit') {
        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {
            $query = Bdd::connectBdd()->prepare("UPDATE etai_intranet_comm SET etai_intranet_comm_user = :etai_intranet_comm_user, etai_intranet_comm_email_user = :etai_intranet_comm_email_user, etai_intranet_comm_date = NOW(), etai_intranet_comm_cat = :etai_intranet_comm_cat, etai_intranet_comm_titre = :etai_intranet_comm_titre, etai_intranet_comm_sous_titre = :etai_intranet_comm_sous_titre, etai_intranet_comm_desc = :etai_intranet_comm_desc, etai_intranet_comm_img = :etai_intranet_comm_img, etai_intranet_comm_statut = :etai_intranet_comm_statut  WHERE etai_intranet_comm_id = :etai_intranet_comm_id");
            $query->bindParam(":etai_intranet_comm_id", $id, PDO::PARAM_INT);
            $query->bindParam(":etai_intranet_comm_user", $_POST['user'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_email_user", $_POST['email'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_cat", $_POST['cat'], PDO::PARAM_INT);
            $query->bindParam(":etai_intranet_comm_titre", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_sous_titre", $_POST['stitre'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_desc", $_POST['article'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_img", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":etai_intranet_comm_statut", $_POST['statut'], PDO::PARAM_INT);
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
