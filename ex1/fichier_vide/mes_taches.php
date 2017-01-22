<!DOCTYPE html>
<html lang="fr">
 		<head>
   			 <meta charset="utf-8">
   			 <link rel="stylesheet" href="style.css">
   			 <title>page vide</title>
        </head>
 	    <body>
		<table>
		<caption>EXAMENS</caption>
		<?php
		require_once('connect.php');
		try{

		$k=1;
		while($k!=32){
			if($k%7==1){
					echo'<tr>';
			}
			$req="select * from examens where numjour='$k'";
			$res=$connexion->query($req);
			$res->setFetchMode(PDO::FETCH_OBJ);
			$ligne=$res->fetch();
			if($ligne==false){
				$style='standard';
				$contenu=$k;
			}
			else{
				$style='tache';
				$contenu=$k.'<br/>'.$ligne->matière.'<br/>'.$ligne->salle;
			}
			echo'<td class="'. $style .'">' . $contenu .'</td>';
			$res->closeCursor();
			$k++;
			if($k%7==1){
				echo'</tr>';
			}
		}
		}

		catch(PDOException $e) {
			$msg = 'ERREUR dans ' . $e->getFile() . ' Ligne : ' . $e->getLine() . ' : ' . $e->getMessage() ;
			exit($msg);
		}

		?>

		</table>
  	    </body>
</html>
