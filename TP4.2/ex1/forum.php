<?php
require_once('controleur/controleur.php'); // charge les m�thodes du contr�leur
try {
if (isset($_POST['envoyer'])){ // si on a cliqu� sur Envoyer
$user=$_POST['user'];
$msg=$_POST['msg'];
CtlAjouterMessage($user,$msg); // appel du contr�leur qui g�re le cas postage d'un msg
}
elseif (isset($_POST['supprimer'])){ // si on a cliqu� sur Supprimer
$id=$_POST['idmsg'];
CtlSupprimerMessage($id); // appel du contr�leur qui g�re le cas suppression d'un msg
}
else CtlAcceuil(); // on vient d'arriver sur la page et on appelle le contr�leur qui g�re
} // l'affichage des discussions
catch(Exception $e) {
// une erreur est survenu dans le bloc try
$msg = $e->getMessage() ; // on r�cup�re son code
CtlErreur($msg); // on appelle le contr�leur qui g�re les erreurs.
}