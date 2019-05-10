<?PHP

// Cette classe contient 3 methodes
// - Login : la personne veut se logcar elle est deja inscrite
// - Registration : la personne veut se creer un compte
// - User details ; affiche tout sur le User defini d'apres son UID  
	class userClass{

	public function Login($login, $pass)
	{
		try {
			$db = connect();
			echo "Connexion OK\n\n\n\n\n\nLOGIN IS";
			echo $login;
			echo "\n";
			echo "\n\n\n\n\n\nPASS IS";
			echo $pass;
			//var_dump ($db);
			$hash_pass = hash('sha256', $pass); //Password encryption
			//var_dump($hash_password);

			$stmt = $db->prepare("SELECT uid FROM users WHERE username=:login AND password=:hash_pass"); 
			// prepare : prepare une requete a etre executee par execute; prend en param un statement
			//modele de req SQL valide ; retourne un objet PDOSTatement(qui a ses meth et attrivuts propres)
			// Ici : on SELECT les uid ou la colonne SQL username OU email match avec le parametre mail 
			//ici ecrit :usernameMail ;
			$stmt->bindParam("login", $login, PDO::PARAM_STR) ;
			$stmt->bindParam("hash_pass", $hash_pass, PDO::PARAM_STR) ;
			//Pour la requete SQL : on lie le parametre SQL usernameMail a notre variable $usernamemail
			// en gros il interprete : par ex si on a Kiki en $usernameMail, dans la requete il saura
			// qu'on cherche Kiki. 
			$stmt->execute();
			// On execute la requete 
			$count=$stmt->rowCount(); 
			echo "COUNT IS =".$count;
			// PDOStatement::rowCount() retourne le nombre de lignes affectées par la 
			//dernière requête DELETE, INSERT ou UPDATE exécutée par l'objet PDOStatement 
			//correspondant. => si on renvoie qqchose (ici requete SELECT): ca veut dire
			//que le login est present dans la db.  
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;

		if ($count) //on a le login;
		{
			$_SESSION['uid']=$data->uid; // Storing user session value
			return true;
		}
		else
		{
			return false;
		}
		}
		catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
		}

	}


	public function Registration($username,$password,$email,$name)
	{
	try {
		$db = connect();
		$st = $db->prepare("SELECT uid FROM users WHERE username=:username OR email=:email"); 
		$st->bindParam("username", $username,PDO::PARAM_STR);
		$st->bindParam("email", $email,PDO::PARAM_STR);
		$st->execute();
		$count=$st->rowCount();

	if($count<1) // Si rien ne match, signifie que l'user n'existe pas ; on le cree dans la db
	{
		$stmt = $db->prepare("INSERT INTO users(username,password,email,name) VALUES (:username,:hash_password,:email,:name)");
		$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
		$hash_password= hash('sha256', $password); //Password encryption
		$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
		$stmt->bindParam("email", $email, PDO::PARAM_STR) ;
		$stmt->bindParam("name", $name, PDO::PARAM_STR) ;
		$stmt->execute();
		$uid=$db->lastInsertId(); // Last inserted row id, on a cree un nouvelle UID
		$db = null;
		$_SESSION['uid']=$uid;
		return true;
	}
	else
	{
		$db = null;
		return false;
	}

		} 
		catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	}



}
?>