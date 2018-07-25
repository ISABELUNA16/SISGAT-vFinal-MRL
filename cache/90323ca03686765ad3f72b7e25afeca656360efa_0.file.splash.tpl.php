<?php
/* Smarty version 3.1.30, created on 2017-11-29 16:55:36
  from "C:\wamp\www\SISGAT\views\templates\splash.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1ed8784f3765_59244184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90323ca03686765ad3f72b7e25afeca656360efa' => 
    array (
      0 => 'C:\\wamp\\www\\SISGAT\\views\\templates\\splash.tpl',
      1 => 1511426465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1ed8784f3765_59244184 (Smarty_Internal_Template $_smarty_tpl) {
?>
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

	<?php echo '<script'; ?>
 type="text/javascript">
		window.onload=timeout;
		function timeout(){
			window.setTimeout("redirect()",1000)
	    }

		function redirect(){
			window.location.href = "?action=principal"
		return
		}
	<?php echo '</script'; ?>
>

	</body>
</html><?php }
}
