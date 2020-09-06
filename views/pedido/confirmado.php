<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
	<h1 class="font-weight-bold text-center">Tu pedido se ha confirmado</h1>
	<p class="text-center">
		Tu pedido ha sido guardado con exito, una vez que realices la transferencia
		bancaria a la cuenta 7382947289239ADD con el coste del pedido, será procesado y enviado.
	</p>
	<br />
	<?php if (isset($pedido)) : ?>
		<div class="pb-2">
			<h3 class="font-weight-bold">Datos del pedido:</h3>

			Número de pedido: <?= $pedido->id ?> <br />
			Total a pagar: <?= $pedido->coste ?> $ <br />
		</div>

		<p class="font-weight-bold">Productos:</p>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>Imagen</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Unidades</th>
				</tr>
			</thead>
			<?php while ($producto = $productos->fetch_object()) : ?>
				<tr>
					<td>
						<?php if ($producto->imagen != null) : ?>
							<img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
						<?php else : ?>
							<img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" />
						<?php endif; ?>
					</td>
					<td>
						<a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>" class="text-info"><?= $producto->nombre ?></a>
					</td>
					<td>
						<?= $producto->precio ?>
					</td>
					<td>
						<?= $producto->unidades ?>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>

	<?php endif; ?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
	<h1>Tu pedido NO ha podido procesarse</h1>
<?php endif; ?>