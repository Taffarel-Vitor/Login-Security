<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login - Security</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">

</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-lg-offset-4 col-lg-4">
			<form id="form1">
			    <h1 class="text-center txt">Entrar</h1>
				<div class="form-group">
					<input id="input-user" class="form-control input-lg input" type="text" name="user" placeholder="Usuário ou E-mail">
				</div>
				<div class="form-group">
					<input id="input-pass" class="form-control input-lg input" type="password" name="pass" placeholder="Senha de 8 a 18 caracteres">
				</div>
				<?php session_start(); ?>
				<?php $_SESSION['_token'] = md5(rand(58, 78888)); ?>
				<?php $_token = $_SESSION['_token']; ?>
				<input type="hidden" id="input-token" value="<?php echo $_token; ?>">
				<button type="button" onclick="entrar()" class="btn btn-lg btn-block active btn-info">Entrar</button>
			</form>

			<span class="mensagem">

			</span>
		</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/scripts.js"></script>
	
</body>
</html>