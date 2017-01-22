<?php 
require_once('connect.php');
function getConnect(){
	$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connexion->query('SET NAMES UTF8');
	return $connexion;
}
function getDiscussion(){
	$connexion=getConnect(); // cr�ation d'une connexion PDO
	$requete="select * from forum" ;
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$discussion=$resultat->fetchall();
	// $discussion est donc un tableau d'objet o� chaque case est un objet contenant une ligne
	//enti�re du r�sultat de la requ�te
	$resultat->closeCursor();
	return $discussion;
}
function ajouterMessage($nom,$message){
	$connexion=getConnect(); // cr�ation d'une connexion PDO
	$requete="insert into forum values ('', '$nom', '$message')" ;
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function checkUser($id,$mdp){
	$connexion=getConnect(); // cr�ation d'une connexion PDO
	$requete="select nom from user where id='$id' and mdp='$mdp'" ;
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$util=$resultat->fetchall(); //On met le resultat dans un tableau
	$resultat->closeCursor();
	return $util;
}