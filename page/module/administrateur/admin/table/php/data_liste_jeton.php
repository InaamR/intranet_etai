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

$job = '';
$id = '';

if (isset($_GET['job'])) {
    $job = $_GET['job'];

    if ($job == 'get_liste_jeton' || $job == 'add_marque' || $job == 'edit_marque' || $job == 'del_marque') {

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

    if ($job == 'get_liste_jeton') {    

		

            $liste = '';
            $id =Membre::info($_SESSION['id'], 'id');
            $resultat = Bdd::connectBdd()->prepare(SELECT.ALL.JETON.JETONMEMBRE);
            $resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
            $resultat -> execute();
            while($jeton = $resultat -> fetch(PDO::FETCH_ASSOC)) {
                    $liste = '
                        <form method="post" action="">
                        <input type="hidden" value="'.$jeton['id'].'" name="id_jeton">
                        <button type="submit" class="btn btn-icon btn-sm btn-danger" name="supprime_connexion" value="Bannir"  data-toggle="modal" data-target="#inlineForm">Supprimer</button>
                        </form>';

                    $full_name = Membre::info($jeton['id_membre'], 'nom').' '.Membre::info($jeton['id_membre'], 'prenom');
                    $date = date('d/m/Y', $jeton['date']);
                
                    $mysql_data[] = [
                        "responsive_id" => "",
                        "id" => $jeton['id'],
                        "full_name" => $full_name,
                        "date" => $date,
                        "ip" => $jeton['ip_connexion'],                
                        "Actions" => $liste
                    ];

            }

        $result = 'success';
        $message = 'Succès de requête';

    }elseif ($job == 'add_marque') {
        try {
            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_marque (`eg_marque_date`, `eg_marque_user`, `eg_marque_nom`, `eg_marque_logo`, `eg_marque_statut`)
			 VALUES (now(), :user, :marque_titre, :logo, :statut)");

            $query->bindParam(":marque_titre", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":logo", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":statut", $_POST['statut'], PDO::PARAM_INT);
            $query->bindParam(":user", $_POST['user'], PDO::PARAM_INT);

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

    }elseif ($job == 'del_marque') {

        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {

            try {
                $query_del = Bdd::connectBdd()->prepare("DELETE FROM eg_marque WHERE eg_marque_id = :id");
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

    }elseif ($job == 'edit_marque') {

        if ($id == '') {

            $result = 'Échec';
            $message = 'Échec id';

        } else {

            $query = Bdd::connectBdd()->prepare("UPDATE eg_marque SET eg_marque_date = now(), eg_marque_user = :eg_marque_user, eg_marque_nom = :eg_marque_nom, eg_marque_logo = :eg_marque_logo, eg_marque_statut = :eg_marque_statut  WHERE eg_marque_id = :eg_marque_id");

            $query->bindParam(":eg_marque_id", $id, PDO::PARAM_INT);

            $query->bindParam(":eg_marque_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_marque_nom", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":eg_marque_logo", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":eg_marque_statut", $_POST['statut'], PDO::PARAM_INT);

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
