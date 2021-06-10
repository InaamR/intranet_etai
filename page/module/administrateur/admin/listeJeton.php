<?php session_start();


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
    if (file_exists("../../../config/" . $page) && $page != 'index.php') {
        include "../../../config/" . $page;
    } else {
        echo "Page inexistante !";
    }
}
include('menu.php');
if(!empty($_POST['supprime_connexion'])) {
	ProtectEspace::deleteJeton($_POST['id_jeton']);
}
echo '<div id="principal">
<div id="titre_principal">Liste des Connexions</div>
<br />
<table width="70%" align="center">
<tr>
<td align="center" width="40%" class="titre_form">Date</td>
<td align="center" class="titre_form">Adresse IP</td>
<td align="center" width="20%" class="titre_form">Action</td>
</tr>
'.ProtectEspace::listeJeton($_SESSION['id']).'
</table>
</div>';
?>