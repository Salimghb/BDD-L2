<?php
function afficherDiscussion($discussion){
	$contenu=' ' ;
	foreach ($discussion as $ligne){
		$contenu.= '<p>'.$ligne->nom.' : '.$ligne->message.'['. $ligne->id.'] </p>';
	}
	require_once('gabarit.php');
}
function afficherErreur($erreur){
	$contenu='<p>'. $erreur.'</p>
	<p><a href="forum.php"/> Revenir au forum </a></p>';
	require_once('vue/gabarit.php');
}