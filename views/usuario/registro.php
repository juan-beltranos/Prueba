<h1 class="font-weight-bold">Registrarse</h1>

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
	<strong class="alert_green">Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<div class="card card-body">
	<form action="<?= base_url ?>usuario/save" method="POST">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" class="form-control" required />

		<label for="apellidos">Apellidos</label>
		<input type="text" name="apellidos" class="form-control" required />

		<label for="email">Email</label>
		<input type="email" name="email" class="form-control" required />

		<label for="password">Contraseña</label>
		<input type="password" name="password" class="form-control" required />

		<input type="submit" value="Registrarse" class="btn btn-success" />
	</form>
</div>