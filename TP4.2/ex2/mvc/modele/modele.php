<?php 
require_once('connect.php');
function getConnect(){
	$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connexion->query('SET NAMES UTF8');
	return $connexion;
}
function supprimerClient($id){
	$connect=getConnect();
	$requete="delete from clientsimple where id=$id";
	$res=$connect->query($requete);
	$res->closeCursor();
}
function ajouterClient($nom,$prenom,$num,$date){
	$connect=getConnect();
	$requete="insert into clientsimple values ('','$nom','$prenom','$num','$date')";
	$res=$connect->query($requete);
	$res->closeCursor();
}
function ChercherNomClient($nom){
	$req='select * from clientsimple where nom=$nom';
	$res=$connect->query($req);
	$res->setFetchMode(PDO::FETCH_OBJ);
	$client=$res->fetchall();
	return $client;
}
