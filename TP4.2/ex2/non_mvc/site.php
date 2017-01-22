<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="stye.css" />
	  
    </head>
    
	<body>
		<form method="post" action="site.php">	
			<fieldset> 
				<legend>Ajouter un client</legend>
				<p>
					<label for="nom">Nom :</label>
					<input type="text" name ="nom" id="nom" >
				</p>
				<p>
					<label for="prenom">Prénom :</label>
					<input type="text" name ="prenom" id="prenom" >
				</p>
				<p>
					<label for="num">Numéro de telephone :</label>
					<input type="text" name ="num" id="num" >
				</p>
				<p>
					<label for="daten">Date de naissance (AAAA-MM-JJ) :</label>
					<input type="text" name ="daten" id="daten" >
				</p>
				<p> 
					<input type="submit" value="Ajouter client" name="envoyer">
					<input type="reset" value="Tout effacer" name="effacer">
				</p>
			</fieldset>
			</form>
		<form method="post" action="site.php">	
			<fieldset>
			<legend>Afficher tous les clients</legend>
				<p> 
					<input type="submit" value="Afficher les clients" name="afficher">
				</p>
			</fieldset>
		</form>
		<?php
		require_once('connect.php');
		try{
			$connect=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connect->query("SET NAMES UTF8");
			if(isset($_POST['envoyer'])&&!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['num'])&&!empty($_POST['daten']) ){
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$num=$_POST['num'];
				$daten=$_POST['daten'];
				$req="insert into clientsimple values('','$nom','$prenom','$num','$daten')";
				$res=$connect->query($req);
				$res->closeCursor();
			}
			if(isset($_POST['afficher'])){
				$req='select * from clientsimple order by id';
				$res=$connect->query($req);
				$res->setFetchMode(PDO::FETCH_OBJ);
				$client=$res->fetchall();
				$contenuAffichage='<form id="monForm" action="" method="post">
				<fieldset>
				<legend> Les clients de la base</legend>';
				if (count($client)==0) {
					echo "Aucun client enregistré" ;
				}
				else{
					foreach($client as $ligne){
						$id=$ligne->id;
						$nom=$ligne->nom;
						$prenom=$ligne->prenom;
						$date=$ligne->daten;
						$num=$ligne->num;
					$check='<INPUT type="checkbox" name="'.$id.'"/>';
					$contenuAffichage.='<p><label>'.$check.'num CL'.$id.':</label> <input type="text" value="'.$nom.' '.$prenom.' né le '.$date.'joignable sur le '.$num.'"/></p>';
				}
				$contenuAffichage.='<input type="submit" value="Supprimer les clients" name="supprimer">';
				echo $contenuAffichage;
				}
			}
			if(isset($_POST['rechercher'])){
				$req='select * from clientsimple where nom=$nom';
				$res=$connect->query($req);
				$res->setFetchMode(PDO::FETCH_OBJ);
				$client=$res->fetchall();
				$contenuAffichage='<form id="monForm" action="" method="post">
				<fieldset>
				<legend> Les clients de la base</legend>';
				if (count($client)==0) {
					echo "Aucun client enregistré" ;
				}
				else{
					foreach($client as $ligne){
						$id=$ligne->id;
						$nom=$ligne->nom;
						$prenom=$ligne->prenom;
						$date=$ligne->daten;
						$num=$ligne->num;
					$check='<INPUT type="checkbox" name="'.$id.'"/>';
					$contenuAffichage.='<p><label>'.$check.'num CL'.$id.':</label> <input type="text" 
					value="'.$nom.' '.$prenom.' né le '.$date.' joignable sur le '.$num.'"/></p>';
				}
				$contenuAffichage.='<input type="submit" value="Supprimer les clients" name="supprimer">';
				echo $contenuAffichage;
				
				}
			}
			if (isset($_POST['supprimer'])){
				$req="delete from clientsimple where id=$id";
				$res=$connect->query($req);
				$res->closeCursor();
			}
		}
		catch(PDOException $e) {
			$msg = 'ERREUR dans ' . $e->getFile() . ' Ligne : ' . $e->getLine() . ' : ' . $e->getMessage() ;
			exit($msg);
		}
		?>	
	</body>
</html>
 
 
 
 
 
 
 
 
 
 
 