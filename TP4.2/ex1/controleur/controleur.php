<?php

require_once('modele/modele.php') ;
require_once('vue/vue.php') ;

function CtlAcceuil(){
	$discussion=getDiscussion(); // appel du modèle qui va mettre dans la variable
	// $discussion un tableau de toutes les discussions de la BDD
	afficherDiscussion($discussion); // appel de la vue qui va exploiter $discussion et afficher
	// son contenu
}
function CtlAjouterMessage($log,$pass,$mess){
	if (!empty($mess) && !empty($log)&&!empty($pass)) {
		$pseudo=checkUser($login,$pass);
		if($pseudo!=null){
			ajouterMessage($pseudo[0]->nom,$message);
		}
		else{
			throw new Exception("Login ou mot de passe invalide");
		}
		CtlAcceuil(); // appelle de la fonction précédente du contrôleur
	}
	else {
		throw new Exception("Login,message ou mot de passe vide");
	}
}
function CtlErreur($erreur){
	afficherErreur($erreur) ;
}