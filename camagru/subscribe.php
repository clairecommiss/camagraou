<?PHP
echo HALLOO;
require('getdb.php');
require('userClass.php');

$user = new userClass(); // on instancie le user 
var_dump($user);
print_r($_POST);

if ($_POST[login]){
	echo lol;
	$login = $_POST[login];
	$pass = $_POST[pass];
	$mail = $_POST[mail];
	$name= $_POST[name];
	$success = $user->Registration($login, $pass, $mail, $name); 
	var_dump ($success);
	if ($success){
		echo 'NOUVEL USER CREE ; LE USER EST LE NUM :'.$_SESSION[uid];
		header("Location: home.php");
	}
	else
		echo "Cet user existe deja.";
	}

?>