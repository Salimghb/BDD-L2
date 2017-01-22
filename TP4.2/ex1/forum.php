<?php
require_once('controleur/controleur.php'); // charge les méthodes du contrôleur
try {
if (isset($_POST['envoyer'])){ // si on a cliqué sur Envoyer
$user=$_POST['user'];
$msg=$_POST['msg'];
CtlAjouterMessage($user,$msg); // appel du contrôleur qui gère le cas postage d'un msg
}
elseif (isset($_POST['supprimer'])){ // si on a cliqué sur Supprimer
$id=$_POST['idmsg'];
CtlSupprimerMessage($id); // appel du contrôleur qui gère le cas suppression d'un msg
}
else CtlAcceuil(); // on vient d'arriver sur la page et on appelle le contrôleur qui gère
} // l'affichage des discussions
catch(Exception $e) {
// une erreur est survenu dans le bloc try
$msg = $e->getMessage() ; // on récupère son code
CtlErreur($msg); // on appelle le contrôleur qui gère les erreurs.
}