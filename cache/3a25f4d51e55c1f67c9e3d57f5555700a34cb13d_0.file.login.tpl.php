<?php
/* Smarty version 3.1.30, created on 2017-11-29 16:55:30
  from "C:\wamp\www\SISGAT\views\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1ed8726d7ec8_46671030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a25f4d51e55c1f67c9e3d57f5555700a34cb13d' => 
    array (
      0 => 'C:\\wamp\\www\\SISGAT\\views\\templates\\login.tpl',
      1 => 1511426381,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1ed8726d7ec8_46671030 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
            <?php echo $_smarty_tpl->tpl_vars['url']->value;?>

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
						<div <?php echo $_smarty_tpl->tpl_vars['clase']->value;?>
>
							<label><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</label>

						</div>
					</section>
					<center><?php echo $_smarty_tpl->tpl_vars['img']->value;?>
</center>
					<section>
						<div class="row">
							<label class="label col col-3"><strong>Usuario </strong></label>
							<div class="col col-9">
								<label class="input">
									<i class="icon-append icon-user"></i>
									<input type="text" id="usuario" name="usuario" autocomplete="off" maxlength="15" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['focus']->value;?>
>
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
									<input type="password" id="contrasena" name="contrasena" maxlength="25" value="<?php echo $_smarty_tpl->tpl_vars['contrasena']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['focps']->value;?>
>
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
<?php }
}
