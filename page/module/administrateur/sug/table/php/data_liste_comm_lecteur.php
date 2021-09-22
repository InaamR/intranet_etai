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

    if ($job == 'get_liste_comm_lecteur') {

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
    if ($job == 'get_liste_comm_lecteur') {

        $PDO_query_comm_lecture = Bdd::connectBdd()->prepare("SELECT * FROM etai_intranet_comm_lecteurs WHERE etai_intranet_comm_id = :id_comm ORDER BY etai_intranet_comm_lecteurs_date ASC");
        
        $PDO_query_comm_lecture->bindParam(":id_comm", $_GET['id_comm'], PDO::PARAM_INT);

        $PDO_query_comm_lecture->execute();

        while ($lecteurs = $PDO_query_comm_lecture->fetch()) {

            $functions = '
            <a class="btn btn-dark btn-round btn-sm waves-effect waves-float waves-light" href="../admin/profil_membre.php?id='.$lecteurs['etai_intranet_comm_lecteurs_user'].'">Voir le profile</a>            
            ';


            $date = date_create($lecteurs['etai_intranet_comm_lecteurs_date']);

            $name_user = Membre::info($lecteurs['etai_intranet_comm_lecteurs_user'], 'nom').' '.Membre::info($lecteurs['etai_intranet_comm_lecteurs_user'], 'prenom');






            $PDO_query_comm = Bdd::connectBdd()->prepare("SELECT * FROM etai_intranet_comm WHERE etai_intranet_comm_id = :id_comm");
            $PDO_query_comm->bindParam(":id_comm", $_GET['id_comm'], PDO::PARAM_INT);
            $PDO_query_comm->execute();
            $comm = $PDO_query_comm->fetch();
            $PDO_query_comm->closeCursor();








            $titre = $comm['etai_intranet_comm_titre'];
            $id = $lecteurs['etai_intranet_comm_lecteurs_id'];
            $email = '<a href="mailto:"'.Membre::info($lecteurs['etai_intranet_comm_lecteurs_user'], 'email').'>'.Membre::info($lecteurs['etai_intranet_comm_lecteurs_user'], 'email').'</a>';

            $mysql_data[] = [
                "responsive_id" => "",
                "id" => $id,
                "full_name" => $name_user,
                "post" => $titre,
                "email" => $email,
                "date_lecteur" => date_format($date, "d/m/Y"),
                "Actions" => $functions
            ];
        }

        $PDO_query_comm_lecture->closeCursor();
        $result = 'success';
        $message = 'Succès de requête';

        $bdd = null;
        $PDO_query_comm_lecture = null;


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
