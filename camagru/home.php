<?PHP 
session_start();
include('test.html');
if ($_SESSION['uid']){
?>
<HTML>
	
<form method="post" action="logout.php" name="logout">
<input type="submit" class="button" name="logout" value="LOGOUT">

</HTML>

<?PHP }
else { ?>

<HTML>
<body>

<div class="loginbox">

<h1>Login here</h1>
<form method="post" action="login.php" name="login">
		<p>Username or Email</p>
		<input type="text" name="login" placeholder="Qui es-tu?" autocomplete="off" />
<p>Password</p>
	<input type="password" name="pass" autocomplete="off"/>
<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>

<input type="submit" class="button" name="loginSubmit" value="OK">
</form>
</div>

</div> 

<div id="Subscribe">
<h3>Subscribe</h3>
<form method="post" action="subscribe.php" name="login">

	<label>Username</label>
		<input type="text" name="login" autocomplete="off" />
	<label>Name</label>
		<input type="text" name="name" autocomplete="off" />
<label>Mail</label>
		<input type="text" name="mail" autocomplete="off" />

<label>Password</label>
	<input type="password" name="pass" autocomplete="off"/>
<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>

<input type="submit" class="button" name="loginSubmit" value="OK">
</form>
</div>

</HTML>
<?PHP
} 
?> 