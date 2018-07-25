<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

        <title>.: SISGAT :.</title>

		<link rel="stylesheet" href="views/css/login.css">
		<link rel="stylesheet" href="views/css/forms.css">
		<link rel="icon" type="image/png" sizes="32x32" href="views/images/logo.jpeg" alt="icono">
	</head>
	<body class="bg-blue">
		<div class="body body-s">
            {$url}
			<form action="?action=login" method="post" class="sky-form">	
				<header> 
					<center>
						<img src="views/images/logo.png" width="150px" height="50px">
						<br><hr>
						<h4>SISGAT</h4>
					</center>
				</header>
				<fieldset>
					<section>
						<div {$clase}>
							<label>{$mensaje}</label>

						</div>
					</section>
					<center>{$img}</center>
					<section>
						<div class="row">
							<label class="label col col-3"><strong>Usuario </strong></label>
							<div class="col col-9">
								<label class="input">
									<i class="icon-append icon-user"></i>
									<input type="text" id="usuario" name="usuario" autocomplete="off" maxlength="15" value="{$usuario}" {$focus}>
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">
							<label class="label col col-3"><strong>Contraseña </strong></label>
							<div class="col col-9">
								<label class="input">
									<i class="icon-append icon-lock"></i>
									<input type="password" id="contrasena" name="contrasena" maxlength="25" value="{$contrasena}" {$focps}>
								</label>
								
							</div>
						</div>
					</section>
				</fieldset>
				<footer>
					<button class="button">Ingresar</button>
					
				</footer>
			</form>
		</div>
	
	</body>
</html>
