<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<meta charset="utf-8">
	<title>My test task</title>
	<link href=".\css\style.css" rel="stylesheet" type="text/css" media="screen" />
	<script type'/text/javascript' src='js/plugins/jquery-3.1.1.min.js'></script>
	<script type'/text/javascript' src='js/main.js'></script>
	<script type'/text/javascript' src='js/signin.js'></script>
	<script type'/text/javascript' src='js/signup.js'></script>
	<script type'/text/javascript' src='js/signout.js'></script>
	<?php
		include 'php/session/checkSession.php';
	?>
</head>

<body>
	<header>
		<h1>Menu</h1>
		<nav>
		<?php
			if ($logined){
				echo '<a href="#" id="signoutButton" onclick="signout()">Sign out</a>';
			}
			else
				echo '
				<a href="#" id="signinButton" onclick="showPopup(&#39#signin&#39)">Sign in</a>
				<a href="#" id="signupButton" onclick="showPopup(&#39#signup&#39); loadCountries();">Sign up</a>';
		?>
		</nav>
	</header>
	
	<article>
		<div id="text">
			<h1>Welcome to my test task!</h1>
			<?php
				if ($logined){
					echo '<h2>Hello, '.$_SESSION['username'].'!</h2>';
				}
				else
					echo '<h2>Please, sign in or sign up to continue.</h2>';
			?>
		</div>
	</article>
	
	<footer>
		<p id='copyright'>Created by Diana Ahafonova</p>
		
		<div class='popup' id='signin' onclick='clearPopups(event)'>
			<div class='popupBox'>
				<div class='message'></div>
				<input type='text' id='login' placeholder='E-mail or Login'></input><br>
				<input type='password' id='password' placeholder='Password'></input>
				<div class='button' onclick='checkLogin()'>Sign in</div>
			</div>
		</div>
	
		<div class='popup' id='signup' onclick='clearPopups(event)'>
			<div class='popupBox'>
				<div class='message'></div>
				<input type='email' id='email' placeholder='E-mail'></input><br>
				<input type='text' id='login' placeholder='Login'></input><br>
				<input type='text' id='real_name' placeholder='Real name'></input><br>
				<input type='password' id='password' placeholder='Password'></input><br>
				<input type='password' id='repeat_password' placeholder='Repeat password'></input><br>
				<p>Select your birth date:</p>
				<input type='date' id='birth_date'></input><br>
				<select id='country'></select><br>
				<input type="checkbox" id='checkbox' value="1"/><span>I agree with terms and conditions</span>
				<div class='button' onclick='checkSignup()'>Sign up</div>
			</div>
		</div>
	
	</footer>
</body>
</html>