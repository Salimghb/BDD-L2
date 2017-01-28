<?php

function afficherClient($client){
	$contenuAffichage='<form id="monForm" action="" method="post">
	<fieldset>
	<legend> Les clients de la base</legend>';
	if (count($client)==0) {
		echo "Aucun client enregistré" ;
	}
	else{
		foreach ($client as $ligne){
			$id = $ligne->id;
			$nom = $ligne->nom;
			$prenom = $ligne->prenom;
			$date = $ligne->daten;
			$tel = $ligne->tel;
			$check='<INPUT type="checkbox" nom="'.$id.'"/>';
			$contenuAffichage.= '<p><label>'.$check.'Numero du Client '.$id.'</label> <input type="text"
			value="'.$nom.' '.$prenom.'ne le '.$date.'joignable sur le '.$tel.'"/></p>';
		}
		$contenuAffichage.= '<p><label class="pas_de_style"> &nbsp;</label> <INPUT type="submit"
		value="Supprimer client" name="BoutonSupprimer"/></p></fieldset></form>';
	}
	require_once('gabarit.php');		
}

function afficherAcceuil(){
	$contenuAffichage=" ";
	require_once('gabarit.php');
}

function afficherDiscussion($discussion){
	$contenu=' ' ;
	foreach ($discussion as $ligne){
		$contenu.= '<p>'.$ligne->nom.' : '.$ligne->message.'['. $ligne->id.'] </p>';
	}
	require_once('gabarit.php');
}

function afficherErreur($erreur){
	$contenuAffichage='<form id="monForm" action="" method="post">
	<fieldset>
	<legend>Erreurs détéctées</legend>
	<p>'. $erreur.'</p>
	<p><a href="site.php"/> Revenir au menu principal</p>';
	$contenuAffichage.='</fieldset></form>';
	require_once('vue/gabarit.php');
}

