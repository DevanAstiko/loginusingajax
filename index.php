<?php
session_start();
if(!empty($_SESSION['login_user']))
{
	header('Location: home.php');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Login using ajax</title>
	
	<!--  -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	


	<!--  -->

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.ui.shake.js"></script>
	<!-- kode untuk cek variabel username dan password dari form -->
	<script>
		$(document).ready(function() {
			
			$('#login').click(function()
			{
				var username=$("#username").val();
				var password=$("#password").val();
				var dataString = 'username='+username+'&password='+password;
				if($.trim(username).length>0 && $.trim(password).length>0)
				{

 			// isi dari $.ajax ini akan dikirimkan ke dalam Login.php
 			$.ajax({
 				type: "POST",
 				url: "Login.php",
 				data: dataString,
 				cache: false,

 				beforeSend: function(){ $("#login").val('Connecting...');},
            //data yg dikirimkan dari Login.php
            success: function(data){
            	if(data)
            	{
            		$("body").load("home.php").hide().fadeIn(1500).delay(6000);
            	}
            // jika data null
            else
            {

            	$('#box').shake();
            	$("#login").val('Login')
            	$("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
            }
        }
    });

 		}
 		return false;
 	});
			

		});
</script>
</head>



<body>
	
<div class="container">
		<div class="top">
			<h1 id="title" class="hidden">Using AJAX</h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<form action="" method="post">
				<label>Username</label>
				<br/> 
				<input type="text" name="username" class="input" autocomplete="off" id="username"/>
				<br/>
				<label>Password </label>
				<br/>
				<input type="password" name="password" class="input" autocomplete="off" id="password"/>
				<br/>
				<input type="submit" class="button button-primary" value="Log In" id="login"/> 
				<span class='msg'></span> 
				<a href="#"><p class="small">Forgot your password?</p></a>
				<div id="error">

				</div>	

			</div>
		</form>	
		

		</div>
	</div>
	<br/>
	<br/>


</body>

<script>
	$(document).ready(function () {
		$('#logo').addClass('animated fadeInDown');
		$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>