<?php
require_once('controleur/controleur.php');
try {
	if(isset($_POST['envoyer'])){
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$num=$_POST['num'];
		$daten=$_POST['daten'];
		CtlAjouterClient($nom,$prenom,$num,$datens);
	}
	else if (isset($_POST['rechercher'])){
		$nom=$_POST['nom'];
		CtlChercherClient($nom);
	}
	else if (isset($_POST['afficher'])){
		CtlAfficherClient();
	}
	else if(isset($_POST['supprimer'])){
		ctlSupprimerClient();
	}
	else{
		CtlAcceuil();
	}
}
catch(Exception $e) {
	$msg = $e->getMessage() ; 
	CtlErreur($msg); 
}