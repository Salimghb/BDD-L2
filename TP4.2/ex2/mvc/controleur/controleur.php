<?php

require_once('modele/modele.php') ;
require_once('vue/vue.php') ;
function CtlAcceuil(){
	Afficheracceuil();
}
function CtlAfficherClient(){
	$client=chercherTousLesClients();
	AfficherClient($client);
}
function CtlAjouterClient($nom,$prenom,$tel,$date){
	if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['num'])&&!empty($_POST['daten'])){
		ajouterClient($nom,$prenom,$num,$date);
		Afficheraccueil();
	}
	else{
		throw new Exception("Un des champs est invalide");
	}
}
function CtlChercherClient($nom){
	if(!empty($nom)){
		$client=ChercherNomClient($nom);
		AfficherClient($client);
	}
	else{
		throw new Exception("Le champ nom est vide");
	}
}
function CtlSupprimerClient(){
	foreach($_POST as $key=>$val){
		if($key!='supprimer'){  //Car meme le bouton est posté
			supprimerClient($key);
		}	
	}
}
function CtlErreur($erreur){
	AfficherErreur($erreur);
}


}
