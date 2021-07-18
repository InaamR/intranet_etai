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

    if ($job == 'get_liste_membre' || $job == 'add_marque' || $job == 'edit_marque' || $job == 'del_marque') {

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

    if ($job == 'get_liste_membre') {        

        $liste = '';
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.' ORDER BY activation ASC');
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();

		while($donnee = $resultat -> fetch(PDO::FETCH_ASSOC)) {
			$idMembre = $donnee['id'];
			$pseudo = $donnee['pseudo'];
			$full_name = '<a href="profil_membre.php?id='.$idMembre.'">'.$donnee['nom'].' '.$donnee['prenom'].' - ('.$donnee['pseudo'].')</a>';
			$email = $donnee['email'];

			if($donnee['activation'] === '5') {

				$niveau = '<div class="btn btn-icon btn-sm btn-danger">Banni</div>';
				$action = '<input type="hidden" value="'.$donnee['id'].'" name="id">
							<button type="submit" class="btn btn-icon btn-sm btn-warning" name="debannir" value="D&eacute;bannir">D&eacute;bannir</button>';
							/*<button type="submit" class="btn btn-icon btn-sm btn-danger" name="supprim" value="Supprimer">Supprimer</button>*/

			}elseif($donnee['activation'] === '0') {

				$niveau = '<div class="btn btn-icon btn-sm btn-info">Nouvel(le) inscrit(e)</div>';
				$action = '<input type="hidden" value="'.$donnee['id'].'" name="id">
							<button type="submit" class="btn btn-icon btn-sm btn-danger" name="inscription" value="Valider l\'inscription"  data-toggle="modal" data-target="#inlineForm">Valider l\'inscription</button>';

			}else{

				switch($donnee['niveau']) {

					case 1 :
					$niveau = '<div class="btn btn-icon btn-sm btn-secondary">Membre</div>';
					$action = '<input type="hidden" value="'.$donnee['id'].'" name="id">
								<button type="submit" class="btn btn-icon btn-sm btn-danger" name="bannir" value="Bannir"  data-toggle="modal" data-target="#inlineForm">Bannir</button>
								<button type="submit" class="btn btn-icon btn-sm btn-success" name="moderateur" value="Passer Mod&eacute;rateur">Passer en Mod&eacute;rateur</button>';
					break;

					case 2 :
					$niveau = '<div class="btn btn-icon btn-sm btn-success">Mod&eacute;rateur</div>';
					$action = '<input type="hidden" value="'.$donnee['id'].'" name="id">
								<button type="submit" class="btn btn-icon btn-sm btn-danger" name="bannir" value="Bannir"  data-toggle="modal" data-target="#inlineForm">Bannir</button>
								<button type="submit" class="btn btn-icon btn-sm btn-secondary" name="membre" value="Repasser Membre">Repasser en Membre</button>';
					break;

					case 3 :
					$niveau = '<div class="btn btn-icon btn-sm btn-success">Administrateur</div>';
					$action = '';
					break;
                    
				}
				
			}
            $liste = '<form action="" method="post">'.$action.'</form>';
			$mysql_data[] = [
				"responsive_id" => "",
				"id" => $idMembre,
				"full_name" => $full_name,
				"post" => $email,
				"niveau" => $niveau,                
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
