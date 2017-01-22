<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="vue/style/style.css" />
	  
    </head>
  <body>
		<form id="monForm1" method="post" action="forum.php">
			<fieldset>
				<legend>Poster un message</legend>
				<p>
					<label for="login">Login</label>
					<input type="text" name ="login" id="login" />
				</p>
				<p>
					<label for="mdp">Mot de passe</label>
					<input type="password" name ="pass" id="pass" />
				</p>
				<p>
					<label for="message">Message</label>
					<input type="text" name="message" id="message" />
				</p>
				<p>
					<input type="Submit" value="Envoyer votre message" name="envoyer">
				</p>
			</fieldset>
		</form>
		<?php echo $contenu ; ?>
</body>
</html>