<?PHP
session_start();
if ($_POST){
	$login = $_POST[login];
	$pass = $_POST[passwd];
	$_SESSION["login"] = $login;
	$_SESSION["pass"] = $pass;
	}
?>

<HTML>
<head>
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Claire Commissaire </title>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<!-- <script src="code.js"></script> --> 
</head>
<body>
<?PHP
	if (empty($_POST[login])){
		?>
		<HTML>
		  <div class="typewriter"> <h1>Bonjour,   <form  method="post" action="index.php"><input id="grey" type="text" maxlength="10" name="login" value="toi ?">
		</div></form></h1>
		</HTML>
	<?PHP 
			}
			else {
		?>
		<HTML>
		  <h1 style="padding-top:7vw">Bonjour,   <form method="post" action="index.php"><input maxlength="10" type="text" name="login" value="<?php echo $_SESSION["login"]?> ">
		  </form></h1>
		</HTML>
		<?PHP } ?> 
 <h1>Bienvenue sur mon site web !</h1>
<div class="navbar">
	<a href=journalisme/chrono.php>Journalisme</a>
	<a href="camagru/login.php">Camagru</a></a>
	<a href="/aboutme.php">whoamI?</a>
</div>

</div>
</body>

</HTML>


