<!DOCTYPE html>
<html>
	<head>
		<title>Conectando</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="views/css/login.css">
		<link rel="icon" type="image/png" sizes="32x32" href="views/images/logo.jpeg" alt="icono">
	</head>
	
	<body class="bg-blue" onload="timeout();">
		<form method="POST" action="?action=splash">
			<center>
				<img class="cargarIcono" src="views/images/cargar.gif" width="100px" height="100px">
			</center>
		</form>

	<script type="text/javascript">
		window.onload=timeout;
		function timeout(){
			window.setTimeout("redirect()",1000)
	    }

		function redirect(){
			window.location.href = "?action=principal"
		return
		}
	</script>

	</body>
</html>