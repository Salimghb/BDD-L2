<!DOCTYPE html>
<html lang="fr">
 		<head>
   			 <meta charset="utf-8">
   			 <link rel="stylesheet" href="style.css">
   			 <title>Mon forum</title>
        </head>
 	    <body>
		<form method="post" action="forumAvecCSS.php">
			<fieldset>
				<legend>Saisir une discussion</legend>
				<p>
					<label for="login">Login</label>
					<input type="text" name ="login" id="login" />
				</p>
				<p>
					<label for="message">Message</label>
					<input type="text" name="message" id="message" />
				</p>
				<p> 
					<input type="Submit" value="Envoyer" name="envoyer">
				</p>
			</fieldset>
		</form>
		<?php
		require_once('connect.php');
		try{
			$connect=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connect->query("SET NAMES UTF8");
			if(isset($_POST['envoyer'])&&!empty($_POST['login'])&&!empty($_POST['message'])){
				$login=$_POST['login'];
				$msg=$_POST['message'];
				$req="insert into forum values('','$login','$msg')";
				$res=$connect->query($req);
				$res->setFetchMode(PDO::FETCH_OBJ);
				$res->closeCursor();
			}
			$req='select*from forum order by id';
			$res=$connect->query($req);
			$res->setFetchMode(PDO::FETCH_OBJ);
			$ligne=$res->fetch();
			if ($ligne==false) {
				echo "Aucune discussion dans ce forum" ;
			}
			else{
				do{
					echo '<p><label for="login">'.$ligne->nom.'</label><input type="text" name="login" 
					id="login" value="'.$ligne->message.'"></p>';
					$ligne=$res->fetch();
				}
				while($ligne!=false);
			}
			$res->closeCursor();
		}
		catch(PDOException $e) {
			$msg = 'ERREUR dans ' . $e->getFile() . ' Ligne : ' . $e->getLine() . ' : ' . $e->getMessage() ;
			exit($msg);
		}
		?>
	</body>	
</html>