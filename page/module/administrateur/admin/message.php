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
Message::lu($_GET['id']);
if(!empty($_POST['delete'])) {
	Message::efface($_POST['id']);
	redirection('messagerie.php');
}
if(!empty($_POST['repondre'])) {
	redirection('message_new.php?id='.Membre::info(Message::info($_GET['id'], 'id_expediteur'), 'id'));
}
echo '<div id="principal">
<div id="titre_principal">Le message de '.Membre::info(Message::info($_GET['id'], 'id_expediteur'), 'pseudo').'</div>
<br />
<table width="80%" align="center">
<tr>
<td align="right" width="30%" class="titre_form">Exp&eacute;diteur : </td>
<td>'.Membre::info(Message::info($_GET['id'], 'id_expediteur'), 'pseudo').'</td>
</tr>
<tr>
<td align="right" width="30%" class="titre_form">Sujet : </td>
<td>'.Message::info($_GET['id'], 'titre').'</td>
</tr>
<tr>
<td align="right" width="30%" class="titre_form" valign="top">Message : </td>
<td>'.Smiley::affiche(Message::info($_GET['id'], 'message')).'</td>
</tr>
<tr>
<td align="right" width="30%" class="titre_form">Action : </td>
<td align="center">
<form action="" method="post"><input type="submit" value="R&eacute;pondre" name="repondre" class="input"><input type="hidden" name="id" value="'.$_GET['id'].'">&nbsp;<input type="submit" value="Effacer" name="delete" class="input"></form>
</td>
</tr>
</table>
</div>';
include('footer.php');
?>
