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

    if ($job == 'get_liste_message_send' || $job == 'add_message' || $job == 'add_message_all' || $job == 'edit_marque' || $job == 'del_marque') {

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

    if ($job == 'get_liste_message_send') {        

        $liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MESSAGE.IDEXP);
		$resultat -> bindParam(':id', $_SESSION['id'], PDO::PARAM_INT, 11);
		$resultat -> execute();
		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {

			if($donnee['lu']==1) {
				$etat = '<div class="badge badge-success">
                            <span>Message Lu</span>
                        </div>';
			}else{
				$etat = '<div class="badge badge-warning">
                            <span>Message non Lu</span>
                        </div>';
			}

			if($donnee['effacer']==1) {
				$etat = '<div class="badge badge-danger">
                                <span>Effacer</span>
                            </div>';
			}
		
            $liste = '                        
                    <a class="btn btn-info btn-sm waves-effect waves-float waves-light" href="profil_membre.php?id='.$donnee['id_expediteur'].'"  role="button" target="_blank">Voir le profile</a>                
                ';
            $date = 'Le '.date('d/m/Y', $donnee['timestamp']).' à '.date('H:i:s', $donnee['timestamp']);
            $full_name = Membre::info($donnee['id_expediteur'], 'pseudo');
            $distinataire = Membre::info($donnee['id_destinataire'], 'nom').' '.Membre::info($donnee['id_destinataire'], 'prenom');
            $mysql_data[] = [
                "responsive_id" => "",
                "id" => $donnee['id_destinataire'],
                "etat" => $etat,
                "full_name" => $full_name,
                "distinataire" => $distinataire,
                "date" => $date,
                "titre" => $donnee['titre'],                
                "Actions" => $liste
            ];

        }
        

        $result = 'success';
        $message = 'Succès de requête';

    }elseif ($job == 'add_message') {

        try {

            /*if(Message::interdit($_POST['message'])) {*/
                $message = nl2br(filter_var($_POST['message'], FILTER_SANITIZE_STRING));
                $titre = filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
                $date = time();
                $resultat = Bdd::connectBdd()->prepare(INSERT.MESSAGEZ.MESSAGEINSERT);
                $resultat -> bindParam(':id_exp', $_SESSION['id'], PDO::PARAM_INT, 11);
                $resultat -> bindParam(':id_dest', $_POST['destinataire'], PDO::PARAM_INT, 11);
                $resultat -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
                $resultat -> bindParam(':date', $date, PDO::PARAM_STR);
                $resultat -> bindParam(':message', $_POST['message'], PDO::PARAM_STR);
                $resultat -> execute();

            /*}
            else {*/
                $stop = 'Votre message ou votre titre contient du language SMS ou des mots interdits, veuillez recommencer.<br />';
                /*}*/

            $result = 'success';
            $message = 'Message envoyé';

            
        } catch (PDOException $x) {
            die("Secured");
            $result = $stop;
            $message = 'Échec de requête';
        }

    }elseif ($job == 'add_message_all') {

        try {

            /*if(Message::interdit($_POST['message'])) {*/
                $id = '2';
                $all = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.NOID);
                $all -> bindParam(':id', $id, PDO::PARAM_INT, 11);
                $all -> execute();
                $message = nl2br(filter_var($_POST['message'], FILTER_SANITIZE_STRING));
                $titre = filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
                $date = time();
                $id_exp = '2';
                while($tous = $all -> fetch(PDO::FETCH_ASSOC)) {
                    $destinataire = $tous['id'];
                    $resultat = Bdd::connectBdd()->prepare(INSERT.MESSAGEZ.MESSAGEINSERT);
                    $resultat -> bindParam(':id_exp', $id_exp, PDO::PARAM_INT, 11);
                    $resultat -> bindParam(':id_dest', $destinataire, PDO::PARAM_INT, 11);
                    $resultat -> bindParam(':titre', $titre);
                    $resultat -> bindParam(':date', $date);
                    $resultat -> bindParam(':message', $message);
                    $resultat -> execute();
                }
            /*}
            else {*/
                $stop = 'Votre message ou votre titre contient du language SMS ou des mots interdits, veuillez recommencer.<br />';
                /*}*/

            $result = 'success';
            $message = 'Message envoyé';

            
        } catch (PDOException $x) {
            die("Secured");
            $result = $stop;
            $message = 'Échec de requête';
        }

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
