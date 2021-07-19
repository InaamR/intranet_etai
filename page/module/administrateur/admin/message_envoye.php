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
    if (file_exists("../../../../config/" . $page) && $page != 'index.php') {
        include "../../../../config/" . $page;
    } else {
        echo "Page inexistante !";
    }
}

echo '<div id="principal">
<div id="titre_principal">Messages Enovy&eacute;s</div>
<br />
<table width="100%">
<tr>
<td align="center" colspan="4">
<a href="message_new.php" class="input">&nbsp;Nouveau message&nbsp;</a>
<a href="message_envoye.php" class="input">&nbsp;Messages Envoy&eacute;s&nbsp;</a>
<a href="messagerie.php" class="input">&nbsp;Messages Re&ccedil;us&nbsp;</a>
</td>
</tr>
<tr>
<td align="center" colspan="4">
<img src="'.URLSITE.'/design/image/Non_Lu.png" width="24" height="24" align="absmiddle"> Nouveaux messages
<img src="'.URLSITE.'/design/image/Lu.png" width="24" height="24" align="absmiddle"> Anciens messages
<img src="'.URLSITE.'/design/image/faux.png" width="24" height="24" align="absmiddle"> Effacer par le destinataire
</td>
</tr>
<tr>
<td width="50px"></td>
<td align="center" class="titre_form" width="250px">Date</td>
<td align="center" class="titre_form" width="150px">Destinataire</td>
<td align="center" class="titre_form">Message</td>
</tr>
'.Message::listeEnvoi($_SESSION['id']).'
</table>
</div>';
?>