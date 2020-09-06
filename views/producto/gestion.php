<div class="py-4">
	<h1 class="font-weight-bold">Gestión de productos</h1>
</div>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
	<strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
	<strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
	<strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
	<strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table class="table">
	<thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>NOMBRE</th>
			<th>PRECIO</th>
			<th>ACCIONES</th>
		</tr>
	</thead>
	<?php while ($pro = $productos->fetch_object()) : ?>
		<tbody>
			<tr>
				<td><?= $pro->id; ?></td>
				<td><?= $pro->nombre; ?></td>
				<td><?= $pro->precio; ?></td>
				<td>
					<a href="<?= base_url ?>producto/editar&id=<?= $pro->id ?>" class="btn btn-warning text-light"><i class="fas fa-edit"></i> Editar</a>
					<a href="<?= base_url ?>producto/eliminar&id=<?= $pro->id ?>" class="btn btn-danger text-light"><i class="fas fa-trash-alt"></i> Eliminar</a>
				</td>
			</tr>
		</tbody>
	<?php endwhile; ?>
</table>