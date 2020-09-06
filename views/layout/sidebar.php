<!-- BARRA LATERAL -->

<div id="carrito" class="card card-body ">
	<h3><i class="fas fa-shopping-cart text-danger"></i> Tu carrito</h3>
	<ul class="p-4">
		<?php $stats = Utils::statsCarrito(); ?>
		<li><a href="<?= base_url ?>carrito/index" class="text-dark">Productos (<?= $stats['count'] ?>)</a></li>
		<li><a href="<?= base_url ?>carrito/index" class="text-dark">Total: <?= $stats['total'] ?> $</a></li>
		<li><a href="<?= base_url ?>carrito/index" class="text-dark">Ver el carrito</a></li>
	</ul>
</div>
<br>
<div id="login" class="card card-body ">

	<?php if (!isset($_SESSION['identity'])) : ?>
		<h3>Entrar a la web</h3>
		<form action="<?= base_url ?>usuario/login" method="post">
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control" />
			<label for="password">Contraseña</label>
			<input type="password" name="password" class="form-control" />
			<input type="submit" value="Ingresar" class="btn btn-info btn-block" />
		</form>
	<?php else : ?>
		<h3><i class="fas fa-user text-danger"></i> <?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
	<?php endif; ?>

	<ul class="p-4">
		<?php if (isset($_SESSION['identity'])) : ?>
	
			<li><a href="<?= base_url ?>producto/gestion" class="text-dark">Gestionar productos</a></li>

		<?php endif; ?>

		<?php if (isset($_SESSION['identity'])) : ?>
			<li><a href="<?= base_url ?>pedido/mis_pedidos" class="text-dark">Mis pedidos</a></li>
			<li><a href="<?= base_url ?>usuario/logout" class="text-dark">Cerrar sesión</a></li>
		<?php else : ?>
			<li><a href="<?= base_url ?>usuario/registro" class="text-dark">Registrate aqui</a></li>
		<?php endif; ?>
	</ul>
</div>

</div>

<!-- CONTENIDO CENTRAL -->
<div class="col-md-9">
	<br>