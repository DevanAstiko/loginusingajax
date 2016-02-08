<?php
session_start();
if(empty($_SESSION['login_user']))
{
	header('Location: index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Home page</title>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>

<div class="container">

		<div class="top">
			<h1 id="title" class="hidden">This is Home Page</h1>
			</div>
		<div class="login-box animated fadeInUp">
		<a  href="logout.php"><h1 class="small">Logout</h1></a>
		
		</div>
	</div>
</body>
</html>