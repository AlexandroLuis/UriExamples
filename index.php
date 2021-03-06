<!--  
	Desenvolvido por https://github.com/AlexandroLuis
	Versão 1.0 - 2020
-->
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
		<script src="https://apis.google.com/js/api:client.js"></script>
		<script>
		var googleUser = {};
		var startApp = function() {
			gapi.load('auth2', function(){
			// Retrieve the singleton for the GoogleAuth library and set up the client.
			auth2 = gapi.auth2.init({
				client_id: '384602407862-g2t95qbtuto07r923qlic2317dbrkboa.apps.googleusercontent.com',
				cookiepolicy: 'single_host_origin',
				// Request scopes in addition to 'profile' and 'email'
				//scope: 'additional_scope'
			});
			attachSignin(document.getElementById('customBtn'));
			});
		};
		function attachSignin(element) {
			console.log(element.id);
			auth2.attachClickHandler(element, {},
				function(googleUser) {
					window.location.href = "MainInformationPage.php";
				}, function(error) {
					alert("Erro!");
				});
		}
		</script>
		<style type="text/css">
			#customBtn {
				display: inline-block;
				background: white;
				color: #444;
				width: 100px;
				border-radius: 5px;
				border: thin solid #888;
				box-shadow: 1px 1px 1px grey;
				white-space: nowrap;
			}
			#customBtn:hover {
				cursor: pointer;
			}
			span.label {
				font-family: serif;
				font-weight: normal;
			}
			span.icon {
				background: url('/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
				display: inline-block;
				vertical-align: middle;
				width: 42px;
				height: 42px;
			}
			span.buttonText {
				display: inline-block;
				vertical-align: middle;
				padding-left: 0px;
				padding-right: 0px;
				font-size: 14px;
				font-weight: bold;
				font-family: 'Roboto', sans-serif;
			}
		</style>
	</head>
<body>
	<div class="container">
		<form class="form-signin" method="POST" action="VerifyUserProfile.php">
			<h2 class="form-signin-heading">Login</h2>
			<label for="inputEmail" class="sr-only">Email</label>
			<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
			<label for="inputPassword" class="sr-only">Senha</label>
			<input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
			<button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
		</form>
		<p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
		<p class="text-center text-success">
			<?php 
			if(isset($_SESSION['logindeslogado'])){
				echo $_SESSION['logindeslogado'];
				unset($_SESSION['logindeslogado']);}
			?>
		</p>
    </div>
    <div id="gSignInWrapper">
		<div id="customBtn" class="customGPlusSignIn">
		   <span class="icon"></span>
		   <span class="buttonText">Entrar!</span>
		</div>
    </div>
	<div id="name"></div>
    <script>startApp();</script>
</body>
</html>