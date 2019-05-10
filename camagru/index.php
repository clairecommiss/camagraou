<html><body>
<form method="get" action="index.php">
 	Identifiant:<input type="text" name="login" value="<?php echo $_SESSION["login"]?>" />
	<br />
	Mot de passe: <input type="password" name="passwd" value="<?php echo $_SESSION["pass"]?>" />
	<input type="submit" name="submit" value="OK"/>
</form>
</body></html>