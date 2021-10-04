<?php 
if(isset($_GET['Email'] )){
	$Email = $_GET['Email'];
}else{
	header('Location: login.html');
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Auth</title>
	<link rel="shortcut icon" href="assets/icons/logo-favicon.ico" />
	<link rel="stylesheet" type="text/css" href="css/auth_styles.css">
    <link rel="stylesheet" href="css/particles.css" />
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="assets/images/wave.png">
	<div class="container">
		<div id="particles-js"></div>
		<div class="img">
			<img src="assets/images/auth_img.svg">
		</div>
		<div class="login-content">
			<form id="auth-form" method="POST">
				<img src="assets/images/avatar.svg">
				<h2 class="title">Authenticate</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fa fa-code"></i>
					</div>
					<div class="div">
						<h5>Code</h5>
						<input type="number" class="input" autocomplete="off" id="Codigo" name="Codigo" require>
						<input type="hidden" class="input" autocomplete="off" id="Email" name="Email"
							value="<?php echo $Email;?>">
					</div>
				</div>
				<a href="#">Resend code?</a>
				<div class="register">
					<input type="submit" class="btn" value="Register">
				</div>
			</form>
		</div>
		<script src="js/particles02.js"></script>
		<script src="js/particles_app.js"></script>
	</div>
	<script type="text/javascript" src="js/auth_script.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="../dev/dev_js/code-confirm_ajax.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>