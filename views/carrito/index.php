<h1 class="font-weight-bold text-center">Carrito de la compra</h1>
<br>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Unidades</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<?php
		foreach ($carrito as $indice => $elemento) :
			$producto = $elemento['producto'];
		?>

			<tr>
				<td>
					<?php if ($producto->imagen != null) : ?>
						<img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
					<?php else : ?>
						<img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" />
					<?php endif; ?>
				</td>
				<td>
					<a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>" class="text-dark"><?= $producto->nombre ?></a>
				</td>
				<td>
					<?= $producto->precio ?>
				</td>
				<td>
					<?= $elemento['unidades'] ?>
					<div class="updown-unidades">
						<a href="<?= base_url ?>carrito/up&index=<?= $indice ?>" class="btn btn-info text-light font-weight-bold">+</a>
						<a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="btn btn-info text-light font-weight-bold">-</a>
					</div>
				</td>
				<td>
					<a href="<?= base_url ?>carrito/delete&index=<?= $indice ?>" class="btn btn-danger text-light"><i class="fas fa-trash-alt"></i>  Quitar producto</a>
				</td>
			</tr>

		<?php endforeach; ?>
	</table>
	<br />
	<div class="delete-carrito">
		<a href="<?= base_url ?>carrito/delete_all" class="button  btn btn-danger">Vaciar carrito</a>
	</div>
	<div class="total-carrito">
		<?php $stats = Utils::statsCarrito(); ?>
		<h3 class="font-weight-bold">Precio total: <?= $stats['total'] ?> $</h3>
		<a href="<?= base_url ?>pedido/hacer" class="button btn btn-success">Hacer pedido</a>
	</div>

<?php else : ?>
	<p class="text-danger">El carrito está vacio, añade algun producto</p>
<?php endif; ?>