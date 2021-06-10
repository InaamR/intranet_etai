<?php

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

    if ($job == 'get_liste_niveau' || $job == 'add_niveau' || $job == 'get_niveau_edit' || $job == 'niveau_edit' || $job == 'del_niveau') {
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
    if ($job == 'get_liste_niveau') {
        $PDO_query_niveau = Bdd::connectBdd()->prepare("SELECT * FROM user_niveau_methode ORDER BY niveau_id ASC");
        $PDO_query_niveau->execute();

        while ($niveau = $PDO_query_niveau->fetch()) {
            $functions =
                ' 
						<td class="product-action">
						
						<center>
						<button type="button" class="btn btn-icon btn-success" id="function_edit_niveau" data-id="' .
                $niveau['niveau_id'] .
                '" data-name="' .
                $niveau['niveau_name'] .
                '"><i class="feather icon-check-square"></i></button>
						<button type="button" class="btn btn-icon btn-danger rounded-circle" id="confirm-color" data-id="' .
                $niveau['niveau_id'] .
                '" data-name="' .
                $niveau['niveau_name'] .
                '"><i class="feather icon-x-square"></i></button>
						</center>
						
						</td>
		
		';

            

            $date = date_create($niveau['niveau_date']);

            $mysql_data[] = [
                "Niveau" => $niveau['niveau_name'],
                "Date_insertion" => date_format($date, "d/m/Y"),
                "bouton" => $functions,
            ];
        }
        $PDO_query_niveau->closeCursor();
        $result = 'success';
        $message = 'Succès de requête';

        $bdd = null;
        $PDO_query_niveau = null;
    } elseif ($job == 'add_niveau') {
        try {
            $query = Bdd::connectBdd()->prepare("INSERT INTO user_niveau_methode (`niveau_name`,`niveau_date`)
			 VALUES (:niveau_name,now())");

            $query->bindParam(":niveau_name", $_GET['nom_niveau'], PDO::PARAM_STR);

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
    } elseif ($job == 'del_niveau') {
        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {
            try {
                $query_del = Bdd::connectBdd()->prepare("DELETE FROM user_niveau_methode WHERE niveau_id = :id");
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
